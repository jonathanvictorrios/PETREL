<?php

use App\Http\Controllers\CarpetaAnioController;
use App\Http\Controllers\CarpetaCarreraController;
use App\Http\Controllers\HojaResumenController;
use App\Http\Controllers\ProgramaDriveController;
use App\Http\Controllers\ProgramaLocalController;
use App\Http\Controllers\RendimientoAcademicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudCertProgController;
use Illuminate\Support\Facades\Auth;
use App\Models\CarpetaAnio;
use App\Models\ProgramaDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\RoleController;

use App\Http\Controllers\UserController;
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

Route::get('solicitud/{idSolicitud}/asignar/{idAdministrativo}', [SolicitudCertProgController::class, 'asignar'])->name('solicitud.asignar');
// Vistas configuradas:
Route::redirect('/', '/home');
Route::view('/home', 'home');
//usuario

//solicitudes
Route::view('/crearsolicitud', '/solicitud/create');
Route::view('/versolicitud', '/solicitud/show');

/* Otras rutas:
Route::view('/registro', 'registro');
Route::view('/login', 'login');
*/

// CRUD:

Route::get('/', function () {
    return view('home');
});

Route::resource('solicitud', SolicitudCertProgController::class);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('user', UserController::class);
});

Route::resource('solicitud',SolicitudCertProgController::class);
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

Route::resource('programaLocal', ProgramaLocalController::class);
Route::get('buscarProgramas/{idRendimientoAcademico}', [ProgramaDriveController::class, 'buscarProgramas'])->name('buscarProgramas');
Route::post('descargarProgramas', [ProgramaLocalController::class, 'descargarProgramas'])->name('descargarProgramas');
Route::resource('hojaResumen',HojaResumenController::class);
