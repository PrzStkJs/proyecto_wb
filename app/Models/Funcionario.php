<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla T_FUNCIONARIO.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $table = 'T_FUNCIONARIO';
    protected $primaryKey = 'FUN_N_ID';

    protected $fillable = [
        'PER_N_ID',
        'CAR_N_ID',
        'ARE_N_ID',
        'FUN_B_SUJETO_OBLIGADO'
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

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'CAR_N_ID', 'CAR_N_ID');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'ARE_N_ID', 'ARE_N_ID');
    }
}
