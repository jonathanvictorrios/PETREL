<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'nombre'=>'Jona',
            'apellido'=>'Rios',
            'dni'=>33123123,
            'email'=>'jona@gmail.com',
            'password'=>'petrel2021'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Viviana',
            'apellido'=>'Pedrero',
            'dni'=>12332112,
            'email'=>'viviana.pedrero@fi.uncoma.edu.ar',
            'password'=>'petrel2021'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Silvia',
            'apellido'=>'Amaro',
            'dni'=>11223344,
            'email'=>'silvia.amaro@fi.uncoma.edu.ar',
            'password'=>'petrel2021'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Franco',
            'apellido'=>'Rodriguez',
            'dni'=>12312312,
            'email'=>'francorodriguez@hotmail.com',
            'password'=>'contrasenia123'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Ezequiel',
            'apellido'=>'Vera',
            'dni'=>98798798,
            'email'=>'ezequielVera@hotmail.com',
            'password'=>'contrasenia123'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Natalia',
            'apellido'=>'Baeza',
            'dni'=>40123123,
            'email'=>'nataliaBaeza@hotmail.com',
            'password'=>'contrasenia123'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Maximiliano',
            'apellido'=>'Villalba',
            'dni'=>45645645,
            'email'=>'maxivillalba@hotmail.com',
            'password'=>'contrasenia123'
        ]);
        DB::table('usuario')->insert([
            'nombre'=>'Santiago',
            'apellido'=>'Briceño',
            'dni'=>45645645,
            'email'=>'santiagobriseño@fi.uncoma.edu.ar',
            'password'=>'contrasenia123'
        ]);
    }
}
