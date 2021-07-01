<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProgramaDriveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $colCarreras = Carrera::get();
            // $colUrlAnio = Storage::disk('google')->directories(); //leemos todas las carpetas desde RAIZ
            // $idCarpetaAnio = 0;
            // $idCarpetaCarrera = 0;
            // foreach($colUrlAnio as $urlAnio){//recorremos las carpetas de los años
            //     $idCarpetaAnio++; //id que quedara en la BD
            //     $anio = Storage::disk('google')->getMetadata($urlAnio)['name'];
            //     DB::table('carpeta_anio')->insert([
            //         'numero_anio'=>(int)$anio,
            //         'url_anio'=>$urlAnio,
            //     ]);
            //     $colUrlCarrera = Storage::disk('google')->directories($urlAnio);
            //     foreach($colUrlCarrera as $urlCarrera){//recorremos todas las carpetas de las carreras de cada año
            //         $idCarpetaCarrera++; //id que quedara en la BD
            //         $urlCarrera = substr(strrchr($urlCarrera,'/'),1);
            //         $carrera = Storage::disk('google')->getMetadata($urlCarrera)['name'];
            //         $i=0;
            //         $carreraEncontrada = false;
            //         while($i<count($colCarreras) && !$carreraEncontrada){
            //             $carreraEncontrada = strtolower($carrera) == strtolower($colCarreras[$i]->carrera);
            //             $i++;
            //         }
            //         DB::table('carpeta_carrera')->insert([
            //             'id_carpeta_anio'=>$idCarpetaAnio,
            //             'id_carrera'=>$colCarreras[($i-1)]->id_carrera,
            //             'url_carrera'=>$urlCarrera,
            //         ]);
            //         $colUrlPrograma = Storage::disk('google')->files($urlCarrera);
            //         foreach($colUrlPrograma as $urlPrograma){
            //             $urlPrograma = substr(strrchr($urlPrograma,'/'),1);
            //             $programa = Storage::disk('google')->getMetadata($urlPrograma)['name'];
            //             $nro_nombre = explode("-",$programa);
            //             if(count($nro_nombre)==2){
            //                 $nombrePrograma = $nro_nombre[1];
            //             }else{
            //                 //como aveces tiene sigla de la carrera, la omitimos y agregamos el pdf
            //                 $nombrePrograma = $nro_nombre[1].'.pdf';
            //             }
            //             DB::table('programa_drive')->insert([
            //                 'numero_programa'=>$nro_nombre[0],
            //                 'nombre_programa'=>$nombrePrograma,
            //                 'id_carpeta_carrera'=>$idCarpetaCarrera,
            //                 'url_programa'=>$urlPrograma
            //             ]);
            //         }
            //     }
        // }
        $programas =[
            [ "id"=> 1, "nombre"=>'Resolución de Problemas y algoritmos.pdf',"numero"=> 629,"url"=> '1HMt_QogBHnJpXjTDdzwj4KAKyIgBnUDr',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 1],
            [ "id"=> 2, "nombre"=>'Inglés Técnico II.pdf',"numero"=> 52,"url"=> '1RHid8CRosjZMTxtEN-JmD7veBQ4he29Y',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 1],
            [ "id"=> 3, "nombre"=>'Elementos de Álgebra.pdf',"numero"=> 628,"url"=> '1wSEaXzQ71-MLToTgLvfs-FiLRRhC2nFT',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 1],
            [ "id"=> 4, "nombre"=>'Modelos y Sistemas de Información.pdf',"numero"=> 532,"url"=> '1zeVxwd-NDuj1nRdSr799YosBuFAMaqwY',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 1],
            [ "id"=> 5, "nombre"=>'Elementos de Teoría de la Computación.pdf',"numero"=> 111,"url"=> '1-dlFIOTHPbojokcyCdiZDGDLWgIbS2mw',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 2],
            [ "id"=> 6, "nombre"=>'Inglés Técnico II.pdf',"numero"=> 531,"url"=> '1hAqWVjSgNq1zDBbDjMuVfymoNmmlKIx9',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 2],
            [ "id"=> 7, "nombre"=>'Modelado de datos.pdf',"numero"=> 456,"url"=> '1qHRryc94HDXYmQym0eaHXlLJ8orzdHqF',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 2],
            [ "id"=> 8, "nombre"=>'Introducción a la computación.pdf',"numero"=> 630,"url"=> '1XMYtioBJf7FV5A8iViuqRBNrvm2rkujJ',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 2],
            [ "id"=> 9, "nombre"=>'Introducción a la Programación.pdf',"numero"=> 2,"url"=> '1g2f8Pmlh6bZjgQ60FG9QU_7tT9Brt-kh',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 3],
            [ "id"=> 10,"nombre"=> 'Framework e Interoperabilidad.pdf',"numero"=> 12,"url"=> '1jvz9HcLy9mcY5d_DxjfnA0zIY0SfhCs4',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 3],
            [ "id"=> 11,"nombre"=> 'Introducción a la Programación.pdf',"numero"=> 1564,"url"=> '1smBws_pGxMLunZlcR2T3WO4RBzu0_4Q0',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 3],
            [ "id"=> 12,"nombre"=> 'Resolución de Problemas y Algoritmos PI.pdf',"numero"=> 2,"url"=> '17eGkOwadCqB351KBua-aCuY5kG1Mc2dQ',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 4],
            [ "id"=> 13,"nombre"=> 'Aspectos Profesionales y Sociales.pdf',"numero"=> 33,"url"=> '1F2cjQnMIDrIhcnqPefbIl6ce5E2eDPNy',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 4],
            [ "id"=> 14,"nombre"=> 'Elementos de Álgebra.pdf',"numero"=> 3,"url"=> '1TL7ryW83qmmXUMjZ1HBq7Eo8m-Ff1vps',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 4],
            [ "id"=> 15,"nombre"=> 'Cálculo Diferencial e Integral.pdf',"numero"=> 9,"url"=> '1pKBB9MVduhY0VKrP9eaY11lKu1LRq2uA',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 5],
            [ "id"=> 16,"nombre"=> 'Ingles Técnico II.pdf',"numero"=> 646,"url"=> '1SxwOVEEvEenCG-XjklIv_hNquAeyzjuK',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 5],
            [ "id"=> 17,"nombre"=> 'Elementos de Álgebra.pdf',"numero"=> 1,"url"=> '1u5qz0wL4G5qDMf5VMCOhXgBVDuLf8I27',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 5],
            [ "id"=> 18,"nombre"=> 'Resolución de Problemas y Algoritmos.pdf',"numero"=> 2,"url"=> '1x6Qkx-Z5vDBZ8MQJx-MuW1T1g_B-t0Lk',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 5],
            [ "id"=> 19,"nombre"=> 'Lógica para Ciencias de la Computación.pdf',"numero"=> 27,"url"=> '1kl_jLKmjuOLUeIB-bKauzRPQK03v7eds',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 6],
            [ "id"=> 20,"nombre"=> 'Resolución de Problemas y Algoritmos.pdf',"numero"=> 2,"url"=> '1s9mc5KgrywNFkWcIWChqqYtvex-oWOuE',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 6],
            [ "id"=> 21,"nombre"=> 'Elementos de Álgebra.pdf',"numero"=> 1,"url"=> '1xTNpiZfZeQkU79UjiwUMwlmaiDz_ekMV',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 6],
            [ "id"=> 22,"nombre"=> 'Aplicaciones Libres.pdf',"numero"=> 14,"url"=> '1Aw__Gps9IWPo0mKBY13zh_g-mp61d1oP',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 7],
            [ "id"=> 23,"nombre"=> 'Introducción a la Computación.pdf',"numero"=> 1,"url"=> '1t9jTGzIRmkA0xZhN2XWbSlSE29Az6daH',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 7],
            [ "id"=> 24,"nombre"=> 'Modelos Y Sistemas De Información.pdf',"numero"=> 563,"url"=> '1vaNijuy7Mh-J9GWAfR6ibWfrDorbu3nq',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'), "carpeta_carrera"=>10],
            [ "id"=> 25,"nombre"=> 'Modelos y Sistemas de Información.pdf',"numero"=> 196,"url"=> '1FsjFnUPmsHfQP1ikR3zkTHX156TkkW8I',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=>12],
            [ "id"=>26, "nombre"=> 'Ingles Técnico I.pdf',"numero"=>531, "url"=>'16-Dr7muAFJBSunyg92bq1K0qjF-OFWAe',"creado"=> date('Y-m-d H:i:s'),"actualizado"=> date('Y-m-d H:i:s'),"carpeta_carrera"=> 2]
        ];
        foreach($programas as $programa){
            DB::table('programa_drive')->insert([
                'id_programa'=>$programa['id'],
                'nombre_programa'=> $programa['nombre'],
                'numero_programa'=> $programa['numero'],
                'url_programa'=> $programa['url'],
                'created_at'=>$programa['creado'],
                'updated_at'=>$programa['actualizado'],
                'id_carpeta_carrera'=>$programa['carpeta_carrera'],
            ]);
        }
    }
}
