<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla T_VISITANTE.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    use HasFactory;

    protected $table = 'T_VISITANTE';
    protected $primaryKey = 'VIS_N_ID';

    protected $fillable = [
        'PER_N_ID',
        'ENT_N_ID'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */
    public function persona()
    {
        return $this->belongsTo(Persona::class, 'PER_N_ID', 'PER_N_ID');
    }

    public function entidad()
    {
        return $this->belongsTo(Entidad::class, 'ENT_N_ID', 'ENT_N_ID');
    }
}
