<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
use App\Models\DiseniosEnFlota;
use App\Models\EnDisenios;
use App\Models\MensajesIntervinientes;
use Illuminate\Support\Facades\Log;

class FabricasController extends Controller
{
    public function index()
    {
        extract($this->recursos());

        return view('juego.fabrica', compact(
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

        if ($cantidad < 1) {
            $error = true;
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
            $constanteVelocidad = Constantes::where('codigo', 'velocidadHangar')->first()->valor;
            $nivelHangar = $construcciones->where('codigo', 'hangar')->first()->nivel;

            $final = (strtotime($inicio) + ((($tiempo * $cantidad) * $cadenaProduccion)) / (1 + ($constanteVelocidad * $nivelHangar / 100)));

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

    public function reciclar($idDisenio, $cantidadInicial)
    {
        $planetaActual = Planetas::find(session()->get('planetas_id'));
        $disenio = Disenios::find($idDisenio);
        $tiempo = $disenio->mejoras->tiempo;
        $inicio = date("Y-m-d H:i:s");
        // $cadenaProduccion = EnDisenios::cadenaProduccion($cantidad, $disenio->fuselajes->tnave);
        $id = $planetaActual->estacionadas->where('disenios_id', $disenio->id)->first()->id;
        $disenioEnPlaneta = DiseniosEnFlota::find($id);
        if (!empty($disenioEnPlaneta)) {
            if ($disenioEnPlaneta->enFlota > 0) {
                $disenioEnPlaneta->cantidad += $disenioEnPlaneta->enFlota;
                $disenioEnPlaneta->enFlota = 0;
            }
            if ($disenioEnPlaneta->enHangar > 0) {
                $disenioEnPlaneta->cantidad += $disenioEnPlaneta->enHangar;
                $disenioEnPlaneta->enHangar = 0;
            }
            if ($cantidadInicial > $disenioEnPlaneta->cantidad) {
                $cantidad = $disenioEnPlaneta->cantidad;
            } else {
                $cantidad = $cantidadInicial;
            }
            $disenioEnPlaneta->cantidad -= $cantidad;
            $disenioEnPlaneta->save();
            if ($disenioEnPlaneta->cantidad == 0) {
                $disenioEnPlaneta->delete();
            }
            $planetaActual->estacionadas->where('disenios_id', $disenio->id)->first()->save();
            $nivelHangar = $planetaActual->construcciones->where('codigo', 'hangar')->first()->nivel;
            $constanteVelocidad = Constantes::where('codigo', 'velocidadHangar')->first()->valor;
            $cadenaProduccion = 1;
            $final = (strtotime($inicio) + ((($tiempo * $cantidad) * $cadenaProduccion)) / (1 + ($constanteVelocidad * $nivelHangar / 100)));

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
        } else {
            //Log::info("ERROR AL RECICLAR USER: " . session()->get('jugadores_id'));
        }


        return redirect('/juego/disenio');
    }

    public function cancelar($idCola)
    {
        $cola = EnDisenios::find($idCola);
        $disenio = Disenios::find($cola->disenios_id);
        $coste = $disenio->costes;
        $recursos = $cola->planetas->recursos;
        $cancelar = Constantes::where('codigo', 'perdidaCancelar')->first()->valor;
        $planetaActual = Planetas::find(session()->get('planetas_id'));

        if ($cola->accion == "Reciclando") {
            if (!empty($planetaActual->estacionadas->where('disenios_id', $disenio->id)->first())) {
                $planetaActual->estacionadas->where('disenios_id', $disenio->id)->first()->cantidad += $cola->cantidad;
                $planetaActual->estacionadas->where('disenios_id', $disenio->id)->first()->save();
                Log::info("UPDATE");
            } else {
                $disenioEnPlaneta = new DiseniosEnFlota();
                $disenioEnPlaneta->enFlota = 0;
                $disenioEnPlaneta->enHangar = 0;
                $disenioEnPlaneta->cantidad = $cola->cantidad;
                $disenioEnPlaneta->tipo = 'nave';
                $disenioEnPlaneta->planetas_id = session()->get('planetas_id');
                $disenioEnPlaneta->disenios_id = $disenio->id;
                $disenioEnPlaneta->save();
            }
        } else {
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
