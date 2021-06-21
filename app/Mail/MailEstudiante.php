<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Usuario;
use App\Models\SolicitudCertProg;

class MailEstudiante extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = 'Solicitud de trámite iniciada';
    public $datosMail;
    // public $to;

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

        // Se genera una nueva instancia de Usuario para obtener su correo electrónico
        $destinatario = new Usuario;
        $destinatario = Usuario::findOrFail($solicitud->id_usuario_estudiante);
        $datosMail->correoUsuario = $destinatario->email;
        //print($datosMail);
        //return view('emails/solicitud_iniciada', compact('datosMail'));
        $this->datosMail = $datosMail;
        //print($this->datosMail);
    }

    public function build()
    {
        return $this->from('petrelapp.fi@gmail.com')
            ->view('emails.solicitud_iniciada');
    }
}
