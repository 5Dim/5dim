<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Armas;
use App\Models\Planetas;
use App\Models\Constantes;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\MensajesIntervinientes;

class PlanetaController extends Controller
{

    public function index()
    {
        $compact = $this->recursos();
        extract($compact);

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
        $desbloqueos = Armas::whereIn('clase', ['invIa', 'invCarga', 'invHangar', 'invRecoleccion'])->get();

        //Datos de las producciones
        $producciones = Producciones::all();

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
            'producciones',
            'desbloqueos',
        ));
    }

    public function renombrarPlaneta($nombre)
    {
        $planeta = Planetas::find(session()->get('planetas_id'));
        $planeta->nombre = $nombre;
        $planeta->save();

        return redirect('/juego/planeta');
    }

    public function cederColonia($idJugador)
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        if (count($jugadorActual->planetas) > 1) {
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
