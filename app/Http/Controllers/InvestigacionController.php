<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Constantes;
use App\Models\Dependencias;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Jugadores;
use App\Models\Investigaciones;
use App\Models\CostesInvestigaciones;
use App\Models\MensajesIntervinientes;

class InvestigacionController extends Controller
{

    public function index($tab = "armamento-tab")
    {
        extract($this->recursos());

        $armamentos = $investigaciones->where('categoria', 'armas');
        $blindajes = $investigaciones->where('categoria', 'blindaje');
        $civiles = $investigaciones->where('categoria', 'civil');
        $imperiales = $investigaciones->where('categoria', 'imperial');
        $motores = $investigaciones->where('categoria', 'motor');
        $industrial = $investigaciones->where('categoria', 'industria');

        $investiga = new CostesInvestigaciones();
        $costeInvestigaciones = $investiga->generaCostesInvestigaciones($investigaciones);
        for ($i = 0; $i < count($investigaciones); $i++) {
            $investigaciones[$i]->coste = $costeInvestigaciones[$i];
        }
        // dd($investigaciones);

        //Constantes de investigacion
        $CConstantes = Constantes::where('tipo', 'investigacion')->get();

        //Enviamos los datos para la velocidad de construccion
        $velInvest = $CConstantes->where('codigo', 'velInvest')->first();

        // vemos las dependencias
        $dependencias = Dependencias::where('tipo', 'investigacion')->get();

        //nivel del laboratorio
        $nivelLaboratorio = Construcciones::where([
            ['planetas_id', $planetaActual->id],
            ['codigo', 'laboratorio'],
        ])->first();

        return view('juego.investigaciones.investigacion', compact(
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
            'velInvest',
            'dependencias',
            'colaInvestigacion',
            'investigaciones',
            'armamentos',
            'blindajes',
            'civiles',
            'imperiales',
            'motores',
            'industrial',
            'nivelLaboratorio',
            'tab',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
        ));
    }

    //Acceso a subir nivel de construccion
    public function investigar($idInvestigacion, $personal, $tab = "militares-tab")
    {
        //En que planeta estamos
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $error = false;

        //Recuperar construccion
        $construcciones = Construcciones::construcciones($planetaActual);
        $personalUsado = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personalUsado += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personalUsado += $cola->personal;
            }
        }

        //La investigacion que estamos subiendo
        $investigacion = Investigaciones::find($idInvestigacion);
        $investigacionesMax = [];
        array_push($investigacionesMax, $investigacion);

        //Recuperamos su ultima cola (si existe)
        $cola = EnInvestigaciones::where('investigaciones_id', $idInvestigacion)->orderBy('id', 'desc')->first();
        $costes = new CostesInvestigaciones();

        //Sobreescribimos datos en caso de que la construccion tenga alguna orden en cola
        if (!empty($cola)) {
            //Costes construcciones
            $costeInvestigacion = $costes->generaCostesInvestigaciones($investigacionesMax);
            $inicio = $cola->finished_at;
            $nivel = $cola->nivel + 1;
            $investigacionesMax[0]->nivel = $nivel;

            //Comprobamos si ya hay cola de este edificio
            $accion = $cola->accion;
        } else {
            //Costes construcciones
            $costeInvestigacion = $costes->generaCostesInvestigaciones($investigacionesMax);
            //Valores por defecto
            $inicio = date("Y-m-d H:i:s");
            $nivel = $investigacion->nivel + 1;
            $accion = 'Investigando';
            $investigacionesMax[0]->nivel = $nivel;
        }


        //Calculamos el coste para calcular el tiempo
        $costeTotal = $investigacion->sumarCostes($costeInvestigacion[0]);
        // dd($costeTotal);

        //Calcular el tiempo de construccion
        $tiempo = $investigacion->calcularTiempoInvestigaciones($costeTotal, $personal, $nivel - 1, $planetaActual);

        //Comprobamos que el tiempo no sea false, seria un error de personal
        if ($tiempo == false) {
            $error = true;
        }

        //Fecha prueba
        $fechaFin = strtotime($inicio) + $tiempo;

        // Comprobar dependencias
        $investigaciones = Investigaciones::investigaciones($planetaActual);
        $dependencia = Dependencias::where('tipo', 'investigacion')->get()->where('codigo', $investigacion->codigo)->first();
        if (
            $dependencia->nivelRequiere > $investigaciones->where('codigo', $dependencia->codigoRequiere)->first()->nivel
        ) {
            $error = true;
        }

        //Comprobamos que el edificio se puede construir
        $recurso = Planetas::where('id', $planetaActual->id)->first()->recursos;
        if ($recurso->mineral < $costeInvestigacion[0]->mineral) {
            $error = true;
        } elseif ($recurso->cristal < $costeInvestigacion[0]->cristal) {
            $error = true;
        } elseif ($recurso->gas < $costeInvestigacion[0]->gas) {
            $error = true;
        } elseif ($recurso->plastico < $costeInvestigacion[0]->plastico) {
            $error = true;
        } elseif ($recurso->ceramica < $costeInvestigacion[0]->ceramica) {
            $error = true;
        } elseif ($recurso->liquido < $costeInvestigacion[0]->liquido) {
            $error = true;
        } elseif ($recurso->micros < $costeInvestigacion[0]->micros) {
            $error = true;
        } elseif ($recurso->fuel < $costeInvestigacion[0]->fuel) {
            $error = true;
        } elseif ($recurso->ma < $costeInvestigacion[0]->ma) {
            $error = true;
        } elseif ($recurso->municion < $costeInvestigacion[0]->municion) {
            $error = true;
        } elseif (($recurso->personal - $personalUsado) < $personal) {
            $error = true;
        } elseif ($accion != "Investigando") {
            $error = true;
        }

        //Si no tenemos ningun error continuamos
        if (!$error) {
            //Restamos el coste a los recursos
            $recurso->mineral -= $costeInvestigacion[0]->mineral;
            $recurso->cristal -= $costeInvestigacion[0]->cristal;
            $recurso->gas -= $costeInvestigacion[0]->gas;
            $recurso->plastico -= $costeInvestigacion[0]->plastico;
            $recurso->ceramica -= $costeInvestigacion[0]->ceramica;
            $recurso->liquido -= $costeInvestigacion[0]->liquido;
            $recurso->micros -= $costeInvestigacion[0]->micros;
            $recurso->save();

            //Generamos la cola
            $investigando = new EnInvestigaciones();
            $investigando->personal = $personal;
            $investigando->investigaciones_id = $idInvestigacion;
            $investigando->planetas_id = $planetaActual->id;
            $investigando->nivel = $nivel;
            $investigando->accion = "Investigando";
            $investigando->codigo = $investigacion->codigo;
            $investigando->created_at = $inicio;
            $investigando->finished_at = date('Y-m-d H:i:s', $fechaFin);
            $investigando->save();

            /*
            //Generamos el coste del edificio
            $costeInvestigaciones = new CostesInvestigaciones();
            $costeAntiguo = CostesInvestigaciones::where('investigaciones_id', $investigacion->id)->first();
            $coste = $costeInvestigaciones->generarDatosCostesInvestigacion($nivel, $codigo, $idInvestigacion);
            $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
            $costeAntiguo->save();
            */
        }

        return redirect('/juego/investigacion/' . $tab);
    }

    //Acceso a subir nivel de construccion
    public function cancelar($idColaInvestigacion = 1)
    {
        //Recuperar construccion
        $cola = EnInvestigaciones::where('id', $idColaInvestigacion)->first();

        //Comprobamos si hay alguna investigación por encima del nivel que se ha cancelado
        $listaCola = EnInvestigaciones::where([
            ['investigaciones_id', '=', $cola->investigaciones->id],
            ['nivel', '>', $cola->nivel]
        ])->get();

        if ($cola->accion == 'Investigando') {
            $nivel = $cola->nivel - 1;
        }
        $reciclaje = Constantes::where('codigo', 'perdidaCancelar')->first()->valor;

        //La investigacion que estamos subiendo
        $investigacion = $cola->investigaciones;
        $investigacionesMax = [];
        array_push($investigacionesMax, $investigacion);

        //Costes investigacion
        $costes = new CostesInvestigaciones();
        $costesInvestigaciones = $costes->generaCostesInvestigaciones($investigacionesMax);

        //Ahora cancelamos toda la cola con nivel superior a la cancelada
        foreach ($listaCola as $colita) {
            //En caso de ser una construccion debe devolver parte de los recursos
            if ($colita->accion == "Investigando") {
                $investigacionesMax[0]->nivel = $colita->nivel;

                //Costes construcciones
                $costes = new CostesInvestigaciones();
                $costesInvestigaciones = $costes->generaCostesInvestigaciones($investigacionesMax);
                $recursos = $cola->planetas->recursos;

                //Restaurar beneficio por reciclaje
                $recursos->mineral += ($costesInvestigaciones[0]->mineral * $reciclaje);
                $recursos->cristal += ($costesInvestigaciones[0]->cristal * $reciclaje);
                $recursos->gas += ($costesInvestigaciones[0]->gas * $reciclaje);
                $recursos->plastico += ($costesInvestigaciones[0]->plastico * $reciclaje);
                $recursos->ceramica += ($costesInvestigaciones[0]->ceramica * $reciclaje);
                $recursos->liquido += ($costesInvestigaciones[0]->liquido * $reciclaje);
                $recursos->micros += ($costesInvestigaciones[0]->micros * $reciclaje);
                $recursos->save();
            }
            $colita->delete();
        }
        //En caso de ser una construccion debe devolver parte de los recursos
        if ($cola->accion == "Investigando") {

            //Costes construcciones
            $costes = new CostesInvestigaciones();
            $costesInvestigaciones = $costes->generaCostesInvestigaciones($investigacionesMax);
            $recursos = $cola->planetas->recursos;
            $investigacionesMax[0]->nivel = $cola->nivel;

            if (!empty($costesInvestigaciones)) {
                //Restaurar beneficio por reciclaje
                $recursos->mineral += ($costesInvestigaciones[0]->mineral * $reciclaje);
                $recursos->cristal += ($costesInvestigaciones[0]->cristal * $reciclaje);
                $recursos->gas += ($costesInvestigaciones[0]->gas * $reciclaje);
                $recursos->plastico += ($costesInvestigaciones[0]->plastico * $reciclaje);
                $recursos->ceramica += ($costesInvestigaciones[0]->ceramica * $reciclaje);
                $recursos->liquido += ($costesInvestigaciones[0]->liquido * $reciclaje);
                $recursos->micros += ($costesInvestigaciones[0]->micros * $reciclaje);
            } else {
                $recursos->mineral += 0;
                $recursos->cristal += 0;
                $recursos->gas += 0;
                $recursos->plastico += 0;
                $recursos->ceramica += 0;
                $recursos->liquido += 0;
                $recursos->micros += 0;
            }


            $recursos->save();
        }
        $cola->delete();

        return redirect('/juego/investigacion');
    }

    //Acceso a subir nivel de construccion
    public function datos($codigo)
    {
        $nombreInvestigacion = trans('investigacion.' . $codigo);
        $descripcionInvestigacion = trans('investigacion.' . $codigo . 'Descripcion');
        return compact('descripcionInvestigacion', 'nombreInvestigacion');
    }
}
