<?php

namespace App\Http\Controllers;

use App\Mail\mailPetrel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SolicitudCertProg;


class mailPetrelController extends Controller

{
    public function enviarMailSolicitudIniciada($idSolicitud) 
    {
    // $correo debe inicializarse con el $idSolicitud como variable
    //$idSolicitud = 2; // hardcodeado para testing
    
    $correo = new mailPetrel($idSolicitud);
    $datosMail = $correo->datosMail;
    $correo->subject = "Solicitud de trámite iniciada";
    $correo->vista = "emails.solicitud_iniciada";
    //print("................");
    //var_dump($datosMail);
    //print("AAAAAAAAAAAA");
    //var_dump($correo);
    //print("................");
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

    public function enviarMailSolicitudFirma($idSolicitud) 
    {
    // $correo debe inicializarse con el $idSolicitud como variable
    // $idSolicitud = 3; // hardcodeado para testing
    $correo = new mailPetrel($idSolicitud);
    $datosMail = $correo->datosMail;
  //  print($solicitud);

    $destinatarioAdministracion = User::find(2);//EL ID de SANTIAGO por defecto. Esto se tiene que camnbiar.
    //print($destinatarioAdministracion->email);
    //print($datosMail->correoUsuario);    
    $datosMail->correoUsuario = $destinatarioAdministracion->email;
    
    $datosMail = $correo->datosMail;
    $datosMail->Nombre=$destinatarioAdministracion->nombre;
    $correo->subject = "Solicitud lista para firmar";
    $correo->vista = "emails.aviso_revision";
    //print($datosMail->correoUsuario);
    Mail::to($datosMail->correoUsuario)->send($correo);
    //return ('Correo enviado');
    //return back()->with('mensaje','Correo enviado con éxito');
    }
}
