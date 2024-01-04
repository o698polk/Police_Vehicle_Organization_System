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
        Schema::create('danosfrecuentes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('defecto')->nullable();
            $table->string('detalle')->nullable();
            $table->string('recomendaciones')->nullable();
            $table->integer('id_usuario')->unsigned(); // Permitir campo nulo
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->integer('id_vehiculos')->unsigned()->nullable(); // Permitir campo nulo
            $table->foreign('id_vehiculos')->references('id')->on('vehiculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danosfrecuentes');
    }
};
