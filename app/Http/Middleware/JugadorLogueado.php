<?php

namespace App\Http\Middleware;

use App\Models\Constantes;
use App\Models\Jugadores;
use App\Models\Planetas;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
            return redirect('/panelControl/DatosMaestros');
        }
        //Comprobamos si el usuario tiene un jugador en el mundo
        if (empty(Auth::user()->jugador)) {
            $jugador = Jugadores::nuevoJugador();
            session()->put('jugadores_id', $jugador->id);
        }else {
            $jugador = Auth::user()->jugador;
        }
        // Añadimos el jugador
        if (!session()->has('jugadores_id')) {
            session()->put('jugadores_id', $jugador->id);
        }

        //Comprobamos que el planeta que tiene asignado sea propio
        $jugadorActual = $jugador;
        if (!empty($jugadorActual->alianzas)) {
            $idAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first()->id;
        } else {
            $idAlianza = "nulo";
        }
        if (session()->has('planetas_id')) {
            $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        }

        // Comprobar si el planeta pertenece a un jugador
        if (!empty($planetaActual->jugadores)) {
            if (
                $planetaActual->jugadores->id != $jugadorActual->id and
                $planetaActual->jugadores->id != $idAlianza
            ) {
                //Si el planeta coincide con la alianza o el jugador
                session()->forget('planetas_id');
            }
        }

        if (!session()->has('planetas_id')) {
            //Si no tiene planetas generamos un planeta para el
            if (empty($jugador->planetas)) {
                $idPlaneta = Planetas::nuevoPlaneta($jugador->id);
                session()->put('planetas_id', $idPlaneta);
                $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
            } else {
                // Si tiene planetas asignamos el primero de la lista
                session()->put('planetas_id', $jugador->planetas[0]->id);
                $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
            }
        }

        return $next($request);
    }
}
