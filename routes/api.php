<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\UnidadAcademicaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

<<<<<<< HEAD
Route::get('/unidadAcademica', [UnidadAcademicaController::class, 'selectUnidadAcademica']);
Route::get('/unidadAcademica/{idUnidadAcademica}/carreras', [CarreraController::class, 'selectCarrera']);
// Route::middleware('auth:api')->get('/user', function (Request $request) {
=======
Route::get('/unidadAcademica',[UnidadAcademicaController::class,'selectUnidadAcademica']);
Route::get('/unidadAcademica/{idUnidadAcademica}/carreras',[CarreraController::class,'selectCarrera']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
>>>>>>> 30cc40c08a2d805a227cdbd77537a86e499d1a32
//     return $request->user();
// });