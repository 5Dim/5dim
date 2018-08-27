<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Planetas;
use App\Industrias;
use App\Constantes;
use App\Dependencias;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;
use App\EnInvestigaciones;
use App\CostesConstrucciones;
use App\Investigaciones;
use App\Alianzas;
use App\Jugadores;
use Auth;
use App\Fuselajes;

class FuselajesController extends Controller
{

    public function index ()
    {
        //Buscamos el jugador actual
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        //Listado de plantas propios y de alianza
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();

        $jugadorAlianza = new Jugadores();
        $jugadorAlianza->id = 0;
        $planetasAlianza = null;

        //Comprobamos si el usuario tiene alianza para devolver los planetas
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }

        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->id != $jugadorActual->id and $planetaActual->jugadores->id != $jugadorAlianza->id) {
            return redirect('/planeta');
        }
        EnConstrucciones::terminarColaConstrucciones();
        $construcciones = Construcciones::construcciones($planetaActual);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $producciones = Producciones::calcularProducciones($construcciones, $planetaActual);
        $almacenes = Almacenes::calcularAlmacenes($construcciones);
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

        //Investigaciones
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);

        //Tecnologias para mostrar y calcular los puntos
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel;
        $nivelEnsamblajeNaves = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeNaves')->first()->nivel);
        $nivelEnsamblajeDefensas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeDefensas')->first()->nivel);
        $nivelEnsamblajeTropas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeTropas')->first()->nivel);

        //Calculo de mejora de las industrias
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

        $fuselajes = Fuselajes::all();
        $fuselajesJugador = Auth::user()->jugadores[0]->fuselajes;

        return view('juego.fuselajes.fuselajes', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual',
        'fuselajes', 'fuselajesJugador', 'nivelImperio', 'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas',
        'investigaciones', 'factoresIndustrias', 'planetasJugador', 'planetasAlianza'));
    }

    //Acceso a subir nivel de construccion
    public function desbloquear ($idFuselaje)
    {
        Auth::user()->jugadores[0]->fuselajes()->attach($idFuselaje);
        return redirect('/juego/fuselajes');
    }

    //Acceso a subir nivel de construccion
    public function diseñar ($idFuselaje)
    {
        //Auth::user()->jugadores[0]->fuselajes()->attach($idFuselaje);
        return redirect('/juego/fuselajes');
    }

    public function datos ($id)
    {
        $nombreInvestigacion=Fuselajes::find($id)->codigo;
        $descripcionInvestigacion = trans('fuselaje.' .'Dnave'.$id);
        return compact('descripcionInvestigacion', 'nombreInvestigacion');
    }
}