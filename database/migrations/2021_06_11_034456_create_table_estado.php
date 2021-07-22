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
        // Schema::create('estado', function (Blueprint $table) {
        //     $table->id('id_estado');
        //     $table->string('descripcion');
        //     $table->unsignedBigInteger('id_solicitud');
        //     $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitud_cert_prog');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('estado');
    }
}