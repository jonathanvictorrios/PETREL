<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoDescripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Iniciado'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Asignado'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Departamento Alumnos'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Secretaría Académica'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Dir. Académica Central'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Terminado'
        ]);
    }
}