<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Archivo de rutas principales de la aplicación.
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Auth\LoginQrController;
use App\Http\Controllers\VisitaFormController;
use App\Http\Controllers\VisitaController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Sección 1 : Vistas estáticas (páginas sin controlador)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('login');
});

Route::get('/Codigo_dnie', function () {
    return view('Dnie-log');
});

Route::get('/Autenticarse', function () {
    return view('index');
});

Route::get('/Plataforma_gestion', function () {
    return view('Plataform-gestion');
});

Route::get('/Entrar_juridica', function () {
    return view('Juridica-log');
});

Route::get('/Entrar_dnie', function () {
    return view('Req-Dnie');
});

Route::get('/Terminos_servicio', function () {
    return view('Term');
});

Route::get('/Politica_de_privacidad', function () {
    return view('Politica');
});

/*
|--------------------------------------------------------------------------
| Sección 2 : Autenticación por QR (LoginQrController)
|--------------------------------------------------------------------------
*/
// Muestra el QR en la PC y genera el token
Route::get('/Entrar_idVisita', [LoginQrController::class, 'mostrarQr']);

// Portal que ve el celular al escanear el QR
Route::get('/Validacion_QR/{token}', [LoginQrController::class, 'portalCelular'])->name('qr.validar');

// API: el celular presiona "Autorizar Ingreso"
Route::post('/api/autorizar-guardia/{token}', [LoginQrController::class, 'autorizar']);

// API: la PC consulta si ya se autorizó
Route::get('/api/verificar-status-qr/{token}', [LoginQrController::class, 'verificarStatus']);

/*
|--------------------------------------------------------------------------
| Sección 3 : Registro de visitas (formulario en 2 pasos)
|--------------------------------------------------------------------------
*/
// Paso 1: vista y almacenamiento temporal
Route::get('/Registrar_visita_p1', [VisitaFormController::class, 'createStep1'])->name('visitas.step1.view');
Route::post('/visita/paso1', [VisitaFormController::class, 'storeStep1'])->name('visitas.step1.store');

// Paso 2: vista y guardado final
Route::get('/Registrar_visita_p2', [VisitaFormController::class, 'viewStep2'])->name('visitas.step2.view');
Route::post('/visita/paso2', [VisitaFormController::class, 'storeStep2'])->name('visitas.step2.store');

/*
|--------------------------------------------------------------------------
| Sección 4 : Gestión de visitas (listado, salida, acompañantes)
|--------------------------------------------------------------------------
*/
// Listado de visitas activas
Route::get('/Registro_visitas', [VisitaController::class, 'index'])->name('visitas.index');

// Vista para registrar salida de una visita
Route::get('/Registrar_salida/{id}', [VisitaController::class, 'vistaSalida'])->name('visitas.salida');

// Procesar la salida
Route::post('/Registrar_salida/{id}/store', [VisitaController::class, 'registrarSalida'])->name('visitas.salida.store');

// Vista para agregar acompañante
Route::get('/Registrar_acompanante/{id}', [VisitaController::class, 'vistaAgregarAcompanante'])->name('visitas.agregar_acompanante');

// Guardar acompañante
Route::post('/visita/acompanante/store', [VisitaController::class, 'storeAcompanante'])->name('visitas.acompanante.store');

/*
|--------------------------------------------------------------------------
| Sección 5 : Reportes
|--------------------------------------------------------------------------
*/
Route::get('/Gestion_reportes', [VisitaController::class, 'reportes'])->name('reportes.index');

/*
|--------------------------------------------------------------------------
| Sección 6 : Autenticación social (Google, GitHub, Facebook, etc.)
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/auth/github', [GoogleController::class, 'redirectToGithub']);
Route::get('/auth/github/callback', [GoogleController::class, 'handleGithubCallback']);

Route::get('/auth/facebook', [GoogleController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [GoogleController::class, 'handleFacebookCallback']);

Route::get('/auth/linkedin', [GoogleController::class, 'redirectToLinkedin']);
Route::get('/auth/linkedin/callback', [GoogleController::class, 'handleLinkedinCallback']);

Route::get('/auth/microsoft', [GoogleController::class, 'redirectToMicrosoft']);
Route::get('/auth/microsoft/callback', [GoogleController::class, 'handleMicrosoftCallback']);

Route::get('/auth/twitter/redirect', [GoogleController::class, 'redirectToTwitter']);
Route::get('/auth/twitter/callback', [GoogleController::class, 'handleTwitterCallback']);

/*
|--------------------------------------------------------------------------
| Sección 7 : Logout
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
});
