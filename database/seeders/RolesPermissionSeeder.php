<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesPermissionSeeder extends Seeder
{
    public function run (){
        // Root Permissions
        DB::table('role_permission')->insert([
            'role_id' => 1,
            'permission_id' => 1,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 1,
            'permission_id' => 2,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 1,
            'permission_id' => 3,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 1,
            'permission_id' => 4,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 1,
            'permission_id' => 5,
        ]);
        // Solicitante Permissions
        DB::table('role_permission')->insert([
            'role_id' => 5,
            'permission_id' => 6,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 5,
            'permission_id' => 7,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 5,
            'permission_id' => 8,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 5,
            'permission_id' => 9,
        ]);
        // Dep. Alumnos Permissions
        DB::table('role_permission')->insert([
            'role_id' => 3,
            'permission_id' => 10,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 3,
            'permission_id' => 11,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 3,
            'permission_id' => 12,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 3,
            'permission_id' => 13,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 3,
            'permission_id' => 14,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 3,
            'permission_id' => 15,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 3,
            'permission_id' => 16,
        ]);
        // Secretaria Permissions
        DB::table('role_permission')->insert([
            'role_id' => 4,
            'permission_id' => 17,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 4,
            'permission_id' => 18,
        ]);
        // Director Secretaria Permissions
        DB::table('role_permission')->insert([
            'role_id' => 2,
            'permission_id' => 17,
        ]);
        DB::table('role_permission')->insert([
            'role_id' => 2,
            'permission_id' => 18,
        ]);

        
    }
}