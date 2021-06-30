<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run (){
        DB::table('roles')->insert([
            'name' => 'Admin',
        ]);
        DB::table('roles')->insert([
            'name' => 'Director SecA', // EL SANTI
        ]);
        DB::table('roles')->insert([
            'name' => 'Departamento Central',
        ]);
        DB::table('roles')->insert([
            'name' => 'Secretaria Academica',
        ]);
        DB::table('roles')->insert([
            'name' => 'Solicitante',
        ]);
        DB::table('roles')->insert([
            'name' => 'invitado', // you no have power here
        ]);
    }
}