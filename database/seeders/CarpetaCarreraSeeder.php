<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarpetaCarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carpetasCarreras = [
            ["id"=> 1, "url"=> '1peCe5H8nJU2QL6X8-Ulbc5vI8M3jptTB', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 1,"id_carpeta_anio"=> 1],
            ["id"=> 2, "url"=> '1T65D1be3BVCbcG-I3yvs7RK8KK767yOB', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 1,"id_carpeta_anio"=> 2],
            ["id"=> 3, "url"=> '1dw-ExUM4zwB3W2AFjEu2VqGtfNHL95-j', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 5,"id_carpeta_anio"=> 3],
            ["id"=> 4, "url"=> '1JaZvFgiIhXmX53A-bleREM4QJCLhT3tI', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 3,"id_carpeta_anio"=> 3],
            ["id"=> 5, "url"=> '1tSilnf73h0HG9Pc9TzPCtHPYCZ408-wt', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 1,"id_carpeta_anio"=> 3],
            ["id"=> 6, "url"=> '1vKGxspuaZKzIOSnBy_MJSRizrproBMOy', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 2,"id_carpeta_anio"=> 3],
            ["id"=> 7, "url"=> '1x4a8hRsBq10qo4dPGoypB6CE4tqjSLaE', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 4,"id_carpeta_anio"=> 3],
            ["id"=> 8, "url"=> '164US7aBgxrlXY4eMlyBoxpasw0r4ToHt', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 3,"id_carpeta_anio"=> 4],
            ["id"=> 9, "url"=> '17jttH5jTU2vTgsjzbb_jQx60XrxNISkb', "creado"=> date('Y-m-d H:i:s'), "actualizado"=> date('Y-m-d H:i:s'),"id_carrera"=> 5,"id_carpeta_anio"=> 4],
            ["id"=> 10,"url"=>  '1i5F5g0hfSPQmgC6_gm8UmoMLl_GuijUu',"creado"=>  date('Y-m-d H:i:s'),"actualizado"=>  date('Y-m-d H:i:s'),"id_carrera"=> 1,"id_carpeta_anio"=> 4],
            ["id"=> 11,"url"=>  '1VtONzLIlW9t3f4T7EsuAKTR-ILuLILOS',"creado"=>  date('Y-m-d H:i:s'),"actualizado"=>  date('Y-m-d H:i:s'),"id_carrera"=> 2,"id_carpeta_anio"=> 4],
            ["id"=> 12,"url"=>  '1Pwt3z_F9i9lhucZbvjM_dyOIbVBEupXZ',"creado"=>  date('Y-m-d H:i:s'),"actualizado"=>  date('Y-m-d H:i:s'),"id_carrera"=> 1,"id_carpeta_anio"=> 5]
        ];
        foreach($carpetasCarreras as $carpeta){
            DB::table('carpeta_carrera')->insert([
                'id_carpeta_carrera'=>$carpeta['id'],
                'url_carrera'=>$carpeta['url'],
                'created_at'=>$carpeta['creado'],
                'updated_at'=>$carpeta['actualizado'],
                'id_carrera'=>$carpeta['id_carrera'],
                'id_carpeta_anio'=>$carpeta['id_carpeta_anio'],
            ]);
        }
    }
}
