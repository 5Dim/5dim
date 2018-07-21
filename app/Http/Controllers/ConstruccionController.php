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

class ConstruccionController extends Controller
{
    //Acceso a construcciones
    public function index($tab="")
    {
        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/juego/planeta');
        }
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
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
        //Fin recursos

        //Constantes de construccion
        $CConstantes=Constantes::where('tipo','construccion')->get();

        //Enviamos los datos para la velocidad de construccion
        $velocidadConst=$CConstantes->where('codigo','velocidadConst')->first();

        // vemos las dependencias
        $dependencias=Dependencias::where('tipo','construccion')->get();

        //$tab=session()->get('tabConstruccion');
        //session()->put('tabConstruccion', $tab);

        //Devolvemos la vista con todas las variables
        return view('juego.construccion', compact('recursos', 'almacenes', 'producciones', 'construcciones', 'colaConstruccion','velocidadConst', 'tipoPlaneta','dependencias', 'personal','tab', 'planetaActual'));
    }

    //Acceso a subir nivel de construccion
    public function construir ($idConstruccion, $personal,$tab)
    {
        //En que planeta estamos
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $error = false;

        //Recuperar construccion
        $construccion = Construcciones::where('id', $idConstruccion)->first();
        $construcciones = Construcciones::where('planetas_id', $planetaActual->id)->get();
        $producciones = Producciones::calcularProducciones($construcciones, $planetaActual);
        $almacenes = Almacenes::calcularAlmacenes($construcciones);
        $personalUsado = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personalUsado += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personal += $cola->personal;
            }
        }
        $tipoPlaneta = $planetaActual->tipo;

        //Recuperamos su ultima cola (si existe)
        $cola = EnConstrucciones::where('construcciones_id', $idConstruccion)->orderBy('id', 'desc')->first();

        //Parametros por defecto
        $codigo = $construccion->codigo;

        //Sobreescribimos datos en caso de que la construccion tenga alguna orden en cola
        if (!empty($cola)) {
            $inicio = $cola->finished_at;
            $nivel = $cola->nivel + 1;

            //Comprobamos si ya hay cola de este edificio
            $accion = $cola->accion;
        }else{
            //Valores por defecto
            $inicio = date("Y-m-d H:i:s");
            $nivel = $construccion->nivel + 1;
            $accion = 'Construyendo';
        }

        //Calculamos el coste para calcular el tiempo
        $costeTotal = $construccion->sumarCostes($construccion->coste);

        //Calcular el tiempo de construccion
        $tiempo = $construccion->calcularTiempoConstrucciones($costeTotal, $personal);

        //Comprobamos que el tiempo no sea false, seria un error de personal
        if (!$tiempo) {
            $error = true;
        }

        //Fecha prueba
        $fechaFin = strtotime($inicio) + $tiempo;

        //Comprobamos que el edificio se puede construir
        if ($construccion->planetas->recursos->mineral < $construccion->coste->mineral) {
            $error = true;
        }elseif ($construccion->planetas->recursos->cristal < $construccion->coste->cristal) {
            $error = true;
        }elseif ($construccion->planetas->recursos->gas < $construccion->coste->gas) {
            $error = true;
        }elseif ($construccion->planetas->recursos->plastico < $construccion->coste->plastico) {
            $error = true;
        }elseif ($construccion->planetas->recursos->ceramica < $construccion->coste->ceramica) {
            $error = true;
        }elseif ($construccion->planetas->recursos->liquido < $construccion->coste->liquido) {
            $error = true;
        }elseif ($construccion->planetas->recursos->micros < $construccion->coste->micros) {
            $error = true;
        }elseif (($construccion->planetas->recursos->personal - $personalUsado) < $personal) {
            $error = true;
        }elseif ($accion != "Construyendo") {
            $error = true;
        }

        //Si no tenemos ningun error continuamos
        if (!$error) {
            //Restamos el coste a los recursos
            $construccion->planetas->recursos->mineral -= $construccion->coste->mineral;
            $construccion->planetas->recursos->cristal -= $construccion->coste->cristal;
            $construccion->planetas->recursos->gas -= $construccion->coste->gas;
            $construccion->planetas->recursos->plastico -= $construccion->coste->plastico;
            $construccion->planetas->recursos->ceramica -= $construccion->coste->ceramica;
            $construccion->planetas->recursos->liquido -= $construccion->coste->liquido;
            $construccion->planetas->recursos->micros -= $construccion->coste->micros;
            $construccion->planetas->recursos->save();

            //Generamos la cola
            $construyendo = new EnConstrucciones();
            $construyendo->personal = $personal;
            $construyendo->construcciones_id = $idConstruccion;
            $construyendo->nivel = $nivel;
            $construyendo->accion = "Construyendo";
            $construyendo->created_at = $inicio;
            $construyendo->finished_at = date('Y/m/d H:i:s', $fechaFin);
            $construyendo->save();

            //Generamos el coste del edificio
            $costeConstrucciones = new CostesConstrucciones();
            $costeAntiguo = CostesConstrucciones::where('construcciones_id', $construccion->id)->first();
            $coste = $costeConstrucciones->generarDatosCostesConstruccion($nivel, $codigo, $idConstruccion);
            $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
            $costeAntiguo->save();
        }

        return redirect('/juego/construccion/'.$tab);
    }

    //Acceso a subir nivel de construccion
    public function reciclar ($idConstruccion, $personal)
    {
        //Recuperar construccion
        $construccion = Construcciones::where('id', $idConstruccion)->first();

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
        }else{
            //Valores por defecto
            $inicio = date("Y-m-d H:i:s");
            $nivel = $construccion->nivel - 1;
            $accion = 'Reciclando';
        }

        //Calculamos el coste para calcular el tiempo
        $costeTotal = $construccion->sumarCostes($construccion->coste);

        //Calcular el tiempo de construccion
        $tiempo = $construccion->calcularTiempoConstrucciones($costeTotal, $personal);

        //Fecha prueba
        $fechaFin = strtotime($inicio) + $tiempo;

        //Comprobamos si tiene suficiente personal
        $error = false;
        if ($construccion->planetas->recursos->personal < $personal) {
            $error = true;
        }elseif ($accion != "Reciclando") {
            $error = true;
        }elseif ($nivel < 0) {
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

            //Generamos el coste del edificio
            $costeConstrucciones = new CostesConstrucciones();
            $costeAntiguo = CostesConstrucciones::where('construcciones_id', $construccion->id)->first();
            $coste = $costeConstrucciones->generarDatosCostesConstruccion($nivel, $codigo, $idConstruccion);
            $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
            $costeAntiguo->save();
        }

        return redirect('/juego/construccion');
    }

    //Acceso a subir nivel de construccion
    public function cancelar ($idColaConstruccion = 1)
    {
        //Recuperar construccion
        $cola = EnConstrucciones::where('id', $idColaConstruccion)->first();

        //Comprobamos si hay algun edificio por encima del nivel que se ha cancelado
        $listaCola = EnConstrucciones::where([['construcciones_id', '=', $cola->construcciones->id], ['nivel', '>', $cola->nivel]])->get();

        if ($cola->accion == 'Construyendo') {
            $nivel = $cola->nivel - 1;
        }else{
            $nivel = $cola->nivel + 1;
        }
        $reciclaje = Constantes::where('codigo', 'perdidaCancelar')->first()->valor;

        //Generamos el coste del edificio
        $costeConstrucciones = new CostesConstrucciones();
        $costeAntiguo = CostesConstrucciones::where('construcciones_id', $cola->construcciones->id)->first();
        $coste = $costeConstrucciones->generarDatosCostesConstruccion($nivel, $cola->construcciones->codigo, $cola->construcciones->id);
        $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
        $costeAntiguo->save();

        //Ahora cancelamos toda la cola con nivel superiore a la cancelada
        foreach ($listaCola as $colita) {
            //En caso de ser una construccion debe devolver parte de los recursos
            if ($colita->accion == "Construyendo") {
                $costeconstruccion = new CostesConstrucciones();
                $coste = $costeconstruccion->generarDatosCostesConstruccion($colita->nivel, $colita->construcciones->codigo, $colita->construcciones->id);
                $recursos = $colita->construcciones->planetas->recursos;

                //Restaurar beneficio por reciclaje
                $recursos->mineral += ($coste->mineral * $reciclaje);
                $recursos->cristal += ($coste->cristal * $reciclaje);
                $recursos->gas += ($coste->gas * $reciclaje);
                $recursos->plastico += ($coste->plastico * $reciclaje);
                $recursos->ceramica += ($coste->ceramica * $reciclaje);
                $recursos->liquido += ($coste->liquido * $reciclaje);
                $recursos->micros += ($coste->micros * $reciclaje);
                $recursos->save();
            }
            $colita->delete();
        }
        //En caso de ser una construccion debe devolver parte de los recursos
        if ($cola->accion == "Construyendo") {
            $coste = $cola->construcciones->coste;
            $recursos = $cola->construcciones->planetas->recursos;

            //Restaurar beneficio por reciclaje
            $recursos->mineral += ($coste->mineral * $reciclaje);
            $recursos->cristal += ($coste->cristal * $reciclaje);
            $recursos->gas += ($coste->gas * $reciclaje);
            $recursos->plastico += ($coste->plastico * $reciclaje);
            $recursos->ceramica += ($coste->ceramica * $reciclaje);
            $recursos->liquido += ($coste->liquido * $reciclaje);
            $recursos->micros += ($coste->micros * $reciclaje);
            $recursos->save();
        }
        $cola->delete();

        return redirect('/juego/construccion');
    }

    //Acceso a subir nivel de construccion
    public function datos ($codigo)
    {
        $nombreConstruccion = trans('construccion.' . $codigo);
        $descripcionConstruccion = trans('construccion.' . $codigo . 'Descripcion');
        return compact('descripcionConstruccion', 'nombreConstruccion');
    }

    //Acceso a subir nivel de construccion
    public function industria ($industria)
    {
        $industrias = Industrias::where('planetas_id', session()->get('planetas_id'))->first();
        if ($industria == 'liquido') {
            if ($industrias->liquido == 0) {
                $industrias->liquido = 1;
            }else{
                $industrias->liquido = 0;
            }
        }elseif ($industria == 'micros') {
            if ($industrias->micros == 0) {
                $industrias->micros = 1;
            }else{
                $industrias->micros = 0;
            }
        }elseif ($industria == 'fuel') {
            if ($industrias->fuel == 0) {
                $industrias->fuel = 1;
            }else{
                $industrias->fuel = 0;
            }
        }elseif ($industria == 'ma') {
            if ($industrias->ma == 0) {
                $industrias->ma = 1;
            }else{
                $industrias->ma = 0;
            }
        }elseif ($industria == 'municion') {
            if ($industrias->municion == 0) {
                $industrias->municion = 1;
            }else{
                $industrias->municion = 0;
            }
        }
        $industrias->save();
        return redirect('/juego/construccion');
    }
}