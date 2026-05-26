<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla T_ENTIDAD.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    protected $table = 'T_ENTIDAD';
    protected $primaryKey = 'ENT_N_ID';

    protected $fillable = [
        'ENT_V_NOMBRE'
    ];

    public function visitantes()
    {
        return $this->hasMany(Visitante::class, 'ENT_N_ID', 'ENT_N_ID');
    }
}
