<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Spatie\Permission\Models\Role; 
//use Spatie\Permission\Models\Permission;  

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
            'name'=>'admin',
            'lastname'=>'ad',
            'dni'=>11222333,
            'email'=>'admin@gmail.com',
            'password'=>'petrel'
        ]);//->assignRole('$role1');
        DB::table('users')->insert([
            'name'=>'solicitante',
            'lastname'=>'sol',
            'dni'=>11222333,
            'email'=>'solicitante@fi.uncoma.edu.ar',
            'password'=>'petrel'
        ]);//->assignRole('solicitante');
        DB::table('users')->insert([
            'name'=>'usuario',
            'lastname'=>'us',
            'dni'=>11222333,
            'email'=>'us2@hotmail.com',
            'password'=>'petrel'
        ]);//->assignRole('usuario');
      
    }
}
