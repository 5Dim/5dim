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

//Rutas para administrador
Route::get('/admin/DatosMaestros', 'DatosMaestrosController@index');

//Rutas generales
Route::get('/', 'PrincipalController@index');
Route::get('/juego', 'JuegoController@index');
Route::get('/juego/construccion', 'JuegoController@construcciones');