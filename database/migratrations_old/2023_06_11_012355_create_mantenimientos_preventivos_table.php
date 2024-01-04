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
        Schema::create('mantenimientos_preventivos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detalles_mantenimiento');
            
            $table->integer('id_solicitud_mantenimientos')->unsigned();
            $table->foreign('id_solicitud_mantenimientos')->references('id')->on('solicitud_mantenimientos');
            
            $table->integer('id_vehiculos')->unsigned();
            $table->foreign('id_vehiculos')->references('id')->on('vehiculos');
           
            $table->integer('id_repuestos')->unsigned();
            $table->foreign('id_repuestos')->references('id')->on('repuestos');



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
        Schema::dropIfExists('mantenimientos_preventivos');
    }
};
