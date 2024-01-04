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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos');
            $table->string('nombres');
            $table->string('contacto')->nullable();
            $table->string('tipo');
            $table->string('detalle');
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
        Schema::dropIfExists('reportes');
    }
};
