<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mensajes', function (Blueprint $table) {
        $table->id(); // ID único
        $table->string('nombre');
        $table->string('email');
        $table->string('asunto');
        $table->text('mensaje');
        $table->boolean('leido')->default(false); // Para saber si el admin ya lo vio
        $table->text('respuesta')->nullable(); // Por si el admin quiere responder
        $table->timestamps(); // Crea fecha de creación y actualización automática
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};
