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
        Schema::create('ordenmovilizaciones', function (Blueprint $table) {
           $table->increments('id');

            $table->string('motivo')->nullable();
            $table->string('ruta')->nullable();
            $table->string('km_inicial')->nullable();
            $table->string('dato_ocupantes')->nullable();

            $table->integer('id_personals_conductor')->unsigned()->nullable();;
            $table->foreign('id_personals_conductor')->references('id')->on('personals');

            $table->integer('id_personals_solicitante')->unsigned()->nullable();;
             $table->foreign('id_personals_solicitante')->references('id')->on('personals');

             $table->integer('id_dependencia')->unsigned()->nullable();;
             $table->foreign('id_dependencia')->references('id')->on('dependencias');
         
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
        Schema::dropIfExists('ordenmovilizaciones');
    }
};
