<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HojaResumen;
use App\Models\SolicitudCertProg;
use App\Models\Estado;
use Illuminate\Support\Facades\Storage;
use Karriere\PdfMerge\PdfMerge;
use PDF;

class HojaResumenController extends Controller
{
    public function index()
    {
        return view('hojaResumen.create');
        // $colHojasResumen=HojaResumen::get();
        // return view('hojaResumen.show')->with('colHojasResumen',$colHojasResumen);
    }

    public function continuarTramite($idSolicitud){
        $objHojaResumen = HojaResumen::where('id_solicitud',$idSolicitud)->get();
        if(count($objHojaResumen)>0){
            $objSolicitud=SolicitudCertProg::find($idSolicitud);
            if($objHojaResumen[0]->id_rendimiento_academico==null){
                return view('rendimientoAcademico.create')->with('solicitud',$objSolicitud);
            }elseif($objHojaResumen[0]->id_programa_local==null){
                return redirect()->route('buscarProgramas',$objSolicitud->id_solicitud);
            }elseif(count($objHojaResumen[0]->plan_estudio)<1){
                return redirect()->route('crearPlanEstudio',$objSolicitud->id_solicitud);
            }else{
                return redirect()->route('notaDA.crear',$objSolicitud->id_solicitud);
            }
        }
    }

    public function store(Request $request){
        //creo el objeto hojaresumen y lo cargo en la base de datos solo con el idSolicitud
        //los demas campos los agregare a medida que se vayan concretando determinadas tareas
        $unaHojaResumen = new HojaResumen();
        $unaHojaResumen->id_solicitud = $request->idSolicitud;
        $unaHojaResumen->save();
        $objSolicitud = SolicitudCertProg::find($request->idSolicitud);
        return view('rendimientoAcademico.create')->with('solicitud', $objSolicitud);
    }


    public function firmaSecretaria(Request $request)
    {
        $idSolicitud = $request->idSolicitud;
        $objSolicitud = SolicitudCertProg::find($idSolicitud);
        $objHojaResumen = HojaResumen::where('id_solicitud',$idSolicitud)->get()[0];//$objSolicitud->hoja_resumen;
        
        $arregloRendimiento = json_decode(file_get_contents(storage_path('/app/').'id-solicitud-'.$idSolicitud.'/rendimientoAcademico'.$idSolicitud.'.json'),true);
        $arregloRendimiento['Secretaria']=true;
        $pdf = PDF::loadView('rendimientoAcademico.exportarPdf',compact('arregloRendimiento'));
        
        $contenido = $pdf->download()->getOriginalContent();
        $nombreRendimiendoPdf = 'rendimientoAcademico' . $idSolicitud . '.pdf';

        //ya guardamos pdf del renidimiento academico con ambas firmas
        Storage::disk('local')->put('id-solicitud-' . $idSolicitud . '/' . $nombreRendimiendoPdf, $contenido);

        $contenidoNotaDpto = json_decode(file_get_contents(storage_path('/app/') . 'id-solicitud-' . $idSolicitud . '/contenidoNotaDpto' . $idSolicitud . '.json'));
        $objPDF = app('dompdf.wrapper')
            ->loadView('notaDptoAlum.exportar_pdf', [
                'contenido' => $contenidoNotaDpto->contenido,
                'footer' => $contenidoNotaDpto->footer,
                'firma_dpto' => $contenidoNotaDpto->firma_dpto,
                'firma_secretaria' => 'SILVIA AMARO'
            ]);
        //ya guardamos pdf de la nota de departamento firmada por secretaria
        Storage::put('id-solicitud-' . $idSolicitud . '/notaDptoAlumno' . $idSolicitud . '.pdf', $objPDF->output());
        $this->realizarUnion($idSolicitud);

        $estado=new Estado();
            $estado->id_solicitud = $idSolicitud;
            $estado->id_estado_descripcion = 5;
            $estado->id_usuario = $objSolicitud->usuarioEstudiante->id_usuario;
            $estado->save();
        return Storage::download('id-solicitud-'.$idSolicitud.'/hojaUnida'.$idSolicitud.'.pdf');
        /* return view('solicitud.show',['solicitud'=>$objSolicitud]); */
        /* return redirect()->route('solicitud'); */
    }

    public static function realizarUnion($idSolicitud)
    {
        /*Nombres de archivos pdf para conformar la hoja resumen: idSolicitud=6
            notaDtoAlum6.pdf
            rendimientoAcademico6.pdf
            planEstudio6.pdf
            unionProgramas6.pdf
        */

        $urlPdfsLocales=[];
        $urlPdfsLocales[]='notaDptoAlumno'.$idSolicitud.'.pdf';
        $urlPdfsLocales[]='rendimientoAcademico'.$idSolicitud.'.pdf';
        $i = 0;
        do {
            $urlPdfsLocales[] = "planEstudio-$idSolicitud-$i.pdf";
            $i++;
        }
        while (file_exists(storage_path("id-solicitud-$idSolicitud/planEstudio-$idSolicitud-$i.pdf")));
        $urlPdfsLocales[]='unionProgramas'.$idSolicitud.'.pdf';
        
        $pdf = new PdfMerge();
        foreach ($urlPdfsLocales as $unaUrl) {
            $pdf->add(storage_path() . '/app/id-solicitud-' . $idSolicitud . '/' . $unaUrl, 'all');
        }
        $nombre = 'hojaUnida' . $idSolicitud . '.pdf';
        $pdf->merge(storage_path() . '/app/id-solicitud-' . $idSolicitud . '/' . $nombre);
    }
}