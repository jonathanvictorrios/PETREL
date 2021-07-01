<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario_rol')->insert([
            'id_usuario' => '1',
            'id_rol' => '6',
        ]);
        DB::table('usuario_rol')->insert([
            'id_usuario' => '2',
            'id_rol' => '5',
        ]);
        DB::table('usuario_rol')->insert([
            'id_usuario' => '3',
            'id_rol' => '4',
        ]);
        DB::table('usuario_rol')->insert([
            'id_usuario' => '4',
            'id_rol' => '5',
        ]);
        DB::table('usuario_rol')->insert([
            'id_usuario' => '5',
            'id_rol' => '6',
        ]);
        DB::table('usuario_rol')->insert([
            'id_usuario' => '6',
            'id_rol' => '6',
        ]);
        DB::table('usuario_rol')->insert([
            'id_usuario' => '7',
            'id_rol' => '6',
        ]);
        DB::table('usuario_rol')->insert([
            'id_usuario' => '8',
            'id_rol' => '2',
        ]);
    }
}
