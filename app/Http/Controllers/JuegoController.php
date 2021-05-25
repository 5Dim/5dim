<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Alianzas;
use App\Models\Jugadores;
use App\Models\MensajesIntervinientes;
use App\Models\Tiendas;

class JuegoController extends Controller
{
    public function index()
    {
        extract($this->recursos());

        return view('juego.layouts.recursosFrame', compact(
            'recursos',
            'capacidadAlmacenes',
            'producciones',
            'personal',
            'tipoPlaneta',
            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'mensajeNuevo',
            'consImperio',
        ));
    }

    public function estadisticas()
    {
        extract($this->recursos());

        //Actualizamos estadisticas
        Jugadores::calcularPuntos(session()->get('jugadores_id'));

        //Lista de jugadores
        $jugadores = Jugadores::orderBy(DB::raw("`puntos_construccion` + `puntos_investigacion`"), 'desc')->paginate(50);

        //Devolvemos todas las alianzas
        $alianzas = Alianzas::all();

        return view('juego.estadisticas', compact(
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
            'investigaciones',
            'jugadores',
            'alianzas',
        ));
    }

    public function tienda()
    {
        extract($this->recursos());

        $articulos = Tiendas::all();

        return view('juego.tienda.tienda', compact(
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
            'investigaciones',
            'articulos',
        ));
    }

    //Cambiar de planeta
    public function calcularPuntos()
    {
        Jugadores::calcularPuntos(session()->get('jugadores_id'));
        return redirect('/juego/construccion');
    }

    //Cambiar de planeta
    public function planeta($planeta)
    {
        //Comprobar si el jugador tiene alianza
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));

        //Comprobamos si el usuario tiene alianza para devolver los planetas
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
        }
        //Planeta al que queremos acceder
        $planetaBusqueda = Planetas::find($planeta);

        // Comprobamos si el planeta pertenece al jugador o a la alianza
        if (
            $planetaBusqueda->jugadores->id == $jugadorActual->id or
            $planetaBusqueda->jugadores->id == $jugadorAlianza->id
        ) {
            session()->put('planetas_id', $planeta);
        } else {
            return back();
            // return redirect('/juego/construccion');
        }
        return back();
        // return redirect('/juego/calcularPuntos');
    }
}
