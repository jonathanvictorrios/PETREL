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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudCertProgController;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailPetrel;
use App\Mail\mailPetrelFinalizacion;
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

// Vistas configuradas:
Route::redirect('/', '/home');
Route::view('/home', 'home');
//usuario
Route::view('/registro', '/usuario/registro');
Route::view('/perfil', '/usuario/perfil');
//nuevas rutas de vistas (lara)
// Route::view('/crearusuario', '/usuario/create');
// Route::view('/verusuario', '/usuario/show');
// Route::view('/modificarusuario', '/usuario/modificar');
// Route::view('/borrarusuario', '/usuario/borrar');
//anio
// Route::view('/crearanio', '/carpetaAnio/create');
// Route::view('/modificaranio', '/carpetaAnio/edit');
//carrera
// Route::view('/crearcarrera', '/carpetaCarrera/create');
// Route::view('/modificarcarrera', '/carpetaCarrera/edit');
//programa
// Route::view('/crearprograma', '/programaDrive/create');
// Route::view('/modificarprograma', '/programaDrive/edit');
///fin de nuevas rutas lara
//solicitudes
Route::view('/crearsolicitud', '/solicitud/create');
Route::view('/versolicitud', '/solicitud/show');
//anio
Route::view('/crearanio', '/carpetaAnio/create');
Route::view('/modificaranio', '/carpetaAnio/edit');
//carrera
Route::view('/crearcarrera', '/carpetaCarrera/create');
Route::view('/modificarcarrera', '/carpetaCarrera/edit');
//programa
Route::view('/crearprograma', '/programaDrive/create');
Route::view('/modificarprograma', '/programaDrive/edit');
Route::get('solicitud/{idSolicitud}/asignar/{idAdministrativo}', [SolicitudCertProgController::class, 'asignar'])->name('solicitud.asignar');
Route::get('solicitud/{idSolicitud}/listoFirmaDptoAlumno/{idAdministrativo}', [SolicitudCertProgController::class, 'listoParaFirmarDptoAlumno'])->name('solicitud.listoFirmaDptoAlumno');
Route::get('solicitud/{idSolicitud}/listoFirmaSecretariaAcademica/{idAdministrativo}', [SolicitudCertProgController::class, 'listoParaFirmarSecretariaAcademica'])->name('solicitud.listoFirmaSecretariaAcademica');
Route::get('solicitud/{idSolicitud}/listoFirmaSantiago/{idAdministrativo}', [SolicitudCertProgController::class, 'listoParaFirmarSantiago'])->name('solicitud.listoFirmaSantiago');
Route::get('solicitud/{idSolicitud}/terminar/{idAdministrativo}', [SolicitudCertProgController::class, 'terminar'])->name('solicitud.terminar');


// CRUD:
Route::resource('solicitud', SolicitudCertProgController::class);

Route::resource('carpeta/anio', CarpetaAnioController::class);
Route::get('buscarCarreras/{anio}', [CarpetaAnioController::class, 'buscarCarreras'])->name('buscarCarreras');
Route::get('crearCarpetaCarrera/{idCarpetaAnio}', [CarpetaAnioController::class, 'crearCarpetaCarrera'])->name('crearCarpetaCarrera');

Route::resource('carpeta/carrera', CarpetaCarreraController::class);
Route::get('verProgramas/{carrera}', [CarpetaCarreraController::class, 'verProgramas'])->name('verProgramas');
Route::get('agregarPrograma/{idCarpetaCarrera}', [CarpetaCarreraController::class, 'agregarPrograma'])->name('agregarPrograma');

Route::resource('programaDrive', ProgramaDriveController::class);

Route::resource('rendimientoAcademico', RendimientoAcademicoController::class);
Route::post('convertirExcel', [RendimientoAcademicoController::class, 'convertirExcel'])->name('convertirExcel');

Route::resource('programaLocal', ProgramaLocalController::class);
Route::get('buscarProgramas/{idSolicitud}', [ProgramaDriveController::class, 'buscarProgramas'])->name('buscarProgramas');
Route::post('descargarProgramas', [ProgramaLocalController::class, 'descargarProgramas'])->name('descargarProgramas');

Route::resource('hojaResumen', HojaResumenController::class);
Route::post('firmaSecretaria', [HojaResumenController::class, 'firmaSecretaria'])->name('firmaSecretaria');
Route::get('firma', function () {
    return view('hojaResumen.secretaria');
});


Route::resource('notaDA', NotaDptoAlumController::class);
Route::get('notaDA/crear/{id_solicitud}', [NotaDptoAlumController::class, 'crearNota'])->name('notaDA.crear');
Route::post('notaDA/auth', [NotaDptoAlumController::class, 'autorizar'])->name('notada.auth');
Route::get('notaDA/descargar/{id}', [NotaDptoAlumController::class, 'descargar']);


Route::resource('planEstudio', PlanEstudioController::class);
Route::get('planEstudio/crear/{id_solicitud}', [PlanEstudioController::class, 'crearPlan'])->name('crearPlanEstudio');
Route::resource('programaLocal', ProgramaLocalController::class);
Route::get('buscarProgramas/{idRendimientoAcademico}', [ProgramaDriveController::class, 'buscarProgramas'])->name('buscarProgramas');
Route::post('descargarProgramas', [ProgramaLocalController::class, 'descargarProgramas'])->name('descargarProgramas');
Route::post('descargarProgramas', [ProgramaLocalController::class, 'descargarProgramas'])->name('descargarProgramas');
Route::resource('solicitud', SolicitudCertProgController::class);

// Pruebas de carga de archivos de la solicitud
Route::get('archivos/{id}/downloadSinFirma', [Archivo::class, 'downloadSinFirma'])->name('archivos.downloadSinFirma');
Route::get('archivos/{id}/downloadFirmado', [Archivo::class, 'downloadFirmado'])->name('archivos.downloadFirmado');
Route::get('archivos/{id}/comment', [Archivo::class, 'cargarComentario'])->name('archivos.cargarComentario');
Route::resource('archivos', Archivo::class);

Route::get('archivos/{id}/confirmarContrasenia', [Archivo::class, 'confirmarContrasenia'])->name('archivos.confirmarContrasenia');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('solicitud_iniciada', function () {
    // $correo debe inicializarse con el $idSolicitud como variable
    $idSolicitud = 3;
    $correo = new mailPetrel($idSolicitud);
    $datosMail = $correo->datosMail;
    //print_r($datosMail);
    Mail::to($datosMail->correoUsuario)->send($correo);
    //return ('Correo enviado');
    return view('/home');
});
Route::get('finalizacion', function () {
    $correo = new mailPetrelFinalizacion;
    Mail::to("federico.garcia@est.fi.uncoma.edu.ar")->send($correo);
    //return ('Correo enviado');
    return view('/home');
});
