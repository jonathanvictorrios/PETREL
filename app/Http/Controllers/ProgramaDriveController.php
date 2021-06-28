<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramaDriveRequest;
use App\Models\CarpetaCarrera;
use App\Models\ProgramaDrive;
use App\Models\SolicitudCertProg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramaDriveController extends Controller
{
    /**
     * a traves del formulario leemos los campos y agregamos el nuevo programa
     * verificamos si existen ambas carpetas y luego subimos el programa
     * @param StoreProgramaDriveRequest
     * @return view programa.show
     */
    public function store(Request $request)
    {
        $carpetaCarrera = CarpetaCarrera::find($request->idCarpetaCarrera);
        $colProgramas = $carpetaCarrera->programa_drive;
        $i = 0;
        $programaEncontrado = false;
        while ($i < count($colProgramas) && !$programaEncontrado) {
            $programaEncontrado = (strcasecmp($colProgramas[$i]->nombre_programa, $request->nombrePrograma) == 0);
            $i++;
        }
        if (!$programaEncontrado) {
            $nombre = $request->nombrePrograma . '.pdf';
            $guardadoDrive = $request->file('pdfPrograma')->storeAs(
                $carpetaCarrera->url_carrera, //donde se guarda
                $request->numeroPrograma . '-' . $nombre, //nombre con el que se guarda
                'google'
            );
            if ($guardadoDrive) {
                $colArchivos = Storage::disk('google')->files($carpetaCarrera->url_carrera);
                $i = 0;
                $encontrado = false;
                while ($i < count($colArchivos) && !$encontrado) {
                    $encontrado = Storage::disk('google')->getMetadata($colArchivos[$i])['name'] == $nombre;
                    $i++;
                }
                $urlPrograma = substr(strrchr($colArchivos[($i - 1)], '/'), 1);
                $programa = ProgramaDrive::create([
                    'id_carpeta_carrera' => $carpetaCarrera->id_carpeta_carrera,
                    'nombre_programa' => $nombre,
                    'numero_programa' => $request->numeroPrograma,
                    'url_programa' => $urlPrograma,
                ]);
                return view('carpetaCarrera.listarProgramas')->with('carpetaCarrera', $programa->carpeta_carrera);
            } else {
                echo "no se guardo en drive";
            }
        } else {
            echo "ya existe";
        }
    }

    /**
     * Buscamos con el id el programa y mostramos todos los atributos del programa
     * @param int $idPrograma
     * @return view programa.show
     *
     * public function show($idPrograma)
     * {
     *     $programa = ProgramaDrive::find($idPrograma);
     *     return view('programaDrive.show')->with('programa',$programa);
     * } */

    /**
     * leemos el id del programa para agregar los nuevos datos sobre el mismo
     * @param int $idPrograma
     * @return view programaDrive.show
     */
    public function update(Request $request)
    {
        $programa = ProgramaDrive::find($request->id_programa);
        $programa->update([
            'nombre_programa' => $request->nombre,
            'numero_programa' => $request->numero
        ]);
        return view('carpetaCarrera.listarProgramas')->with('carpetaCarrera', $programa->carpeta_carrera);
    }

    /**
     * Realizamos el borrado logico sobre el programa de nuestra base de datos
     * sigue existiendo en GoogleDrive
     * @param Request $idPrograma
     * @return view programaDrive.index
     */
    public function destroy(Request $idPrograma)
    {
        echo "borrado logico del programa";
    }

    /**
     * solo derivamos al formulario para que pueda actualizar los datos del programa
     * @param int $idPrograma
     * @return view programaDrive.edit
     */
    public function edit($idPrograma)
    {
        $programa = ProgramaDrive::find($idPrograma);
        return view('programaDrive.edit')->with('programa', $programa);
    }

    /**
     * Buscamos los programas de las materias aprobadas por el solicitante
     * @param int $idRendimientoAcademico
     * @return view programaLocal.create
     */
    public function buscarProgramas($idSolicitud)
    {
        $objSolicitud = SolicitudCertProg::find($idSolicitud);
        $carreraSolicitud = $objSolicitud->carrera->carrera;
        $nombreJson = 'id-solicitud-' . $idSolicitud . '/rendimientoAcademico' . $idSolicitud . '.json';
        $arregloRendimiento = json_decode(file_get_contents(storage_path('/app/' . $nombreJson)), true);
        $materias = $arregloRendimiento['Materias'];
        $colProgramasEncontrados = [];
        $colProgramasSugerencias = [];
        $colProgramasNoEncontrados = [];
        foreach ($materias as $programa) {
            //datos para comparar
            $nombreMateria = $programa['Materia'] . '.pdf';
            $nombreMateria = ucwords(mb_strtolower($nombreMateria));
            $anioMateriaAprobada = (int) ($programa['AnioMateria']);
            $objProgramas = ProgramaDrive::where('nombre_programa', 'like', $nombreMateria)->get();
            if (count($objProgramas) > 0) {
                //al menos encontro 1 programa
                if (count($objProgramas) > 1) {
                    //encontro 2 o mas programas
                    $j = 0;
                    $materiaEncontrada = false;
                    $tempColSugerencias = [];
                    while ($j < count($objProgramas) && !$materiaEncontrada) {
                        //$materiaEncontrada = $objProgramas[$j]->carpeta_carrera->carpeta_anio->numero_anio == $anioMateriaAprobada;
                        $materiaEncontrada = $objProgramas[$j]->carpeta_carrera->carrera->carrera == $carreraSolicitud;
                        if ($materiaEncontrada && $objProgramas[$j]->carpeta_carrera->carpeta_anio->numero_anio == $anioMateriaAprobada) {
                            //la carrera y año coinciden, es un programa encontrado
                            $colProgramasEncontrados[] = $objProgramas[$j];
                        } elseif ($materiaEncontrada) {
                            $tempColSugerencias[] = $objProgramas[$j];
                            $materiaEncontrada = false;
                        }
                        $j++;
                    }
                    if (!$materiaEncontrada) {
                        if (count($tempColSugerencias) > 0) {
                            $colProgramasSugerencias[] = $tempColSugerencias;
                        } else {
                            $nombreMateria = explode('.', $nombreMateria)[0];
                            $colProgramasNoEncontrados[] = ['Programa' => $nombreMateria, 'Anio' => $anioMateriaAprobada];
                        }
                    }
                } else {
                    if ($objProgramas[0]->carpeta_carrera->carrera->carrera == $carreraSolicitud) {
                        if ($objProgramas[0]->carpeta_carrera->carpeta_anio->numero_anio == $anioMateriaAprobada) {
                            //encontro el programa que pertenece a la carrera y anio al mismo tiempo
                            $colProgramasEncontrados[] = $objProgramas[0];
                        } else {
                            //encontro el programa de la carrera pero no coindice con el año
                            $colProgramasSugerencias[] = [$objProgramas[0]];
                        }
                    } else {
                        //un programa encontrado por el nombre pero no pertenece a la misma carrera
                        $nombreMateria = explode('.', $nombreMateria)[0];
                        $colProgramasNoEncontrados[] = ['Programa' => $nombreMateria, 'Anio' => $anioMateriaAprobada];
                    }
                }
            } else {
                //no se encontro ningun programa para ese nombre
                $nombreMateria = explode('.', $nombreMateria)[0];
                $colProgramasNoEncontrados[] = ['Programa' => $nombreMateria, 'Anio' => $anioMateriaAprobada];
            }
        }
        $objSolicitud=SolicitudCertProg::find($idSolicitud);
        $faltanProgramas = count($colProgramasNoEncontrados)>0;
        return view('programaLocal.create',['solicitud'=>$objSolicitud,'colProgramasEncontrados'=>$colProgramasEncontrados,'colProgramasSugerencias'=>$colProgramasSugerencias,'colProgramasNoEncontrados'=>$colProgramasNoEncontrados,'faltaProgramas'=>$faltanProgramas]);
    }
}