<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\MensajesIntervinientes;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{

    public function index($tab = "general-tab")
    {
        extract($this->recursos());

        if (empty(Auth::user()->jugador)) {
            return redirect('/juego/general/' . $tab);
        }

        return view('juego.general', compact(
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
            'colaConstruccion',
            'colaInvestigacion',
            'investigaciones',
            'tab',
        ));
    }
}
