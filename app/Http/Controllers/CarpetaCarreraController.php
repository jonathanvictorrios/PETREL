<?php

namespace App\Http\Controllers;

use App\Models\CarpetaAnio;
use App\Models\CarpetaCarrera;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarpetaCarreraController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:carpetaCarrera.listarProgramas')->only('listarProgramas');
    }

    public function store(Request $request)
    {
        $carrera = Carrera::find($request->idCarrera);
        $carpetaAnio = CarpetaAnio::find($request->idCarpetaAnio);
        Storage::disk('google')->makeDirectory($carpetaAnio->url_anio . '/' . $carrera->carrera);
        $colCarpetasCarrera = Storage::disk('google')->directories($carpetaAnio->url_anio);
        $i = 0;
        $urlEncontrada = false;
        while ($i < count($colCarpetasCarrera) && !$urlEncontrada) {
            //comparamos cada url si le pertenece a la carpeta agregada recientemente
            $urlEncontrada = Storage::disk('google')->getMetadata($colCarpetasCarrera[$i])['name'] == $carrera->carrera;
            $i++;
        }
        $urlCarpeta = explode('/', $colCarpetasCarrera[($i - 1)])[1]; //obtenemos la posicion de la url que le pertenece a la carpeta recien creada
        $carpeta = CarpetaCarrera::create([
            'id_carpeta_anio' => $carpetaAnio->id_carpeta_anio,
            'id_carrera' => $carrera->id_carrera,
            'url_carrera' => $urlCarpeta,
        ]);
        return view('carpetaAnio.listarCarreras')->with('carpetaAnio', $carpeta->carpeta_anio);
    }

    /**
     * vamos a buscar los programas que pertenecen a la carpeta
     * @param int $idCarpetaCarrera
     * @return view carpetaCarrera.listarProgramas
     */
    public function verProgramas($idCarpetaCarrera)
    {
        $carpeta = CarpetaCarrera::find($idCarpetaCarrera);
        return view('carpetaCarrera.listarProgramas')->with('carpetaCarrera', $carpeta);
    }

    /**
     * la carpeta carrera tiene la responsabilidad de agregar sus programas
     * @param int $idCarpetaCarrera
     * @return view programaDrive.create
     */
    public function agregarPrograma($idCarpetaCarrera)
    {
        $carpeta = CarpetaCarrera::find($idCarpetaCarrera);
        return view('programaDrive.create')->with('carpetaCarrera', $carpeta);
    }
}