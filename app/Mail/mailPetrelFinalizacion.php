<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
<<<<<<< HEAD
=======
use App\Models\SolicitudCertProg;
use App\Models\Usuario;
>>>>>>> 30cc40c08a2d805a227cdbd77537a86e499d1a32

class mailPetrelFinalizacion extends Mailable
{
    use Queueable, SerializesModels;

<<<<<<< HEAD
    public $subject = "Finalizacion del tramite de solicitud de certificado";
=======
    public $subject = 'Solicitud de trámite finalizada';
>>>>>>> 30cc40c08a2d805a227cdbd77537a86e499d1a32
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct()
    {
        //
=======
    public function __construct($id)
    {
        // Recupero la solicitud
        $solicitud = SolicitudCertProg::findOrFail($id);

        // Se genera una nueva instancia de SolicitudCertProg y se cargan los datos:
        $datosMail = new SolicitudCertProg;
        
        $datosMail->Nombre = $solicitud->usuarioEstudiante->nombre;
        // Datos exluidos de la generación del email
        // $datosMail->idSolicitud = $id;
        // $datosMail->Apellido = $solicitud->usuarioEstudiante->apellido;
        // $datosMail->Legajo = $solicitud->legajo;
        // $datosMail->Carrera = $solicitud->carrera->carrera;
        // $datosMail->UniversidadDestino = $solicitud->universidad_destino;

        // Se genera una nueva instancia de Usuario para obtener su correo electrónico
        $destinatario = new Usuario;
        $destinatario = Usuario::findOrFail($solicitud->id_usuario_estudiante);
        $datosMail->correoUsuario = $destinatario->email;
        //print($datosMail);
        //return view('emails/solicitud_iniciada', compact('datosMail'));
        $this->datosMail = $datosMail;
        //print($this->datosMail);
>>>>>>> 30cc40c08a2d805a227cdbd77537a86e499d1a32
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
<<<<<<< HEAD
        return $this->view('email.finalizacion');
=======
        return $this->view('emails.finalizacion');
>>>>>>> 30cc40c08a2d805a227cdbd77537a86e499d1a32
    }
}
