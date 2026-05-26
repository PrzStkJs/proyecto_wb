<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla T_PERSONA.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'T_PERSONA';
    protected $primaryKey = 'PER_N_ID';

    protected $fillable = [
        'PER_B_DNI',
        'PER_V_NOMBRE',
        'PER_V_APELLIDOS',
        'TID_N_ID'
    ];

    // Encriptado automático del DNI (Ley 29733)
    protected function casts(): array
    {
        return [
            'PER_B_DNI' => 'encrypted',
        ];
    }
}
