<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsuarioRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_rol', function (Blueprint $table) {

            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_rol');

            $table->primary(['id_usuario', 'id_rol']);

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_rol')->references('id')->on('roles');
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
        Schema::dropIfExists('usuario_rol');
    }
}