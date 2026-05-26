<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CAT_MOTIVO', function (Blueprint $table) {
            $table->id('MOT_N_ID')
                ->comment('Identificador único del motivo (PK)');

            $table->string('MOT_V_DESCRIPCION', 200)
                ->comment('Descripcion del motivo');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CAT_MOTIVO');
    }
};
