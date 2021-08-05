<?php

namespace Database\Seeders;

use App\Models\SolicitudCertProg;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UnidadAcademicaSeeder::class,
            CarreraSeeder::class,
            EstadoDescripcionSeeder::class,
            //UsuarioSeeder::class,
            UserSeeder::class,
            SolicitudCertProgSeeder::class,
            EstadoSeeder::class,
            CarpetaAnioSeeder::class,
            CarpetaCarreraSeeder::class,
            ProgramaDriveSeeder::class,
            RoleSeeder::class //agregado
        ]);
    }
}
