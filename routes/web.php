<?php

use App\Http\Controllers\CarpetaAnioController;
use App\Http\Controllers\CarpetaCarreraController;
use App\Http\Controllers\HojaResumenController;
use App\Http\Controllers\NotaDptoAlumController;
use App\Http\Controllers\PlanEstudioController;
use App\Http\Controllers\ProgramaDriveController;
use App\Http\Controllers\ProgramaLocalController;
use App\Http\Controllers\RendimientoAcademicoController;
use App\Http\Controllers\Archivo;
use App\Http\Controllers\mailPetrelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudCertProgController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\NotaAdminCentralController;
use App\Http\Controllers\HojaResumenFinalController;
use App\Http\Controllers\PruebaSolicitudController;
use App\Mail\mailPetrel;
use App\Mail\mailPetrelFinalizacion;
//en singular
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Vistas configuradas:--------------------------------------------------------
Route::redirect('/', '/home');
Route::view('/home', 'home');
//Route::view('/registro', '/usuario/registro'); //se usa el register de jetstream.
//Route::view('/perfil', '/usuario/perfil');    //desde el menu de modificacion de jetstream.

//nuevas rutas de vistas (lara) 
Route::view('/crearusuario', '/usuario/create')->middleware('can:usuario.create');
Route::view('/verusuario', '/usuario/show')->middleware('can:usuario.show');
Route::view('/borrarusuario', '/usuario/borrar')->middleware('can:usuario.borrar'); 
Route::view('/modificarusuario', '/usuario/modificar')->middleware('can:usuario.modificar'); 

//solicitudes
Route::view('/crearsolicitud', '/solicitud/create');
Route::view('/versolicitud', '/solicitud/show')->middleware('can:solicitud.show'); 
Route::view('/solicitud', '/solicitud/index')->middleware('can:solicitud.index'); //------------------------------ 
Route::view('/asignarsolicitud', '/solicitud/asignar')->middleware('can:solicitud.asignar'); 

//anio
Route::view('/crearanio', '/carpetaAnio/create')->middleware('can:carpetaAnio.create');
Route::view('/modificaranio', '/carpetaAnio/edit')->middleware('can:carpetaAnio.edit');

//carrera
Route::view('/crearcarrera', '/carpetaCarrera/create')->middleware('can:carpetaCarrera.create');
//Route::view('/modificarcarrera', '/carpetaCarrera/edit'); no existe

//programa
Route::view('/crearprograma', '/programaDrive/create')->middleware('can:programaDrive.create');
Route::view('/modificarprograma', '/programaDrive/edit')->middleware('can:programaDrive.edit');


//solicitud - asignar/firma/temrinar //puse el middleware antes del name.
Route::get('solicitud/{idSolicitud}/asignar', [SolicitudCertProgController::class, 'asignar'])->middleware('can:solicitud.asignar')->name('solicitud.asignar');
Route::get('solicitud/{idSolicitud}/listoFirmaDptoAlumno/{idAdministrativo}', [SolicitudCertProgController::class, 'listoParaFirmarDptoAlumno'])->middleware('can:solicitud.firma.dtoalumno')->name('solicitud.listoFirmaDptoAlumno');
Route::get('solicitud/{idSolicitud}/listoFirmaSecretariaAcademica/{idAdministrativo}', [SolicitudCertProgController::class, 'listoParaFirmarSecretariaAcademica'])->middleware('can:solicitud.firma.secretaria')->name('solicitud.listoFirmaSecretariaAcademica');
Route::get('solicitud/{idSolicitud}/listoFirmaSantiago/{idAdministrativo}', [SolicitudCertProgController::class, 'listoParaFirmarSantiago'])->middleware('can:solicitud.firma.santiago')->name('solicitud.listoFirmaSantiago');
Route::get('solicitud/{idSolicitud}/terminar/{idAdministrativo}', [SolicitudCertProgController::class, 'terminar'])->middleware('can:solicitud.terminar')->name('solicitud.terminar');

//***********    H    O    J    A         R    E    S    U    M    E    N    ********/

//CARPETAS DE LOS AÑOS 
Route::resource('carpeta/anio', CarpetaAnioController::class); // -- en el controlador.
Route::get('buscarCarreras/{anio}', [CarpetaAnioController::class, 'buscarCarreras'])->middleware('can:carpetaAnio.listarCarreras')->name('buscarCarreras');
Route::get('crearCarpetaCarrera/{idCarpetaAnio}', [CarpetaAnioController::class, 'crearCarpetaCarrera'])->middleware('can:carpetaAnio.listarCarreras')->name('crearCarpetaCarrera'); //carpetaAnio.create

//CARPETAS DE LAS CARRERAS
Route::resource('carpeta/carrera', CarpetaCarreraController::class);
Route::get('verProgramas/{carrera}', [CarpetaCarreraController::class, 'verProgramas'])->middleware('can:carpetaCarrera.listarProgramas')->name('verProgramas');
Route::get('agregarPrograma/{idCarpetaCarrera}', [CarpetaCarreraController::class, 'agregarPrograma'])->middleware('can:carpetaCarrera.agregarPrograma')->name('agregarPrograma'); 

//CRUD DE LAS CARPETAS AÑOS, CARPETAS CARRERAS Y PROGRAMAS EN DRIVE
Route::resource('programaDrive', ProgramaDriveController::class);
Route::get('buscarProgramas/{idSolicitud}', [ProgramaDriveController::class, 'buscarProgramas'])->middleware('can:programaDrive.buscarPrograma')->name('buscarProgramas');

//RENDIMIENTO ACADEMICO
Route::resource('rendimientoAcademico', RendimientoAcademicoController::class);
Route::post('convertirExcel', [RendimientoAcademicoController::class, 'convertirExcel'])->middleware('can:rendimientoAcademico.exportarPdf')->name('convertirExcel');

//PROGRAMA LOCAL ES UN PDF RESULTANTE DE LA UNION DE LOS PROGRAMAS EN DRIVE
Route::resource('programaLocal', ProgramaLocalController::class);
Route::post('descargarProgramas', [ProgramaLocalController::class, 'descargarProgramas'])->middleware('programaLocal.descargarProgramas')->name('descargarProgramas');

//-------------------------------------------------------------------------------------------------------
//-------------------------------permisos asignados arriba ----------------------------------------------
//-------------------------------------------------------------------------------------------------------
//->middleware('')

//HOJA RESUMEN CREADA EN EL MOMENTO QUE INICIA DEPARTAMENTO DE ALUMNOS
Route::resource('hojaResumen',HojaResumenController::class);
Route::get('firma',function(){return view('hojaResumen.secretaria');});
Route::post('firmaSecretaria',[HojaResumenController::class,'firmaSecretaria'])->name('firmaSecretaria');
Route::post('continuarTramite',[HojaResumenController::class,'continuarTramite'])->name('continuarTramite');

//NOTA CREADA Y FIRMADA POR DEPARTAMENTO DE ALUMNOS
Route::resource('notaDA', NotaDptoAlumController::class);
Route::get('notaDA/crear/{id_solicitud}', [NotaDptoAlumController::class, 'crearNota'])->name('notaDA.crear');
Route::post('notaDA/auth', [NotaDptoAlumController::class, 'autorizar'])->name('notada.auth');
Route::get('notaDA/descargar/{id}', [NotaDptoAlumController::class, 'descargar']);

//PLAN DE ESTUDIO CON URLS DE RANQUEL
Route::resource('planEstudio', PlanEstudioController::class);
Route::get('planEstudio/crear/{id_solicitud}', [PlanEstudioController::class, 'crearPlan'])->name('crearPlanEstudio');

// Pruebas de carga de archivos de la solicitud
Route::get('archivos/{id}/downloadSinFirma', [Archivo::class, 'downloadSinFirma'])->name('archivos.downloadSinFirma');
Route::get('archivos/{id}/downloadFirmado', [Archivo::class, 'downloadFirmado'])->name('archivos.downloadFirmado');
Route::get('archivos/{id}/comment', [Archivo::class, 'cargarComentario'])->name('archivos.cargarComentario');
Route::resource('archivos', Archivo::class);
Route::get('verHojaResumen/{id}',[Archivo::class,'downloadHojaResumen'])->name('verHojaResumen');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('archivos/{id}/confirmarContrasenia', [Archivo::class, 'confirmarContrasenia'])->name('archivos.confirmarContrasenia');

//Rutas mariela 

// rutas de nota admin central y hoja final

Route::resource('nota_admin_central', 'App\Http\Controllers\NotaAdminCentralController');

Route::post('crear-nota-central', [NotaAdminCentralController::class,'crearNotaAdminCentral'])->name('crear-nota-central'); 

Route::post('descargar-nota-central', [NotaAdminCentralController::class,'descargarPdf'])->name('descargar-nota-central'); 

//HOJA RESUMEN FINAL PERTENECE A LA HOJA RESUMEN CREADA A  PARTIR DE SANTIAGO
Route::resource('hojaResumenFinal', HojaResumenFinalController::class);
Route::post('descargar-hoja-sin-firma', [HojaResumenFinalController::class, 'descargarPdfSinFirma'])->name('descargar-hoja-sin-firma');
Route::get('foliar/{idSolicitud}', [HojaResumenFinalController::class, 'foliar'])->name('foliar');

////// Ruta para que ile pueda agregar los estilos a la vista de creacion de nota admin central (de jona:D)//////
Route::post('crearNotaAdminCentral', [HojaResumenFinalController::class, 'store'])->name('crearNotaAdminCentral');
////// ////// ////// ////// ////// ////// ////// ////// ////// ////// ////// ////// ////// //////

/* De aca mando el id de la solicitud y me dirije a la vista hojaResumenFinal.indexHojaFinal
con el objeto solicitud donde se inica la creacion de la nota de certificacion */
// de prueba
//Route::view('nota-central', 'prueba_hoja.solicitud')->name('nota-central');

//***********    H    O    J    A         R    E    S    U    M    E    N    ********/
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('archivos/{id}/confirmarContrasenia', [Archivo::class, 'confirmarContrasenia'])->name('archivos.confirmarContrasenia');

// Rutas para el envío de Mails
Route::get('solicitud_iniciada/{idSolicitud}', [mailPetrelController::class, 'enviarMailSolicitudIniciada']);
Route::get('finalizacion/{idSolicitud}', [mailPetrelController::class, 'enviarMailSolicitudFinalizada']);

Route::resource('solicitud', SolicitudCertProgController::class);
Route::post('comentario', [ComentarioController::class, 'store'])->name('comentario.store');
Route::get('santiago/{id}/{id2}',[SolicitudCertProgController::class, 'listoParaFirmarSantiago'])->name('solicitud.santiago');
