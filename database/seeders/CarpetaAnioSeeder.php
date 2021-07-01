<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarpetaAnioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carpetasAnio = [
            ["id"=>1,"anio"=> 2016,"url"=> '1JqZbZNHeAfxC4IwY1iIyEzMZnzwo4E73',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s')],
            ["id"=>2,"anio"=> 2018,"url"=> '1N8BKuJ_FY1KvEHXvmTBY22MD6nPb9VIp',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s')],
            ["id"=>3,"anio"=> 2020,"url"=> '1NkwTH6VrVWOwQwmz2WTrFYDzFVlBdRVe',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s')],
            ["id"=>4,"anio"=> 2015,"url"=> '1QomrfXXL2IT1wGRczcBl8Z-ze530QB6M',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s')],
            ["id"=>5,"anio"=> 2017,"url"=> '1ri-EUUH56LoJtVrPL-fo5YiZU13oyczQ',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s')]
        ];
        foreach($carpetasAnio as $carpeta){
            DB::table('carpeta_anio')->insert([
                'id_carpeta_anio'=>$carpeta['id'],
                'numero_anio'=>$carpeta['anio'],
                'url_anio'=>$carpeta['url'],
                'created_at'=>$carpeta['creado'],
                'updated_at'=>$carpeta['actualizado'],
            ]);
        }
    }
}
