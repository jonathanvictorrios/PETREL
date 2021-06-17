<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudCertProg;
use App\Models\UnidadAcademica;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Estado;
use App\Models\EstadoDescripcion;



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
        $Lista = array();
        foreach($solicitudes as $solicitud)
        {
            $Mostrar = $this->ObtenerDatosSolicitud($solicitud);
  
            array_push($Lista,$Mostrar);

        }
        $solicitudes=$Lista;
        return view('solicitud.index',compact('solicitudes'));
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
        $usuarioEstudiante = Usuario::find(1); //ACA TENGO QUE PASAR EL ID DEL USUARIO LOGUEADO
        // $usuarioEstudiante->id_usuario=1;
        // $usuarioAdministrativo= null;
        

        $solicitud->id_usuario_estudiante=$usuarioEstudiante->id_usuario;
        //$usuarioEstudiante = null;// $request->idUsuario;// Ver como viene esto desde la vista
        //  $solicitud->id_user_u=$usuarioAdministrativo;
        
        $solicitud->legajo=$request->legajo;
        $solicitud->universidad_destino=$request->universidadDestino;
        $solicitud->id_carrera=1; //CAMBIAR POR SELECT DE DEL FORM
        

     ///   $solicitud->usuarioEstudiante=$usuarioEstudiante; //asignamos el usuario a la solicitud

        $solicitud->updated_at=null;
        $solicitud->save();
        
        $estado = new Estado;
        $estadoDescripcion = EstadoDescripcion::find(1);

        $estado->id_solicitud=$solicitud->id_solicitud;
        $estado->id_estado_descripcion=$estadoDescripcion->id_estado_descripcion;
        $estado->id_usuario=null;
        $estado->updated_at=null;
        $estado->save();


        return Redirect('/')->with('mensaje','Se ingreso la Solicitud {{$solicitud->id_solicitud}}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud= SolicitudCertProg::findOrFail($id);
        $solicitud=$this->ObtenerDatosSolicitud($solicitud);
        /*
        $solicitud = SolicitudCertProg::findOrFail($id);
        $solicitud->usuarioEstudiante=Usuario::find($solicitud->id_usuario_estudiante);
        $solicitud->carrera= Carrera::find($solicitud->id_carrera);
        $solicitud->unidadAcademica=UnidadAcademica::find($solicitud->carrera->id_unidad_academica);
        */

        return view('solicitud.show',compact('solicitud'));

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

    public function ObtenerDatosSolicitud($solicitud)
    {
        $Mostrar = new SolicitudCertProg;
        $Mostrar->idSolicitud=$solicitud->id_solicitud;

        $Mostrar->Legajo=$solicitud->legajo;

        $Mostrar->Fecha=$solicitud->ultimoEstado->created_at;

        $Mostrar->Carrera=$solicitud->carrera->carrera;
        $Mostrar->UniversidadDestino=$solicitud->universidad_destino;
        $Mostrar->UnidadAcademica=$solicitud->carrera->unidad_academica->unidad_academica;
        $ApellidoNombreUsuarioEst = $solicitud->usuarioEstudiante->apellido." ".$solicitud->usuarioEstudiante->nombre;
        $Mostrar->UsuarioEstudiante=$ApellidoNombreUsuarioEst;
        $Mostrar->UltimoEstado=$solicitud->UltimoEstado->estado_descripcion->descripcion;
        $Mostrar->Estados=$solicitud->estados;
        print($Mostrar);
        return $Mostrar;
    }
}