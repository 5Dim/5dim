<?php

use App\Http\Controllers\AlianzaController;
use App\Http\Controllers\AstrometriaController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\ConstruccionController;
use App\Http\Controllers\DatosMaestrosController;
use App\Http\Controllers\DisenioController;
use App\Http\Controllers\EmailController;
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
use App\Http\Middleware\SetLocale;
use App\Http\Middleware\TerminarColas;
use App\Http\Controllers\GruposNavesController;
use App\Http\Controllers\PoliticasController;
use Illuminate\Support\Facades\Route;
use App\Mail\MailtrapExample;
use Illuminate\Support\Facades\Mail;


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

Route::get('/', [PrincipalController::class, 'index'])->name('root')->withoutMiddleware([JugadorLogueado::class]);

Route::middleware(['auth:sanctum', 'verified'])->get('/home', [HomeController::class, 'index'])->name('home')->withoutMiddleware([JugadorLogueado::class]);

Route::middleware(
    [
        'auth:sanctum',
        'verified',
        SetLocale::class,
    ]
)->group(function () {
    //Rutas para administrador
    Route::get('/panelControl/DatosMaestros', [DatosMaestrosController::class, 'index']);

    // Route::get('/panelControl/send-mail', function () {
    //     Mail::to('newuser@example.com')->send(new MailtrapExample());
    //     // Mail::to('newuser@example.com')->queue(new MailtrapExample());
    //     return 'A message has been sent to Mailtrap!';
    // });

    Route::get('/panelControl/emailResetRonda', [EmailController::class, 'index']);
});

//Rutas generales sin auth
Route::get('/pruebas', [JuegoController::class, 'pruebas']);

Route::middleware(
    [
        'auth:sanctum',
        'verified',
        SetLocale::class,
    ]
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
        TerminarColas::class,
        SetLocale::class,
    ]
)->group(function () {

    //Rutas generales
    Route::get('/juego', [JuegoController::class, 'index']);
    Route::get('/cambiarPlaneta/{planeta}', [JuegoController::class, 'planeta']);
    Route::get('/juego/tienda', [JuegoController::class, 'tienda']);
    Route::get('/juego/estadisticas', [JuegoController::class, 'estadisticas']);
    Route::get('/juego/calcularPuntos', [JuegoController::class, 'calcularPuntos']);
    Route::get('/juego/jugador/opciones', [JuegoController::class, 'opcionesJugador']);
    Route::post('/juego/jugador/guardar', [JuegoController::class, 'cambiarOpciones'])->name('guardarJugador');

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
    Route::get('/juego/planeta/{tab?}', [PlanetaController::class, 'index']);
    Route::get('/juego/renombrarPlaneta/{nombre}', [PlanetaController::class, 'renombrarPlaneta']);
    Route::get('/juego/moverPlaneta/{posicion}', [PlanetaController::class, 'moverPlaneta']);
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
    // Route::get('/juego/fabricas', [FabricasController::class, 'index']);
    Route::get('/juego/fabricar/construir/{id}/{cantidad}', [FabricasController::class, 'construir']);
    Route::get('/juego/fabricar/reciclar/{id}/{cantidad}', [FabricasController::class, 'reciclar']);
    Route::get('/juego/fabricar/cancelar/{id}', [FabricasController::class, 'cancelar']);

    //Astrometria
    Route::get('/juego/astrometria', [AstrometriaController::class, 'index']);
    Route::get('/juego/astrometria/ajax/universo', [AstrometriaController::class, 'generarUniverso']);
    Route::get('/juego/astrometria/ajax/radares', [AstrometriaController::class, 'generarRadares']);
    Route::get('/juego/astrometria/ajax/influencia', [AstrometriaController::class, 'generarInfluencias']);
    Route::get('/juego/astrometria/ajax/flotas', [AstrometriaController::class, 'generarFlotas']);
    Route::get('/juego/astrometria/ajax/sistema/{numeroSistema}', [AstrometriaController::class, 'sistema']);

    //Flota ajax
    Route::get('/juego/flotas/ajax/verFlotasEnRecoleccion/', [FlotaController::class, 'verFlotasEnRecoleccion']);
    Route::get('/juego/flotas/ajax/verFlotasEnOrbita/', [FlotaController::class, 'verFlotasEnOrbita']);
    Route::get('/juego/flotas/ajax/verFlotasEnVuelo/', [FlotaController::class, 'verFlotasEnVuelo']);

    // Flota
    Route::get('/juego/flotas/regresarFlota/{id}', [FlotaController::class, 'regresarFlota']);
    Route::get('/juego/flotas/eliminarFlota/{id}', [FlotaController::class, 'eliminarFlota']);
    Route::get('/juego/flotas/traerRecursos/{estrella}/{orbita}', [FlotaController::class, 'traerRecursos']);
    Route::get('/juego/flotas/{tab?}', [FlotaController::class, 'index']);
    Route::get('/juego/flotas/enviar/{estrella?}/{orbita?}/{tab?}', [FlotaController::class, 'astrometria']);
    Route::get('/juego/flotas/editar/{nombreflota?}/{tipoflota?}/{tab?}', [FlotaController::class, 'index']);
    Route::post('/juego/flotas/enviarFlota/{id?}', [FlotaController::class, 'enviarFlota']);
    Route::post('/juego/flotas/modificarFlota/{id?}', [FlotaController::class, 'modificarFlota']);
    Route::get('/juego/flotas/{nombreflota?}/{tipoflota?}', [FlotaController::class, 'editarFlota']);
    Route::post('/juego/flotas/rutas/guardarRuta', [FlotaController::class, 'guardarRuta']);
    Route::post('/juego/flotas/rutas/borrarRuta/{id?}', [FlotaController::class, 'borrarRuta']);
    Route::post('/juego/flotas/rutas/traerRuta/{id?}', [FlotaController::class, 'traerRuta']);
    Route::post('/juego/flotas/rutas/cargarListaRutas', [FlotaController::class, 'cargarListaRutas']);

    //Banco
    Route::get('/juego/banco', [BancoController::class, 'index']);

    //Politica
    Route::get('/juego/politica/{tab?}', [PoliticasController::class, 'index']);
    Route::get('/juego/politica/proponer/{codigo}/{accion}', [PoliticasController::class, 'proponer']);
    Route::get('/juego/politica/votar/{codigo}', [PoliticasController::class, 'votar']);

    //Comercio
    Route::get('/juego/comercio', [ComercioController::class, 'index']);

    //General
    Route::get('/juego/general/{tab?}', [GeneralController::class, 'index']);

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
    Route::get('/juego/mensajes/{tab?}', [MensajesController::class, 'index']);
    Route::post('/juego/mensajes/enviarMensaje', [MensajesController::class, 'enviarMensaje']);
    Route::get('/juego/mensajes/borrar/{idMensaje}/{idJugador}/{tab?}', [MensajesController::class, 'borrarMensaje']);

    //Grupos Naves
    Route::get('/juego/gruposNaves/{tab?}', [GruposNavesController::class, 'index']);
    Route::post('/juego/gruposNaves/guardar/gruposnaves', [GruposNavesController::class, 'GuardarGruposNaves']);
});
