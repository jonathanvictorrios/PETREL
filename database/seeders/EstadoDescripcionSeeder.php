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
<<<<<<< HEAD
            'descripcion' => 'Aguarda Firma Dpto. de Alumnos'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Secretaria Academica'
=======
            'descripcion' => 'Aguarda Firma Departamento Alumnos'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Secretaría Académica'
>>>>>>> 728c1c66b02d389d62bb0ba4debe35f820fd08b5
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Santiago'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Terminado'
        ]);
    }
}