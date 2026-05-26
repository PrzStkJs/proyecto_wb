<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla CAT_MOTIVO.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motivo extends Model
{
    use HasFactory;

    protected $table = 'CAT_MOTIVO';
    protected $primaryKey = 'MOT_N_ID';

    protected $fillable = [
        'MOT_V_DESCRIPCION',
    ];
}
