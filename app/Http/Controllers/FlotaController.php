<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Constantes;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\Disenios;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\ViewDaniosDisenios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FlotaController extends Controller
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
        $nivelEnsamblajeFuselajes = Investigaciones::sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel); //Calcular nivel de puntos de ensamlaje (PE)
        // Fin obligatorio por recursos

        //variables universo
        $constantesU = Constantes::where('tipo', 'universo')->get();

        //constantes invest
        $constantes = Constantes::where('tipo', 'investigacion')->get();

        //Naves en el planeta
        $navesEstacionadas = $planetaActual->estacionadas;
        $diseniosJugador = $jugadorActual->disenios;

        foreach ($diseniosJugador as $disenio) {
            $disenio->tamanio = $disenio->fuselajes->tamanio;
        }

        $mejoras = [];
        for ($i = 0; $i < count($diseniosJugador); $i++) {
            $diseniosJugador[$i]->mejoras;
        }

        $idsDiseno=array();
        foreach($navesEstacionadas as $diseno){
            array_push($idsDiseno,$diseno->id);
        }
        $ViewDaniosDisenios = ViewDaniosDisenios::whereIn('disenios_id', $idsDiseno)->get();

        return view('juego.flotas.flotas', compact(
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
            'constantesU',
            'navesEstacionadas',
            'diseniosJugador',
            'mejoras',
            'constantes',
            'ViewDaniosDisenios',
        ));
    }

    public function traerRecursos($estrella,$orbita){

        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        $recursos = Planetas::where([ ['estrella', $estrella],['orbita', $orbita],['jugadores_id', $jugadorActual->id] ])->first()->recursos;
        return compact('recursos');
    }

    public function enviarFlota(Request $request, $id = false){ //$id es de la flota en orbita de la que salimos

        $valNaves = $request->input('valNaves');
        $cargaDest = $request->input('cargaDest');
        $prioridades = $request->input('prioridades');
        $datosBasicos = $request->input('datosBasicos');
        $destinos = $request->input('destinos');
        Log::error($_POST['valNaves']);
        $errores="";

        //// valores de las naves en planeta
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $navesEstacionadas = $planetaActual->estacionadas;

        $disenios = [];
        foreach ($navesEstacionadas as $nave) {

            //$coleccion=collect($valNaves);

           // $navejs=$coleccion->where("iddisenio",$nave->disenios_id)->first();
            isset($valNaves[$nave->disenios_id]) ? $navejs=$valNaves[$nave->disenios_id] : $navejs=null;


            if(!empty($navejs) && $navejs->enflota>0 && $navejs->enhangar){
                array_push($disenios,$nave->disenios);
            }

        }

        Disenios::calculaMejoras($disenios);

        Log::error($disenios);



        return compact('errores');
    }


}
