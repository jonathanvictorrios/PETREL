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
        DB::table('users')->insert([
            'name'=>'Jona',
            'email'=>'jona@gmail.com',
            'password'=>'petrel2021'
        ]);
        DB::table('users')->insert([
            'name'=>'Administrativo',
            'email'=>'unadmin@fi.uncoma.edu.ar',
            'password'=>'petrel2021'
        ]);
        DB::table('users')->insert([
            'name'=>'Un usuario',
            'email'=>'estudiante@hotmail.com',
            'password'=>'petrel2021'
        ]);
    }
}
