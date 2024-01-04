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
        Schema::create('solicitudmanteniminetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_apellido');
            $table->string('identificacion');
            $table->string('num_telefono');
            $table->string('detalle');
            $table->integer('id_usuario')->unsigned(); // Permitir campo nulo
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->integer('id_vehiculos')->unsigned()->nullable(); // Permitir campo nulo
            $table->foreign('id_vehiculos')->references('id')->on('vehiculos');
            $table->integer('id_tipomantenimentos')->unsigned()->nullable(); // Permitir campo nulo
            $table->foreign('id_tipomantenimentos')->references('id')->on('tipomantenimentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudmanteniminetos');
    }
};
