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
            'legajo'=>'FAI-1111',
            'universidad_destino'=>'new york university',
            'extranjero'=>true
        ]);
        DB::table('solicitud_cert_prog')->insert([
            'id_usuario_estudiante'=>4,
            'id_carrera'=>1,
            'legajo'=>'2222',
            'universidad_destino'=>'universidad nacional rio negro',
            'extranjero'=>false
        ]);
        DB::table('solicitud_cert_prog')->insert([
            'id_usuario_estudiante'=>5,
            'id_carrera'=>1,
            'legajo'=>'FAI-3333',
            'universidad_destino'=>'oxford university',
            'extranjero'=>true
        ]);
        DB::table('solicitud_cert_prog')->insert([
            'id_usuario_estudiante'=>6,
            'id_carrera'=>1,
            'legajo'=>'4444',
            'universidad_destino'=>'harvard university',
            'extranjero'=>true
        ]);
        DB::table('solicitud_cert_prog')->insert([
            'id_usuario_estudiante'=>7,
            'id_carrera'=>1,
            'legajo'=>'4444',
            'universidad_destino'=>'universidad siglo 21',
            'extranjero'=>false
        ]);
    }
}