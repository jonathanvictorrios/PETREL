<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudCertProg;
use App\Models\UnidadAcademica;
use App\Models\Usuario;
use App\Models\Carrera;
use App\Models\Estado;
use App\Models\EstadoDescripcion;
use App\Http\Controllers\mailPetrelController;
use App\Models\Comentario;

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
        foreach ($solicitudes as $solicitud) {
            $Mostrar = $this->ObtenerDatosSolicitud($solicitud);
  
            array_push($Lista,$Mostrar);

        }
        $solicitudes = $Lista;
        return view('solicitud.index', compact('solicitudes'));
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
        
        if(isset($usuarioEstudiante))
        {
            $solicitud->id_usuario_estudiante=$usuarioEstudiante->id_usuario;   
        }
        else{
            return back()->with('error','Necesita estar Logueado para Ingresar una Nueva Solicitud');
        }
        
        if(isset($request->legajo))
        {
            $solicitud->legajo=$request->legajo;
        }
        else
        {
            return back()->with('error','Completar Legajo');
        }
        if(isset($request->extranjero))
        {
            if($request->extranjero=='si')
            {
            $solicitud->extranjero=true;
            }
            else{
                $solicitud->extranjero=false;
            }
        }
        else{
            $solicitud->extranjero=false;
        }

        if(isset($request->universidadDestino))
        {
            $solicitud->universidad_destino=$request->universidadDestino;
        }
        else
        {
            return back()->with('error','Completar Unidad Academica Destino');
        }

        $solicitud->id_carrera=$request->carrera; //CAMBIAR POR SELECT DE DEL FORM
        

        ///   $solicitud->usuarioEstudiante=$usuarioEstudiante; //asignamos el usuario a la solicitud

        $solicitud->updated_at = null;
        $solicitud->save();
        
        $estado = new Estado;
        $estadoDescripcion = EstadoDescripcion::find(1);

        $estado->id_solicitud = $solicitud->id_solicitud;
        $estado->id_estado_descripcion = $estadoDescripcion->id_estado_descripcion;
        $estado->id_usuario = null;
        $estado->updated_at = null;
        $estado->save();

        $controlMail = new mailPetrelController;
        $controlMail->enviarMailSolicitudIniciada($solicitud->id_solicitud);
        
        $solicitudes=SolicitudCertProg::all();//NECESITO RECUPERAR TODAS LAS SOLICITUDES PORQUE VUELVO EL RETORNO A LA VISTA.
                                              // SI EL RETORNO NO ES HACIA solicitud.index puede sacarse
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud = SolicitudCertProg::findOrFail($id);
        $solicitud = $this->ObtenerDatosSolicitud($solicitud);
        $coleccionComentarios = Comentario::find($id)->get();
        $solicitud->comentarios = $coleccionComentarios;
        return view('solicitud.show', compact('solicitud'));
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
        $Mostrar->idSolicitud = $solicitud->id_solicitud;

        $Mostrar->Legajo=$solicitud->legajo;
        
        $Mostrar->Estados=$solicitud->estados;
        
        $Mostrar->Carrera=$solicitud->carrera->carrera;

        $Mostrar->UniversidadDestino = $solicitud->universidad_destino;

        $Mostrar->UnidadAcademica = $solicitud->carrera->unidad_academica->unidad_academica;

        $ApellidoNombreUsuarioEst = $solicitud->usuarioEstudiante->apellido . " " . $solicitud->usuarioEstudiante->nombre;
        $Mostrar->UsuarioEstudiante = $ApellidoNombreUsuarioEst;
        $Mostrar->NombreEstudiante = $solicitud->usuarioEstudiante->nombre;
        $Mostrar->ApellidoEstudiante = $solicitud->usuarioEstudiante->apellido;


        $Mostrar->UltimoEstado=($solicitud->estados)->last()->estado_descripcion->descripcion;
        $Mostrar->FechaUltimoEstado=($solicitud->estados)->last()->created_at;
     //   print($Mostrar);
        
        return $Mostrar;
    }

    /**
     * Asigna una solicitud
     *
     * @param  int  $idSolicitud
     * @param  int  $idUsuarioAdministrativo
     * @return \Illuminate\Http\Response
     */
    public function asignar($idSolicitud, $idUsuarioAdministrativo)
    {
       
        $solicitud = SolicitudCertProg::findOrFail($idSolicitud);

        $usuarioAdministrativo = Usuario::findOrFail($idUsuarioAdministrativo);

        //$nuevoEstado = new Estado;
        $estadoController= new EstadoController;
        $estadoDescripcion = EstadoDescripcion::find(2);

        $estadoController->cambiarEstado($solicitud,$usuarioAdministrativo,$estadoDescripcion);

        $solicitud->id_user_u=$usuarioAdministrativo->id_usuario;
        
        $solicitud->save();

    }
   
    public function listoParaFirmarDptoAlumno($idSolicitud,$idUsuarioAdministrativo)
    {
        $solicitud = SolicitudCertProg::findOrFail($idSolicitud);
        $usuarioAdministrativo = Usuario::findOrFail($idUsuarioAdministrativo);

        $estadoDescripcion = EstadoDescripcion::find(3);
        $estadoController = new EstadoController;

        $estadoController->cambiarEstado($solicitud,$usuarioAdministrativo,$estadoDescripcion);

        $solicitud->save();

    }
    public function listoParaFirmarSecretariaAcademica($idSolicitud,$idUsuarioAdministrativo)
    {
        $solicitud = SolicitudCertProg::findOrFail($idSolicitud);
        $usuarioAdministrativo = Usuario::findOrFail($idUsuarioAdministrativo);

        $estadoDescripcion = EstadoDescripcion::find(4);
        $estadoController = new EstadoController;

        $estadoController->cambiarEstado($solicitud,$usuarioAdministrativo,$estadoDescripcion);

        $solicitud->save();

    }
    public function listoParaFirmarSantiago($idSolicitud,$idUsuarioAdministrativo)
    {
        $solicitud = SolicitudCertProg::findOrFail($idSolicitud);
        $usuarioAdministrativo = Usuario::findOrFail($idUsuarioAdministrativo);

        $estadoDescripcion = EstadoDescripcion::find(5);
        $estadoController = new EstadoController;

        $estadoController->cambiarEstado($solicitud,$usuarioAdministrativo,$estadoDescripcion);

        $solicitud->save();

    }
    public function terminar($idSolicitud,$idUsuarioAdministrativo)
    {
        $solicitud = SolicitudCertProg::findOrFail($idSolicitud);
        $usuarioAdministrativo = Usuario::findOrFail($idUsuarioAdministrativo);

        $estadoDescripcion = EstadoDescripcion::find(6);
        $estadoController = new EstadoController;

        $estadoController->cambiarEstado($solicitud,$usuarioAdministrativo,$estadoDescripcion);

        $solicitud->save();
        $controlMail = new mailPetrelController;
        $controlMail->enviarMailSolicitudFinalizada($solicitud->id_solicitud);    

    }




}