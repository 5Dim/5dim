<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
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

class JuegoController extends Controller
{
    public function index()
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

        return view('juego.recursosFrame', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'nivelImperio', 'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas'));
    }

    //Cambiar de planeta
    public function planeta($planeta = false, $universo = 0)
    {
        $planetaBusqueda = Planetas::find($planeta);
        //En que planeta estamos
        if (!$planeta) {
            session()->put('planetas_id', Auth::user()->jugadores[$universo]->planetas[0]->id);
        }else{
            if ($planetaBusqueda->jugadores->user == Auth::user()) {
                session()->put('planetas_id', $planeta);
            }else{
                return redirect('/planeta');
            }
        }
        return redirect('/juego/construccion');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function pruebas()
    {
        return view('pruebas');
    }
}