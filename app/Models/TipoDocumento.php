<?php

/*
|--------------------------------------------------------------------------
| Nombre      : Jesus Alexander Perez
| Fecha       : 25/05/2026
| Descripción : Modelo para la tabla CAT_TIPO_DOCUMENTO.
|--------------------------------------------------------------------------
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'CAT_TIPO_DOCUMENTO';
    protected $primaryKey = 'TID_N_ID';

    protected $fillable = [
        'TID_V_DESCRIPCION',
    ];
}
