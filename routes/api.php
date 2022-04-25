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
Route::group(['middleware'=>["cors"]],function () {
    Route::apiResource("vehiculos","VehiculosController");
    Route::apiResource("estancias","EntradasSalidasController");
    Route::apiResource("tipos","TiposController");
    Route::post("vehiculos/tareas","VehiculosController@comienzaMes");
    Route::post("estancias/tareas","EntradasSalidasController@comienzaMes");
});

