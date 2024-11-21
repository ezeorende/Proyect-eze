<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{MedallasController, PaisController, EventoDeportivoController, EquipoDeportistaController, 
    EquipoController, DeportistaController, DeporteController};

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



/*Ruta de direccion para el controlador de la tabla Medallas*/

Route::get('/medallas', [MedallasController::class, 'index']);
Route::post('/medallas', [MedallaController::class, 'store']);



/*Ruta de direccion para el controlador de la tabla Pais*/

Route::get('/pais', [PaisController::class, 'index']);
Route::post('/pais', [PaisController::class, 'store']);





/*Ruta de direccion para el controlador de la tabla Eventos Deportivos*/

Route::get('/eventosDeportivos', [PaisController::class, 'index']);



/*Ruta de direccion para el controlador de la tabla equipo_deportista*/

Route::get('/equipo_deportista', [EquipoDeportistaController::class, 'index']);



/*Ruta de direccion para el controlador de la tabla equipo*/

Route::get('/equipos', [EquipoController::class, 'index']);



/*Ruta de direccion para el controlador de la tabla Deportistas*/

Route::get('/deportistas', [DeportistaController::class, 'index']);



/*Ruta de direccion para el controlador de la tabla Deportes*/

Route::get('/deportes', [DeportistaController::class, 'index']);