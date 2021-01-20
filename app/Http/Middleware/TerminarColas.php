<?php

namespace App\Http\Middleware;

use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
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
        return $next($request);
    }
}
