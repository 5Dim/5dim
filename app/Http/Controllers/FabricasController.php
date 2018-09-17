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
use App\Diseños;
use App\EnDiseños;

class FabricasController extends Controller
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

        EnDiseños::terminarColaDiseños();
        $colaDiseños = EnDiseños::where('planetas_id', session()->get('planetas_id'));

        return view('juego.fabrica', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual',
        'nivelImperio', 'nivelEnsamblajeNaves', 'nivelEnsamblajeDefensas', 'nivelEnsamblajeTropas', 'investigaciones',
        'factoresIndustrias', 'planetasJugador', 'planetasAlianza'));
    }

    public function construir ($idDiseño, $cantidad) {

        $recursos = Planetas::where('id', session()->get('planetas_id'))->first()->recursos;
        $diseño = Diseños::find($idDiseño);
        $costes = $diseño->costes;
        $tiempo = $diseño->viewDiseños->tiempo;
        $inicio = date("Y-m-d H:i:s");
        $error = false;

        //Comprobamos si hay recursos
        if ($recursos->mineral < ($costes->mineral * $cantidad)) {
            $error = true;
        }
        if ($recursos->cristal < ($costes->cristal * $cantidad)) {
            $error = true;
        }
        if ($recursos->gas < ($costes->gas * $cantidad)) {
            $error = true;
        }
        if ($recursos->plastico < ($costes->plastico * $cantidad)) {
            $error = true;
        }
        if ($recursos->ceramica < ($costes->ceramica * $cantidad)) {
            $error = true;
        }
        if ($recursos->liquido < ($costes->liquido * $cantidad)) {
            $error = true;
        }
        if ($recursos->micros < ($costes->micros * $cantidad)) {
            $error = true;
        }

        if (!$error) {

            //Restamos recursos
            $recursos->mineral -= ($costes->mineral * $cantidad);
            $recursos->cristal -= ($costes->cristal * $cantidad);
            $recursos->gas -= ($costes->gas * $cantidad);
            $recursos->plastico -= ($costes->plastico * $cantidad);
            $recursos->ceramica -= ($costes->ceramica * $cantidad);
            $recursos->liquido -= ($costes->liquido * $cantidad);
            $recursos->micros -= ($costes->micros * $cantidad);
            $recursos->save();

            for ($i=0; $i < $cantidad; $i++) {

                $final = (strtotime($inicio) + ($tiempo * ($i + 1)));

                //Generamos la cola
                $cola = new EnDiseños();
                $cola->accion = 'Construyendo';
                $cola->tiempo = $tiempo;
                $cola->diseños_id = $diseño->id;
                $cola->planetas_id = session()->get('planetas_id');
                $cola->created_at = $inicio;
                $cola->finished_at = date('Y/m/d H:i:s', $final);
                $cola->save();
            }
        }

        return redirect('/juego/diseño');
    }

    public function reciclar ($idDiseño, $cantidad) {

        $recursos = Planetas::where('id', session()->get('planetas_id'))->first()->recursos;
        $costes = Diseños::find($idDiseño)->costes;
        $inicio = date("Y-m-d H:i:s");

        //Generamos la cola
        $cola = new EnDiseños();
        $cola->cantidad = $cantidad;
        $cola->accion = 'Reciclando';
        $cola->tiempo = $costes->tiempo;
        $cola->finished_at = strtotime($inicio) + $cola->total;
        $cola->save();

        return redirect('/juego/diseño');
    }
}