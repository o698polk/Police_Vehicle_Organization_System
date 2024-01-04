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
        Schema::create('dependencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('provincia');

            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');

            $table->integer('id_distrito')->unsigned();
            $table->foreign('id_distrito')->references('id')->on('distritos');

            $table->integer('id_parroquia')->unsigned();
            $table->foreign('id_parroquia')->references('id')->on('parroquias');

            $table->integer('id_circuito')->unsigned();
            $table->foreign('id_circuito')->references('id')->on('circuitos');

            $table->integer('id_subcircuito')->unsigned();
            $table->foreign('id_subcircuito')->references('id')->on('subcircuitos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependencias');
    }
};
