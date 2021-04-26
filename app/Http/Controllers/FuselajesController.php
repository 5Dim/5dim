<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\Fuselajes;
use App\Models\MensajesIntervinientes;
use Illuminate\Support\Facades\Auth;

class FuselajesController extends Controller
{

    public function index($tab = "cazas-tab")
    {
        // Planeta, jugador y alianza
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();
        $planetasAlianza = null;
        if (session()->has('alianza_id') != "nulo") {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }

        //Recursos
        $investigaciones = Investigaciones::investigaciones($planetaActual);
        $construcciones = Construcciones::construcciones($planetaActual);
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $produccion = Producciones::calcularProducciones($construcciones, $planetaActual);
        $capacidadAlmacenes = Almacenes::calcularAlmacenes($construcciones);

        // Personal ocupado
        $personalOcupado = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personalOcupado += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personalOcupado += $cola->personal;
            }
        }

        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel; //Nivel de imperio, se usa para calcular los puntos de imperio (PI)

        $emisorSinLeer = MensajesIntervinientes::where([['receptor', session()->get('jugadores_id')], ['leido', false]])->first();
        $mensajeNuevo = false;
        if (!empty($emisorSinLeer)) {
            $mensajeNuevo = true;
        }
        // Fin obligatorio por recursos

        // $fuselajes = Fuselajes::all();
        $cazas = Fuselajes::where([
            ["tamanio", 'caza'],
            ["categoria", 'jugador']
        ])->orderBy('coste', 'asc')->orderBy('codigo', 'asc')->get();
        $ligeras = Fuselajes::where([
            ["tamanio", 'ligera'],
            ["categoria", 'jugador']
        ])->orderBy('coste', 'asc')->orderBy('codigo', 'asc')->get();
        $medias = Fuselajes::where([
            ["tamanio", 'media'],
            ["categoria", 'jugador']
        ])->orderBy('coste', 'asc')->orderBy('codigo', 'asc')->get();
        $pesadas = Fuselajes::where([
            ["tamanio", 'pesada'],
            ["categoria", 'jugador']
        ])->orderBy('coste', 'asc')->orderBy('codigo', 'asc')->get();
        $estaciones = Fuselajes::where([
            ["tamanio", 'estacion'],
            ["categoria", 'jugador']
        ])->orderBy('coste', 'asc')->orderBy('codigo', 'asc')->get();
        $novas = Fuselajes::where("categoria", 'compra')->orderBy('coste', 'asc')->orderBy('tamanio', 'asc')->get();
        $fuselajesJugador = Auth::user()->jugador->fuselajes;
        $nivelEnsamblajeFuselajes = Investigaciones::where([
            ['jugadores_id', session()->get('jugadores_id')],
            ['codigo', 'invEnsamblajeFuselajes'],
        ])->first()->nivel;

        return view('juego.fuselajes.fuselajes', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',

            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            // 'fuselajes',
            'cazas',
            'ligeras',
            'medias',
            'pesadas',
            'estaciones',
            'novas',
            'fuselajesJugador',
            'tab',
        ));
    }

    //Acceso a subir nivel de construccion
    public function desbloquear($idFuselaje, $tab)
    {
        $nivelEnsamblajeFuselajes = Investigaciones::where([
            ['jugadores_id', session()->get('jugadores_id')],
            ['codigo', 'invEnsamblajeFuselajes'],
        ])->first()->nivel;
        $fuselaje = Fuselajes::find($idFuselaje);
        if ($nivelEnsamblajeFuselajes >= $fuselaje->coste) {
            Auth::user()->jugador->fuselajes()->attach($idFuselaje);
        }
        return redirect('/juego/fuselajes/' . $tab);
    }

    //Acceso a subir nivel de construccion
    public function diseniar($idFuselaje)
    {
        //Auth::user()->jugadores[0]->fuselajes()->attach($idFuselaje);
        return redirect('/juego/fuselajes');
    }

    public function datos($id)
    {
        $nombreInvestigacion = Fuselajes::find($id)->codigo;
        $descripcionInvestigacion = trans('fuselaje.' . 'Dnave' . $id);
        return compact('descripcionInvestigacion', 'nombreInvestigacion');
    }
}
