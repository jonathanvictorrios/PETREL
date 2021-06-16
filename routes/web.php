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

<<<<<<< HEAD
=======

>>>>>>> 60dddd9965bf92959187b982d11e96757851bd18
/* Otras rutas:
Route::view('/registro', 'registro');
Route::view('/login', 'login');
*/

// CRUD:
<<<<<<< HEAD
Route::resource('solicitud',SolicitudCertProgController::class);
=======
Route::get('/', function () {
    return view('welcome');
});

Route::resource('solicitud', SolicitudCertProgController::class);
>>>>>>> 60dddd9965bf92959187b982d11e96757851bd18
