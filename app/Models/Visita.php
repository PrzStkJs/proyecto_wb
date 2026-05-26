<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla T_VISITA.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    protected $table = 'T_VISITA';
    protected $primaryKey = 'VTA_N_ID';

    protected $fillable = [
        'VTA_D_FECHA',
        'VTA_T_HORA_ENTRADA',
        'VTA_T_HORA_SALIDA',
        'MOT_N_ID',
        'FUN_N_ID',
        'VIS_N_ID',
        'EST_N_ID',
        'SED_N_ID'
    ];

    // Conversión automática a objetos Carbon
    protected function casts(): array
    {
        return [
            'VTA_D_FECHA'        => 'date',
            'VTA_T_HORA_ENTRADA' => 'datetime',
            'VTA_T_HORA_SALIDA'  => 'datetime',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */
    public function motivo()
    {
        return $this->belongsTo(Motivo::class, 'MOT_N_ID', 'MOT_N_ID');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'FUN_N_ID', 'FUN_N_ID');
    }

    public function visitante()
    {
        return $this->belongsTo(Visitante::class, 'VIS_N_ID', 'VIS_N_ID');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoVisita::class, 'EST_N_ID', 'EST_N_ID');
    }

    public function sede()
    {
        return $this->belongsTo(Sede::class, 'SED_N_ID', 'SED_N_ID');
    }

    public function acompanantes()
    {
        return $this->hasMany(Acompanante::class, 'VTA_N_ID', 'VTA_N_ID');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeActivas($query)
    {
        return $query->whereNull('VTA_T_HORA_SALIDA');
    }
}
