<?php

use App\Http\Controllers\AlianzaController;
use App\Http\Controllers\AstrometriaController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\ConstruccionController;
use App\Http\Controllers\DatosMaestrosController;
use App\Http\Controllers\DisenioController;
use App\Http\Controllers\FabricasController;
use App\Http\Controllers\FlotaController;
use App\Http\Controllers\FuselajesController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvestigacionController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\PlanetaController;
use App\Http\Controllers\PrincipalController;
use App\Http\Middleware\JugadorLogueado;
use App\Http\Middleware\TerminarColas;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PrincipalController::class, 'index'])->name('root')->withoutMiddleware([JugadorLogueado::class]);

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home')->withoutMiddleware([JugadorLogueado::class]);

// Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rutas para administrador
Route::get('/admin/DatosMaestros', [DatosMaestrosController::class, 'index']);

//Rutas generales sin auth
Route::get('/pruebas', [JuegoController::class, 'pruebas']);

Route::middleware(
    ['auth:sanctum', 'verified']
)->group(
    function () {
        //Cambiar opciones del usuario
        Route::get('/configuracion', [PrincipalController::class, 'configuracion']);
        Route::post('/update', [PrincipalController::class, 'update']);
    }
);

//Middleware de auth
Route::middleware(
    [
        'auth:sanctum',
        'verified',
        JugadorLogueado::class,
        TerminarColas::class
    ]
)->group(function () {

    //Rutas generales
    Route::get('/juego', [JuegoController::class, 'index']);
    Route::get('/planeta/{planeta}', [JuegoController::class, 'planeta']);
    // Route::get('/jugador', [JuegoController::class, 'jugador']);

    Route::get('/juego/tienda', [JuegoController::class, 'tienda']);
    Route::get('/juego/estadisticas', [JuegoController::class, 'estadisticas']);
    Route::get('/juego/calcularPuntos', [JuegoController::class, 'calcularPuntos']);

    //Construccion
    Route::get('/juego/construccion/{tab?}', [ConstruccionController::class, 'index']);
    Route::get('/juego/construccion/construir/{id}/{personal}/{tab}', [ConstruccionController::class, 'construir']);
    Route::get('/juego/construccion/reciclar/{id}/{personal}', [ConstruccionController::class, 'reciclar']);
    Route::get('/juego/construccion/cancelar/{id}', [ConstruccionController::class, 'cancelar']);
    Route::get('/juego/construccion/datos/{codigo}', [ConstruccionController::class, 'datos']);
    Route::get('/juego/construccion/industria/{industria}', [ConstruccionController::class, 'industria']);

    //Investigacion
    Route::get('/juego/investigacion/{tab?}', [InvestigacionController::class, 'index']);
    Route::get('/juego/investigacion/construir/{id}/{personal}/{tab}', [InvestigacionController::class, 'investigar']);
    Route::get('/juego/investigacion/cancelar/{id}', [InvestigacionController::class, 'cancelar']);
    Route::get('/juego/investigacion/datos/{codigo}', [InvestigacionController::class, 'datos']);

    //Planeta
    Route::get('/juego/planeta', [PlanetaController::class, 'index']);
    Route::get('/juego/renombrarPlaneta/{nombre}', [PlanetaController::class, 'renombrarPlaneta']);
    Route::get('/juego/cederColonia/{nombre}', [PlanetaController::class, 'cederColonia']);
    Route::get('/juego/destruirColonia', [PlanetaController::class, 'destruirColonia']);

    //Fuselajes
    Route::get('/juego/fuselajes/{tab?}', [FuselajesController::class, 'index']);
    Route::get('/juego/fuselajes/desbloquear/{id}/{tab}', [FuselajesController::class, 'desbloquear']);
    Route::get('/juego/fuselajes/diseniar/{id}', [FuselajesController::class, 'diseniar']);
    Route::get('/juego/fuselajes/datos/{codigo}', [FuselajesController::class, 'datos']);

    //Disenio
    Route::get('/juego/disenio/{tab?}', [DisenioController::class, 'index']);
    Route::get('/juego/disenio/diseniar/{id}', [DisenioController::class, 'diseniar']);
    Route::post('/juego/disenio/crearDisenio/{id?}', [DisenioController::class, 'crearDisenio']);
    Route::get('/juego/disenio/borrarDisenio/{id}', [DisenioController::class, 'borrarDisenio']);
    Route::get('/juego/disenio/editarDisenio/{id}', [DisenioController::class, 'editarDisenio']);

    //Fabricas
    Route::get('/juego/fabricas', [FabricasController::class, 'index']);
    Route::get('/juego/fabricar/construir/{id}/{cantidad}', [FabricasController::class, 'construir']);
    Route::get('/juego/fabricar/reciclar/{id}/{cantidad}', [FabricasController::class, 'reciclar']);
    Route::get('/juego/fabricar/cancelar/{id}', [FabricasController::class, 'cancelar']);

    //Astrometria
    Route::get('/juego/astrometria', [AstrometriaController::class, 'index']);
    Route::get('/juego/astrometria/ajax/universo', [AstrometriaController::class, 'generarUniverso']);
    Route::get('/juego/astrometria/ajax/radares', [AstrometriaController::class, 'generarRadares']);
    Route::get('/juego/astrometria/ajax/influencia', [AstrometriaController::class, 'generarInfluencias']);
    Route::get('/juego/astrometria/ajax/flotas', [AstrometriaController::class, 'generarFlotas']);

    //Flota
    Route::get('/juego/flotas', [FlotaController::class, 'index']);

    //Banco
    Route::get('/juego/banco', [BancoController::class, 'index']);

    //Comercio
    Route::get('/juego/comercio', [ComercioController::class, 'index']);

    //General
    Route::get('/juego/general', [GeneralController::class, 'index']);

    //Alianza
    Route::get('/juego/alianza', [AlianzaController::class, 'index']);
    Route::get('/juego/crearAlianza', [AlianzaController::class, 'crearAlianza']);
    Route::post('/juego/generarAlianza', [AlianzaController::class, 'generarAlianza']);
    Route::post('/juego/solicitudAlianza', [AlianzaController::class, 'solicitudAlianza']);
    Route::get('/juego/expulsarMiembro/{id}', [AlianzaController::class, 'expulsarMiembro']);
    Route::get('/juego/salirAlianza', [AlianzaController::class, 'salirAlianza']);
    Route::get('/juego/disolverAlianza', [AlianzaController::class, 'disolverAlianza']);
    Route::get('/juego/rechazarSolicitud/{id}', [AlianzaController::class, 'rechazarSolicitud']);
    Route::get('/juego/aceptarSolicitud/{id}', [AlianzaController::class, 'aceptarSolicitud']);

    //Mensajes
    Route::get('/juego/mensajes', [MensajesController::class, 'index']);
    Route::get('/juego/nuevoMensaje', [MensajesController::class, 'nuevoMensaje']);
    Route::post('/juego/enviarMensaje', [MensajesController::class, 'enviarMensaje']);
});
