<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HojaResumenFinal;
use App\Models\HojaResumen;
use App\Models\SolicitudCertProg;
use TCPDI;

//use Karriere\PdfMerge\PdfMerge;

class HojaResumenFinalController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unaSolicitud= SolicitudCertProg::find();
        
        return view('hojaResumenFinal.indexHojaFinal')->with('solicitud', $unaSolicitud);
    }

    public function show($idSolicitud)
    {
        $unaSolicitud= SolicitudCertProg::find($idSolicitud);
        
        return view('hojaResumenFinal.indexHojaFinal')->with('solicitud', $unaSolicitud);
        
    }
    public function store(Request $request)
    {
        $id_solicitud = $request->id_solicitud;

        //Busco la hoja resumen 
        $unaHojaResumen = HojaResumen::where('id_solicitud', '=', $id_solicitud)->first();        
        $idHojaResumen = $unaHojaResumen->id_hoja_resumen;

        $hojaFinal = HojaResumenFinal::where('id_hoja_resumen', '=', $idHojaResumen)->first();
        if ($hojaFinal == null) {
            //Creo el objeto hoja resumen final y lo cargo en la base de datos 
            $hojaFinal = new HojaResumenFinal();
            $hojaFinal->id_hoja_resumen = $idHojaResumen;
            $hojaFinal->save();
        }

        $carpetaStorageApp = storage_path('app/') . 'id-solicitud-' . $id_solicitud;
        $nombreJson  = 'rendimientoAcademico' . $id_solicitud . '.json';
        $rutaArchivo = $carpetaStorageApp . '/' . $nombreJson;
        $arregloFecha = $this->obtenerFecha();

        $unaSolicitud = $unaHojaResumen->solicitud_cert_prog;

        return view('notaAdminCentral.indexNotaCentral')->with('rutaArchivo', $rutaArchivo)->with('arregloFecha', $arregloFecha)->with('solicitud', $unaSolicitud);
    }


    public function obtenerFecha()
    {

        $meses = array("ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE");

        $mes = $meses[date('n') - 1];
        $dia = strftime("%d");
        $anio = strftime("%Y");

        $arregloFecha = ['dia' => $dia, 'mes' => $mes, 'anio' => $anio];

            /*         
        $fecha = Carbon::now()->locale('es');
        $dia = $fecha->format('d');
        $anio = $fecha->format('Y');
        $mes = strtoupper($fecha->monthName);

        $arregloFecha=['dia'=>$dia, 'mes'=>$mes, 'anio'=>$anio];  */

        return $arregloFecha;
    }


    // Descargar archivo pdf de certificacion sin firma
    public function descargarPdfSinFirma(Request $request)
    {
        $id_solicitud = $request->id_solicitud;

        $hoja = HojaResumen::where('id_solicitud', '=', $id_solicitud)->first();
        $idHoja = $hoja->id_hoja_resumen;
        $solicitud = $hoja->solicitud_cert_prog;

        $hojaFinalSF = HojaResumenFinal::where('id_hoja_resumen', '=', $idHoja)->first();

        if ($hojaFinalSF != null) {
            $ruta = $hojaFinalSF->url_hoja_unida_final_sin_firma;

            if ($ruta != null || $ruta != "") {
                $filePath = storage_path('app/' . $ruta);
                $retorno =  response()->download($filePath);
            } else {                
                // esto no se si esta bien, no me sale redireccionar         
                $retorno =  view('hojaResumenFinal.indexHojaFinal')->with('solicitud', $solicitud);
            }
        } else {
            $retorno =  view('hojaResumenFinal.indexHojaFinal')->with('solicitud', $solicitud);
        }
        return $retorno;  
    }
    public function foliar($idSolicitud) {

        $pdf=new TCPDI();
        $url = storage_path()."/app/id-solicitud-".$idSolicitud."/hojaUnidaFinalSinFirma".$idSolicitud.".pdf";
        $pdf->setSourceFile($url);
        $pageCount = $pdf->setSourceFile($url);
      
        for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
          $tplIdx = $pdf->importPage($pageNo);
          // add a page
          $pdf->AddPage();
          $pdf->useTemplate($tplIdx, 0, 0, null, null);
          // font and color selection
          $pdf->SetFont('Helvetica',"",18);
          //$pdf->SetTextColor(200, 0, 0);
          // now write some text above the imported page
          $pdf->SetXY(180,0); 
          $pdf->Image('img/folio-img.png', '', '', 25, 25, 'PNG', '', 'T', false, 300, '', false, false, 1, false, false, false);
          $pdf->SetXY(42,10);
          $pdf->Cell(300, 1, '' . $pageNo, 0, 2, 'C');
        }
        ob_end_clean();
        $pdf->setPDFVersion();
        $pdf->Output(storage_path()."/app/id-solicitud-".$idSolicitud."/hojaUnidaFinalSinFirma".$idSolicitud.".pdf","F");
        return redirect()->route('solicitud');
      }
}
