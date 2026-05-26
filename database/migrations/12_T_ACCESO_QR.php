<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('T_ACCESO_QR', function (Blueprint $table) {
    $table->id();
    $table->string('token_qr')->unique();
    $table->string('estado')->default('pendiente');
    $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('T_ACCESO_QR');
    }
};
