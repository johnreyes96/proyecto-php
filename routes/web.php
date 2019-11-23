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
use App\Http\Middleware\PermissionRoute;

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'cpanel', 'middleware' => 'auth'], function() {

	// Obtener perfiles
	Route::get('getObjectsPermissions','ObjetosController@obtenerObjetosRol');

	Route::get('home', [
		'uses' 	=> 'HomeController@index',
		'as' 	=> 'home.index'
	]);

	Route::get('danied', [
		'uses' 	=> 'HomeController@denied',
		'as' 	=> 'danied.index'
	]);
});

Auth::routes(['register' => false]);
Auth::routes();



