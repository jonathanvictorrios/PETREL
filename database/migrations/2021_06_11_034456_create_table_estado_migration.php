<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEstadoMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado', function (Blueprint $table) {
            $table->id('idEstado');
            $table->unsignedBigInteger('idSolicitud');
            $table->unsignedBigInteger('idEstadoDescripcion');
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idSolicitud')->references('id_solicitud')->on('solicitud_cert_prog');
            $table->foreign('idEstadoDescripcion')->references('idEstadoDescripcion')->on('estadoDescripcion');
            $table->foreign('idUsuario')->references('id_usuario')->on('usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado');
    }
}
