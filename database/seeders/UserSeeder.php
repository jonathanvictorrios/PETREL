<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('users')->insert([
            'name'=>'manu',
            'lastname'=>'el',
            'dni'=>12123123,
            'email'=>'papanoel@gmail.com',
            'password'=>'petrel2021'
        ]);
        DB::table('users')->insert([
            'name'=>'Lisan',
            'lastname'=>'dro',
            'dni'=>11123123,
            'email'=>'unadmin@fi.uncoma.edu.ar',
            'password'=>'petrel2021'
        ]);
        DB::table('users')->insert([
            'name'=>'Luis',
            'lastname'=>'Miguel',
            'dni'=>13123123,
            'email'=>'estudiante@hotmail.com',
            'password'=>'petrel2021'
        ]);
    }
}
