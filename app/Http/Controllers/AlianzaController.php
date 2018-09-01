<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Planetas;
use App\Industrias;
use App\Constantes;
use App\Dependencias;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;
use App\EnInvestigaciones;
use App\CostesConstrucciones;
use App\Investigaciones;
use App\Alianzas;
use App\Jugadores;
use Auth;
use App\SolicitudesAlianzas;
use App\Mensajes;
use App\MensajesIntervinientes;

class AlianzaController extends Controller
{
    public function index ()
    {
        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        if (empty(session()->get('jugadores_id'))) {
            return redirect('/jugador');
        }
        $constantesCheck = Constantes::find(1);
        if (empty($constantesCheck)) {
            return redirect('/admin/DatosMaestros');
        }
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->id != $jugadorActual->id and $planetaActual->jugadores->id != $jugadorAlianza->id) {
            return redirect('/planeta');
        }
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();
        $jugadorAlianza = new Jugadores();
        $jugadorAlianza->id = 0;
        $planetasAlianza = null;
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }
        EnConstrucciones::terminarColaConstrucciones();
        $construcciones = Construcciones::construcciones($planetaActual);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $producciones = Producciones::calcularProducciones($construcciones, $planetaActual);
        $almacenes = Almacenes::calcularAlmacenes($construcciones);
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $personal = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personal += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personal += $cola->personal;
            }
        }
        $tipoPlaneta = $planetaActual->tipo;
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel;
        $nivelEnsamblajeNaves = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeNaves')->first()->nivel);
        $nivelEnsamblajeDefensas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeDefensas')->first()->nivel);
        $nivelEnsamblajeTropas = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeTropas')->first()->nivel);
        $factoresIndustrias = [];
        $mejoraIndustrias = Constantes::where('codigo', 'mejorainvIndustrias')->first()->valor;
        $factorLiquido = (1 + ($investigaciones->where('codigo', 'invIndLiquido')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorLiquido);
        $factorMicros = (1 + ($investigaciones->where('codigo', 'invIndMicros')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMicros);
        $factorFuel = (1 + ($investigaciones->where('codigo', 'invIndFuel')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorFuel);
        $factorMa = (1 + ($investigaciones->where('codigo', 'invIndMa')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMa);
        $factorMunicion = (1 + ($investigaciones->where('codigo', 'invIndMunicion')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMunicion);
        //Fin recursos

        //Listado de alianzas
        $alianzas = Alianzas::all();

        //Comprobar si el jugador tiene alianza
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        if (empty($jugadorActual->alianzas_id)) {
            return view('juego.alianza.crearAlianza', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'nivelImperio', 'nivelEnsamblajeNaves',
            'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas', 'investigaciones', 'factoresIndustrias', 'alianzas', 'planetasJugador', 'planetasAlianza'));
        }else{
            return view('juego.alianza.alianza', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual', 'nivelImperio', 'nivelEnsamblajeNaves',
            'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas', 'investigaciones', 'factoresIndustrias', 'alianzas', 'planetasJugador', 'planetasAlianza', 'jugadorActual'));
        }
    }

    public function solicitudAlianza ()
    {
        $alianza = Alianzas::find(request()->input('listaAlianzas'));
        $cuerpo = request()->input('solicitud');

        $solicitud = new SolicitudesAlianzas();
        $solicitud->solicitud = $cuerpo;
        $solicitud->alianzas_id = $alianza->id;
        $solicitud->jugadores_id = session()->get('jugadores_id');
        $solicitud->save();

        $mensaje = new Mensajes();
        $mensaje->asunto = "Nueva solicitud de acceso a la alianza: " . Jugadores::find(session()->get('jugadores_id'))->nombre;
        $mensaje->mensaje = "<p>El jugador " . Jugadores::find(session()->get('jugadores_id'))->nombre . " solicita unirse a nuestra alianza</p>";
        $mensaje->categoria = "recibidos";
        $mensaje->emisor = Jugadores::where('nombre', $alianza->nombre)->first()->id;
        $mensaje->save();

        $interviniente = new MensajesIntervinientes();
        $interviniente->receptor = Jugadores::where('nombre', $alianza->nombre)->first()->id;
        $interviniente->leido = false;
        $interviniente->mensajes_id = $mensaje->id;
        $interviniente->save();

        return redirect('/juego/alianza');
    }

    public function generarAlianza ()
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
        $alianza->save();

        $jugador = new Jugadores();
        $jugador->nombre = request()->input('nombre');
        $jugador->universo_id = 0;
        $jugador->alianzas_id = $alianza->id;
        $jugador->save();

        $listaInvestigaciones = [];
        foreach ($jugadorActual->investigaciones as $investigacion) {
            $investigaciones = new Investigaciones();
            $investigaciones->nivel = $investigacion->nivel;
            $investigaciones->codigo = $investigacion->codigo;
            $investigaciones->jugadores_id = $jugador->id;
            array_push($listaInvestigaciones, $investigaciones);
        }

        foreach ($listaInvestigaciones as $investigacion) {
            $investigacion->save();
        }

        $jugadorActual->alianzas_id = $alianza->id;
        $jugadorActual->save();

        return redirect('/juego/alianza');
    }

    public function expulsarMiembro ($idJugador)
    {
        //Buscamos el jugador
        $jugador = Jugadores::find($idJugador);
        $jugador->alianzas_id = null;
        $jugador->save();

        return redirect('/juego/alianza');
    }

    public function rechazarSolicitud ($idSolicitud)
    {
        //Buscamos la solicitud
        $solicitud = SolicitudesAlianzas::find($idSolicitud);
        $solicitud->delete();

        return redirect('/juego/alianza');
    }

    public function aceptarSolicitud ($idSolicitud)
    {
        //Buscamos la solicitud y la alianza
        $solicitud = SolicitudesAlianzas::find($idSolicitud);
        $jugadorNuevo = $solicitud->jugadores;
        $jugadorNuevo->alianzas_id = $solicitud->alianzas_id;

        foreach ($jugadorNuevo->investigaciones as $investigacion) {
            $codigoBusqueda = $investigacion->codigo;
            if ($investigacion->nivel > $solicitud->alianzas->miembros[1]->investigaciones->where('codigo', $codigoBusqueda)->first()->nivel) {
                foreach ($solicitud->alianzas->miembros as $jugadorAlianza) {
                    $investigacionAlianza = $jugadorAlianza->investigaciones->where('codigo', $codigoBusqueda)->first();
                    $investigacionAlianza->nivel = $investigacion->nivel;
                    $investigacionAlianza->save();
                }
            }elseif ($investigacion->nivel < $solicitud->alianzas->miembros[1]->investigaciones->where('codigo', $codigoBusqueda)->first()->nivel) {
                $investigacion->nivel = $solicitud->alianzas->miembros[1]->investigaciones->where('codigo', $codigoBusqueda)->first()->nivel;
                $investigacion->save();
            }
        }

        $solicitud->delete();
        $jugadorNuevo->save();

        return redirect('/juego/alianza');
    }
}