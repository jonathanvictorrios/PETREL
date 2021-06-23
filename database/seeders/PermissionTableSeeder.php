<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'carpetaAnio.create',
            'carpetaAnio.edit',
            'carpetaAnio.index',
            'carpetaAnio.listarCarreras',
            'carpetaAnio.show',
            'carpetaCarrera.create',
            'carpetaCarrera.edit',
            'carpetaCarrera.index',
            'carpetaCarrera.listarProgramas',
            'carpetaCarrera.show',
            'hojaResumen.create',
            'programaDrive.create',
            'programaDrive.edit',
            'programaDrive.index',
            'programaDrive.show',
            'programaLocal.create',
            'programaLocal.edit',
            'programaLocal.index',
            'programaLocal.show',
            'rendimientoAcademico.create',
            'rendimientoAcademico.edit',
            'rendimientoAcademico.index',
            'rendimientoAcademico.show',
            'solicitud.asignar',
            'solicitud.create',
            'solicitud.index',
            'solicitud.show'
         ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}