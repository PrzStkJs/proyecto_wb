<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('T_PERSONA', function (Blueprint $table) {

            $table->id('PER_N_ID')
            ->comment('ID único de persona');

            $table->string('PER_B_DNI', 500)
            ->comment('DNI encriptado (Ley 29733)');

            $table->string('PER_V_NOMBRE', 50)
            ->comment('Nombres de la persona');

            $table->string('PER_V_APELLIDOS', 50)
            ->comment('Apellidos completos');


            $table->foreignId('TID_N_ID')
                ->constrained('CAT_TIPO_DOCUMENTO', 'TID_N_ID')
                ->onDelete('cascade')
                ->comment('FK a Tipo de Documento');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('T_PERSONA');
    }
};
