<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHojaResumenFinal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoja_resumen_final', function (Blueprint $table) {
            //es hija de hoja-resumen
            $table->id('id_hoja_resumen');
            $table->string('url_pdf_hoja_unida_sinfirmar');
            $table->string('url_pdf_hoja_unida_final');
            $table->timestamps();

            $table->unsignedBigInteger('id_hoja_resumen_final');
            $table->unsignedBigInteger('id_firma');
            $table->unsignedBigInteger('id_nota_central');

            $table->foreign('id_hoja_resumen_final')->references('id_hoja_resumen')->on('hoja_resumen');
            $table->foreign('id_firma')->references('id_firma')->on('firma');
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
        Schema::dropIfExists('hoja_resumen_final');
    }
}