<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePrograma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa', function (Blueprint $table) {
            $table->id('id_programa');
            $table->unsignedBigInteger('hoja_resumen'); //?????
            $table->string('nombre_materia');
            $table->integer('numero_materia');
            $table->string('carrera');
            $table->year('anio');
            $table->string('url');
            $table->timestamps();

            $table->unsignedBigInteger('id_hoja_resumen');

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
        Schema::dropIfExists('programa');
    }
}