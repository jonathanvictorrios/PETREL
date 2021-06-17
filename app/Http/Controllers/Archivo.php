<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\HojaResumen;
use App\Models\HojaResumenFinal;
use App\Models\SolicitudCertProg;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Archivo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $solicitudes = Estado::find(1)->solicitudCertProg; */
        $lista = array();
        $estadosFaltaFirma = DB::table('estado')->where('idEstadoDescripcion', '1')->get();
        foreach ($estadosFaltaFirma as $estado) {
            $solicitud = SolicitudCertProg::find($estado->idSolicitud);
            array_push($lista, $solicitud);
        }
        $datos['lista'] = $lista;
        /* ddd($lista); */
        return view('archivos.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Aca habria que agregar al if que no cargue el archivo si no se pudo hacer la consulta por algun motivo */
        $archivo = $request->all();
        $idHojaResumen = HojaResumen::where('id_solicitud', $archivo['idSolicitud'])->get()[0]->id_hoja_resumen;
        $hojaResumenFinal = HojaResumenFinal::where('id_hoja_resumen_final', $idHojaResumen)->get()[0];

        if ($request->hasFile('archivo')) {
            $hojaResumenFinal->url_pdf_hoja_unida_final = $request->file('archivo')->store('archivos', 'public');
        }
        $hojaResumenFinal->id_hoja_resumen_final = 1;
        $hojaResumenFinal->id_firma = 1;
        $hojaResumenFinal->id_nota_central = 1;

        $hojaResumenFinal->save();

        return redirect()->route('archivos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idHojaResumen = HojaResumen::where('id_solicitud', $id)->get()[0]->id_hoja_resumen;
        $path = HojaResumenFinal::where('id_hoja_resumen_final', $idHojaResumen)->get()[0]->url_pdf_hoja_unida_final;
        if ($path == null) {
            $path = HojaResumenFinal::where('id_hoja_resumen_final', $idHojaResumen)->get()[0]->url_pdf_hoja_unida_sinfirmar;
        }

        /* ddd($path); */
        $pathFile = storage_path('app/public/' . $path);
        $headers = ['Content-Type: application/pdf'];
        return response()->file($pathFile, $headers);
    }

    public function download($id)
    {
        $idHojaResumen = HojaResumen::where('id_solicitud', $id)->get()[0]->id_hoja_resumen;
        $path = HojaResumenFinal::where('id_hoja_resumen_final', $idHojaResumen)->get()[0]->url_pdf_hoja_unida_final;
        if ($path == null) {
            $path = HojaResumenFinal::where('id_hoja_resumen_final', $idHojaResumen)->get()[0]->url_pdf_hoja_unida_sinfirmar;
        }
        $pathFile = storage_path('app/public/' . $path);
        return response()->download($pathFile);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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