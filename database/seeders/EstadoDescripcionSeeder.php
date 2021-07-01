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
<<<<<<< HEAD
            'descripcion' => 'Aguarda Firma Departamento Alumnos'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Secretaría Académica'
=======
            'descripcion' => 'Aguarda Firma Dpto. de Alumnos'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Secretaria Academica'
>>>>>>> El Retorno del Estado: Aguarda Firma Dpto. de Alumnos
=======
            'descripcion' => 'Aguarda Firma Departamento Alumnos'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Secretaría Académica'
>>>>>>> restaurando
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Aguarda Firma Santiago'
        ]);
        DB::table('estado_descripcion')->insert([
            'descripcion' => 'Terminado'
        ]);
    }
}