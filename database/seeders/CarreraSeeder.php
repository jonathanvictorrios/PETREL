<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura en Ciencias de la Computación',
            'id_unidad_academica'=>1,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura en Sistemas de Información',
            'id_unidad_academica'=>1,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Profesorado en Informática',
            'id_unidad_academica'=>1,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Tecnicatura Universitaria en Administración de Sistemas y Software Libre',
            'id_unidad_academica'=>1,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Tecnicatura Universitaria en Desarrollo Web',
            'id_unidad_academica'=>1,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura en Economía',
            'id_unidad_academica'=>2,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Contador Público',
            'id_unidad_academica'=>2,
        ]);
    }
}
