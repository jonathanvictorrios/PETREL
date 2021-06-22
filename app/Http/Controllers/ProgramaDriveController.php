<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProgramaDriveRequest;
use App\Models\CarpetaCarrera;
use App\Models\ProgramaDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramaDriveController extends Controller
{
    /**
     * Leemos todos los programas que existan en nuestra base de datos
     * @return view programaDrive.index
     *
     * public function index(){
     *      $programas = ProgramaDrive::get();
     *      return view('programaDrive.index')->with('colProgramas',$programas);
     * } */

    /**
     * a traves del formulario leemos los campos y agregamos el nuevo programa
     * verificamos si existen ambas carpetas y luego subimos el programa
     * @param Request
     * @return view programa.show
     */
    public function store(StoreProgramaDriveRequest $request)
    {
        $carpetaCarrera = CarpetaCarrera::find($request->idCarpetaCarrera);
        $colProgramas = $carpetaCarrera->programa_drive;
        $i=0;
        $programaEncontrado = false;
        while($i<count($colProgramas) && !$programaEncontrado){
            $programaEncontrado= (strcasecmp($colProgramas[$i]->nombre_programa,$request->nombrePrograma)==0);
            $i++;
        }
        if(!$programaEncontrado){
            $nombre = $request->numeroPrograma.'-'.$request->nombrePrograma;
            $guardadoDrive = $request->file('pdfPrograma')->storeAs(
                $carpetaCarrera->url_carrera,//donde se guarda
                $nombre,//nombre con el que se guarda
                'google'
            );
            if($guardadoDrive){
                sleep(5);
                $colArchivos = Storage::disk('google')->files($carpetaCarrera->url_carrera);
                $i=0;
                $encontrado = false;
                while($i<count($colArchivos) && !$encontrado){
                    $encontrado = Storage::disk('google')->getMetadata($colArchivos[$i])['name']==$nombre;
                    $i++;
                }
                $urlPrograma = substr(strrchr($colArchivos[($i-1)],'/'),1);
                $programa = ProgramaDrive::create([
                    'id_carpeta_carrera' => $carpetaCarrera->id_carpeta_carrera,
                    'nombre_programa' => $request->nombrePrograma,
                    'numero_programa' => $request->numeroPrograma,
                    'url_programa' => $urlPrograma,
                ]);
                return view('programaDrive.show')->with('programaDrive',$programa);
            }else{
                echo "no se guardo en drive";
            }
        }else{
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
    public function update(Request $request){
        $programa = ProgramaDrive::find($request->id_programa);
        $programa->update([
            'nombre_programa'=>$request->nombre,
            'numero_programa'=>$request->numero
        ]);
        return view('carpetaCarrera.listarProgramas')->with('carpetaCarrera',$programa->carpeta_carrera);
    }

    /**
     * Realizamos el borrado logico sobre el programa de nuestra base de datos
     * sigue existiendo en GoogleDrive
     * @param Request $idPrograma
     * @return view programaDrive.index
     */
    public function destroy(Request $idPrograma){
        echo "borrado logico del programa";
    }

    /**
     * solo derivamos al formulario para que pueda actualizar los datos del programa
     * @param int $idPrograma
     * @return view programaDrive.edit
     */
    public function edit($idPrograma){
        $programa = ProgramaDrive::find($idPrograma);
        return view('programaDrive.edit')->with('programa',$programa);
    }

    /**
     * Buscamos los programas de las materias aprobadas por el solicitante
     * @param int $idRendimientoAcademico
     * @return view programaLocal.cargarProgramas
     */
    public function buscarProgramas($idSolicitud){
        $nombreJson = 'id-solicitud-'.$idSolicitud.'/rendimientoAcademico'.$idSolicitud.'.json';
        $arregloRendimiento =json_decode(file_get_contents(storage_path('/app/'.$nombreJson)),true);
        $materias = $arregloRendimiento['Materias'];
        $colProgramas = [];
        foreach($materias as $programa){
            $numeroMateria = (int)$programa['NroMateria'];
            $nombreMateria = $programa['Materia'].'.pdf';
            $objProgramas = ProgramaDrive::where('numero_programa',$numeroMateria)
                ->where('nombre_programa','like',$nombreMateria)
                ->get();
            if(count($objProgramas)>1){
                /*en caso que hayan 2 o mas objetos programas filtramos por carrera
                y por le año a la cual debe pertenecer*/
                $anioMateriaAprobada = $programa['AnioMateria'];
                $carrera = $arregloRendimiento['Carrera'];
                $j=0;
                $materiaEncontrada = false;
                while($j<count($objProgramas) && $materiaEncontrada){
                    $materiaEncontrada =
                    $objProgramas[$j]->carpeta_carrera->carpeta_anio == $anioMateriaAprobada
                    && $objProgramas[$j]->carpeta_carrera->carrera->carrera==$carrera;
                    $j++;
                }
                if($materiaEncontrada){
                    $colProgramas[]=$objProgramas[($j-1)];
                }
            }elseif(count($objProgramas)>0){
                /* Puede ser que sea el unico programa con ese numero y nombre,
                por lo tanto solo guardamos el objeto programa */
                $colProgramas[]=$objProgramas[0];
            }
        }
        return view('programaLocal.create',['idSolicitud'=>$idSolicitud])->with('colProgramas',$colProgramas);
    }
}