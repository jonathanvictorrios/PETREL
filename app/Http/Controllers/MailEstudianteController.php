<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MailEstudiante;
use App\Models\SolicitudCertProg;
use App\Models\Usuario;

class MailEstudianteController extends Controller
{
    public $datosMail;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Recupero la solicitud
        $solicitud = SolicitudCertProg::findOrFail($id);
        
        // Se genera una nueva instancia de SolicitudCertProg y se cargan los datos:
        $datosMail = new SolicitudCertProg;
        $datosMail->idSolicitud = $id;
        
        $datosMail->Apellido = $solicitud->usuarioEstudiante->apellido;
        $datosMail->Nombre = $solicitud->usuarioEstudiante->nombre;
        $datosMail->Legajo = $solicitud->legajo;
        $datosMail->Carrera=$solicitud->carrera->carrera;
        $datosMail->UniversidadDestino=$solicitud->universidad_destino;

        // Se genera una nueva instancia de Usuario para obtener su correo electrónico
        $destinatario = new Usuario;
        $destinatario = Usuario::findOrFail($solicitud->id_usuario_estudiante);
        $datosMail->correoUsuario = $destinatario->email;


        // print($datosMail);
        return view('emails/solicitud_iniciada', compact('datosMail'));*/
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
     * Envía un email al correo del estudiante designado.
     *
     * @param  string  $email
     * @return \Illuminate\Http\Response
     */
    public function sendMail($email)
    {
        // Mail::to($email)->send(new MailEstudiante(""));
    }
}
