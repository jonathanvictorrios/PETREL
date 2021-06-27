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

Route::get('/unidadAcademica', [UnidadAcademicaController::class, 'selectUnidadAcademica']);
Route::get('/unidadAcademica/{idUnidadAcademica}/carreras', [CarreraController::class, 'selectCarrera']);
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });