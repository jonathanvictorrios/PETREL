<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarpetaCarreraRequest;
use App\Models\CarpetaAnio;
use App\Models\CarpetaCarrera;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarpetaCarreraController extends Controller
{    
    /**
     * verificamos la existencia de la carpeta año y luego
     * damos la posibilidad de crear y guardar en la base de datos
     * @param Request $request
     * @return view carpetaCarrera.show|index
     */
    public function store(StoreCarpetaCarreraRequest $request)
    {
        $coleccionCarreras=CarpetaAnio::find($request->idCarpetaAnio)->carpeta_carrera;
        $i=0;
        $existeCarpeta = false;
        while($i<count($coleccionCarreras) && !$existeCarpeta){
            $existeCarpeta=$coleccionCarreras[$i]->carrera->carrera==$request->carrera;
            $i++;
        }
        if(!$existeCarpeta){
            $carpetaAnio=CarpetaAnio::find($request->idCarpetaAnio);
            Storage::disk('google')->makeDirectory($carpetaAnio->url_anio.'/'.$request->carrera);
            $colCarpetasCarrera = Storage::disk('google')->directories($carpetaAnio->url_anio);
            $i=0;
            $urlEncontrada = false;
            while($i<count($colCarpetasCarrera) && !$urlEncontrada){
                //comparamos cada url si le pertenece a la carpeta agregada recientemente
                $urlEncontrada = Storage::disk('google')->getMetadata($colCarpetasCarrera[$i])['name']==$request->carrera;
                $i++;
            }
            $urlCarpeta = explode('/',$colCarpetasCarrera[($i-1)])[1];//obtenemos la posicion de la url que le pertenece a la carpeta recien creada
            $carrera = Carrera::where('carrera','like',$request->carrera)->get()[0];
            $carpeta = CarpetaCarrera::create([
                'id_carpeta_anio' => $carpetaAnio->id_carpeta_anio,
                'id_carrera'=>$carrera->id_carrera,
                'url_carrera' => $urlCarpeta,
            ]);
        }
        return view('carpetaCarrera.listarCarreras')->with('carpetaCarrera',$carpeta);
    }

    /**
     * buscamos la carpeta carrera y mostramos los datos de la carpeta
     * @param int $idCarpetaCarrera
     * @return view carpetaCarrera.show
     *
     * public function show($idCarpetaCarrera){
     *     $carpeta = CarpetaCarrera::find($idCarpetaCarrera);
     *     return view('carpetaCarrera.show')->with('carpetaCarrera',$carpeta);
     * }*/

    /**
     * tomamos los nuevos datos para actualizar dicha carpeta carrera
     * @param Request $request
     * @return view carpetaCarrera.show
     *
     * public function update(Request $request){
     *     $carpetaCarrera = CarpetaCarrera::find($request->idCarpetaCarrera);
     *     $carpetaCarrera->numero_anio =$request->anio;
     *     $carpetaCarrera->save();
     *     return view('carpetaCarrera.listarCarreras')->with('carpetaCarrera',$carpeta);
     *     return view('carpeta.index');
     * }*/

    /**
     * realizamos un borrado logico sobre la carpeta carrera
     * @param Request $request
     * @return view carpetaCarrera.index
     */
    public function destroy(Request $request)
    {
        echo "borrado logico sobre carpeta carrera";
    }

    /**
     * cargamos con el id la carpeta carrera y lo volcamos en el formulario
     * para realizar los cambios necesario
     * @param int $idCarpetaCarrera
     * @return view carpetaCarrera.edit
     *
     * public function edit($idCarpetaCarrera){
     *     $carpeta=CarpetaCarrera::find($idCarpetaCarrera);
     *     return view('carpetaCarrera.edit')->with('carpetaCarrera',$carpeta);
     * } */

    /**
     * vamos a buscar los programas que pertenecen a la carpeta
     * @param int $idCarpetaCarrera
     * @return view carpetaCarrera.listarProgramas
     */
    public function verProgramas($idCarpetaCarrera)
    {
        $carpeta = CarpetaCarrera::find($idCarpetaCarrera);
        return view('carpetaCarrera.listarProgramas')->with('carpetaCarrera',$carpeta);
    }

    /**
     * la carpeta carrera tiene la responsabilidad de agregar sus programas
     * @param int $idCarpetaCarrera
     * @return view programaDrive.create
     */
    public function agregarPrograma($idCarpetaCarrera)
    {
        $carpeta = CarpetaCarrera::find($idCarpetaCarrera);
        return view('programaDrive.create')->with('carpetaCarrera',$carpeta);
    }
}