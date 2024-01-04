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
            $table->string('identificacion');
            $table->string('nombre_apellido');
            $table->string('fecha_nacimiento');
            $table->string('ciudad_nacimiento');
            $table->string('numero_telefono');
            $table->string('rango_policial');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->integer('id_dependencia')->unsigned();
            $table->foreign('id_dependencia')->references('id')->on('dependencias');
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
