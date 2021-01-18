<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Industrias;
use App\Models\Constantes;
use App\Models\Dependencias;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\CostesConstrucciones;
use App\Models\Investigaciones;
use App\Models\Alianzas;
use App\Models\Jugadores;
use Auth;
use App\Models\Radares;
use App\Models\Flotas;

class AstrometriaController extends Controller
{
    public function index()
    {
        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        if (empty(session()->get('jugadores_id'))) {
            return redirect('/jugador');
        }
        $constantesCheck = Constantes::find(1);
        if (empty($constantesCheck)) {
            return redirect('/admin/DatosMaestros');
        }
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->id != $jugadorActual->id and $planetaActual->jugadores->id != $jugadorAlianza->id) {
            return redirect('/planeta');
        }
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();
        $jugadorAlianza = new Jugadores();
        $jugadorAlianza->id = 0;
        $planetasAlianza = null;
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }
        EnConstrucciones::terminarColaConstrucciones();
        $construcciones = Construcciones::construcciones($planetaActual);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $producciones = Producciones::calcularProducciones($construcciones, $planetaActual);
        $capacidadAlmacenes = Almacenes::calcularAlmacenes($construcciones);
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $personal = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personal += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personal += $cola->personal;
            }
        }
        $tipoPlaneta = $planetaActual->tipo;
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel;
        $nivelEnsamblajeFuselajes = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel);
        $nivelEnsamblajeDefensas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeDefensas')->first()->nivel);
        $nivelEnsamblajeTropas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeTropas')->first()->nivel);
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
        //Fin recursos

        return view('juego.astrometria.astrometria', compact(
            'recursos',
            'capacidadAlmacenes',
            'producciones',
            'personal',
            'tipoPlaneta',
            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            // 'nivelEnsamblajeDefensas',
            // 'nivelEnsamblajeTropas',
            'investigaciones',
            'factoresIndustrias',
            'planetasJugador',
            'planetasAlianza'
        ));
    }

    public function generarUniverso()
    {
        $universo = [];
        $planetas = Planetas::select('estrella', 'jugadores_id')->orderBy('jugadores_id', 'desc')->distinct()->get(['estrella']);
        foreach ($planetas as $planeta) {
            if ($planeta->jugadores_id > 1) {
                $planetita = new Planetas();
                $planetita->habitado = 1;
                $planetita->estrella = $planeta->estrella;
                array_push($universo, $planetita);
            } else {
                $planetita = new Planetas();
                $planetita->habitado = 0;
                $planetita->estrella = $planeta->estrella;
                array_push($universo, $planetita);
            }
        }
        $planetoide = new Planetas();
        $planetoide->idioma = 0;
        $planetoide->global = Planetas::max('estrella');
        $planetoide->ancho = 500;
        $planetoide->fondo = "img/fondo.png";
        $planetoide->sistemas = $universo;
        return $planetoide;
    }

    public function generarRadares()
    {

        $radares = [];

        for ($n = 0; $n < 30; $n++) {
            $radar = new Radares();
            $radar->estrella = random_int(1, 10000);
            $radar->circulo = random_int(1, 10);
            $radar->color = random_int(1, 4);
            array_push($radares, $radar);
        }

        return compact('radares');
    }


    public function generarFlotas()
    {

        $flotas = [];

        for ($n = 0; $n < 30; $n++) {
            $flota = new Flotas();
            $flota->numeroflota = random_int(1, 10000);
            $flota->nick = random_int(1, 100) . "-" . random_int(1, 10000);
            $flota->ataque = random_int(1, 1000000);
            $flota->defensa = random_int(1, 1000000);
            $flota->origen = random_int(1, 10000) . "x" . random_int(1, 9);
            $flota->destino = random_int(1, 10000) . "x" . random_int(1, 9);
            $flota->angulo = random_int(1, 400); //para cuando no se sabe la linea
            $flota->color = random_int(1, 5);
            $flota->fecha = random_int(0, 23) . "h " . random_int(0, 59) . "m " . random_int(0, 59) . "s";

            $flota->coordix = random_int(1, 10000);
            $flota->coordiy = random_int(1, 10000);

            $flota->coordfx = random_int(1, 10000);
            $flota->coordfy = random_int(1, 10000);

            $flota->coordx = round(((($flota->coordix - $flota->coordfx) / random_int(1, 100)) + $flota->coordix), 2);
            $flota->coordy = round((($flota->coordiy - $flota->coordfy) / random_int(1, 100)) + $flota->coordiy, 2);

            $flota->abreen = "ppal";


            array_push($flotas, $flota);
        }

        return compact('flotas');
    }
}
