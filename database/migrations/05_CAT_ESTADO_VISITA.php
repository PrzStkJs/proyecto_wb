<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CAT_ESTADO_VISITA', function (Blueprint $table) {
            $table->id('EST_N_ID')
                ->comment('Identificador único del estado de visita (PK)');

            $table->string('EST_V_DESCRIPCION', 200)
                ->comment('Descripcion de el estado de visita');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CAT_ESTADO_VISITA');
    }
};
