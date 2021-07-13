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
use App\Models\Constantes;
use App\Models\EnDisenios;
use App\Models\Flotas;
use App\Models\Jugadores;
use App\Models\MensajesIntervinientes;
use App\Models\Tiendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JuegoController extends Controller
{
    public function index()
    {
        return redirect('/juego/general');
    }

    public function estadisticas()
    {
        extract($this->recursos());

        //Actualizamos estadisticas
        Jugadores::calcularPuntos(session()->get('jugadores_id'));

        //Lista de jugadores
        $jugadores = Jugadores::orderBy(DB::raw("`puntos_construccion` + `puntos_investigacion` + `puntos_flotas`"), 'desc')->paginate(50);

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
        }
        return back();
    }

    //Cambiar de planeta
    public function opcionesJugador()
    {
        extract($this->recursos());

        return view('juego.jugador.opciones', compact(
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
        ));
    }

    //Cambiar de planeta
    public function cambiarOpciones(Request $request)
    {
        extract($this->recursos());
        $jugadorActual->avatar = $request->input('avatar');
        if ($request->input('mensajesFlota') == 'on') {
            $jugadorActual->mensajes_flota = true;
        } else {
            $jugadorActual->mensajes_flota = false;
        }
        $jugadorActual->save();

        foreach ($planetasJugador as $planeta) {
            $planeta->orden = $request->input($planeta->id . "orden");
            $planeta->color = $request->input($planeta->id . "color");
            Log::info($request->input($planeta->id . "color"));
            $planeta->save();
        }

        return back();
    }

    public function terminarColas()
    {
        EnConstrucciones::terminarColaConstrucciones();
        EnInvestigaciones::terminarColaInvestigaciones();
        EnDisenios::terminarColaDisenios();
        Flotas::llegadaFlotas();
        Log::info("TERMINAR COLAS");
    }

    public function sumarPuntosDeVictoria()
    {
        Jugadores::calcularPuntosInversos();
        Log::info("CALCULAR PUNTOS DE VICTORIA");
    }
}
