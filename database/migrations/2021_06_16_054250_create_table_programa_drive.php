<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProgramaDrive extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_drive', function (Blueprint $table) {
            $table->id('id_programa');
            $table->string('nombre_programa');
            $table->unsignedInteger('numero_programa');
            $table->string('url_programa');
            $table->timestamps();

            $table->unsignedBigInteger('id_carpeta_carrera');

            $table->foreign('id_carpeta_carrera')->references('id_carpeta_carrera')->on('carpeta_carrera');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programa_drive');
    }
}
