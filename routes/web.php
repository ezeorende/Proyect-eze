<?php

use Illuminate\Support\Facades\Route;
use app\Models\Deportista;
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

Route::get('/', function () {
    return view('index');
});
Route::get('/paises', function () {
    return view('paises');
});
Route::get('/models', function () {
    $dep= new deportista;
    return $dep;
});