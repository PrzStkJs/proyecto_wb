<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla T_ACOMPANANTE.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acompanante extends Model
{
    protected $table = 'T_ACOMPANANTE';
    protected $primaryKey = 'ACO_N_ID';

    protected $fillable = [
        'VTA_N_ID',
        'PER_N_ID',
        'ACO_T_HORA_ENTRADA',
        'ACO_T_HORA_SALIDA'
    ];

    // Relación: Un acompañante es una persona
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'PER_N_ID', 'PER_N_ID');
    }
}
