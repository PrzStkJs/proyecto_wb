<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Rutas de la API (consultas de visitas y DNI).
|--------------------------------------------------------------------------
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VisitaController;

/*
|--------------------------------------------------------------------------
| Sección 1 : Ruta por defecto (usuario autenticado con Sanctum)
|--------------------------------------------------------------------------
*/
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| Sección 2 : Endpoints de visitas
|--------------------------------------------------------------------------
*/
Route::get('/visitas-activas', [VisitaController::class, 'index']);

Route::get('/consultar-dni/{dni}', [VisitaController::class, 'consultarDni']);
