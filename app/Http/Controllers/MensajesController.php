<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Industrias;
use App\Models\Constantes;
use App\Models\Dependencias;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\CostesConstrucciones;
use App\Models\Investigaciones;
use App\Models\Alianzas;
use App\Models\Jugadores;
use Auth;
use App\Models\Mensajes;
use App\Models\MensajesIntervinientes;

class MensajesController extends Controller
{

    public function index()
    {
        // Planeta, jugador y alianza
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();
        $planetasAlianza = null;
        if (session()->has('alianza_id') != "nulo") {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }

        //Recursos
        $investigaciones = Investigaciones::investigaciones($planetaActual);
        $construcciones = Construcciones::construcciones($planetaActual);
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $produccion = Producciones::calcularProducciones($construcciones, $planetaActual);
        $capacidadAlmacenes = Almacenes::calcularAlmacenes($construcciones);

        // Personal ocupado
        $personalOcupado = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personalOcupado += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personalOcupado += $cola->personal;
            }
        }

        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel; //Nivel de imperio, se usa para calcular los puntos de imperio (PI)
        $nivelEnsamblajeFuselajes = Investigaciones::sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel); //Calcular nivel de puntos de ensamlaje (PE)
        // Fin obligatorio por recursos

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

        return view('juego.mensajes.mensajes', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',

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
