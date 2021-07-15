<?php

namespace App\Http\Controllers;

use App\Models\Constantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PoliticasController extends Controller
{
    public function index($tab = "construcciones-tab")
    {
        extract($this->recursos());

        if (date('l') == 'Monday' || date('l') == 'Tuesday' || date('l') == 'Wednesday') {
            $politicaConstruccion = Constantes::where([['votable', 1], ['tipo', 'construccion']])->get();
            $politicaInvestigacion = Constantes::where([['votable', 1], ['tipo', 'investigacion']])->get();
            $politicaFuselajes = Constantes::where([['votable', 1], ['tipo', 'fuselajes']])->get();
            $politicaUniverso = Constantes::where([['votable', 1], ['tipo', 'universo']])->get();
        } else {
            $politicaConstruccion = Constantes::where([['votable', 1], ['propuesta', 1], ['tipo', 'construccion']])->get();
            $politicaInvestigacion = Constantes::where([['votable', 1], ['propuesta', 1], ['tipo', 'investigacion']])->get();
            $politicaFuselajes = Constantes::where([['votable', 1], ['propuesta', 1], ['tipo', 'fuselajes']])->get();
            $politicaUniverso = Constantes::where([['votable', 1], ['propuesta', 1], ['tipo', 'universo']])->get();
        }

        //Devolvemos la vista con todas las variables
        return view('juego.politica.politicas', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'planetaActual',
            'mensajeNuevo',
            'colaConstruccion',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'consImperio',
            'tab',

            'politicaConstruccion',
            'politicaInvestigacion',
            'politicaFuselajes',
            'politicaUniverso',
        ));
    }

    public function proponer($codigo, $accion)
    {
        extract($this->recursos());
        $jugador = Auth::user()->jugador;
        $politica = Constantes::where('codigo', $codigo)->first();
        if ($jugador->propuestas > 0 && !empty($accion) && !$politica->propuesta) {
            $politica->propuesta = true;
            $politica->accion = $accion;
            $politica->save();

            $jugador->propuestas -= 1;
            $jugador->save();
        }

        return redirect('/juego/politica');
    }

    public function votar($codigo)
    {
        extract($this->recursos());
        $jugador = Auth::user()->jugador;
        $politica = Constantes::where('codigo', $codigo)->first();
        if (
            empty($jugador->constantes_id) && $politica->propuesta
        ) {
            // $politica->propuesta = true;
            // $politica->accion = $accion;
            // $politica->save();

            $jugador->constantes_id = $politica->id;
            $jugador->save();
        }

        return redirect('/juego/politica');
    }

    public function aplicarPoliticas()
    {
        Constantes::votacionPolitica();
        // Log::info("VOTACIONES");
    }
}
