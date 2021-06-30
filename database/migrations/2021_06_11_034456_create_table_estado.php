<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEstado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado', function (Blueprint $table) {
            $table->id('id_estado');
            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_estado_descripcion');
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitud_cert_prog');
            $table->foreign('id_estado_descripcion')->references('id_estado_descripcion')->on('estado_descripcion');
            $table->foreign('id_usuario')->references('id')->on('users');
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
