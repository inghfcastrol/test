<?php

use Illuminate\Support\Facades\Route;

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
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/* RUTAS DE CONFIGURACION */

Route::group(['prefix' => 'configuracion'], function() {

	/* RUTA PARA EL CRUD DE ESTADOS */

	Route::resource('estados', 'EstadosController');

	/* RUTA PARA EL CRUD DE ENTIDADES */

	Route::resource('entidades', 'EntidadesController');

	/* RUTA PARA EL ORDENAR LAS ENTIDADES */

	Route::post('entidades/ordenamiento', 'EntidadesController@ordenarEstados')->name('entidades.ordenarestados');

	Route::post('changeLocale/', 'ConfigurationsController@changeLocale')->name('changeLocale');

});
