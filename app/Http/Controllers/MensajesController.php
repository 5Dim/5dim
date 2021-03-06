<?php

namespace App\Http\Controllers;

use App\Models\Alianzas;
use App\Models\Constantes;
use Illuminate\Http\Request;
use App\Models\Jugadores;
use App\Models\Mensajes;
use App\Models\MensajesIntervinientes;
use Illuminate\Database\Eloquent\Builder;

class MensajesController extends Controller
{
    public function index($tab = "recibidos-tab")
    {
        extract($this->recursos());

        //Todos los jugadores para la lista de envio
        $jugadores = Jugadores::orderBy("nombre")->get();

        //Lista de mensajes recibidos
        $jugadorAlianza = Constantes::where('codigo', 'jugadoralianza')->first()->valor;
        if (
            !empty($jugadorActual->alianzas) &&
            $jugadorAlianza == 1
        ) {
            $recibidos = Mensajes::whereHas('intervinientes', function (Builder $query) use ($jugadorAlianza) {
                $query->whereIn('receptor', [session()->get('jugadores_id'), $jugadorAlianza->id])
                    ->where('categoria', 'recibidos');
            })->orderBy('id', 'desc')->paginate(15);
            $enviados = Mensajes::whereIn('emisor', [session()->get('jugadores_id'), $jugadorAlianza->id])->orderBy('id', 'desc')->paginate(15);
            $flotas = Mensajes::whereHas('intervinientes', function (Builder $query) use ($jugadorAlianza) {
                $query->whereIn('receptor', [session()->get('jugadores_id'), $jugadorAlianza->id])
                    ->where('categoria', 'flotas');
            })->orderBy('id', 'desc')->paginate(15);
            $mios = MensajesIntervinientes::whereIn('receptor', [session()->get('jugadores_id'), $jugadorAlianza->id])->get();
        } else {
            $recibidos = Mensajes::whereHas('intervinientes', function (Builder $query) {
                $query->where('receptor', session()->get('jugadores_id'))
                    ->where('categoria', 'recibidos');
            })->orderBy('id', 'desc')->paginate(15);
            $enviados = Mensajes::where('emisor', session()->get('jugadores_id'))->orderBy('id', 'desc')->paginate(15);
            $flotas = Mensajes::whereHas('intervinientes', function (Builder $query) {
                $query->where('receptor', session()->get('jugadores_id'))
                    ->where('categoria', 'flotas');
            })->orderBy('id', 'desc')->paginate(15);
            $mios = MensajesIntervinientes::where('receptor', session()->get('jugadores_id'))->get();
        }

        foreach ($mios as $recibido) {
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
            'consImperio',

            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
            'jugadores',
            'recibidos',
            'enviados',
            'flotas',
            'tab',
        ));
    }

    public function enviarMensaje(Request $request)
    {
        $mensaje = new Mensajes();
        $mensaje->mensaje = request()->input('descripcion');
        $mensaje->emisor = session()->get('jugadores_id');
        $mensaje->asunto = !empty(request()->input('asunto')) ? request()->input('asunto') : "Sin asunto";
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

    public function borrarMensaje($idMensaje, $idJugador, $tab = "recibidos-tab")
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $jugadorAlianza = null;
        if ($jugadorActual->alianzas) {
            $jugadorAlianza = Alianzas::jugadorAlianza($jugadorActual->alianzas->id);
        }

        if ($idJugador == session()->get('jugadores_id')) {
            $jugadorAlianza = Constantes::where('codigo', 'jugadoralianza')->first()->valor;
            if (
                !empty($jugadorActual->alianzas) &&
                $jugadorAlianza == 1
            ) {
                MensajesIntervinientes::whereIn('receptor', [$jugadorActual->id, $jugadorAlianza->id])->where('mensajes_id', $idMensaje)->first()->delete();
            } else {
                MensajesIntervinientes::where([['mensajes_id', $idMensaje], ['receptor', $jugadorActual->id]])->first()->delete();
            }
        }

        return redirect('/juego/mensajes/' . $tab);
    }
}
