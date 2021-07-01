<?php

namespace App\Http\Controllers;

use App\Models\HojaResumen;
use App\Models\NotaDptoAlum;
use App\Models\Estado;
use App\Models\SolicitudCertProg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NotaDptoAlumController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crearNota($id_solicitud)
    {
        $objSolicitud = SolicitudCertProg::find($id_solicitud);
        return view('notaDptoAlum.create', ['solicitud' => $objSolicitud]);
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
        $contenidoNotaDpto['firma_dpto'] = 'VIVIANA PEDRERO';
        Storage::disk('local')->put('id-solicitud-' . $request->id_solicitud . '/contenidoNotaDpto' . $request->id_solicitud . '.json', json_encode($contenidoNotaDpto));
        $objPDF = app('dompdf.wrapper')
            ->loadView('notaDptoAlum.exportar_pdf', [
                'contenido' => $request->contenido,
                'footer' => $request->footer,
                'firma_dpto' => 'VIVIANA PEDRERO'
            ]);
        $directorioPDF = "id-solicitud-$request->id_solicitud/";
        $nombrePDF = "notaDptoAlumno$request->id_solicitud.pdf";

        Storage::put($directorioPDF . $nombrePDF, $objPDF->output());

        # Guardo en Base de Datos
        $idNota = NotaDptoAlum::create([
            'url_nota_dpto_alum' => $directorioPDF . $nombrePDF
        ]);

        HojaResumenController::realizarUnion($request->id_solicitud);
        # Actualizar tabla HojaResumen
        $hojaResumen = HojaResumen::where('id_solicitud', '=', $request->id_solicitud)->firstOrFail();
        $hojaResumen->id_nota_dto_alumno = $idNota->id_nota_dto_alumno;
        $hojaResumen->url_hoja_unida = 'id-solicitud-'.$request->id_solicitud.'/hojaUnida'.$request->id_solicitud.'.pdf';
        $hojaResumen->save();

        $objSolicitud=SolicitudCertProg::find($request->id_solicitud);
        $objSolicitud->id_user_u=3;
        $objSolicitud->save();
        $objSolicituController = new SolicitudCertProgController();
        $objSolicituController->listoParaFirmarSecretariaAcademica($request->id_solicitud,3);
        # Retorno resultado
        return $objPDF->download("nota-generada-$request->id_solicitud.pdf");
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