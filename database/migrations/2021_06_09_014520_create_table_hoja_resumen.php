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
            $table->string('url_pdf_rendimiento_acad');
            $table->string('url_pdf_plan_estudio');
            $table->string('url_pdf_programas');
            $table->string('url_pdf_nota_dpto_alum');
            $table->string('firma_dig_dpto_alum');
            $table->string('firma_dig_sec_acad_ua');
            $table->timestamps();

            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_historico');
            $table->unsignedBigInteger('id_plan_estudio');
            $table->unsignedBigInteger('id_nota_dpto');
            $table->unsignedBigInteger('id_nota_central');

            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitud_cert_prog');
            $table->foreign('id_historico')->references('id_historico')->on('historico_academico');
            $table->foreign('id_plan_estudio')->references('id_plan_estudio')->on('plan_estudio');
            $table->foreign('id_nota_dpto')->references('id_nota_dpto')->on('nota_dpto_alum');
            $table->foreign('id_nota_central')->references('id_nota_central')->on('nota_admin_central');
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