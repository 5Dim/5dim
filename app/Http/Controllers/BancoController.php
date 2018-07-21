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

class BancoController extends Controller
{

    public function index ()
    {
        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/juego/planeta');
        }
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
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personal += $cola->personal;
            }
        }
        $tipoPlaneta = $planetaActual->tipo;
        //Fin recursos

        return view('juego.recursosFrame', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual'));
    }
}