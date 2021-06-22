<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $colCarreras = Carrera::get();
        $colUrlAnio = Storage::disk('google')->directories(); //leemos todas las carpetas desde RAIZ
        $idCarpetaAnio = 0;
        $idCarpetaCarrera = 0;
        foreach($colUrlAnio as $urlAnio){//recorremos las carpetas de los años
            $idCarpetaAnio++; //id que quedara en la BD
            $anio = Storage::disk('google')->getMetadata($urlAnio)['name'];
            DB::table('carpeta_anio')->insert([
                'numero_anio'=>(int)$anio,
                'url_anio'=>$urlAnio,
            ]);
            $colUrlCarrera = Storage::disk('google')->directories($urlAnio);
            foreach($colUrlCarrera as $urlCarrera){//recorremos todas las carpetas de las carreras de cada año
                $idCarpetaCarrera++; //id que quedara en la BD
                $urlCarrera = substr(strrchr($urlCarrera,'/'),1);
                $carrera = Storage::disk('google')->getMetadata($urlCarrera)['name'];
                $i=0;
                $carreraEncontrada = false;
                while($i<count($colCarreras) && !$carreraEncontrada){
                    $carreraEncontrada = $carrera == $colCarreras[$i]->carrera;
                    $i++;
                }
                DB::table('carpeta_carrera')->insert([
                    'id_carpeta_anio'=>$idCarpetaAnio,
                    'id_carrera'=>$colCarreras[($i-1)]->id_carrera,
                    'url_carrera'=>$urlCarrera,
                ]);
                $colUrlPrograma = Storage::disk('google')->files($urlCarrera);
                foreach($colUrlPrograma as $urlPrograma){
                    $urlPrograma = substr(strrchr($urlPrograma,'/'),1);
                    $programa = Storage::disk('google')->getMetadata($urlPrograma)['name'];
                    $nro_nombre = explode("-",$programa);
                    DB::table('programa_drive')->insert([
                        'numero_programa'=>$nro_nombre[0],
                        'nombre_programa'=>$nro_nombre[1],
                        'id_carpeta_carrera'=>$idCarpetaCarrera,
                        'url_programa'=>$urlPrograma
                    ]);
                }
            }
        }
    }
}
