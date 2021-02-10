<?php

namespace App\Http\Middleware;

use App\Models\Constantes;
use App\Models\CualidadesPlanetas;
use App\Models\Jugadores;
use App\Models\Planetas;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JugadorLogueado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Comprobamos que los datos maestros existan
        $constantesCheck = Constantes::find(1);
        if (empty($constantesCheck)) {
            return redirect('/admin/DatosMaestros');
        }
        //Comprobamos si el usuario tiene un jugador en el mundo
        if (empty(Auth::user()->jugador)) {
            Jugadores::nuevoJugador();
        }
        // Añadimos el jugador
        if (!session()->has('jugadores_id')) {
            session()->put('jugadores_id', Auth::user()->jugador->id);
        }

        // Comprobamos si el jugador tiene alianza o lo ponemos a nulo
        if (!session()->has('alianza_id')) {
            if (Auth::user()->jugador->alianza_id != null) {
                session()->put('alianza_id', Auth::user()->jugador->alianza_id);
            } else {
                session()->put('alianza_id', "nulo");
            }
        }

        // Comprobamos si tiene planeta valido o asignamos su primer planeta
        if (!session()->has('planetas_id')) {
            //Si no tiene planetas generamos un planeta para el
            if (empty(Auth::user()->jugador->planetas)) {
                Planetas::nuevoPlaneta(Auth::user()->jugador);
            } else { // Si tiene planetas asignamos el primero de la lista
                session()->put('planetas_id', Auth::user()->jugador->planetas[0]->id);
            }
        } else { // En caso de tener un id de planeta, comprobamos que el planeta asignado es valido
            $jugadorActual = Auth::user()->jugador;
            if (session()->get('alianza_id') != "nulo") {
                $idAlianza = Auth::user()->jugador->alianza_id;
            } else {
                $idAlianza = session()->get('alianza_id');
            }
            $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();

            // Comrpobamos que el planeta sea un lugar valido y si no lo es asignamos su primer planeta
            if (!empty($planetaActual->jugadores)) {
                if (
                    $planetaActual->jugadores->id != $jugadorActual->id and
                    $planetaActual->jugadores->id != $idAlianza
                ) { //Si el planeta coincide con la alianza o el jugador
                    session()->put('planetas_id', Auth::user()->jugador->planetas[0]->id);
                }else{
                    if (!empty(Auth::user()->jugador->planetas[0])) {
                        session()->put('planetas_id', Auth::user()->jugador->planetas[0]->id);
                    } else {
                        $planetaElegido = Planetas::nuevoPlaneta(Auth::user()->jugador);
                        session()->put('planetas_id', $planetaElegido->id);
                    }
                }
            } else {
                if (!empty(Auth::user()->jugador->planetas[0])) {
                    session()->put('planetas_id', Auth::user()->jugador->planetas[0]->id);
                } else {
                    $planetaElegido = Planetas::nuevoPlaneta(Auth::user()->jugador);
                    session()->put('planetas_id', $planetaElegido->id);
                }
            }
        }

        return $next($request);
    }
}
