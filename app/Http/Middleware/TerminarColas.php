<?php

namespace App\Http\Middleware;

use App\Models\EnConstrucciones;
use App\Models\EnDisenios;
use App\Models\EnInvestigaciones;
use App\Models\Flotas;
use App\Models\Jugadores;
use Closure;
use Illuminate\Http\Request;

class TerminarColas
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
        // Terminar colas pendientes
        EnConstrucciones::terminarColaConstrucciones();
        EnInvestigaciones::terminarColaInvestigaciones();
        EnDisenios::terminarColaDisenios();
        Flotas::llegadaFlotas();
        Jugadores::calcularPuntos(session()->get('jugadores_id'));
        return $next($request);
    }
}
