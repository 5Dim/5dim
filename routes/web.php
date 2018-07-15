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

//Rutas para login y registro
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Rutas para administrador
Route::get('/admin/DatosMaestros', 'DatosMaestrosController@index');

//Rutas generales
Route::get('/', 'PrincipalController@index');
Route::get('/juego', 'JuegoController@index');
Route::get('/planeta/{planeta?}', ['uses' => 'JuegoController@planeta']);

//Construccion
Route::get('/juego/construccion/{tab?}', 'ConstruccionController@index');
Route::get('/juego/construccion/construir/{id}/{personal}/{tab}', ['uses' => 'ConstruccionController@construir']);
Route::get('/juego/construccion/reciclar/{id}/{personal}', ['uses' => 'ConstruccionController@reciclar']);
Route::get('/juego/construccion/cancelar/{id}', ['uses' => 'ConstruccionController@cancelar']);
Route::get('/juego/construccion/datos/{codigo}', ['uses' => 'ConstruccionController@datos']);
Route::get('/juego/construccion/industria/{industria}', ['uses' => 'ConstruccionController@industria']);

//Investigacion
Route::get('/juego/investigacion/{tab?}', 'InvestigacionController@index');
Route::get('/juego/investigacion/investigar/{id}/{personal}/{tab}', ['uses' => 'InvestigacionController@construir']);
Route::get('/juego/investigacion/cancelar/{id}', ['uses' => 'InvestigacionController@cancelar']);
Route::get('/juego/investigacion/datos/{codigo}', ['uses' => 'InvestigacionController@datos']);

//Planeta
Route::get('/juego/planeta', 'PlanetaController@index');

//Fabricas
Route::get('/juego/fabricas', 'FabricasController@index');

//Fuselajes
Route::get('/juego/fuselajes', 'FuselajesController@index');

//Diseño
Route::get('/juego/diseño', 'DiseñoController@index');

//Astrometria
Route::get('/juego/astrometria', 'AstrometriaController@index');
Route::get('/juego/astrometria/ajax/universo', 'AstrometriaController@generarUniverso');

//Flota
Route::get('/juego/flotas', 'FlotaController@index');

//Banco
Route::get('/juego/banco', 'BancoController@index');

//Comercio
Route::get('/juego/comercio', 'ComercioController@index');

//General
Route::get('/juego/general', 'GeneralController@index');

//Alianza
Route::get('/juego/alianza', 'AlianzaController@index');