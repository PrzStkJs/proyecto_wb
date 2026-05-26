<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('T_ACOMPANANTE', function (Blueprint $table) {
            $table->id('ACO_N_ID')->comment('ID de registro del acompañante');

            $table->foreignId('VTA_N_ID')
                ->constrained('T_VISITA', 'VTA_N_ID')
                ->onDelete('cascade')
                    ->comment('ID de la visita principal a la que acompaña');


            $table->foreignId('PER_N_ID')
                ->constrained('T_PERSONA', 'PER_N_ID')
                ->comment('ID de la persona que es acompañante');

            $table->timestamp('ACO_T_HORA_ENTRADA')
                ->comment('Hora exacta de ingreso del acompañante');

            $table->timestamp('ACO_T_HORA_SALIDA')
                ->nullable()
                ->comment('Hora de salida individual del acompañante');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('T_ACOMPANANTE');
    }
};
