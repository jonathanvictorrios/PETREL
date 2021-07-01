<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run (){
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'Santiago',
        ]);
        DB::table('roles')->insert([
            'name' => 'Departamento Central',
        ]);
        DB::table('roles')->insert([
            'name' => 'Secretaria Academica',
        ]);
        DB::table('roles')->insert([
            'name' => 'Departamento Alumnos',
        ]);
        DB::table('roles')->insert([
            'name' => 'Solicitante',
        ]);
    }
}