<?php

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
    return view('home');
});

Route::resource('ciudades', 'CiudadesController');
Route::resource('estado-usuarios', 'EstadoUsuariosController');
Route::resource('marca-vehiculos', 'MarcaVehiculosController');
Route::resource('modelo-vehiculos', 'ModeloVehiculosController');
Route::resource('color-vehiculos', 'ColorVehiculosController');