<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\HojaResumen;
use App\Models\HojaResumenFinal;
use App\Models\SolicitudCertProg;
use App\Models\Usuario;
use App\Http\Controllers\Helpers;
use App\Models\Comentario;
use Helpers as GlobalHelpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
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
        /* $lista = array();
        $estadosFaltaFirma = DB::table('estado')->where('idEstadoDescripcion', '1')->get();
        foreach ($estadosFaltaFirma as $estado) {
            $solicitud = SolicitudCertProg::find($estado->idSolicitud);
            array_push($lista, $solicitud);
        }
        $datos['lista'] = $lista; */
        $estadosSolicitud = DB::table('estado')
            ->join('solicitud_cert_prog', 'estado.id_solicitud', '=', 'solicitud_cert_prog.id_solicitud')
            ->join('usuario', 'solicitud_cert_prog.id_usuario_estudiante', '=', 'usuario.id_usuario')
            ->where('id_estado_descripcion', '1')->get();

        $datos['lista'] = $estadosSolicitud;
        /* ddd($estadosSolicitud); */
        /*  +"id_estado": 1
            +"id_solicitud": 3
            +"id_estado_descripcion": 1
            +"created_at": null
            +"updated_at": null
            +"id_usuario_estudiante": 1
            +"id_user_u": 2
            +"id_usuario": 1
            +"nombre": "Maximiliano"
            +"apellido": "Villalba"
            +"legajo": "FAI-460"
            +"email": "maxi@gmail.com" */
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
        $hojaResumen = DB::table('hoja_resumen')
            ->join('hoja_resumen_final', 'hoja_resumen.id_hoja_resumen', '=', 'hoja_resumen_final.id_hoja_resumen_final')
            ->where('id_solicitud', $id)
            ->get()['0'];

        if ($hojaResumen->url_pdf_hoja_unida_final == null) {
            $path = $hojaResumen->url_pdf_hoja_unida_sinfirmar;
        } else {
            $path = $hojaResumen->url_pdf_hoja_unida_final;
        }

        $pathFile = storage_path('app/public/' . $path);
        header("Cache-Control: no-cache, must-revalidate");
        return response()->file($pathFile);
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

    public function cargarComentario(Request $request, $idSolicitud)
    {
        $archivo = $request->all();
        $nuevoComentario = $archivo['comentarioSolicitud'];
        $comentario = new Comentario();
        $comentario->descripcion = $nuevoComentario;
        $comentario->id_solicitud = $idSolicitud;
        $comentario->id_usuario = 2;

        $comentario->save();

        return redirect()->route('archivos.index');
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