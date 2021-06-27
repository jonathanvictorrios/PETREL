<?php

namespace App\Http\Controllers;

use App\Mail\mailPetrel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class mailPetrelController extends Controller
{
    public function enviarMailSolicitudIniciada($idSolicitud) 
    {
    // $correo debe inicializarse con el $idSolicitud como variable
    // $idSolicitud = 3; // hardcodeado para testing
    $correo = new mailPetrel($idSolicitud);
    $datosMail = $correo->datosMail;
    $correo->subject = "Solicitud de trámite iniciada";
    $correo->vista = "emails.solicitud_iniciada";
    //dd($datosMail);
    Mail::to($datosMail->correoUsuario)->send($correo);
    //return ('Correo enviado');
    //return back()->with('mensaje','Correo enviado con éxito');
    }
    
    public function enviarMailSolicitudFinalizada($idSolicitud) 
    {
    // $correo debe inicializarse con el $idSolicitud como variable
    // $idSolicitud = 3; // hardcodeado para testing
    $correo = new mailPetrel($idSolicitud);
    $datosMail = $correo->datosMail;
    $correo->subject = "Solicitud de trámite finalizada";
    $correo->vista = "emails.finalizacion";
    //print_r($datosMail);
    Mail::to($datosMail->correoUsuario)->send($correo);
    //return ('Correo enviado');
    //return back()->with('mensaje','Correo enviado con éxito');
    }
}
