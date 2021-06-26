<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSolicitudCertProg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_cert_prog', function (Blueprint $table) {
            $table->id('id_solicitud');
            $table->unsignedBigInteger('id_usuario_estudiante');
            $table->unsignedBigInteger('id_user_u')->nullable();
            $table->unsignedBigInteger('id_carrera');
            $table->foreign('id_usuario_estudiante')->references('id_usuario')->on('usuario');
            $table->foreign('id_user_u')->references('id_usuario')->on('usuario');
            $table->foreign('id_carrera')->references('id_carrera')->on('carrera');
            $table->text('legajo');
            $table->text('universidad_destino');
            $table->boolean('extranjero');
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
        Schema::dropIfExists('solicitud_cert_prog');
    }
}