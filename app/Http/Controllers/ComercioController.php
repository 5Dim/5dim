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

class ComercioController extends Controller
{

    public function index()
    {
        $compact = $this->recursos();
        extract($compact);

        return view('juego.layouts.recursosFrame', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',

            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
        ));
    }
}
