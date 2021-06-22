<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnidadAcademica;
use App\Models\Carrera;

class UnidadAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadesAcademicas = UnidadAcademica::all();
        return view("welcome",compact("unidadesAcademicas"));

    }

    public function selectUnidadAcademica()
    {
        return $unidadesAcademicas = UnidadAcademica::all();
        
    }

    public function carreras(Request $request){
        print($request->texto);
        if(isset($request->texto)){
            $carreras = Carrera::whereId_carrera($request->texto)->get();
            print($request);
            return response()->json(
                [
                    'lista' => $carreras,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }
}