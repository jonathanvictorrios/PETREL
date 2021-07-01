<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\SolicitudCertProg;
use App\Models\Usuario;

class mailPetrel extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $datosMail;
    public $vista;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        // Recupero la solicitud
        $solicitud = SolicitudCertProg::findOrFail($id);

        // Se genera una nueva instancia de SolicitudCertProg y se cargan los datos:
        $datosMail = new SolicitudCertProg;
        $datosMail->idSolicitud = $id;
        $datosMail->Nombre = $solicitud->usuarioEstudiante->nombre;
        $datosMail->Apellido = $solicitud->usuarioEstudiante->apellido;
        $datosMail->Legajo = $solicitud->legajo;
        $datosMail->Carrera = $solicitud->carrera->carrera;
        $datosMail->UniversidadDestino = $solicitud->universidad_destino;
        //$datosMail->NombreUserU = $solicitud->usuarioAdministrativo->nombre;

        // Se genera una nueva instancia de Usuario para obtener su correo electrónico
        $destinatario = new Usuario;
        $destinatario = Usuario::findOrFail($solicitud->id_usuario_estudiante);
        $datosMail->correoUsuario = $destinatario->email;

        $destinatarioAdministracion = new Usuario;
        $destinatarioAdministracion = Usuario::find($solicitud->id_user_u);
        $datosMail->correoUserU = $destinatarioAdministracion->email;
        //print($datosMail);
        //return view('emails/solicitud_iniciada', compact('datosMail'));
        $this->datosMail = $datosMail;
        //print($this->datosMail);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //print $vista;
        // return $this->view($vista);
        return $this->view($this->vista);
        
    }
}
