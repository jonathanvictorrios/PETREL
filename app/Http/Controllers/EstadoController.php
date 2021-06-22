<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\EstadoDescripcion;
use App\Models\Notificacion;
use App\Models\usuario;
use App\Models\SolicitudCertProg;
use DateTime;
use Facade\IgnitionContracts\Solution;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $Estados = Estado::all();
        return view ('estado.index',compact('Estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estadoNuevo = new Estado;
        $estadoNuevo->idSolicitud = $request->idSolicitud;
        $estadoNuevo->idEstadoDescripcion = $request->estadoDescripcion;
        $estadoNuevo->nombre = $request->nombre;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Estados = Estado::findOrFail($id);
        return view ('estado.index',compact('Estados'))->with('Mensaje','El ID seleccionado no existe en la base de datos.');
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

    // Funciones específicas para la modificación de estados
 
    // PUBLICAS

    public function iniciarTramite($idSolicitud) {
        // Crea el primer Estado (iniciado) para la solicitud dada
        $solicitud_cert_prog = SolicitudCertProg::findOrFail($idSolicitud);

        if ($solicitud_cert_prog != null) { 
        
            
            $EstadoDescripcion = new EstadoDescripcion;
            $EstadoDescripcion->idEstadoDescripcion = 1;
            
            $Estado = new Estado;
            $Estado->solicitud_cert_prog = $solicitud_cert_prog;
            $Estado->usuario = null;
            $Estado->estado_descripcion = $EstadoDescripcion;
            $Estado->save();

            $Notificacion = new Notificacion;
            $Notificacion->estado = $Estado;
            $Notificacion->mensaje = 'Hay una nueva solicitud. Aguardando asignación.';
            $Notificacion->leida = false;
            $Notificacion->save();

            return view('index'); //definir vista de retorno
        }
        else {
            return back()->with('Error: no se encuentra la solicitud indicada.');
        }
    }
    
    public function asignarTramite($Solicitud, $NuevoUsuario) {
        
        //$Solicitud :: SolcititudCertProg --Recibo la Solicitud
        //$NuevoUsuario :: Usuario  -- Recibo el Usuario Administrativo al que se le asigna el Trámite

       // $solicitud_cert_prog = SolicitudCertProg::findOrFail($idSolicitud);
        print( $Solicitud );
        // verificamos que existe la solicitud
        if ($Solicitud != null) { 
        
         //   print('hola');
            // creamos la descripción del estado a asignar
            $EstadoDescripcion = new EstadoDescripcion;
            $EstadoDescripcion->idEstadoDescripcion = 2;

            //print($EstadoDescripcion);
            // recuperamos el último estado para modificar la fecha
            $ultimoEstado = Estado::get()->where('id_solicitud', $Solicitud->id_solicitud)->last();
            $ultimoEstado->updated_at = date("Y-m-d");
            $ultimoEstado->save();
         //   print($ultimoEstado);
            
            // tomamos la notificacion correspondiente al último estado y la marcamos como leída
            // $ultimaNotificacion = Notificacion::get()->where('idEstado', $ultimoEstado->idEstado);
            // $ultimaNotificacion->leido = true;
           // $ultimaNotificacion->save();
            
            // recuperamos los datos del usuario al que se asigna la solicitud, y
            // generamos un nuevo estado al que asignamos el usuario recuperado
            // $usuario = usuario::find($idNuevoUsuario);
            $nuevoEstado = new Estado;
            $nuevoEstado->id_solicitud = $Solicitud->id_solicitud;
            $nuevoEstado->id_usuario = $NuevoUsuario->id_usuario;
            $nuevoEstado->id_estado_descripcion = $EstadoDescripcion->idEstadoDescripcion;
            $nuevoEstado->updated_at=null;
            $nuevoEstado->save();
           
            // print($nuevoEstado);
            
            // generamos una nueva notificación para el estado creado y editamos las notas
            // con el apellido y nombre del usuario
            $nuevaNotificacion = new Notificacion;
            $nuevaNotificacion->estado = $nuevoEstado;
            $nuevaNotificacion->mensaje = 'La solicitud ha sido asignada al usuario {{$usuario->apellido}} {{$usuario->nombre}}.';
            $nuevaNotificacion->leida = false;
          //  $nuevaNotificacion->save();
            return view('solicitud.index'); //definir vista de retorno
        }
        else {
            return back()->with('Error: no se encuentra la solicitud indicada.');
        }
    }

    public function finalizarTramite($idSolicitud) {
        $solicitud = solicitud_cert_prog::find($idSolicitud);
    }

// PRIVADA

    private function cambioEstado($idSolicitud, $idEstadoDescripcion, $idUsuario = null) {

    }
}
