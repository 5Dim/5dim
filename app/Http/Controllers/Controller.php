<?php

namespace App\Http\Controllers;

use App\Models\Almacenes;
use App\Models\Constantes;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\EnVuelo;
use App\Models\Flotas;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\MensajesIntervinientes;
use App\Models\Planetas;
use App\Models\Producciones;
use App\Models\Recursos;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function recursos()
    {
        // Planeta, jugador y alianza
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->orderBy('creacion')->get();
        $planetasAlianza = null;
        $jugadorAlianza = null;
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->orderBy('creacion')->get();
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
        $consImperio = Constantes::where('codigo', 'adminImperioPuntos')->first()->valor;
        $nivelEnsamblajeFuselajes = Investigaciones::sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel); //Calcular nivel de puntos de ensamlaje (PE)

        if (!empty($jugadorActual->alianzas)) {
            $emisorSinLeer = MensajesIntervinientes::where('leido', false)->whereIn('receptor', [session()->get('jugadores_id'), $jugadorAlianza->id])->get();
        } else {
            $emisorSinLeer = MensajesIntervinientes::where([['receptor', session()->get('jugadores_id')], ['leido', false]])->get();
        }
        $mensajeNuevo = 0;
        if (!empty($emisorSinLeer)) {
            $mensajeNuevo = count($emisorSinLeer);
        }
        // Fin obligatorio por recursos

        return compact(
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'planetaActual',
            'mensajeNuevo',
            'construcciones',
            'investigaciones',
            'colaConstruccion',
            'colaInvestigacion',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'mensajeNuevo',
            'jugadorActual',
            'consImperio',
            'jugadorAlianza'
        );
    }

    public function flotaBase($estrella = "", $orbita = "", $nombreflota = "", $tipoflota = "envuelo")
    {
        extract($this->recursos());

        //variables universo
        $constantesU = Constantes::where('tipo', 'universo')->get();
        $cantidadDestinos = $constantesU->where('codigo', 'cantidadDestinosFlotas')->first()->valor;
        $constantes = Constantes::where('tipo', 'investigacion')->get();

        $cargaDest = [];
        $prioridades = [];
        $destinos = [];
        $visionXDefecto = true;

        if (!empty($nombreflota) && !empty($tipoflota)) {
            if ($tipoflota == "envuelo" || $tipoflota == "enorbita"  || $tipoflota == "enrecoleccion") {
                $result = Flotas::valoresEdicionFlotasController($jugadorActual, $tipoflota, $nombreflota);
                $visionXDefecto = $result[0];
                $destinos = $result[1];
                $flota = $result[2];
                $navesEstacionadas = $result[3];
                $recursosFlota = $result[4];
                $prioridades = $result[5];
                $cargaDest = $result[6];
            }
        } else {
            $visionXDefecto = true;
        }

        $result = Flotas::valoresVaciosFlotaController($planetaActual);
        $prioridadesXDefecto = $result[0];
        $recursosDestino = $result[1];
        $destino = $result[2];
        $origen = $result[3];

        $cargaDestVacia = [];
        $prioridadesVacia = [];
        $destinosVacia = [];
        for ($dest = 0; $dest < $cantidadDestinos + 1; $dest++) {
            array_push($destinosVacia, $destino);
            array_push($cargaDestVacia, $recursosDestino);
            array_push($prioridadesVacia, $prioridadesXDefecto);
        }

        $recursosFlota = $recursos;

        if ($visionXDefecto) {

            array_push($prioridades, $prioridadesXDefecto);
            array_push($cargaDest, $recursosDestino);
            array_push($destinos, $origen);

            for ($dest = 1; $dest < $cantidadDestinos + 1; $dest++) {
                array_push($destinos, $destino);
                array_push($cargaDest, $recursosDestino);
                array_push($prioridades, $prioridadesXDefecto);
            }

            //Naves en el planeta
            $navesEstacionadas = $planetaActual->estacionadas;

            // datosFlota
            $flota = new EnVuelo();
            $flota->nombre = "";

            $destinos[1]["estrella"] = $estrella;
            $destinos[1]["orbita"] = $orbita;
        }

        // $diseniosJugador = $jugadorActual->disenios;

        $result = Flotas::valoresDiseniosFlotaController($navesEstacionadas);
        $diseniosJugador = $result[0];
        $ViewDaniosDisenios = $result[1];


        $flotasEnOrbitaPropias = $jugadorActual->enOrbita;
        $flotasEnRecoleccionPropias = $jugadorActual->enRecoleccion;

        if (!empty($jugadorAlianza)) {
            $flotasEnOrbitaAlianza = $jugadorAlianza->enOrbita;
            $flotasEnRecoleccionAlianza = $jugadorAlianza->enRecoleccion;
        } else {
            $flotasEnOrbitaAlianza = null;
            $flotasEnRecoleccionAlianza = null;
        }

        return compact(
            'recursos',
            'recursosFlota',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',
            'consImperio',

            'cantidadDestinos',
            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            'constantesU',
            'navesEstacionadas',
            'diseniosJugador',
            'constantes',
            'ViewDaniosDisenios',
            'destinos',
            'cargaDest',
            'prioridades',
            'flota',
            'flotasEnOrbitaPropias',
            'flotasEnRecoleccionPropias',
            'flotasEnOrbitaAlianza',
            'flotasEnRecoleccionAlianza',
            'destinosVacia',
            'cargaDestVacia',
            'prioridadesVacia',
        );
    }
}
