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
use App\Models\HojaResumen;

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

        return view('solicitud.index',compact('solicitudes'))->with('mensaje','Se ingresó la solicitud con éxito.');
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
        $hojaResumen = HojaResumen::where('id_solicitud',$id)->get();
        if(count($hojaResumen)>0){
            if($hojaResumen[0]->url_hoja_unida!=null){
                $iniciarTramite = 1;
            }else{
                $iniciarTramite = 0;
            }
        }else{
            $iniciarTramite = -1;
        }
        return view('solicitud.show',compact('solicitud','iniciarTramite'));
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

    /**
     * Asigna una solicitud
     *
     * @param  int  $idSolicitud
     * @param  int  $idUsuarioAdministrativo
     * @return \Illuminate\Http\Response
     */
    public function asignar($idSolicitud, Request $request)
    {

        $solicitud = SolicitudCertProg::findOrFail($idSolicitud);

        $usuarioAdministrativo = Usuario::findOrFail($request->usuarioAdministrativo);

        //$nuevoEstado = new Estado;
        $estadoController= new EstadoController;
        $estadoDescripcion = EstadoDescripcion::find(2);

        $estadoController->cambiarEstado($solicitud,$usuarioAdministrativo,$estadoDescripcion);

        $solicitud->id_user_u=$usuarioAdministrativo->id_usuario;

        $solicitud->save();

        $solicitudes = SolicitudCertProg::all();
        return back();

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
        $controlMail = new mailPetrelController;
        $controlMail->enviarMailSolicitudFirma($solicitud->id_solicitud);


    }
    public function terminar($idSolicitud,$idUsuarioAdministrativo)
    {
        $solicitud = SolicitudCertProg::findOrFail($idSolicitud);
        $usuarioAdministrativo = Usuario::findOrFail($idUsuarioAdministrativo);

        $estadoDescripcion = EstadoDescripcion::find(5);
        $estadoController = new EstadoController;

        $estadoController->cambiarEstado($solicitud,$usuarioAdministrativo,$estadoDescripcion);

        $solicitud->save();
        $controlMail = new mailPetrelController;
        $controlMail->enviarMailSolicitudFinalizada($solicitud->id_solicitud);

    }




}
