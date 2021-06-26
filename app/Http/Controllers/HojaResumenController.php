<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HojaResumen;
use App\Models\SolicitudCertProg;
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
    public function store(Request $request)
    {
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
        $objHojaResumen = HojaResumen::find($idSolicitud); //$objSolicitud->hoja_resumen;

        $arregloRendimiento = json_decode(file_get_contents(storage_path('/app/') . 'id-solicitud-' . $idSolicitud . '/rendimientoAcademico' . $idSolicitud . '.json'), true);
        $arregloRendimiento['Secretaria'] = true;
        $pdf = PDF::loadView('rendimientoAcademico.exportarPdf', compact('arregloRendimiento'));

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
        return view('solicitud.show', ['solicitud' => $objSolicitud]);
    }

    public static function realizarUnion($idSolicitud)
    {
        /*Nombres de archivos pdf para conformar la hoja resumen: idSolicitud=6
            notaDtoAlum6.pdf
            rendimientoAcademico6.pdf
            planEstudio6.pdf
            unionProgramas6.pdf
        */

        $urlPdfsLocales = [];
        $urlPdfsLocales[] = 'notaDptoAlumno' . $idSolicitud . '.pdf';
        $urlPdfsLocales[] = 'rendimientoAcademico' . $idSolicitud . '.pdf';
        $urlPdfsLocales[] = 'planEstudio' . $idSolicitud . '.pdf';
        $urlPdfsLocales[] = 'unionProgramas' . $idSolicitud . '.pdf';

        $pdf = new PdfMerge();
        foreach ($urlPdfsLocales as $unaUrl) {
            $pdf->add(storage_path() . '/app/id-solicitud-' . $idSolicitud . '/' . $unaUrl, 'all');
        }
        $nombre = 'hojaUnida' . $idSolicitud . '.pdf';
        $pdf->merge(storage_path() . '/app/id-solicitud-' . $idSolicitud . '/' . $nombre);
    }
}