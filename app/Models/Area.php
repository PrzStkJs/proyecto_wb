<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla CAT_AREA.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'CAT_AREA';
    protected $primaryKey = 'ARE_N_ID';

    protected $fillable = [
        'ARE_V_NOMBRE',
    ];
}
