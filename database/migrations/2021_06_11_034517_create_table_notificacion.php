<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableNotificacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificacion', function (Blueprint $table) {
            $table->id('id_notificacion');
            //Foranea comentada porque vincula una tabla comentada.
            // $table->unsignedBigInteger('id_estado');
            //$table->foreign('id_estado')->references('id_estado')->on('estado');
            $table->text('mensaje');
            $table->boolean('leida');
            $table->timestamps();
            //Prueba commit
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificacion');
    }
}
