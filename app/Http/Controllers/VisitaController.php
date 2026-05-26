<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Controlador para la gestión de visitas: registro, salida,
|               acompañantes y reportes.
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visita;
use App\Models\Persona;
use App\Models\Acompanante;

class VisitaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Pantalla principal de visitas activas
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $visitas = Visita::with([
            'funcionario.persona',
            'visitante.persona',
            'visitante.entidad',
            'acompanantes.persona'
        ])
        ->whereNull('VTA_T_HORA_SALIDA')
        ->orderBy('VTA_T_HORA_ENTRADA', 'desc')
        ->get();

        return view('Regs-visist', compact('visitas'));
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Vista para registrar la salida de una visita
    |--------------------------------------------------------------------------
    */
    public function vistaSalida($id)
    {
        $visita = Visita::with(['visitante.persona', 'acompanantes.persona'])->findOrFail($id);
        return view('Reg-Salida', compact('visita'));
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : Vista para agregar acompañante a una visita
    |--------------------------------------------------------------------------
    */
    public function vistaAgregarAcompanante($id)
    {
        $visita = Visita::with(['funcionario.persona', 'visitante.persona'])->findOrFail($id);
        return view('Reg-Acompanante', compact('visita'));
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : Guardar nuevo acompañante en la base de datos
    |--------------------------------------------------------------------------
    */
    public function storeAcompanante(Request $request)
    {
        $request->validate([
            'visita_id'        => 'required|exists:T_VISITA,VTA_N_ID',
            'numeroDocumento'  => 'required|string|max:8',
            'nombres_api'      => 'required_without:apellidos_api|string|max:255',
            'apellidos_api'    => 'required_without:nombres_api|string|max:255',
        ], [
            'nombres_api.required_without' => 'Debe ingresar al menos un nombre o un apellido.',
            'apellidos_api.required_without' => 'Debe ingresar al menos un nombre o un apellido.',
        ]);

        try {
            DB::beginTransaction();

            $personaAcompanante = Persona::firstOrCreate(
                ['PER_B_DNI' => $request->numeroDocumento],
                [
                    'PER_V_NOMBRE'    => $request->nombres_api,
                    'PER_V_APELLIDOS' => $request->apellidos_api,
                    'TID_N_ID'        => 1
                ]
            );

            Acompanante::create([
                'VTA_N_ID'           => $request->visita_id,
                'PER_N_ID'           => $personaAcompanante->PER_N_ID,
                'ACO_T_HORA_ENTRADA' => now(),
            ]);

            DB::commit();

            return redirect()->route('visitas.index')->with('success', 'Acompañante agregado correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            dd('ERROR FATAL AL GUARDAR ACOMPAÑANTE: ' . $e->getMessage(), 'LÍNEA: ' . $e->getLine());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 5 : Registrar la salida (visitante y/o acompañantes)
    |--------------------------------------------------------------------------
    */
    public function registrarSalida(Request $request, $id)
    {
        $request->validate([
            'salidas' => 'required|array',
        ], [
            'salidas.required' => 'Debes seleccionar al menos a una persona para registrar su salida.'
        ]);

        try {
            DB::beginTransaction();
            $horaActual = now();

            foreach ($request->salidas as $item) {
                if (str_starts_with($item, 'visitante_')) {
                    $visita = Visita::findOrFail($id);
                    $visita->VTA_T_HORA_SALIDA = $horaActual;
                    $visita->save();
                } elseif (str_starts_with($item, 'acompanante_')) {
                    $acompananteId = str_replace('acompanante_', '', $item);
                    $acompanante = Acompanante::findOrFail($acompananteId);
                    $acompanante->ACO_T_HORA_SALIDA = $horaActual;
                    $acompanante->save();
                }
            }

            DB::commit();
            return redirect()->route('visitas.index')->with('success', 'Salida registrada correctamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            dd('ERROR AL REGISTRAR SALIDA: ' . $e->getMessage());
        }
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 6 : Módulo de reportes con filtros
    |--------------------------------------------------------------------------
    */
    public function reportes(Request $request)
    {
        $query = Visita::with([
            'funcionario.persona',
            'visitante.persona',
            'visitante.entidad',
        ])->orderBy('VTA_D_FECHA', 'desc')->orderBy('VTA_T_HORA_ENTRADA', 'desc');

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->whereHas('visitante.persona', function($q) use ($buscar) {
                $q->where('PER_B_DNI', 'LIKE', "%{$buscar}%")
                ->orWhere('PER_V_NOMBRE', 'ILIKE', "%{$buscar}%")
                ->orWhere('PER_V_APELLIDOS', 'ILIKE', "%{$buscar}%");
            });
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('VTA_D_FECHA', [$request->fecha_inicio, $request->fecha_fin]);
        }

        $visitas = $query->get();
        return view('Report-gest', compact('visitas'));
    }
}
