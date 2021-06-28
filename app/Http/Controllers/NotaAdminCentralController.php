<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NotaAdminCentral;
use App\Models\HojaResumenFinal;
use App\Models\HojaResumen;
use App\Models\SolicitudCertProg;
use Barryvdh\DomPDF\Facade as PDF;
//use Illuminate\Support\Facades\Storage;

use Karriere\PdfMerge\PdfMerge;

class NotaAdminCentralController extends Controller
{
    public function crearNotaAdminCentral(Request $request)
    {
        $solicitudes = SolicitudCertProg::all();

        $id_solicitud = $request->id_solicitud;
        $contenido_subencabezado=$request->contenido_subencabezado;
        $contenido_principal=$request->contenido_principal;
        $contenido_pie=$request->contenido_pie;

        $hoja = HojaResumen::where('id_solicitud', '=', $id_solicitud)->first();
        $solicitud = $hoja->solicitud_cert_prog;    

        $pdf = PDF::loadView('notaAdminCentral.crearPdfNotaCentral', compact('contenido_subencabezado','contenido_principal', 'contenido_pie', 'solicitud'));

        $nombreNotaCentralPdf = 'notaAdminCentral' . $id_solicitud . '.pdf';
        //Se guarda el archivo pdf nota certificacion en storage
        $pdf->save(storage_path('app/id-solicitud-' . $id_solicitud) . '/' . $nombreNotaCentralPdf);

        //Se guarda en la bd la url del pdf 
        $unaNotaCentral = new NotaAdminCentral();
        $unaNotaCentral->url_pdf_nota_admin_central = 'id-solicitud-' . $id_solicitud . '/' . $nombreNotaCentralPdf;
        $unaNotaCentral->save();

        //Actualizo tabla hoja_resumen_final. Se guarda el id_nota_admin_central 
        $idHoja = $hoja->id_hoja_resumen;

        $hojaFinal = new HojaResumenFinal();
        $hojaFinal = $hojaFinal::where('id_hoja_resumen', '=', $idHoja)->first();

        $hojaFinal->id_nota_admin_central = $unaNotaCentral->id_nota_admin_central;
        $hojaFinal->save();

        // Actualizo tabla hoja_resumen_final. Se guarda url de pdf hoja unida final sin firma
        $rutaHojaFinalSinFirma = $this->unirPdfs($id_solicitud);
        $hojaFinal->url_hoja_unida_final_sin_firma = $rutaHojaFinalSinFirma;
        $hojaFinal->save();

        return redirect()->route('foliar',$id_solicitud);
    }


    //Unir pfd hoja unida con pdf nota admin central y se forma pdf hoja unida final sin firma
    public function unirPdfs($idSolicitud)
    {

        $hoja = HojaResumen::where('id_solicitud', '=', $idSolicitud)->first();
        $idHoja = $hoja->id_hoja_resumen;
        $hojaF = HojaResumenFinal::where('id_hoja_resumen', '=', $idHoja)->first();

        $arrPdfs = [];
        $arrPdfs[] = $hojaF->nota_admin_central->url_pdf_nota_admin_central;
        $arrPdfs[] = $hoja->url_hoja_unida;

        $pdf = new PdfMerge();
        foreach ($arrPdfs as $unaRutaPdf) {
            $pdf->add(storage_path() . '/app' . '/' . $unaRutaPdf, 'all');
        }

        $nombrePdf = 'hojaUnidaFinalSinFirma' . $idSolicitud . '.pdf';
        $pdf->merge(storage_path() . '/app/id-solicitud-' . $idSolicitud . '/' . $nombrePdf);

        $ruta = 'id-solicitud-' . $idSolicitud . '/' . $nombrePdf;

        return $ruta;
    }



    /**
     * Lista de todas las Notas de administracion Central
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*  
        $datosNotaAdminCentral = NotaAdminCentral::get();
        return view('notaAdminCentral.index')->with('datosNotaAdminCentral', $datosNotaAdminCentral);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'url_pdf_nota_admin_central' => 'required',
        ]);     
        
        NotaAdminCentral::create($request->all());

        return redirect()->route('notaAmincentral.index')->with('exito', 'Nota creada con exito!!.');
      */
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        return view('notaAdminCentral.create');*/
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id_nota_admin_central
     * @return \Illuminate\Http\Response
     */
    public function show($id_nota_admin_central)
    {
        /* 
        $notaAdminCentral = NotaAdminCentral::find($id_nota_admin_central);
        return view('notaAdminCentral.show')->with('notaAdminCentral', $notaAdminCentral);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_nota_admin_central
     * @return \Illuminate\Http\Response
     */
    public function edit($id_nota_admin_central)
    {
        /*  
        $notaAdminCentral = NotaAdminCentral::findOrFail($id_nota_admin_central);
        return view('notaAdminCentral.edit')->with('notaAdminCentral', $notaAdminCentral);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_nota_admin_central
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_nota_admin_central)
    {
        /* 
        $notaAdminCentral = NotaAdminCentral::find($id_nota_admin_central);
        $notaAdminCentral->update($request->all());

        return redirect()->route('notaAdminCentral.index')->with('sms', 'Nota Admin Central actualizada con exito!!'); */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
