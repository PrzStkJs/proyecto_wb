<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('T_VISITANTE', function (Blueprint $table) {

        $table->id('VIS_N_ID')->comment('ID único de registro de visitante');


        $table->foreignId('PER_N_ID')
            ->constrained('T_PERSONA', 'PER_N_ID')
            ->onDelete('cascade');


        $table->foreignId('ENT_N_ID')
            ->nullable()
            ->constrained('T_ENTIDAD', 'ENT_N_ID');

        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('T_VISITANTE');
    }
};
