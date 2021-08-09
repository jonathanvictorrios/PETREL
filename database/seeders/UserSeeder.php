<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role; 
use Spatie\Permission\Models\Permission;  

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //administrador
        DB::table('users')->insert([
            'name'=>'administrador1',
            'lastname'=>'ad',
            'dni'=>11222333,
            'email'=>'administrador1@gmail.com',
            'password'=>'petrel'
        ]);//->assignRole([$role1]);
         /*
        //administrativo
        DB::table('users')->insert([
            'name'=>'administrativo',
            'lastname'=>'sec',
            'dni'=>33222111,
            'email'=>'administrativo@gmail.com',
            'password'=>'petrel'
        ])->assignRole([$role2]);
       
        //solicitante
        DB::table('users')->insert([
            'name'=>'solicitante',
            'lastname'=>'sol',
            'dni'=>11222333,
            'email'=>'solicitante@fi.uncoma.edu.ar',
            'password'=>'petrel'
        ])->assignRole([$role3]);
*/
      
    }//function
}//class
