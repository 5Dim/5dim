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
Route::get('/juego/construccion', 'JuegoController@construccion');
Route::get('/juego/investigacion', 'JuegoController@investigacion');
Route::get('/juego/planeta', 'JuegoController@planeta');
Route::get('/juego/fabricas', 'JuegoController@fabricas');
Route::get('/juego/fuselajes', 'JuegoController@fuselajes');
Route::get('/juego/diseño', 'JuegoController@diseño');
Route::get('/juego/astrometria', 'JuegoController@astrometria');
Route::get('/juego/flota', 'JuegoController@flota');
Route::get('/juego/banco', 'JuegoController@banco');
Route::get('/juego/comercio', 'JuegoController@comercio');
Route::get('/juego/general', 'JuegoController@general');
Route::get('/juego/alianza', 'JuegoController@alianza');