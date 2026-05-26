<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CAT_SEDE', function (Blueprint $table) {
            $table->id('SED_N_ID')
                ->comment('Identificador único la sede (PK)');

            $table->string('SED_V_NOMBRE', 50)
                ->comment('Nombre del la sede');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CAT_SEDE');
    }
};
