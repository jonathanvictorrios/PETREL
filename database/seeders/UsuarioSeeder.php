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
        ]);
    }
}
