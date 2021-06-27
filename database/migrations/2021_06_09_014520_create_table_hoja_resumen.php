<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHojaResumen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoja_resumen', function (Blueprint $table) {
            $table->id('id_hoja_resumen');
            $table->string('url_hoja_unida')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('id_rendimiento_academico')->nullable();
            $table->unsignedBigInteger('id_programa_local')->nullable();
            $table->unsignedBigInteger('id_nota_dto_alumno')->nullable();
            $table->unsignedBigInteger('id_solicitud');
            
            $table->foreign('id_rendimiento_academico')->references('id_rendimiento_academico')->on('rendimiento_academico');
            $table->foreign('id_programa_local')->references('id_programa_local')->on('programa_local');
            $table->foreign('id_nota_dto_alumno')->references('id_nota_dto_alumno')->on('nota_dpto_alum');
            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitud_cert_prog');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoja_resumen');
    }
}