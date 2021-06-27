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
            $table->string('url_hoja_unida_final_sin_firma')->nullable();
            $table->string('url_hoja_unida_final')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('id_nota_admin_central')->nullable();


            $table->foreign('id_nota_admin_central')->references('id_nota_admin_central')->on('nota_admin_central');
            $table->foreign('id_hoja_resumen')->references('id_hoja_resumen')->on('hoja_resumen');
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