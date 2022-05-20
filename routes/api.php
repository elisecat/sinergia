<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/obtain_crfs_token',[ App\Http\Controllers\API\HomeController::class, 'obtain_crfs_token']);
Route::get('/obtainSessionStatus',[ App\Http\Controllers\API\HomeController::class, 'obtainSessionStatus']);
Route::post('/login',[ App\Http\Controllers\API\HomeController::class, 'login']);



Route::prefix('person')->group(function () {

    Route::get('getAllTipoId',[ App\Http\Controllers\API\PacienteController::class, 'getAllTipoId']);
    Route::get('getAllTipoGener',[ App\Http\Controllers\API\PacienteController::class, 'getAllTipoGener']);
    Route::get('getAllDepartament',[ App\Http\Controllers\API\PacienteController::class, 'getAllDepartament']);
    Route::get('getAllCity',[ App\Http\Controllers\API\PacienteController::class, 'getAllCity']);

    Route::get('/',[ App\Http\Controllers\API\PacienteController::class, 'getAll']);
    Route::post('/',[ App\Http\Controllers\API\PacienteController::class, 'create']);
    Route::delete('/{id}',[ App\Http\Controllers\API\PacienteController::class, 'delete']);
    Route::get('/{id}',[ App\Http\Controllers\API\PacienteController::class, 'get']);
    Route::put('/{id}',[ App\Http\Controllers\API\PacienteController::class, 'update']);
});


