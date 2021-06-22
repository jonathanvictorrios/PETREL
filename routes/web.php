<?php

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
//solicitudes
Route::view('/crearsolicitud', '/solicitud/create');
Route::view('/versolicitud', '/solicitud/show');

/* Otras rutas:
Route::view('/registro', 'registro');
Route::view('/login', 'login');
*/

// CRUD:
Route::resource('solicitud',SolicitudCertProgController::class);
