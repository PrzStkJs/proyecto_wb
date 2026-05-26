<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CAT_TIPO_DOCUMENTO', function (Blueprint $table) {
            $table->id('TID_N_ID')
                ->comment('Identificador único del tipo de documento (PK)');

            $table->string('TID_V_DESCRIPCION', 200)
                ->comment('Descripcion del tipo de documento');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CAT_TIPO_DOCUMENTO');
    }
};
