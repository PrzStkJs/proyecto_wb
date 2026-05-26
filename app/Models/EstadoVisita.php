<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla CAT_ESTADO_VISITA.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoVisita extends Model
{
    use HasFactory;

    protected $table = 'CAT_ESTADO_VISITA';
    protected $primaryKey = 'EST_N_ID';

    protected $fillable = [
        'EST_V_DESCRIPCION',
    ];
}
