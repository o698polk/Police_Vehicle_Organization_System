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
        Schema::create('subcircuitos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_subcircuito');
            $table->string('codigo_subcircuito');
            $table->string('numero_subcircuito');
            $table->integer('id_circuito')->unsigned();
            $table->foreign('id_circuito')->references('id')->on('circuitos');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('usuarios');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcircuitos');
    }
};
