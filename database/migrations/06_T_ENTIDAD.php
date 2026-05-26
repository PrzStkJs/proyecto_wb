<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('T_ENTIDAD', function (Blueprint $table) {
            $table->id('ENT_N_ID')
                ->comment('Identificador único de la entidad (PK)');

            $table->string('ENT_V_NOMBRE', 200)
            ->comment('Nombre de la entidad o empresa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('T_ENTIDAD');
    }
};
