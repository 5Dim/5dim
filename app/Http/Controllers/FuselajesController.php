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
use Auth;
use App\Fuselajes;

class FuselajesController extends Controller
{

    public function index ()
    {
        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->user != Auth::user()) {
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
        //Fin recursos

        $fuselajes = Fuselajes::all();
        $fuselajesJugador = Auth::user()->jugadores[0]->fuselajes;

        return view('juego.fuselajes', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'fuselajes', 'fuselajesJugador', 'nivelImperio', 'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas'));
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