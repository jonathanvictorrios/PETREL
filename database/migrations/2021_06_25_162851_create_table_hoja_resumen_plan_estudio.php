<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHojaResumenPlanEstudio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoja_resumen_plan_estudio', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_hoja');
            $table->unsignedBigInteger('id_plan');
            $table->primary(['id_hoja','id_plan']);
            
            $table->foreign('id_hoja')->references('id_hoja_resumen')->on('hoja_resumen');
            $table->foreign('id_plan')->references('id_plan_estudio')->on('plan_estudio');
            
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
        Schema::dropIfExists('hoja_resumen_plan_estudio');
    }
}
