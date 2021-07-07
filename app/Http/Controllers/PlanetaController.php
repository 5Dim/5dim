<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Almacenes;
use App\Models\Armas;
use App\Models\Planetas;
use App\Models\Constantes;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\Jugadores;

class PlanetaController extends Controller
{

    public function index($tab = "colonia-tab")
    {
        extract($this->recursos());

        //Producciones sin calcular
        $produccionesSinCalcular = Producciones::calcularProducciones($construcciones, $planetaActual, false);

        //Constantes
        $constantes = Constantes::where('tipo', 'construccion')->get();

        //Variables del refugio
        $nivelRefugio = Construcciones::where([['codigo', 'refugio'], ['planetas_id', session()->get('planetas_id')]])->first()->nivel;
        $capacidadRefugio = Almacenes::where('nivel', $nivelRefugio)->first()->capacidad;

        // Factores de las industrias
        $factoresIndustrias = [];
        $mejoraIndustrias = Constantes::where('codigo', 'mejorainvIndustrias')->first()->valor;
        $factorLiquido = (1 + ($investigaciones->where('codigo', 'invIndLiquido')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorLiquido);
        $factorMicros = (1 + ($investigaciones->where('codigo', 'invIndMicros')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMicros);
        $factorFuel = (1 + ($investigaciones->where('codigo', 'invIndFuel')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorFuel);
        $factorMa = (1 + ($investigaciones->where('codigo', 'invIndMa')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMa);
        $factorMunicion = (1 + ($investigaciones->where('codigo', 'invIndMunicion')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMunicion);

        //Datos de las armas que se desbloquean por tecnologia
        $desbloqueos = Armas::whereIn('clase', ['invIa', 'invCarga', 'invHangar', 'invRecoleccion'])->orderBy('clase', 'asc')->orderBy('niveltec', 'asc')->get();

        //Datos de las producciones
        $tablaProduccion = Producciones::all();

        //Todos los jugadores para la cesiones
        $jugadores = Jugadores::all();

        return view('juego.planeta', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',
            'consImperio',

            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            'factoresIndustrias',
            'constantes',
            'produccionesSinCalcular',
            'capacidadRefugio',
            'jugadores',
            'tablaProduccion',
            'desbloqueos',
            'tab',
        ));
    }

    public function renombrarPlaneta($nombre)
    {
        $planeta = Planetas::find(session()->get('planetas_id'));
        $planeta->nombre = $nombre;
        $planeta->save();

        return redirect('/juego/planeta');
    }

    public function moverPlaneta($posicion)
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $destino = Planetas::where('estrella', $posicion)->get();
        if ($jugadorActual->movimientos > 0 && $destino->isEmpty()) {
            $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
            $planetas = Planetas::where('estrella', $planetaActual->estrella)->get();
            foreach ($planetas as $planeta) {
                $planeta->estrella = $posicion;
                $planeta->save();
            }
            $jugadorActual->movimientos -= 1;
            $jugadorActual->save();
        }

        return redirect('/juego/planeta');
    }

    public function cederColonia($idJugador)
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        if (count($jugadorActual->planetas) > 1 && Planetas::verificarPIPlaneta($idJugador)) {
            $planeta = Planetas::find(session()->get('planetas_id'));
            $planeta->jugadores_id = $idJugador;
            $planeta->save();
        }

        return redirect('/juego/planeta');
    }

    public function destruirColonia()
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        if (count($jugadorActual->planetas) > 1) {
            $planeta = Planetas::find(session()->get('planetas_id'));
            $planeta->jugadores_id = null;
            $planeta->nombre = null;
            foreach ($planeta->construcciones as $edificio) {
                $edificio->delete();
            }
            $planeta->save();
        }

        return redirect('/juego/planeta');
    }
}
