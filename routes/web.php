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
use App\Http\Controllers\NotaAdminCentralController;
use App\Http\Controllers\HojaResumenFinalController;
// de prueba 
use App\Http\Controllers\PruebaSolicitudController;

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

Route::resource('hojaResumen',HojaResumenController::class);
Route::post('firmaSecretaria',[HojaResumenController::class,'firmaSecretaria'])->name('firmaSecretaria');
Route::get('firma',function(){return view('hojaResumen.secretaria');});
Route::post('continuarTramite',[HojaResumenController::class,'continuarTramite'])->name('continuarTramite');
Route::get('foliar/{idSolicitud}',[HojaResumenFinalController::class,'foliar'])->name('foliar');


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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('archivos/{id}/confirmarContrasenia', [Archivo::class, 'confirmarContrasenia'])->name('archivos.confirmarContrasenia');

//Rutas mariela 

// rutas de nota admin central y hoja final

Route::resource('nota_admin_central', 'App\Http\Controllers\NotaAdminCentralController');

Route::post('crear-nota-central', [NotaAdminCentralController::class,'crearNotaAdminCentral'])->name('crear-nota-central'); 

Route::post('descargar-nota-central', [NotaAdminCentralController::class,'descargarPdf'])->name('descargar-nota-central'); 

Route::resource('hojaResumenFinal', HojaResumenFinalController::class);

Route::post('descargar-hoja-sin-firma', [HojaResumenFinalController::class,'descargarPdfSinFirma'])->name('descargar-hoja-sin-firma'); 


/* De aca mando el id de la solicitud y me dirije a la vista hojaResumenFinal.indexHojaFinal
 con el objeto solicitud donde se inica la creacion de la nota de certificacion */

 // de prueba
 Route::view('nota-central','prueba_hoja.solicitud')->name('nota-central'); 

 Route::post('solicitud', [PruebaSolicitudController::class,'index'])->name('solicitud');
