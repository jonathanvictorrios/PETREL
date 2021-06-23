<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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

    }
}
