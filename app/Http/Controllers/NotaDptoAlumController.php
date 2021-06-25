<?php

namespace App\Http\Controllers;

use App\Models\HojaResumen;
use App\Models\NotaDptoAlum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mockery\Matcher\Not;

class NotaDptoAlumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearNota($id_solicitud)
    {
        return view('notaDptoAlum.create', ['id_solicitud' => $id_solicitud]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # Generar el pdf
        $contenidoNotaDpto = [];
        $contenidoNotaDpto['contenido'] = $request->contenido;
        $contenidoNotaDpto['footer'] = $request->footer;
        Storage::disk('local')->put('id-solicitud-'.$request->id_solicitud.'/contenidoNotaDpto'.$request->id_solicitud.'.json',json_encode($contenidoNotaDpto));
        $objPDF = app('dompdf.wrapper')
                ->loadView('notaDptoAlum.exportar_pdf', [
                    'contenido' => $request->contenido,
                    'footer' => $request->footer
                ]);
        $directorioPDF = "id-solicitud-$request->id_solicitud/";
        $nombrePDF = "notaDptoAlumno$request->id_solicitud.pdf";

        Storage::put($directorioPDF.$nombrePDF, $objPDF->output());

        # Guardo en Base de Datos
        $idNota = NotaDptoAlum::create([
            'url_nota_dpto_alum' => $directorioPDF.$nombrePDF
        ]);

        # Actualizar tabla HojaResumen
        $hojaResumen = HojaResumen::where('id_solicitud', '=', $request->id_solicitud)->firstOrFail();
        $hojaResumen->id_nota_dto_alumno = $idNota->id_nota_dto_alumno;
        $hojaResumen->save();


        # Retorno resultado
        return $objPDF->download("nota-generada-$request->id_solicitud.pdf");
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NotaDptoAlum  $notaDptoAlum
     * @return \Illuminate\Http\Response
     */
    public function edit(NotaDptoAlum $notaDptoAlum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NotaDptoAlum  $notaDptoAlum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NotaDptoAlum $notaDptoAlum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NotaDptoAlum  $notaDptoAlum
     * @return \Illuminate\Http\Response
     */
    public function destroy(NotaDptoAlum $notaDptoAlum)
    {
        //
    }

    /**
     * Verifica si la contraseña provista del formulario es válida para el usuario loggeado
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autorizar(Request $request)
    {
        return ($request->contrasenia != '') ? 'true' : 'false';
    }

    /**
     * Inicia la descarga del pdf nota
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function descargar($id)
    {
        $Nota = NotaDptoAlum::where('id_nota_dto_alumno', '=', $id)->firstOrFail();
        return Storage::download($Nota->url_nota_dpto_alum);
    }


}
