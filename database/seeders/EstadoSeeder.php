<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
            'id_estado_descripcion'=>1,
            'id_usuario'=>1,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s')

        ]);
    }
}
