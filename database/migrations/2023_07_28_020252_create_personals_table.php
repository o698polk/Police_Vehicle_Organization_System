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
        Schema::create('personals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identificacion')->unique();
            $table->string('nombre_apellido');
            $table->string('fecha_nacimiento');
            $table->string('tipo_sangre');
            $table->string('ciudad_nacimeinto');
            $table->string('num_telefono');
            $table->string('rango');
            $table->integer('id_usuario')->unsigned(); // Permitir campo nulo
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->integer('id_dependencia')->unsigned(); // Permitir campo nulo
            $table->foreign('id_dependencia')->references('id')->on('dependencias');
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
        Schema::dropIfExists('personals');
    }
};
