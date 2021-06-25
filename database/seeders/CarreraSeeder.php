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
        // 1 - Facultad de Informática
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

        // 2 - Facultad de Economia y Administración
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura en Administración',
            'id_unidad_academica'=>2,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Profesorado en Ciencias Económicas',
            'id_unidad_academica'=>2,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Ciclo General de Cs. Económicas',
            'id_unidad_academica'=>2,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura en Matemática',
            'id_unidad_academica'=>2,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Profesorado Universitario en Matemática',
            'id_unidad_academica'=>2,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Contador Público Nacional',
            'id_unidad_academica'=>2,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura en Gestión y Administración Universitaria',
            'id_unidad_academica'=>2,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura en Economía',
            'id_unidad_academica'=>2,
        ]);

        // 3 - Facultad de Ingeniería
        DB::table('carrera')->insert([
            'carrera'=>'Ingeniería Civil',
            'id_unidad_academica'=>3,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Ingeniería en Petróleo',
            'id_unidad_academica'=>3,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Ingeniería Química',
            'id_unidad_academica'=>3,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Profesorado en Física',
            'id_unidad_academica'=>3,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Profesorado en Química',
            'id_unidad_academica'=>3,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura En Ciencias Geológicas',
            'id_unidad_academica'=>3,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Licenciatura en Tecnología Minera',
            'id_unidad_academica'=>3,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Tecnicatura en Plantas y Análisis de Menas',
            'id_unidad_academica'=>3,
        ]);
        DB::table('carrera')->insert([
            'carrera'=>'Tecnicatura Universitaria en Topografía ',
            'id_unidad_academica'=>3,
        ]);
    }
}
