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

    public $datosMail;

    public function __construct(Usuario $estudiante, SolicitudCertProg $solicitud)
    {
        //$this->$datosMail->Solicitud = $solicitud->idSolicitud;
    }

    public function build()
    {
        return $this->from('petrelapp.fi@gmail.com')
                    ->view('emails.solicitud_iniciada');
    }
}
