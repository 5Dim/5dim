<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Constantes;
use App\Models\Planetas;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\Disenios;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\GruposNaves;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\MensajesIntervinientes;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class GruposNavesController extends Controller
{

    public function index($tab="crear-tab")
    {
        extract($this->recursos());

        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $diseniosJugador = $jugadorActual->disenios;
        $disenios = Disenios::calculaMejoras($diseniosJugador);

        $constantesC = Constantes::where('tipo', 'combate')->get();

        $listaGruposNaves=GruposNaves::where("jugadores_id",$jugadorActual->id)->get();
        //Log::info("listaGruposNaves ".$listaGruposNaves);



        return view('juego.gruposNaves.gruposNaves', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',
            'consImperio',

            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'tab',
            'jugadorActual',
            'disenios',
            'listaGruposNaves',
            'constantesC'
        ));
    }

    public function GuardarGruposNaves(Request $request) {

        Log::info("llegando...");
        $gruponave = $request->input('gruponave');
        Log::info($request);
        Log::info($gruponave);

        return "ok";

    }
}
