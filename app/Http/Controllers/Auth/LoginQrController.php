<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Controlador de autenticación por QR: genera token,
|               muestra vistas, autoriza y verifica estado.
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AccesoQr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginQrController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Sección 1 : Mostrar QR en la PC (genera token y vista inicial)
    |--------------------------------------------------------------------------
    */
    public function mostrarQr()
    {
        $token = Str::random(50);

        AccesoQr::create([
            'token_qr' => $token,
            'estado'   => 'pendiente'
        ]);

        return view('idVisit-log', compact('token'));
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 2 : Portal que ve el celular al escanear el QR
    |--------------------------------------------------------------------------
    */
    public function portalCelular($token)
    {
        $acceso = AccesoQr::where('token_qr', $token)->firstOrFail();
        return view('Validacion', compact('token'));
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 3 : El celular presiona "Autorizar Ingreso"
    |--------------------------------------------------------------------------
    */
    public function autorizar($token)
    {
        $acceso = AccesoQr::where('token_qr', $token)->firstOrFail();
        $acceso->update(['estado' => 'autorizado']);

        return response()->json(['status' => 'success']);
    }

    /*
    |--------------------------------------------------------------------------
    | Sección 4 : La PC consulta si ya se autorizó (polling)
    |--------------------------------------------------------------------------
    */
    public function verificarStatus($token)
    {
        $acceso = AccesoQr::where('token_qr', $token)->first();

        if ($acceso && $acceso->estado === 'autorizado') {
            $acceso->delete();
            return response()->json(['login' => true]);
        }

        return response()->json(['login' => false]);
    }
}
