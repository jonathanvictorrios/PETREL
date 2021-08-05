<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//agregados 
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission; 

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles
        $role1 = Role::create(['name' => 'administrador del sistema']); //quien asigna roles a los users
        $role2 = Role::create(['name' => 'administrativo']);
        $role1 = Role::create(['name' => 'solicitante']);


        //permiso solicitante
        Permission::create(['name' => 'solicitud.asignar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'solicitud.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'solicitud.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'solicitud.show'])->syncRoles([$role1, $role2, $role3]);
        
        //permiso administrador del sistema assignRole solo a un rol
        Permission::create(['name' => 'admin.permissions.create'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.permissions.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.permissions.index'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.permissions.show'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.roles.create'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.roles.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.roles.index'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.roles.show'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.users.create'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.users.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.users.index'])->assignRole([$role1]);
        Permission::create(['name' => 'admin.users.show'])->assignRole([$role1]);

        //permisos para todos los usuarios - usuario syncRoles([]) asigna a mas de un rol
        Permission::create(['name' => 'usuario.borrar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.home'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.modificar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.perfil'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.registro'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.show'])->syncRoles([$role1, $role2, $role3]);


       //otros permisos de las vistas - chequear a quien corresponden en especifico.
       /*
       Permission::create(['name' => 'admin.archivos.create'])->assignRole([$role1]);
       Permission::create(['name' => 'admin.archivos.index'])->assignRole([$role1]);
       */
    }
}
