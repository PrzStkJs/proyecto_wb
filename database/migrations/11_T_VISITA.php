<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('T_VISITA', function (Blueprint $table) {
            $table->id('VTA_N_ID')->comment('ID de registro de visita');

            $table->date('VTA_D_FECHA')
            ->comment('Fecha del registro');

            $table->timestamp('VTA_T_HORA_ENTRADA')
            ->comment('Hora exacta de ingreso');

            $table->timestamp('VTA_T_HORA_SALIDA')
            ->nullable()
            ->comment('Hora de salida (puede ser nula al ingresar)');

            $table->foreignId('MOT_N_ID')
            ->nullable()
            ->constrained('CAT_MOTIVO', 'MOT_N_ID');


            $table->foreignId('FUN_N_ID')
            ->constrained('T_FUNCIONARIO', 'FUN_N_ID');

            $table->foreignId('VIS_N_ID')
            ->constrained('T_VISITANTE', 'VIS_N_ID');

            $table->foreignId('EST_N_ID')
            ->constrained('CAT_ESTADO_VISITA', 'EST_N_ID');

            $table->foreignId('SED_N_ID')
            ->constrained('CAT_SEDE', 'SED_N_ID');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('T_VISITA');
    }
};
