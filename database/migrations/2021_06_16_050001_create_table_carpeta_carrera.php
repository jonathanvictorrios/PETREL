<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCarpetaCarrera extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpeta_carrera', function (Blueprint $table) {
            $table->id('id_carpeta_carrera');
            $table->string('url_carrera');
            $table->timestamps();

            $table->unsignedBigInteger('id_carrera');
            $table->unsignedBigInteger('id_carpeta_anio');

            $table->foreign('id_carrera')->references('id_carrera')->on('carrera');
            $table->foreign('id_carpeta_anio')->references('id_carpeta_anio')->on('carpeta_anio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpeta_carrera');
    }
}
