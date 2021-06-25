<?php

namespace App\Http\Controllers;

use App\Models\HojaResumen;
use App\Models\PlanEstudio;
use App\Models\SolicitudCertProg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PlanEstudioController extends Controller
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
    public function crearPlan($id_solicitud)
    {
        # Generar el link de Ranquel
        $rendimientoAcademico = json_decode(file_get_contents(
            storage_path("app/id-solicitud-$id_solicitud/rendimientoAcademico$id_solicitud.json")
        ));

        // Ordenanza original
        if (isset($rendimientoAcademico->Plan->Anio)) $plan_anio = $rendimientoAcademico->Plan->Anio;
        if (isset($rendimientoAcademico->Plan->Nro)) $plan_nro = $rendimientoAcademico->Plan->Nro;
        // Ordenanza modificada
        if (isset($rendimientoAcademico->Plan->AnioMod)) $plan_anio_mod = $rendimientoAcademico->Plan->AnioMod;
        if (isset($rendimientoAcademico->Plan->ModOrd)) $plan_nro_mod = $rendimientoAcademico->Plan->ModOrd;

        $urlRanquel = [
            "https://ranquel.uncoma.edu.ar/archivos/ord_$plan_nro" . "_20$plan_anio" . "_23.pdf",
            "https://ranquel.uncoma.edu.ar/archivos/ord_$plan_nro_mod" . "_$plan_anio_mod" . "_47.pdf"
        ];
        $objSolicitud = SolicitudCertProg::find($id_solicitud);
        # Mostrar
        return view('planEstudio.create', [
            'solicitud' => $objSolicitud,
            'url_ranquel' => $urlRanquel,
            'plan_anio' => $plan_anio,
            'plan_anio_mod' => $plan_anio_mod,
            'plan_nro' => $plan_nro,
            'plan_nro_mod' => $plan_nro_mod,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        # checkear si la url es válida
        foreach($request->urlRanquel as $i => $url) {
            if ($url != '' || $url != null) {
                $file_headers = @get_headers($url);
                if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    return back()->withErrors(["La url proporcionada N°$i no es válida"]);
                }
            }
        }

        # guardar archivo de forma local
        foreach($request->urlRanquel as $i => $url) {
            if ($url != '' || $url != null) {
                $nombreArchivo = "id-solicitud-$request->id_solicitud/planEstudio"."-"."$request->id_solicitud"."-$i.pdf";
                $contenido     = file_get_contents($url);
                Storage::put($nombreArchivo, $contenido);
            }
        }

        # Guardar Planes en la Base de Datos
        $arregloIdPlanes = array();
        foreach($request->urlRanquel as $url) {
            if ($url != '' || $url != null) {
                # Verificar si existe un registro para la url dada
                $planEstudio = PlanEstudio::where('url_pdf_plan_estudio', '=', $url)->first();
                if ($planEstudio === null) {
                    // si no existe
                    $planEstudio = PlanEstudio::create(['url_pdf_plan_estudio' => $url]);
                }
                array_push($arregloIdPlanes, $planEstudio->id_plan_estudio);
            }
        }

        # Actualizar tabla "hoja_resumen"
        $hojaResumen = HojaResumen::where('id_solicitud', '=', $request->id_solicitud)->firstOrFail();

        # Agregar asociacion entre los Planes y la HojaResumen
        foreach($arregloIdPlanes as $idPlan) {
            DB::table('hoja_resumen_plan_estudio')->insert([
                'id_hoja' => $hojaResumen->id_hoja_resumen,
                'id_plan' => $idPlan,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        
        # Siguiente paso
        return redirect()->back()->withSuccess('La información se guardo correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function show(PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlanEstudio $planEstudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanEstudio  $planEstudio
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanEstudio $planEstudio)
    {
        //
    }
}