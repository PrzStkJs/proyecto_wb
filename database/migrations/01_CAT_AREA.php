<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('CAT_AREA', function (Blueprint $table) {
            $table->id('ARE_N_ID')
                ->comment('Identificador único del área (PK)');

            $table->string('ARE_V_NOMBRE', 50)
                ->comment('Nombre descriptivo del área');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('CAT_AREA');
    }
};
