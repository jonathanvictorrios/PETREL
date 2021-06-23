<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HojaResumen;
use Karriere\PdfMerge\PdfMerge;

class HojaResumenController extends Controller
{
    public function index(){
        //return view('hojaResumen.create');
        // $colHojasResumen=HojaResumen::get();
        // return view('hojaResumen.show')->with('colHojasResumen',$colHojasResumen);
    }
    public function store(Request $request){
        //creo el objeto hojaresumen y lo cargo en la base de datos solo con el idSolicitud
        //los demas campos los agregare a medida que se vayan concretando determinadas tareas
        $unaHojaResumen=new HojaResumen();
        $unaHojaResumen->id_solicitud=$request->idSolicitud;
        $unaHojaResumen->save();
        return view('rendimientoAcademico.create')->with('idSolicitud',$request->idSolicitud);
    }
    private function realizarUnion($idSolicitud)
    {
        /*
        *Nombres de archivos pdf para conformar la hoja resumen: idSolicitud=6
            notaDtoAlum6.pdf
            rendimientoAcademico6.pdf
            planEstudio6.pdf
            unionProgramas6.pdf
        */

        $urlPdfsLocales=[];
        $urlPdfsLocales[]='notaDtoAlum'.$idSolicitud.'.pdf';
        $urlPdfsLocales[]='rendimientoAcademico'.$idSolicitud.'.pdf';
        $urlPdfsLocales[]='planEstudio'.$idSolicitud.'.pdf';
        $urlPdfsLocales[]='unionProgramas'.$idSolicitud.'.pdf';
        
        
        
        $pdf = new PdfMerge();
        foreach($urlPdfsLocales as $unaUrl){
            $pdf->add(storage_path().'/app/id-solicitud-'.$idSolicitud.'/'.$unaUrl,'all');
        }
        $nombre = 'hojaUnida'.$idSolicitud.'.pdf';
        $pdf->merge(storage_path().'/app/id-solicitud-'.$idSolicitud.'/'.$nombre);
        return 'id-solicitud-'.$idSolicitud.'/'.$nombre;
    }
    

}
