<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

<<<<<<< HEAD
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
=======
use App\Http\Controllers\{MedallasController, PaisController, EventoDeportivoController, EquipoDeportistaController, 
    EquipoController, DeportistaController, DeporteController};
>>>>>>> fccdec53222ba78b5ca5d28a0dd02285a44920d6

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD
=======



/*Ruta de direccion para el controlador de la tabla Medallas*/

/*Ruta de direccion para el controlador de la tabla Medallas*/

Route::get('/medallas', [MedallasController::class, 'index']);
Route::post('/medallas', [MedallasController::class, 'store']);
Route::get('/medallas/{id}', [MedallasController::class, 'show']);
Route::put('/medallas/{id}', [MedallasController::class, 'update']);
Route::delete('/medallas/{id}', [MedallasController::class, 'destroy']);


/*Ruta de direccion para el controlador de la tabla Pais*/

Route::get('/pais', [PaisController::class, 'index']);
Route::post('/pais', [PaisController::class, 'store']);
Route::get('/pais/{id}', [PaisController::class, 'show']);
Route::put('/pais/{id}', [PaisController::class, 'update']);
Route::delete('/pais/{id}', [PaisController::class, 'destroy']);




/*Ruta de direccion para el controlador de la tabla Eventos Deportivos*/

Route::get('/evento_deportivos', [EventoDeportivoController::class, 'index']);
Route::post('/evento_deportivos', [EventoDeportivoController::class, 'store']);
Route::get('/evento_deportivos/{id}', [EventoDeportivoController::class, 'show']);
Route::put('/evento_deportivos/{id}', [EventoDeportivoController::class, 'update']);
Route::delete('/evento_deportivos/{id}', [EventoDeportivoController::class, 'destroy']);



/*Ruta de direccion para el controlador de la tabla equipo_deportista*/

Route::get('/equipo_deportista', [EquipoDeportistaController::class, 'index']);



/*Ruta de direccion para el controlador de la tabla equipo*/

Route::get('/equipos', [EquipoController::class, 'index']);
Route::post('/equipos', [EquipoController::class, 'store']);
Route::get('/equipos/{id}', [EquipoController::class, 'show']);
Route::put('/equipos/{id}', [EquipoController::class, 'update']);
Route::delete('/equipos/{id}', [EquipoController::class, 'destroy']);


/*Ruta de direccion para el controlador de la tabla Deportistas*/

Route::get('/deportistas', [DeportistaController::class, 'index']);
Route::post('/deportistas', [DeportistaController::class, 'store']);
Route::get('/deportistas/{id}', [DeportistaController::class, 'show']);
Route::put('/deportistas/{id}', [DeportistaController::class, 'update']);
Route::delete('/deportistas/{id}', [DeportistaController::class, 'destroy']);


/*Ruta de direccion para el controlador de la tabla Deportes*/

Route::get('/deportes',[DeporteController::class, 'index']);
Route::post('/deportes', [DeporteController::class, 'store']);
Route::get('/deportes/{id}',[DeporteController::class, 'show']);
Route::put('/deportes/{id}',[DeporteController::class, 'update']);
Route::delete('/deportes/{id}',[DeporteController::class, 'destroy']);
>>>>>>> fccdec53222ba78b5ca5d28a0dd02285a44920d6
