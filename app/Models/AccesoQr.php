<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla T_ACCESO_QR (tokens de QR).
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccesoQr extends Model
{
    protected $table = 'T_ACCESO_QR';
    protected $fillable = ['token_qr', 'estado'];
}
