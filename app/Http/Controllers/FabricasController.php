<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Constantes;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Jugadores;
use App\Models\Disenios;
use App\Models\EnDisenios;

class FabricasController extends Controller
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

        return view('juego.fabrica', compact(
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
        ));
    }

    public function construir($idDisenio, $cantidad)
    {

        $recursos = Planetas::where('id', session()->get('planetas_id'))->first()->recursos;
        $disenio = Disenios::find($idDisenio);
        $costes = $disenio->costes;
        // $disenio->calculaMejoras();
        $tiempo = $disenio->mejoras->tiempo;
        $inicio = date("Y-m-d H:i:s");
        $error = false;

        $cola = EnDisenios::where('planetas_id', session()->get('planetas_id'))->get()->last();

        if (!empty($cola)) {
            $inicio = $cola->finished_at;
        }

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
            $cadenaProduccion = 1; //factor de ahorro por cantidad de produccion

            //Restamos recursos
            $recursos->mineral -= (($costes->mineral * $cantidad) * $cadenaProduccion);
            $recursos->cristal -= (($costes->cristal * $cantidad) * $cadenaProduccion);
            $recursos->gas -= (($costes->gas * $cantidad) * $cadenaProduccion);
            $recursos->plastico -= (($costes->plastico * $cantidad) * $cadenaProduccion);
            $recursos->ceramica -= (($costes->ceramica * $cantidad) * $cadenaProduccion);
            $recursos->liquido -= (($costes->liquido * $cantidad) * $cadenaProduccion);
            $recursos->micros -= (($costes->micros * $cantidad) * $cadenaProduccion);
            $recursos->save();

            $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
            $construcciones = Construcciones::construcciones($planetaActual);
            $constanteVelocidad=Constantes::where('codigo', 'velocidadHangar')->first()->valor;
            $nivelHangar = $construcciones->where('codigo', 'hangar')->first()->nivel;

            $final = (strtotime($inicio) + ((($tiempo * $cantidad) * $cadenaProduccion))/(1+($constanteVelocidad * $nivelHangar/100)));

            //Generamos la cola
            $cola = new EnDisenios();
            $cola->nombre = $disenio->nombre;
            $cola->accion = 'Construyendo';
            $cola->tiempo = $tiempo;
            $cola->cantidad = $cantidad;
            $cola->disenios_id = $disenio->id;
            $cola->planetas_id = session()->get('planetas_id');
            $cola->created_at = $inicio;
            $cola->finished_at = date('Y/m/d H:i:s', $final);
            $cola->save();
        }

        return redirect('/juego/disenio');
    }

    public function reciclar($idDisenio, $cantidad)
    {
        $disenio = Disenios::find($idDisenio);
        $disenio->calculaMejoras();
        $tiempo = $disenio->datos->tiempo;
        $inicio = date("Y-m-d H:i:s");
        $cadenaProduccion = EnDisenios::cadenaProduccion($cantidad, $disenio->fuselajes->tnave);
        $final = (strtotime($inicio) + (($tiempo * $cantidad) * $cadenaProduccion));

        $disenio->estacionadas->cantidad -= $cantidad;
        $disenio->estacionadas->save();

        //Generamos la cola
        $cola = new EnDisenios();
        $cola->nombre = $disenio->nombre;
        $cola->accion = 'Reciclando';
        $cola->tiempo = $tiempo;
        $cola->cantidad = $cantidad;
        $cola->disenios_id = $disenio->id;
        $cola->planetas_id = session()->get('planetas_id');
        $cola->created_at = $inicio;
        $cola->finished_at = date('Y/m/d H:i:s', $final);
        $cola->save();

        return redirect('/juego/disenio');
    }

    public function cancelar($idCola)
    {
        $cola = EnDisenios::find($idCola);
        $disenio = Disenios::find($cola->disenios_id);
        $coste = $disenio->costes;
        $recursos = $cola->planetas->recursos;
        $cancelar = Constantes::where('codigo', 'perdidaCancelar')->first()->valor;

        if ($cola->accion == "Reciclando") {
            $disenio->estacionadas->cantidad += $cola->cantidad;
            $disenio->estacionadas->save();
        }else {
            $recursos->mineral += (($coste->mineral * $cola->cantidad) * $cancelar);
            $recursos->cristal += (($coste->cristal * $cola->cantidad) * $cancelar);
            $recursos->gas += (($coste->gas * $cola->cantidad) * $cancelar);
            $recursos->plastico += (($coste->plastico * $cola->cantidad) * $cancelar);
            $recursos->ceramica += (($coste->ceramica * $cola->cantidad) * $cancelar);
            $recursos->liquido += (($coste->liquido * $cola->cantidad) * $cancelar);
            $recursos->micros += (($coste->micros * $cola->cantidad) * $cancelar);
            $recursos->save();
        }
        $cola->delete();


        return redirect('/juego/disenio');
    }
}
