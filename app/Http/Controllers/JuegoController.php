<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\Recursos;
use App\Almacenes;
use App\Planetas;
use App\Industrias;
use App\Constantes;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;

class JuegoController extends Controller
{
    public function index()
    {
        //Inicio recursos
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
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
            $personal += $cola->personal;
        }
        $tipoPlaneta = $planetaActual->tipo;
        //Fin recursos

        return view('juego.recursosFrame', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual'));
    }

    //Cambiar de planeta
    public function planeta($planeta = false, $universo = 0)
    {
        $planetaBusqueda = Planetas::find($planeta);
        //En que planeta estamos
        if (!$planeta) {
            session()->put('planetas_id', Auth::user()->jugadores[$universo]->planetas[0]->id);
        }else{
            if ($planetaBusqueda->jugadores_id == Auth::user()->jugadores[$universo]->id) {
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