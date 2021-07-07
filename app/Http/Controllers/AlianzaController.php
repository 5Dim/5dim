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
use App\Models\Alianzas;
use App\Models\Constantes;
use App\Models\Jugadores;
use App\Models\SolicitudesAlianzas;
use App\Models\Mensajes;
use App\Models\MensajesIntervinientes;

class AlianzaController extends Controller
{
    public function index()
    {
        extract($this->recursos());

        //Listado de alianzas
        $alianzas = Alianzas::all();

        //Comprobar si el jugador tiene alianza
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        if (empty($jugadorActual->alianzas_id)) {
            return view('juego.alianza.crearAlianza', compact(
                // Recursos
                'recursos',
                'personalOcupado',
                'capacidadAlmacenes',
                'produccion',
                'planetasJugador',
                'mensajeNuevo',
                'consImperio',

                'planetaActual',
                'nivelImperio',
                'nivelEnsamblajeFuselajes',
                'investigaciones',
                'alianzas',
            ));
        } else {
            $alianzaActual = Alianzas::find($jugadorActual->alianzas_id);
            return view('juego.alianza.alianza', compact(
                // Recursos
                'recursos',
                'personalOcupado',
                'capacidadAlmacenes',
                'produccion',
                'planetasJugador',
                'mensajeNuevo',
                'consImperio',

                'planetaActual',
                'nivelImperio',
                'nivelEnsamblajeFuselajes',
                'investigaciones',
                'alianzas',
                'jugadorActual',
                'alianzaActual',
            ));
        }
    }

    public function solicitudAlianza()
    {
        $alianza = Alianzas::find(request()->input('listaAlianzas'));
        $cuerpo = request()->input('solicitud');

        $solicitud = new SolicitudesAlianzas();
        $solicitud->solicitud = $cuerpo;
        $solicitud->alianzas_id = $alianza->id;
        $solicitud->jugadores_id = session()->get('jugadores_id');
        $solicitud->save();

        // $mensaje = new Mensajes();
        // $mensaje->asunto = "Nueva solicitud de acceso a la alianza: " . Jugadores::find(session()->get('jugadores_id'))->nombre;
        // $mensaje->mensaje = "<p>El jugador " . Jugadores::find(session()->get('jugadores_id'))->nombre . " solicita unirse a nuestra alianza</p>";
        // $mensaje->categoria = "recibidos";
        // $mensaje->emisor = Jugadores::where('nombre', $alianza->nombre)->first()->id;
        // $mensaje->save();

        // $interviniente = new MensajesIntervinientes();
        // $interviniente->receptor = Jugadores::where('nombre', $alianza->nombre)->first()->id;
        // $interviniente->leido = false;
        // $interviniente->mensajes_id = $mensaje->id;
        // $interviniente->save();

        return redirect('/juego/alianza');
    }

    public function generarAlianza()
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $alianza = new Alianzas();
        $alianza->nombre = request()->input('nombre');
        $alianza->tag = request()->input('tag');
        if (!empty(request()->input('estandarte'))) {
            $alianza->estandarte = request()->input('estandarte');
        }
        if (!empty(request()->input('logo'))) {
            $alianza->logo = request()->input('logo');
        }
        $alianza->interno = request()->input('interno');
        $alianza->portada = request()->input('portada');
        $alianza->jugadores_id = session()->get('jugadores_id');
        $alianza->save();

        $jugadorAlianza = Constantes::where('codigo', 'jugadoralianza')->first()->valor;
        if ($jugadorAlianza == 1) {
            $jugador = new Jugadores();
            $jugador->nombre = request()->input('nombre');
            $jugador->alianzas_id = $alianza->id;
            $jugador->save();

            $listaInvestigaciones = [];
            foreach ($jugadorActual->investigaciones as $investigacion) {
                $investigaciones = new Investigaciones();
                $investigaciones->nivel = $investigacion->nivel;
                $investigaciones->categoria = $investigacion->categoria;
                $investigaciones->codigo = $investigacion->codigo;
                $investigaciones->jugadores_id = $jugador->id;
                array_push($listaInvestigaciones, $investigaciones);
            }

            foreach ($listaInvestigaciones as $investigacion) {
                $investigacion->save();
            }
        }

        $jugadorActual->alianzas_id = $alianza->id;
        $jugadorActual->save();

        return redirect('/juego/alianza');
    }

    public function expulsarMiembro($idJugador)
    {
        //Buscamos el jugador
        $jugador = Jugadores::find($idJugador); // Jugador a expulsar
        $alianza = $jugador->alianzas; // Alianza
        $jugadorActual = Jugadores::find(session()->get('jugadores_id')); // Jugador que soy

        //Comprobamos si el usuario es el creador
        if ($alianza->creador->id == $jugadorActual->id && $alianza->nombre != $jugador->nombre) {
            $jugador->alianzas_id = null;
            $jugador->save();
        }

        return redirect('/juego/alianza');
    }

    public function salirAlianza()
    {
        //Buscamos el jugador
        $jugadorActual = Jugadores::find(session()->get('jugadores_id')); // Jugador que soy
        $alianza = $jugadorActual->alianzas; // Alianza
        if (count($jugadorActual->alianzas->miembros) > 2 && $alianza->creador->id != $jugadorActual->id) {
            $jugadorActual->alianzas_id = null;
            $jugadorActual->save();
        }

        return redirect('/juego/alianza');
    }

    public function disolverAlianza()
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id')); // Jugador que soy
        $alianza = $jugadorActual->alianzas; // Alianza
        if ($alianza->creador->id == $jugadorActual->id) {
            foreach ($alianza->miembros as $miembro) {
                $miembro->alianzas_id = null;
                $miembro->save();
            }

            $jugadorAlianza = Constantes::where('codigo', 'jugadoralianza')->first()->valor;
            if ($jugadorAlianza == 1) {
                $planetas = Jugadores::where('nombre', $alianza->nombre)->first()->planetas;
                foreach ($planetas as $planeta) {
                    foreach ($planeta->construcciones as $construccion) {
                        $construccion->delete();
                    }
                    $planeta->jugadores_id = null;
                    $planeta->save();
                }
                $jugadorAlianza = Alianzas::jugadorAlianza($alianza->id);
                foreach ($jugadorAlianza->investigaciones as $investigacion) {
                    $investigacion->delete();
                }
                $jugadorAlianza->delete();
            }
        }

        return redirect('/juego/alianza');
    }

    public function rechazarSolicitud($idSolicitud)
    {
        //Buscamos la solicitud
        $solicitud = SolicitudesAlianzas::find($idSolicitud);
        $solicitud->delete();

        return redirect('/juego/alianza');
    }

    public function aceptarSolicitud($idSolicitud)
    {
        //Buscamos la solicitud y la alianza
        $solicitud = SolicitudesAlianzas::find($idSolicitud);
        $jugadorNuevo = $solicitud->jugadores;
        $jugadorNuevo->alianzas_id = $solicitud->alianzas_id;

        foreach ($jugadorNuevo->investigaciones as $investigacion) {
            $codigoBusqueda = $investigacion->codigo;
            if ($investigacion->nivel > $solicitud->alianzas->miembros[0]->investigaciones->where('codigo', $codigoBusqueda)->first()->nivel) {
                foreach ($solicitud->alianzas->miembros as $jugadorAlianza) {
                    $investigacionAlianza = $jugadorAlianza->investigaciones->where('codigo', $codigoBusqueda)->first();
                    $investigacionAlianza->nivel = $investigacion->nivel;
                    $investigacionAlianza->save();
                }
            } elseif ($investigacion->nivel < $solicitud->alianzas->miembros[0]->investigaciones->where('codigo', $codigoBusqueda)->first()->nivel) {
                $investigacion->nivel = $solicitud->alianzas->miembros[0]->investigaciones->where('codigo', $codigoBusqueda)->first()->nivel;
                $investigacion->save();
            }
        }

        $solicitud->delete();
        $jugadorNuevo->save();

        return redirect('/juego/alianza');
    }
}
