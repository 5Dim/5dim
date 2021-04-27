<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\Mensajes;
use App\Models\MensajesIntervinientes;

class MensajesController extends Controller
{

    public function index()
    {
        $compact = $this->recursos();
        extract($compact);

        //Todos los jugadores para la lista de envio
        $jugadores = Jugadores::all();

        //Lista de mensajes recibidos
        if ($jugadorActual->alianza_id) {
            $enviados = Mensajes::where('emisor', session()->get('jugadores_id'))->orWhere('emisor', $jugadorAlianza->id)->get();
        } else {
            $enviados = Mensajes::where('emisor', session()->get('jugadores_id'))->get();
        }

        //Lista de mensajes enviados
        if ($jugadorActual->alianza_id) {
            $recibidos = MensajesIntervinientes::where('receptor', session()->get('jugadores_id'))->orWhere('receptor', $jugadorAlianza->id)->get();
        } else {
            $recibidos = MensajesIntervinientes::where('receptor', session()->get('jugadores_id'))->get();
        }

        foreach ($recibidos as $recibido) {
            $recibido->leido = true;
            $recibido->save();
        }

        return view('juego.mensajes.mensajes', compact(
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
            'jugadores',
            'recibidos',
            'enviados',
        ));
    }

    public function enviarMensaje(Request $request)
    {
        $mensaje = new Mensajes();
        $mensaje->mensaje = request()->input('descripcion');
        $mensaje->emisor = session()->get('jugadores_id');
        $mensaje->asunto = request()->input('asunto');
        $mensaje->eliminado = false;
        $mensaje->categoria = "recibidos";
        $mensaje->save();
        $receptor = request()->input('listaJugadores');
        if (!empty($receptor) or $receptor != 0) {
            $interviniente = new MensajesIntervinientes();
            $interviniente->receptor = $receptor;
            $interviniente->leido = false;
            $interviniente->mensajes_id = $mensaje->id;
            $interviniente->save();
        }
        return redirect('/juego/mensajes');
    }
}
