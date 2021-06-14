<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estado;
use App\Models\EstadoDescripcion;
use App\Models\Notificacion;
use App\Models\usuario;
use App\Models\solicitud_cert_prog;
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
        $solicitud_cert_prog = solicitud_cert_prog::get()->where('id_solicitud', $idSolicitud);

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
    
    public function asignarTramite($idSolicitud, $idNuevoUsuario) {
        
        // Se asigna la solicitud a un usuario administrativo
        $solicitud_cert_prog = solicitud_cert_prog::get()->where('id_solicitud', $idSolicitud);

        // verificamos que existe la solicitud
        if ($solicitud_cert_prog != null) { 
        
            // creamos la descripción del estado a asignar
            $EstadoDescripcion = new EstadoDescripcion;
            $EstadoDescripcion->idEstadoDescripcion = 2;

            // recuperamos el último estado para modificar la fecha
            $ultimoEstado = Estado::get()->where('idSolicitud', $idSolicitud)->where('updated_at', null);
            $ultimoEstado->update_at = date("Y-m-d");
            $ultimoEstado->save();
            
            // tomamos la notificacion correspondiente al último estado y la marcamos como leída
            $ultimaNotificacion = Notificacion::get()->where('idEstado', $ultimoEstado->idEstado);
            $ultimaNotificacion->leido = true;
            $ultimaNotificacion->save();
            
            // recuperamos los datos del usuario al que se asigna la solicitud, y
            // generamos un nuevo estado al que asignamos el usuario recuperado
            $usuario = usuario::find($idNuevoUsuario);
            $nuevoEstado = new Estado;
            $nuevoEstado->solicitud_cert_prog = $solicitud_cert_prog;
            $nuevoEstado->usuario = $usuario;
            $nuevoEstado->estado_descripcion = $EstadoDescripcion;
            $nuevoEstado->save();
            
            // generamos una nueva notificación para el estado creado y editamos las notas
            // con el apellido y nombre del usuario
            $nuevaNotificacion = new Notificacion;
            $nuevaNotificacion->estado = $nuevoEstado;
            $nuevaNotificacion->mensaje = 'La solicitud ha sido asignada al usuario {{$usuario->apellido}} {{$usuario->nombre}}.';
            $nuevaNotificacion->leida = false;
            $nuevaNotificacion->save();
            return view('index'); //definir vista de retorno
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
