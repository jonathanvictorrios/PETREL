<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Models\EstadoDescripcion;
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
        $solicitudes = SolicitudCertProg::all();
        return view('archivos.index', compact('solicitudes'));
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
        $hojaResumenFinal = HojaResumenFinal::where('id_hoja_resumen', $idHojaResumen)->get()[0];

        if ($request->hasFile('archivo')) {
            $ubicacion = 'id-solicitud-' . $archivo['idSolicitud'];
            $nombreArchivo = 'hoja_unida_final_firmada' . $archivo['idSolicitud'] . '.pdf';
            $hojaResumenFinal->url_hoja_unida_final = $request->file('archivo')->storeAs($ubicacion, $nombreArchivo, 'local');
        }

        $hojaResumenFinal->save();

        $hojaResumenFinal->save();

        if ($hojaResumenFinal->save()) {
            $mensaje = 'Archivo cargado';
        } else {
            $mensaje = 'Ha ocurrido un error';
        }
        return redirect()->route('archivos.index')->with('mensaje', $mensaje);
    }

    /**
     * DEPRECADO POR NO TENER LOS ASUNTOS DE SEGURIDAD IMPLEMENTADOS
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

    public function downloadSinFirma($id)
    {
        $path = SolicitudCertProg::find($id)->hojaResumen->hoja_resumen_final->url_hoja_unida_final_sin_firma;

        $pathFile = storage_path('app/' . $path);
        header("Cache-Control: no-cache, must-revalidate");
        return response()->download($pathFile);
    }

    public function downloadFirmado($id)
    {
        $path = SolicitudCertProg::find($id)->hojaResumen->hoja_resumen_final->url_hoja_unida_final;

        $pathFile = storage_path('app/' . $path);
        header("Cache-Control: no-cache, must-revalidate");
        return response()->download($pathFile);
    }

    public function cargarComentario(Request $request, $idSolicitud)
    {

        $estado = DB::table('estado')
            ->join('solicitud_cert_prog', 'estado.id_solicitud', '=', 'solicitud_cert_prog.id_solicitud')
            ->where('estado.id_solicitud', $idSolicitud)
            ->get()['0'];


        $estadoDescripcionNuevo = $estado->id_estado_descripcion + 1; /* Estp debe cambiarse a -1 ya que se retrocede el estado */

        $estadoNuevo = DB::table('estado')
            ->where('id_solicitud', $idSolicitud)
            ->update(['id_estado_descripcion' => $estadoDescripcionNuevo]);

        $modalComentario = $request->all();
        $nuevoComentario = $modalComentario['comentarioSolicitud'];
        $comentario = new Comentario();
        $comentario->descripcion = $nuevoComentario;
        $comentario->id_solicitud = $idSolicitud;
        $comentario->id_usuario = 2;

        if ($comentario->save() && $estadoNuevo) {
            $mensaje = 'Solicitud retornada';
        } else {
            $mensaje = 'ha ocurrido un error';
        }

        return redirect()->route('archivos.index')->with('mensaje', $mensaje);
    }

    public function confirmarContrasenia(Request $request, $idSolicitud)
    {
        $contraseniaIngresada = $request->all();
        $confirmacionContrasenia = DB::table('usuario')
            ->where('password', $contraseniaIngresada['password'])
            ->get();

        if (count($confirmacionContrasenia) == 1) {
            $estado = DB::table('estado')
                ->where('estado.id_solicitud', $idSolicitud)
                ->get()['0'];

            $estadoDescripcionNuevo = $estado->id_estado_descripcion + 1; /* Estp debe cambiarse a -1 ya que se retrocede el estado */

            $estadoNuevo = DB::table('estado')
                ->where('id_solicitud', $idSolicitud)
                ->update(['id_estado_descripcion' => $estadoDescripcionNuevo]);

            if ($estadoNuevo) {
                $mensaje = 'Solicitud aprobada';
            } else {
                $mensaje = 'ha ocurrido un error';
            }
        } else {
            ddd('no es igual');
            $mensaje = 'ha ocurrido un error';
        }

        return redirect()->route('archivos.index')->with('mensaje', $mensaje);
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