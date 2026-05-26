<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CAT_CARGO', function (Blueprint $table) {
            $table->id('CAR_N_ID')
                ->comment('Identificador único del cargo (PK)');

            $table->string('CAR_V_NOMBRE', 50)
                ->comment('Nombre del cargo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CAT_CARGO');
    }
};
