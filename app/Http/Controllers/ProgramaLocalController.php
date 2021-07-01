<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramaLocal;
use App\Models\HojaResumen;
use Illuminate\Support\Facades\Storage;
use Karriere\PdfMerge\PdfMerge;

class ProgramaLocalController extends Controller
{
    /**
     * Recibimos las url's de la seleccion de programas que desea dto_alumno y
     * lo vamos a recuperar desde el almacenamiento de GoogleDrive a nuestro local
     * @param Request $request
     * @return view pdf generado por la seleccion
     */
    public function store(Request $request)
    {
        $urlLocales=[];
        $i=0;
        foreach($request->urls as $urlPdfGoogle){
            $archivo = Storage::disk('google')->get($urlPdfGoogle);//tenemos el pdf
            $urlLocales[]="temp".$i.".pdf";
            Storage::disk('local')->put('id-solicitud-'.$request->idSolicitud.'/temp/temp'.$i.'.pdf',$archivo);
            //guarda en storage/app
            $i++;
        }
        $rutaArchivoUnico = $this->realizarUnion($urlLocales,$request->idSolicitud);
        $unPrograma=new ProgramaLocal();
        $unPrograma->url_programas=$rutaArchivoUnico;
        $unPrograma->save();

        //Se agrega id_programa_local a la hoja resumen
        $unaHojaResumen=new HojaResumen();
        $hojaResumenEncontrada=$unaHojaResumen::where('id_solicitud',$request->idSolicitud)->get()[0];
        $hojaResumenEncontrada->id_programa_local=$unPrograma->id_programa_local;
        $hojaResumenEncontrada->save();
        //----------------------------------------//
        return Storage::download('id-solicitud-'.$request->idSolicitud.'/unionProgramas'.$request->idSolicitud.'.pdf');
    }

    /**
     * Recibiendo una coleccion de las rutas locales, vamos a generar
     * un unico pdf de los programas mencionados en la coleccion
     * @param array $rutasLocales
     * @return boolean mencionamos el resultado
     */
    private function realizarUnion($rutasLocales,$nroSolicitud)
    {
        $pdf = new PdfMerge();
        foreach($rutasLocales as $ruta){
            $pdf->add(storage_path().'/app/id-solicitud-'.$nroSolicitud.'/temp/'.$ruta,'all');
        }
        $nombre = 'unionProgramas'.$nroSolicitud.'.pdf';
        $pdf->merge(storage_path().'/app/id-solicitud-'.$nroSolicitud.'/'.$nombre);
        $this->eliminarArchivos($rutasLocales,$nroSolicitud);
        return 'id-solicitud-'.$nroSolicitud.'/'.$nombre;
    }

    /**
     * ya lograda la union de pdf's borramos los archivos
     * descargados en el local
     * @param array $rutas
     * @return boolean
     */
    private function eliminarArchivos($rutas,$idSolicitud)
    {
        foreach($rutas as $ruta){
            Storage::disk('local')->delete('id-solicitud-'.$idSolicitud.'/temp/'.$ruta);
        }
    }
}