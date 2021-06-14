<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudCertProg;
use App\Models\UnidadAcademica;
use App\Models\Usuario;

class SolicitudCertProgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = SolicitudCertProg::all();
        return view('solicitud.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidadesAcademicas = UnidadAcademica::all();
        return view ('solicitud.create',compact('unidadesAcademicas'));
       //return view ('solicitud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitud = new SolicitudCertProg;
        $usuarioEstudiante = Usuario::find(1);
        // $usuarioEstudiante->id_usuario=1;
        $usuarioAdministrativo= null;
        

        $solicitud->id_usuario_estudiante=$usuarioEstudiante->id_usuario;
        //$usuarioEstudiante = null;// $request->idUsuario;// Ver como viene esto desde la vista
         $solicitud->id_user_u=$usuarioAdministrativo;
        
        $solicitud->legajo=$request->legajo;
        $solicitud->universidad_destino=$request->universidadDestino;
        $solicitud->id_user_u=$usuarioAdministrativo;

     ///   $solicitud->usuarioEstudiante=$usuarioEstudiante; //asignamos el usuario a la solicitud

        print($solicitud);
        $solicitud->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
