<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SolicitudCertProgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('solicitud_cert_prog')->insert([
            'id_usuario_estudiante'=>1,
            'id_carrera'=>1,
            'legajo'=>'FAI-1231',
            'universidad_destino'=>'new york university'

        ]);
    }
}
