<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnidadAcademicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidad_academica')->insert([
            'unidad_academica'=>'Facultad de Informática',
        ]);
        DB::table('unidad_academica')->insert([
            'unidad_academica'=>'Facultad de Economia y Administración',
        ]);
        DB::table('unidad_academica')->insert([
            'unidad_academica'=>'Facultad de Ingeniería',
        ]);
        DB::table('unidad_academica')->insert([
            'unidad_academica'=>'Facultad de Humanidades',
        ]);
        DB::table('unidad_academica')->insert([
            'unidad_academica'=>'Facultad de Ciencias del Ambiente y la Salud',
        ]);
        DB::table('unidad_academica')->insert([
            'unidad_academica'=>'Facultad de Turismo',
        ]);
    }
}
