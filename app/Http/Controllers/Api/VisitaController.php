<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Controlador API para consulta de visitas activas y
|               validación de DNI mediante servicio externo.
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visita;
use Illuminate\Support\Facades\Http;

class VisitaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Listar visitas activas (sin hora de salida)
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $visitas = Visita::activas()
            ->with(['visitante', 'motivo', 'funcionario', 'sede'])
            ->get();

        return response()->json($visitas);
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Consultar DNI a la API externa
    |--------------------------------------------------------------------------
    */
    public function consultarDni($dni)
    {
        if (!preg_match('/^[0-9]{8}$/', $dni)) {
            return response()->json(['error' => 'El DNI debe tener 8 dígitos numéricos.'], 400);
        }

        $url = env('API_DNI_URL');

        try {
            $response = Http::withoutVerifying()->get($url, [
                'numero' => $dni
            ]);

            if ($response->failed()) {
                return response()->json([
                    'error'    => 'La API externa denegó el acceso.',
                    'status'   => $response->status(),
                    'detalles' => $response->body()
                ], $response->status());
            }

            return response()->json($response->json());

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error de conexión con el servicio de DNI.',
                'debug' => $e->getMessage()
            ], 500);
        }
    }
}
