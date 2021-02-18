<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Constantes;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;

class PlanetaController extends Controller
{

    public function index()
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
        $investigaciones = Investigaciones::investigaciones();
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
        $nivelEnsamblajeFuselajes = Investigaciones::sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel); //Calcular nivel de puntos de ensamlaje (PE)
        // Fin obligatorio por recursos

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

            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            'factoresIndustrias',
            'constantes',
            'produccionesSinCalcular',
            'capacidadRefugio',
            'jugadores',
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
            foreach ($planeta->construcciones as $edificio) {
                $edificio->delete();
            }
            $planeta->save();
        }

        return redirect('/juego/planeta');
    }
}
