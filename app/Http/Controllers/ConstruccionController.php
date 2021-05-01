<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Industrias;
use App\Models\Constantes;
use App\Models\Dependencias;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\Investigaciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\CostesConstrucciones;
use App\Models\Jugadores;
use App\Models\MensajesIntervinientes;
use Illuminate\Support\Facades\Log;

class ConstruccionController extends Controller
{
    //Acceso a construcciones
    public function index($tab = "mina-tab")
    {
        $compact = $this->recursos();
        extract($compact);

        // Sacamos el estado de las industrias
        $encendidoIndustrias = Industrias::where('planetas_id', session()->get('planetas_id'))->first();

        //Costes construcciones
        $costesConstrucciones = CostesConstrucciones::generaCostesConstrucciones($construcciones);
        for ($i = 0; $i < count($construcciones); $i++) {
            $construcciones[$i]->coste = $costesConstrucciones[$i];
        }

        //Construcciones por categoria para dibujarlas
        $minas = $construcciones->where('categoria', 'mina');
        $industrias = $construcciones->where('categoria', 'industria');
        $almacenes = $construcciones->where('categoria', 'almacen');
        $militares = $construcciones->where('categoria', 'militar');
        $desarrollos = $construcciones->where('categoria', 'desarrollo');
        $observaciones = $construcciones->where('categoria', 'observacion');
        $especializaciones = $construcciones->where('categoria', 'especializacion');
        $especiales = $construcciones->where('categoria', 'especial');

        // Tipo planeta
        $tipoPlaneta = $planetaActual->tipo;

        //Constantes de construccion
        $CConstantes = Constantes::where('tipo', 'construccion')->get();

        //Enviamos los datos para la velocidad de construccion
        $velocidadConst = $CConstantes->where('codigo', 'velocidadConst')->first();

        // vemos las dependencias
        $dependencias = Dependencias::where('tipo', 'construccion')->get();

        //Devolvemos la vista con todas las variables
        return view('juego.construcciones.construccion', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'planetaActual',
            'mensajeNuevo',
            'colaConstruccion',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',

            // Categorias
            'construcciones',
            'minas',
            'industrias',
            'encendidoIndustrias',
            'almacenes',
            'militares',
            'desarrollos',
            'observaciones',
            'especializaciones',
            'especiales',

            // Especificas
            'velocidadConst',
            'tipoPlaneta',
            'dependencias',
            'tab',
        ));
    }

    //Acceso a subir nivel de construccion
    public function construir($idConstruccion, $personal, $tab)
    {
        //En que planeta estamos
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $error = false;

        //Recuperar construccion
        $construccionesMax = [];
        $construccion = Construcciones::where('id', $idConstruccion)->first();
        array_push($construccionesMax, $construccion);
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

        //Recuperamos su ultima cola (si existe)
        $cola = EnConstrucciones::where('construcciones_id', $idConstruccion)->orderBy('id', 'desc')->first();

        //Sobreescribimos datos en caso de que la construccion tenga alguna orden en cola
        if (!empty($cola)) {
            $inicio = $cola->finished_at;
            $nivel = $cola->nivel;
            $construccionesMax[0]->nivel = $nivel;
            $nivel = $cola->nivel + 1;

            //Comprobamos si ya hay cola de este edificio
            $accion = $cola->accion;
        } else {
            //Valores por defecto
            $inicio = date("Y-m-d H:i:s");
            $nivel = $construccion->nivel;
            $construccionesMax[0]->nivel = $nivel;
            $nivel = $construccion->nivel + 1;
            $accion = 'Construyendo';
        }

        //Costes construcciones
        $costes = new CostesConstrucciones();
        $costesConstrucciones = $costes->generaCostesConstrucciones($construccionesMax);

        //Calculamos el coste para calcular el tiempo
        $costeTotal = $construccion->sumarCostes($costesConstrucciones[0]);

        //Calcular el tiempo de construccion
        $tiempo = $construccion->calcularTiempoConstrucciones($costeTotal, $personal);

        //Comprobamos que el tiempo no sea false, seria un error de personal
        if (!is_numeric($tiempo)) {
            $error = true;
        }

        // Comprobar dependencias
        $construcciones = Construcciones::construcciones($planetaActual);
        $dependencia = Dependencias::where('tipo', 'construccion')->get()->where('codigo', $construccion->codigo)->first();
        if ($dependencia->nivelRequiere > $construcciones->where('codigo', $dependencia->codigoRequiere)->first()->nivel) {
            $error = true;
        }

        //Comprobamos que el edificio se puede construir
        if ($construccion->planetas->recursos->mineral < $costesConstrucciones[0]->mineral) {
            $error = true;
        } elseif ($construccion->planetas->recursos->cristal < $costesConstrucciones[0]->cristal) {
            $error = true;
        } elseif ($construccion->planetas->recursos->gas < $costesConstrucciones[0]->gas) {
            $error = true;
        } elseif ($construccion->planetas->recursos->plastico < $costesConstrucciones[0]->plastico) {
            $error = true;
        } elseif ($construccion->planetas->recursos->ceramica < $costesConstrucciones[0]->ceramica) {
            $error = true;
        } elseif ($construccion->planetas->recursos->liquido < $costesConstrucciones[0]->liquido) {
            $error = true;
        } elseif ($construccion->planetas->recursos->micros < $costesConstrucciones[0]->micros) {
            $error = true;
        } elseif (($construccion->planetas->recursos->personal - $personalUsado) < $personal) {
            $error = true;
        } elseif ($accion != "Construyendo") {
            $error = true;
        }

        // dd("NO ES");

        //Si no tenemos ningun error continuamos
        if (!$error) {
            //Fecha prueba
            $fechaFin = strtotime($inicio) + $tiempo;

            //Restamos el coste a los recursos
            $construccion->planetas->recursos->mineral -= $costesConstrucciones[0]->mineral;
            $construccion->planetas->recursos->cristal -= $costesConstrucciones[0]->cristal;
            $construccion->planetas->recursos->gas -= $costesConstrucciones[0]->gas;
            $construccion->planetas->recursos->plastico -= $costesConstrucciones[0]->plastico;
            $construccion->planetas->recursos->ceramica -= $costesConstrucciones[0]->ceramica;
            $construccion->planetas->recursos->liquido -= $costesConstrucciones[0]->liquido;
            $construccion->planetas->recursos->micros -= $costesConstrucciones[0]->micros;
            $construccion->planetas->recursos->save();

            // dd($construccion->planetas->recursos);

            //Generamos la cola
            $construyendo = new EnConstrucciones();
            $construyendo->personal = $personal;
            $construyendo->construcciones_id = $idConstruccion;
            $construyendo->nivel = $nivel;
            $construyendo->accion = "Construyendo";
            $construyendo->created_at = $inicio;
            $construyendo->finished_at = date('Y/m/d H:i:s', $fechaFin);
            $construyendo->save();

            // dd($construyendo);
        }

        return redirect('/juego/construccion/' . $tab);
    }

    //Acceso a subir nivel de construccion
    public function reciclar($idConstruccion, $personal)
    {
        //Recuperar construccion
        $construccionesMax = [];
        $construccion = Construcciones::where('id', $idConstruccion)->first();
        array_push($construccionesMax, $construccion);

        //Recuperamos su ultima cola (si existe)
        $cola = EnConstrucciones::where('construcciones_id', $idConstruccion)->orderBy('id', 'desc')->first();

        //Parametros por defecto
        $codigo = $construccion->codigo;

        //Sobreescribimos datos en caso de que la construccion tenga alguna orden en cola
        if (!empty($cola)) {
            $inicio = $cola->finished_at;
            $nivel = $cola->nivel - 1;

            //Comprobamos si ya hay cola de este edificio
            $accion = $cola->accion;
        } else {
            //Valores por defecto
            $inicio = date("Y-m-d H:i:s");
            $nivel = $construccion->nivel - 1;
            $accion = 'Reciclando';
        }

        //Costes construcciones
        $costes = new CostesConstrucciones();
        $costesConstrucciones = $costes->generaCostesConstrucciones($construccionesMax);

        //Calculamos el coste para calcular el tiempo
        $costeTotal = $construccion->sumarCostes($construccionesMax[0]);

        //Calcular el tiempo de construccion
        $tiempo = $construccion->calcularTiempoConstrucciones($costeTotal, $personal);

        //Fecha prueba
        $fechaFin = strtotime($inicio) + $tiempo;

        //Comprobamos si tiene suficiente personal
        $error = false;
        if ($construccion->planetas->recursos->personal < $personal) {
            $error = true;
        } elseif ($accion != "Reciclando") {
            $error = true;
        } elseif ($nivel < 0) {
            $error = true;
        }

        //Si no tenemos ningun error continuamos
        if (!$error) {
            //Generamos la cola
            $construyendo = new EnConstrucciones();
            $construyendo->personal = $personal;
            $construyendo->construcciones_id = $idConstruccion;
            $construyendo->nivel = $nivel;
            $construyendo->accion = "Reciclando";
            $construyendo->finished_at = date('Y/m/d H:i:s', $fechaFin);
            $construyendo->save();
        }

        return redirect('/juego/construccion');
    }

    //Acceso a subir nivel de construccion
    public function cancelar($idColaConstruccion = 1)
    {
        //Recuperar construccion
        $cola = EnConstrucciones::where('id', $idColaConstruccion)->first();

        //Comprobamos si hay algun edificio por encima del nivel que se ha cancelado
        $listaCola = EnConstrucciones::where([['construcciones_id', '=', $cola->construcciones->id], ['nivel', '>', $cola->nivel]])->get();

        if ($cola->accion == 'Construyendo') {
            $nivel = $cola->nivel - 1;
        } else {
            $nivel = $cola->nivel + 1;
        }
        $reciclaje = Constantes::where('codigo', 'perdidaCancelar')->first()->valor;

        //Ahora cancelamos toda la cola con nivel superiore a la cancelada
        foreach ($listaCola as $colita) {
            //En caso de ser una construccion debe devolver parte de los recursos
            if ($colita->accion == "Construyendo") {
                $recursos = $colita->construcciones->planetas->recursos;

                $costesConstrucciones = CostesConstrucciones::generarDatosCostesConstruccion($colita->nivel - 1, $colita->construcciones->codigo, $colita->construcciones->id);

                //Restaurar beneficio por reciclaje
                $recursos->mineral += ($costesConstrucciones->mineral * $reciclaje);
                $recursos->cristal += ($costesConstrucciones->cristal * $reciclaje);
                $recursos->gas += ($costesConstrucciones->gas * $reciclaje);
                $recursos->plastico += ($costesConstrucciones->plastico * $reciclaje);
                $recursos->ceramica += ($costesConstrucciones->ceramica * $reciclaje);
                $recursos->liquido += ($costesConstrucciones->liquido * $reciclaje);
                $recursos->micros += ($costesConstrucciones->micros * $reciclaje);
                $recursos->save();
            }
            $colita->delete();
        }
        //En caso de ser una construccion debe devolver parte de los recursos
        if ($cola->accion == "Construyendo") {
            $recursos = $cola->construcciones->planetas->recursos;

            $costesConstrucciones = CostesConstrucciones::generarDatosCostesConstruccion($cola->nivel - 1, $cola->construcciones->codigo, $cola->construcciones->id);

            //Restaurar beneficio por reciclaje
            $recursos->mineral += ($costesConstrucciones->mineral * $reciclaje);
            $recursos->cristal += ($costesConstrucciones->cristal * $reciclaje);
            $recursos->gas += ($costesConstrucciones->gas * $reciclaje);
            $recursos->plastico += ($costesConstrucciones->plastico * $reciclaje);
            $recursos->ceramica += ($costesConstrucciones->ceramica * $reciclaje);
            $recursos->liquido += ($costesConstrucciones->liquido * $reciclaje);
            $recursos->micros += ($costesConstrucciones->micros * $reciclaje);
            $recursos->save();
        }
        $cola->delete();

        return redirect('/juego/construccion');
    }

    //Acceso a subir nivel de construccion
    public function datos($codigo)
    {
        $nombreConstruccion = trans('construccion.' . $codigo);
        $descripcionConstruccion = trans('construccion.' . $codigo . 'Descripcion');
        return compact('descripcionConstruccion', 'nombreConstruccion');
    }

    //Acceso a subir nivel de construccion
    public function industria($industria)
    {
        $industrias = Industrias::where('planetas_id', session()->get('planetas_id'))->first();
        if ($industria == 'liquido') {
            if ($industrias->liquido == 0) {
                $industrias->liquido = 1;
            } else {
                $industrias->liquido = 0;
            }
        } elseif ($industria == 'micros') {
            if ($industrias->micros == 0) {
                $industrias->micros = 1;
            } else {
                $industrias->micros = 0;
            }
        } elseif ($industria == 'fuel') {
            if ($industrias->fuel == 0) {
                $industrias->fuel = 1;
            } else {
                $industrias->fuel = 0;
            }
        } elseif ($industria == 'ma') {
            if ($industrias->ma == 0) {
                $industrias->ma = 1;
            } else {
                $industrias->ma = 0;
            }
        } elseif ($industria == 'municion') {
            if ($industrias->municion == 0) {
                $industrias->municion = 1;
            } else {
                $industrias->municion = 0;
            }
        }
        $industrias->save();
        return redirect('/juego/construccion/industria-tab');
    }
}
