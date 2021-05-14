<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SetLocale
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
        //Idioma
        if (!empty(Auth::user())) {
            $idioma = Auth::user()->idioma;
        } else {
            $idioma = 'en';
        }

        App::setlocale($idioma);
        return $next($request);
    }
}
