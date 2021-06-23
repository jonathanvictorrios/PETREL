<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramaLocal;
use Illuminate\Support\Facades\Storage;
use Karriere\PdfMerge\PdfMerge;

class ProgramaLocalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $programasLocales = ProgramaLocal::get();
    //     return view('programaLocal.index')->with('colProgramasLocales',$programasLocales);
    // }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programaLocal.create');
    }

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
        return view('programaLocal.show',['idSolicitud'=>$request->idSolicitud])->with('programaLocal',$unPrograma);
        //return redirect('programaLocal/',$unPrograma->id_programa_local);
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_programa_local)
    {     
        $progLocal = ProgramaLocal::find($id_programa_local);
        return view('programaLocal.show')->with('programaLocal', $progLocal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_programa_local)
    {
        $progLocal=ProgramaLocal::findOrFail($id_programa_local);   
        return view('programaLocal.edit')->with('programaLocal', $progLocal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_programa_local)
    {
        $progLocal = ProgramaLocal::find($id_programa_local);
        $progLocal->update($request->all());
        return view('programaLocal.show')->with('programaLocal', $progLocal);
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_programa_local)
    {
        $progLocal=ProgramaLocal::find($id_programa_local);
        $progLocal->delete();
        return view('programaLocal.index');
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