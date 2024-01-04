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
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asunto')->nullable();
            $table->string('detalle')->nullable();
            $table->string('prevencion')->nullable();
            $table->integer('id_usuario')->unsigned(); // Permitir campo nulo
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->integer('id_vehiculos')->unsigned()->nullable(); // Permitir campo nulo
            $table->foreign('id_vehiculos')->references('id')->on('vehiculos');
            $table->integer('id_personals')->unsigned()->nullable(); // Permitir campo nulo
            $table->foreign('id_personals')->references('id')->on('personals');
            $table->integer('id_tipomantenimentos')->unsigned()->nullable(); // Permitir campo nulo
            $table->foreign('id_tipomantenimentos')->references('id')->on('tipomantenimentos');
            $table->integer('id_solicitudmanteniminetos')->unsigned()->nullable(); // Permitir campo nulo
            $table->foreign('id_solicitudmanteniminetos')->references('id')->on('solicitudmanteniminetos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimientos');
    }
};
