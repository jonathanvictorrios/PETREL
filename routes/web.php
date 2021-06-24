<?php

use App\Http\Controllers\CarpetaAnioController;
use App\Http\Controllers\CarpetaCarreraController;
use App\Http\Controllers\HojaResumenController;
use App\Http\Controllers\ProgramaDriveController;
use App\Http\Controllers\ProgramaLocalController;
use App\Http\Controllers\RendimientoAcademicoController;
use App\Http\Controllers\Archivo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudCertProgController;

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

Route::resource('rendimientoAcademico',RendimientoAcademicoController::class);
Route::post('convertirExcel',[RendimientoAcademicoController::class,'convertirExcel'])->name('convertirExcel');
    
Route::resource('programaLocal',ProgramaLocalController::class);
Route::get('buscarProgramas/{idSolicitud}',[ProgramaDriveController::class,'buscarProgramas'])->name('buscarProgramas');
Route::post('descargarProgramas',[ProgramaLocalController::class,'descargarProgramas'])->name('descargarProgramas');

<<<<<<< HEAD
Route::resource('hojaResumen',HojaResumenController::class);
=======
Route::resource('programaLocal', ProgramaLocalController::class);
Route::get('buscarProgramas/{idRendimientoAcademico}', [ProgramaDriveController::class, 'buscarProgramas'])->name('buscarProgramas');
Route::post('descargarProgramas', [ProgramaLocalController::class, 'descargarProgramas'])->name('descargarProgramas');
Route::post('descargarProgramas', [ProgramaLocalController::class, 'descargarProgramas'])->name('descargarProgramas');
Route::resource('solicitud', SolicitudCertProgController::class);

// Pruebas de carga de archivos de la solicitud
Route::get('archivos/{id}/download', [Archivo::class, 'download'])->name('archivos.download');
Route::get('archivos/{id}/comment', [Archivo::class, 'cargarComentario'])->name('archivos.cargarComentario');
Route::resource('archivos', Archivo::class);
>>>>>>> 86f5bbbadcf9c3413fce8237503b66b789349d69
