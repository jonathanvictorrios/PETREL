<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SolicitudCertProgController;
use App\Http\Controllers\UnidadAcademicaController;

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


/* Otras rutas:
Route::view('/registro', 'registro');
Route::view('/login', 'login');
*/

// CRUD:
Route::get('/', function () {
    return view('welcome');
});

Route::resource('solicitud', SolicitudCertProgController::class);
Route::get('/carreras',[UnidadAcademicaController::class, 'carreras']);


/* Mailing
Route::view('/emails', 'emergency_call');
Route::view('/emails', 'index');*/