<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('estado')->insert([
            'id_solicitud'=>1,
            'id_estado_descripcion'=>2,
            'id_usuario'=>3,
        ]);
    }
}
