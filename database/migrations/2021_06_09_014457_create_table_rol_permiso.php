<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRolPermiso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions,', function (Blueprint $table) {
            $table->unsignedBigInteger('roles_id');
            $table->unsignedBigInteger('permissions_id');

            $table->primary('roles_id', 'permissions_id');

            $table->foreign('id_rol')->references('id_rol')->on('roles');
            $table->foreign('permissions_id')->references('id')->on('permissions');
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
        Schema::dropIfExists('rol_permiso');
    }
}