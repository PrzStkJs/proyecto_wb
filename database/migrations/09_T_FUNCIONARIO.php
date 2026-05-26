<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
    Schema::create('T_FUNCIONARIO', function (Blueprint $table) {

        $table->id('FUN_N_ID')->comment('ID único de registro de funcionario');

        $table->foreignId('PER_N_ID')
            ->constrained('T_PERSONA', 'PER_N_ID')
            ->onDelete('cascade');

        $table->foreignId('CAR_N_ID')
            ->constrained('CAT_CARGO', 'CAR_N_ID')
        ->nullable();

        $table->foreignId('ARE_N_ID')
            ->constrained('CAT_AREA', 'ARE_N_ID');

        $table->boolean('FUN_B_SUJETO_OBLIGADO')
            ->default(false);

        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('T_FUNCIONARIO');
    }
};
