<?php

namespace App\Http\Controllers;

use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;
use App\Models\RendimientoAcademico;
use App\Models\HojaResumen;
use App\Models\SolicitudCertProg;
use Illuminate\Http\Request;
use PDF;

class RendimientoAcademicoController extends Controller
{
    /**
     * esta ocasion no hay crud de rendimiento academico, 
     */
    public function index(){
        return view('rendimientoAcademico.create');
    }

    /**
     * se realiza la confirmacion de generar el pdf del rendimiento academico
     * y lo guardamos en storage/app junto a la base de datos
     * @param Request $request
     * @return view 
     */
    public function store(Request $request){
        $arregloRendimiento = json_decode(file_get_contents($request->rutaArchivo),true);
        $pdf = PDF::loadView('rendimientoAcademico.exportarPdf',compact('arregloRendimiento'));
        $contenido = $pdf->download()->getOriginalContent();
        $nombreRendimiendoPdf = 'rendimientoAcademico'.$request->idSolicitud.'.pdf';
        Storage::disk('local')->put('id-solicitud-'.$request->idSolicitud.'/'.$nombreRendimiendoPdf,$contenido);
        $unRendAcadem=new RendimientoAcademico();
        $unRendAcadem->url_rendimiento_academico='id-solicitud-'.$request->idSolicitud.'/'.$nombreRendimiendoPdf;
        $unRendAcadem->save();
        
        //Se agrega el id_rendimiento_academico a la hoja resumen
        $unaHojaResumen=new HojaResumen();
        $hojaResumenEncontrada=$unaHojaResumen::where('id_solicitud',$request->idSolicitud)->get()[0];
        $hojaResumenEncontrada->id_rendimiento_academico=$unRendAcadem->id_rendimiento_academico;
        $hojaResumenEncontrada->save();
        //

        //return redirect('buscarProgramas/'.$request->idSolicitud);
        return $pdf->download($nombreRendimiendoPdf);
    }

    /**
     * Se encarga de tomar el excel del administrativo y mostrarle una
     * vista previa de como quedaria el rendimiento academico
     * @param Request $request
     * @return view vistaPreviaPdf
     */
    public function convertirExcel(Request $request){
        Storage::makeDirectory('id-solicitud-'.$request->idSolicitud);
        $archivo = $request->file('excel');//tomamos excel
        $carpetaStorageApp = storage_path('/app/').'id-solicitud-'.$request->idSolicitud;//tomamos id solicitud unico
        $this->convertirACsv($archivo,$carpetaStorageApp);
        $nombreJson = $this->convertirArreglo($carpetaStorageApp);
        $objSolicitud=SolicitudCertProg::find($request->idSolicitud);
        return view('rendimientoAcademico.show',['solicitud'=>$objSolicitud])->with('rutaArchivo',$carpetaStorageApp.'/'.$nombreJson);
    }
    
    /**
     * La funcion crea un CSV a partir del excel entregado por dto de alumnos
     * guardamos ese CSV en storage/app/ con la idsolicitud unica
     * @param File $file excel del rendimientoAcademico
     * @param int $nro idSolicitud
     */
    private function convertirACsv($file,$ruta)
    {
        $nroSolicitud = (explode('-',$ruta))[2];
        $spreadsheet = IOFactory::load($file);
        $loadedSheetNames = $spreadsheet->getSheetNames();
        $writer = new Csv($spreadsheet);
        //seteamos cual es el separador para los miles , cuando encuentra un punto supone que es un numero mil
        //y no lo separa en celdas
        \PhpOffice\PhpSpreadsheet\Shared\StringHelper::setThousandsSeparator('.');
        foreach ($loadedSheetNames as $sheetIndex => $loadedSheetName) {
            $writer->setSheetIndex($sheetIndex);
            //setEnclosure es para encerrar el dato , aca indico que lo encierre con nada :D
            $writer->setEnclosure('');
            $writer->save($ruta.'/rendimientoAcademico'.$nroSolicitud.'.csv');
        }
    }

    /**
     * obtenemos el nombre del CSV a convertir array y luego archivo Json
     * este sera guardado en storage/app
     * para obtenerlo desde cualquier instancia
     * @param string $nombreArchivoCsv
     * @return string $nombreJson
     */
    private function convertirArreglo($ruta)
    {
        $nroSolicitud = (explode('-',$ruta)[2]);
        $lineas = file($ruta.'/rendimientoAcademico'.$nroSolicitud.'.csv');
        $array = array_map('str_getcsv', $lineas);
        $i = 0;
        $terminoRecorrido = false;
        $encontroInfo = false;
        $terminoIntroduccion = false;
        //$arrayResultante Es el array que voy a devolver con todos los datos
        $arrayResultante = array(
            "UA" => array(),
            "Alumno" => array(),
            "Documento" => array(),
            "Carrera" => "",
            "Plan" => array(),
            "Materias" => array(),
            "Promedio" => "",
            "FechaIngresoCarrera" => "",
            "Lugar" => "",
            "FechaEmision" => "",
            "Firmante"=>array("Nombre"=>"","Apellido"=>""),
            "Secretaria"=>false,
        );
        // Mariela agrego Universidad Nacional del Comahue y Facultad de Informatica
        $arrayUA = array(
            "Universidad" => "Universidad Nacional del Comahue",
            "Facultad" => "Facultad de Informatica"
        );
        $arrayAlumno = array(
            "Nombre" => "",
            "Apellido" => "",
            "Legajo" => ""
        );
        $arrayDocumento = array(
            "Tipo" => "",
            "Nro" => ""
        );
        $arrayPlan = array(
            "Nro" => "",
            "Anio" => "",
            "ModOrd" => "",
            "AnioMod" => ""
        );
        $arrayMateria = array(
            'Anio' => "",
            'Materia' => "",
            'Fecha' => "",
            'Nota' => "",
            'CondicionAprobacion' => "",
            "NroMateria" => "",
            "AnioMateria" => ""
        );
        while ($i < count($array) && $terminoRecorrido == false) {
            if ($array[$i][0] == "compute_0001") {
                $encontroInfo = true;
                $i++;
            }
            if ($encontroInfo && $array[$i][0] != "") {
                //----------------Llenamos datos introductorios--------------------//
                if ($terminoIntroduccion == false) {
                    //Mariela comento esto xq lo puse arriba
                    // $arrayUA["Facultad"] = $array[$i][0];
                    $arrayAlumno["Apellido"] = $array[$i][1];
                    $arrayAlumno["Nombre"] = $array[$i][2];
                    $arrayDocumento["Tipo"] = $array[$i][3];
                    $arrayDocumento["Nro"] = $array[$i][4];
                    $arrayAlumno["Legajo"] = $array[$i][5];
                    $arrayResultante["Carrera"] = $array[$i][6];

                    preg_match_all('!\d+!', $array[$i][7], $arrayDatosPlan);
                    $arrayPlan["Nro"] = $arrayDatosPlan[0][0];
                    $arrayPlan["Anio"] = $arrayDatosPlan[0][1];
                    
                    preg_match_all('!\d+!', $array[$i][8], $arrayDatosModificacionPlan);
                    $arrayPlan["ModOrd"] = $arrayDatosModificacionPlan[0][0];
                    $arrayPlan["AnioMod"] = $arrayDatosModificacionPlan[0][1];

                    $arrayResultante["Promedio"] = $array[$i][14];
                    $arrayResultante["FechaIngresoCarrera"] = $array[$i][15];

                    $arrayResultante["Lugar"] = $array[$i][16];
                    $arrayResultante["FechaEmision"] = $array[$i][17];
                    $terminoIntroduccion = true;
                    $i--;
                }
                else {
                    //------------------Llenamos Datos Materias Aprobadas-----------------------//
                    $notaMateria = $array[$i][12];
                    if (is_numeric($notaMateria) && $notaMateria >= 4) {
                        preg_match_all('!\d+!', $array[$i][11], $arrayDatosFecha);
                        $anioMateria = $arrayDatosFecha[0][2];
                        $arrayMateria = array(
                            'Anio' => rtrim($array[$i][9]),
                            'Materia' => $array[$i][10],
                            'Fecha' => $array[$i][11],
                            'Nota' => $array[$i][12],
                            'CondicionAprobacion' => $array[$i][18],
                            'NroMateria' => $array[$i][19],
                            'AnioMateria' => $anioMateria
                        );
                        array_push($arrayResultante["Materias"], $arrayMateria);
                    }
                    //---------------------------------------------------------------------//
                }
            } else {
                $terminoRecorrido = true;
            }
            $i++;
        }
        $arrayResultante["UA"] = $arrayUA;
        $arrayResultante["Alumno"] = $arrayAlumno;
        $arrayResultante["Documento"] = $arrayDocumento;
        $arrayResultante["Plan"] = $arrayPlan;
        $nombreJson ='rendimientoAcademico'.$nroSolicitud.'.json';
        Storage::disk('local')->put('id-solicitud-'.$nroSolicitud.'/'.$nombreJson,json_encode($arrayResultante));
        return $nombreJson;   
    }
}