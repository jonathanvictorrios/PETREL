<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $estudiante = Role::create(['name' => 'estudiante']);
        $dptoAlumonos = Role::create(['name' => 'dpto alumnos']);
        $central = Role::create(['name' => 'central']);

        Permission::create(['name'=>'estudiante.home']);
        Permission::create(['name'=>'dptoAlumnos.home']);
        Permission::create(['name'=>'central.home']);

        Permission::create(['name'=>'estudiante.solicitud.create']);
        Permission::create(['name'=>'dptoAlumnos.solicitud.update']);
        Permission::create(['name'=>'central.solicitud.update']);
    }
}