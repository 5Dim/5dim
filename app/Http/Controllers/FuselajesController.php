<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Planetas;
use App\Industrias;
use App\Constantes;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;
use App\EnInvestigaciones;
use App\Investigaciones;
use App\Dependencias;
use App\CostesInvestigaciones;

class FuselajesController extends Controller
{

    public function index ()
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

        return view('juego.fuselajes', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual'));
    }
}