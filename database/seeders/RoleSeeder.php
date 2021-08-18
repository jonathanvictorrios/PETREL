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
        $role3 = Role::create(['name' => 'solicitante']);

        //permiso solicitante
        Permission::create(['name' => 'solicitud.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'solicitud.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'solicitud.show'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'solicitud.asignar'])->syncRoles([$role1, $role2]); //permisos internos
        Permission::create(['name' => 'solicitud.terminar'])->syncRoles([$role1, $role2]);
        
        //permiso administrador del sistema assignRole solo a un rol
        //CRUD--------------------------------------------------------------------------------
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
        //---------------------------------------------------------------------------------

        //permisos para todos los usuarios - usuario syncRoles([]) asigna a mas de un rol
        Permission::create(['name' => 'usuario.borrar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.create'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.home'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.modificar'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.perfil'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.registro'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'usuario.show'])->syncRoles([$role1, $role2, $role3]);


       //otros permisos de las vistas - chequear a quien corresponden en especifico
       //Luego asingar con  syncRoles o assignRole el rol al que van a pertenecer.
      
        //CarpetaAnio
        Permission::create(['name' => 'carpetaAnio.ListarCarreras'])->assignRole([$role1]);
        Permission::create(['name' => 'carpetaAnio.create'])->assignRole([$role1]);
        Permission::create(['name' => 'carpetaAnio.index'])->assignRole([$role1]);
        Permission::create(['name' => 'carpetaAnio.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'carpetaAnio.show'])->assignRole([$role1]);
        
        //Ccarpeta carrera
        Permission::create(['name' => 'carpetaCarrera.create'])->assignRole([$role1]);
        Permission::create(['name' => 'carpetaCarrera.listarProgramas'])->assignRole([$role1]); 
        Permission::create(['name' => 'carpetaCarrera.agregarPrograma'])->assignRole([$role1]);

        //Programa Drive
        Permission::create(['name' => 'programaDrive.create'])->assignRole([$role1]);
        Permission::create(['name' => 'programaDrive.edit'])->assignRole([$role1]);
        Permission::create(['name' => 'programaDrive.show'])->assignRole([$role1]);
        Permission::create(['name' => 'programaDrive.buscarPrograma'])->assignRole([$role1]);

        //Programa Local
        Permission::create(['name' => 'programaLocal.create'])->assignRole([$role1]);
        Permission::create(['name' => 'programaLocal.show'])->assignRole([$role1]); 
        Permission::create(['name' => 'programaLocal.descargarProgramas'])->assignRole([$role1]); 

        //solicitud - asignar/firma/temrinar
        Permission::create(['name' => 'solicitud.firma.dtoalumno'])->assignRole([$role1]);
        Permission::create(['name' => 'solicitud.firma.secretaria'])->assignRole([$role1]);
        Permission::create(['name' => 'solicitud.firma.santiago'])->assignRole([$role1]);

        //rendimiento Academico
        Permission::create(['name' => 'rendimientoAcademico.create'])->assignRole([$role1]);
        Permission::create(['name' => 'rendimientoAcademico.exportarPdf'])->assignRole([$role1]);
        Permission::create(['name' => 'rendimientoAcademico.show'])->assignRole([$role1]);


        //siguiendo el web--------------------------------------------




       //----------------permisos especificos dentro de solicitud para cada vista-----------------------

        //tablas de index solicitud.
        Permission::create(['name' => 'solicitud.tabla.estudiante'])->assignRole([$role1]); 
        Permission::create(['name' => 'solicitud.tabla.dtoalumnos'])->assignRole([$role1]); 
        Permission::create(['name' => 'solicitud.tabla.administracion'])->assignRole([$role1]); 
        Permission::create(['name' => 'solicitud.tabla.santiago'])->assignRole([$role1]); 
        Permission::create(['name' => 'solicitud.tabla.root'])->assignRole([$role1]); 
        Permission::create(['name' => 'solicitud.tabla.anio'])->assignRole([$role1]); 
        Permission::create(['name' => 'solicitud.tabla.carrera'])->assignRole([$role1]); 
        Permission::create(['name' => 'solicitud.tabla.programa'])->assignRole([$role1]); 
        
        //Show de solicitudes
        Permission::create(['name' => 'solicitud.show.estudiante'])->assignRole([$role1]);
        Permission::create(['name' => 'solicitud.show.dtoalumnos'])->assignRole([$role1]);
        Permission::create(['name' => 'solicitud.show.administracion'])->assignRole([$role1]);
        Permission::create(['name' => 'solicitud.show.santiago'])->assignRole([$role1]);
     
    

    }
}
