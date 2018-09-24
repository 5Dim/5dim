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
//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Rutas para administrador
Route::get('/admin/DatosMaestros', 'DatosMaestrosController@index');

//Rutas generales sin auth
Route::get('/', 'PrincipalController@index');
Route::get('/pruebas', 'JuegoController@pruebas');

Route::get('/juego/astrometria/ajax/universo', 'AstrometriaController@generarUniverso');
Route::get('/juego/astrometria/ajax/radares', 'AstrometriaController@generarRadares');
Route::get('/juego/astrometria/ajax/flotas', 'AstrometriaController@generarFlotas');

//Middleware de auth
Route::middleware('auth')->group(function () {
    //Cambiar opciones del usuario
    Route::get('/configuracion', 'PrincipalController@configuracion');
    Route::post('/update', 'PrincipalController@update');

    //Rutas generales
    Route::get('/juego', 'JuegoController@index');
    Route::get('/planeta/{planeta?}', ['uses' => 'JuegoController@planeta']);
    Route::get('/jugador/{universo?}', ['uses' => 'JuegoController@jugador']);
    Route::get('/juego/tienda', 'JuegoController@tienda');
    Route::get('/juego/estadisticas', 'JuegoController@estadisticas');
    Route::get('/juego/calcularPuntos', 'JuegoController@calcularPuntos');

    //Construccion
    Route::get('/juego/construccion/{tab?}', 'ConstruccionController@index');
    Route::get('/juego/construccion/construir/{id}/{personal}/{tab}', ['uses' => 'ConstruccionController@construir']);
    Route::get('/juego/construccion/reciclar/{id}/{personal}', ['uses' => 'ConstruccionController@reciclar']);
    Route::get('/juego/construccion/cancelar/{id}', ['uses' => 'ConstruccionController@cancelar']);
    Route::get('/juego/construccion/datos/{codigo}', ['uses' => 'ConstruccionController@datos']);
    Route::get('/juego/construccion/industria/{industria}', ['uses' => 'ConstruccionController@industria']);

    //Investigacion
    Route::get('/juego/investigacion/{tab?}', 'InvestigacionController@index');
    Route::get('/juego/investigacion/construir/{id}/{personal}/{tab?}', ['uses' => 'InvestigacionController@construir']);
    Route::get('/juego/investigacion/cancelar/{id}', ['uses' => 'InvestigacionController@cancelar']);
    Route::get('/juego/investigacion/datos/{codigo}', ['uses' => 'InvestigacionController@datos']);

    //Planeta
    Route::get('/juego/planeta', 'PlanetaController@index');

    //Fuselajes
    Route::get('/juego/fuselajes', 'FuselajesController@index');
    Route::get('/juego/fuselajes/desbloquear/{id}', ['uses' => 'FuselajesController@desbloquear']);
    Route::get('/juego/fuselajes/diseñar/{id}', ['uses' => 'FuselajesController@diseñar']);
    Route::get('/juego/fuselajes/datos/{codigo}', ['uses' => 'FuselajesController@datos']);

    //Diseño
    Route::get('/juego/diseño', 'DiseñoController@index');
    Route::get('/juego/diseño/diseñar/{id}', 'DiseñoController@diseñar');
    Route::post('/juego/diseño/crearDiseño/{id?}', 'DiseñoController@crearDiseño');
    Route::get('/juego/diseño/borrarDiseño/{id}', 'DiseñoController@borrarDiseño');
    Route::get('/juego/diseño/editarDiseño/{id}', 'DiseñoController@editarDiseño');

    //Fabricas
    Route::get('/juego/fabricas', 'FabricasController@index');
    Route::get('/juego/fabricar/construir/{id}/{cantidad}', 'FabricasController@construir');
    Route::get('/juego/fabricar/reciclar/{id}/{cantidad}', 'FabricasController@reciclar');
    Route::get('/juego/fabricar/cancelar/{id}', 'FabricasController@cancelar');

    //Astrometria
    Route::get('/juego/astrometria', 'AstrometriaController@index');

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
    Route::get('/juego/crearAlianza', 'AlianzaController@crearAlianza');
    Route::post('/juego/generarAlianza', 'AlianzaController@generarAlianza');
    Route::post('/juego/solicitudAlianza', 'AlianzaController@solicitudAlianza');
    Route::get('/juego/expulsarMiembro/{id}', 'AlianzaController@expulsarMiembro');
    Route::get('/juego/rechazarSolicitud/{id}', 'AlianzaController@rechazarSolicitud');
    Route::get('/juego/aceptarSolicitud/{id}', 'AlianzaController@aceptarSolicitud');

    //Mensajes
    Route::get('/juego/mensajes', 'MensajesController@index');
    Route::get('/juego/nuevoMensaje', 'MensajesController@nuevoMensaje');
    Route::post('/juego/enviarMensaje', 'MensajesController@enviarMensaje');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');