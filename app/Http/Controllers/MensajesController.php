<?php

namespace App\Http\Controllers;

use App\Models\Alianzas;
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
use Illuminate\Database\Eloquent\Builder;

class MensajesController extends Controller
{

    public function index()
    {
        extract($this->recursos());

        //Todos los jugadores para la lista de envio
        $jugadores = Jugadores::orderBy("nombre")->get();

        //Lista de mensajes recibidos
        if (!empty($jugadorActual->alianzas)) {
            $recibidos = Mensajes::whereHas('intervinientes', function (Builder $query) use ($jugadorAlianza) {
                $query->whereIn('receptor', [session()->get('jugadores_id'), $jugadorAlianza->id]);
            })->orderBy('id', 'desc')->get();
            $enviados = Mensajes::whereIn('emisor', [session()->get('jugadores_id'), $jugadorAlianza->id])->orderBy('id', 'desc')->get();
        } else {
            $recibidos = Mensajes::whereHas('intervinientes', function (Builder $query) {
                $query->where('receptor', session()->get('jugadores_id'));
            })->orderBy('id', 'desc')->get();
            $enviados = Mensajes::where('emisor', session()->get('jugadores_id'))->orderBy('id', 'desc')->get();
        }

        $mios = MensajesIntervinientes::where('receptor', session()->get('jugadores_id'))->get();

        foreach ($mios as $recibido) {
            $recibido->leido = true;
            $recibido->save();
        }

        // dd($recibidos);

        return view('juego.mensajes.mensajes', compact(
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
        $mensaje->categoria = "recibidos";
        $mensaje->save();
        $receptores = request()->input('listaJugadores');
        if (!empty($receptores)) {
            foreach ($receptores as $receptor) {
                $interviniente = new MensajesIntervinientes();
                $interviniente->receptor = $receptor;
                $interviniente->leido = false;
                $interviniente->mensajes_id = $mensaje->id;
                $interviniente->save();
            }
        }
        return redirect('/juego/mensajes');
    }

    public function borrarMensaje($idMensaje, $idJugador)
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $jugadorAlianza = null;
        if ($jugadorActual->alianzas) {
            $jugadorAlianza = Alianzas::jugadorAlianza($jugadorActual->alianzas->id);
        }
        if ($idJugador == session()->get('jugadores_id') || (!empty($jugadorAlianza) && $idJugador == $jugadorAlianza->id)) {
            $mensaje = Mensajes::find($idMensaje);
            $mensaje->intervinientes->where('receptor', $idJugador)->first()->delete();
        }
        return redirect('/juego/mensajes');
    }
}
