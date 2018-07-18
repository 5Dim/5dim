<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Planetas;
use App\Industrias;
use App\Constantes;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;
use App\EnInvestigaciones;
use App\Investigaciones;
use App\Dependencias;
use App\CostesInvestigaciones;

class InvestigacionController extends Controller
{

    public function index ($tab="")
    {
        //Inicio recursos
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        EnInvestigaciones::terminarColaInvestigaciones();
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

        //Investigaciones
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);

        //Constantes de construccion
        $CConstantes=Constantes::where('tipo','investigacion')->get();

        //Enviamos los datos para la velocidad de construccion
        $velInvest=$CConstantes->where('codigo','velInvest')->first();

        // vemos las dependencias
        $dependencias=Dependencias::where('tipo','investigacion')->get();

        //Devolvemos la vista con todas las variables
        $velInvest=$CConstantes->where('codigo','velInvest')->first();

        //nivel del laboratorio
        $nivelLaboratorio=Construcciones::where([
            ['planetas_id',$planetaActual->id],
            ['codigo','laboratorio'],
            ])->first();

        return view('juego.investigacion', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta', 'planetaActual','velInvest','dependencias', 'colaInvestigacion', 'investigaciones','nivelLaboratorio','tab'));
    }

    //Acceso a subir nivel de construccion
    public function construir ($idInvestigacion, $personal, $tab='')
    {
        //En que planeta estamos
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $error = false;

        //Recuperar construccion
        $construcciones = Construcciones::construcciones($planetaActual);
        $producciones = Producciones::calcularProducciones($construcciones, $planetaActual);
        $almacenes = Almacenes::calcularAlmacenes($construcciones);
        $personalUsado = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personalUsado += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            $personalUsado += $cola->personal;
        }
        $tipoPlaneta = $planetaActual->tipo;

        //La investigacion que estamos subiendo
        $investigacion = Investigaciones::find($idInvestigacion);

        //Recuperamos su ultima cola (si existe)
        $cola = EnInvestigaciones::where('investigaciones_id', $idInvestigacion)->orderBy('id', 'desc')->first();

        //Parametros por defecto
        $codigo = $investigacion->codigo;

        //Sobreescribimos datos en caso de que la construccion tenga alguna orden en cola
        if (!empty($cola)) {
            $inicio = $cola->finished_at;
            $nivel = $cola->nivel + 1;

            //Comprobamos si ya hay cola de este edificio
            $accion = $cola->accion;
        }else{
            //Valores por defecto
            $inicio = date("Y-m-d H:i:s");
            $nivel = $investigacion->nivel + 1;
            $accion = 'Investigando';
        }

        //Calculamos el coste para calcular el tiempo
        $costeTotal = $construcciones[0]->sumarCostes($investigacion->coste);

        //Calcular el tiempo de construccion
        $tiempo = $investigacion->calcularTiempoInvestigaciones($costeTotal, $personal, $nivel, $planetaActual);

        //Comprobamos que el tiempo no sea false, seria un error de personal
        if (!$tiempo) {
            $error = true;
        }

        //Fecha prueba
        $fechaFin = strtotime($inicio) + $tiempo;

        //Comprobamos que el edificio se puede construir
        if ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->mineral < $investigacion->coste->mineral) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->cristal < $investigacion->coste->cristal) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->gas < $investigacion->coste->gas) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->plastico < $investigacion->coste->plastico) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->ceramica < $investigacion->coste->ceramica) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->liquido < $investigacion->coste->liquido) {
            $error = true;
        }elseif ($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->micros < $investigacion->coste->micros) {
            $error = true;
        }elseif (($investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->personal - $personalUsado) < $personal) {
            $error = true;
        }elseif ($accion != "Investigando") {
            $error = true;
        }

        //Si no tenemos ningun error continuamos
        if (!$error) {
            //Restamos el coste a los recursos
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->mineral -= $investigacion->coste->mineral;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->cristal -= $investigacion->coste->cristal;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->gas -= $investigacion->coste->gas;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->plastico -= $investigacion->coste->plastico;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->ceramica -= $investigacion->coste->ceramica;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->liquido -= $investigacion->coste->liquido;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->micros -= $investigacion->coste->micros;
            $investigacion->jugadores->planetas->where('id', $planetaActual->id)->first()->recursos->save();

            //Generamos la cola
            $construyendo = new EnInvestigaciones();
            $construyendo->personal = $personal;
            $construyendo->investigaciones_id = $idInvestigacion;
            $construyendo->planetas_id = $planetaActual->id;
            $construyendo->nivel = $nivel;
            $construyendo->accion = "Investigando";
            $construyendo->created_at = $inicio;
            $construyendo->finished_at = date('Y-m-d H:i:s', $fechaFin);
            $construyendo->save();

            //Generamos el coste del edificio
            $costeInvestigaciones = new CostesInvestigaciones();
            $costeAntiguo = CostesInvestigaciones::where('investigaciones_id', $investigacion->id)->first();
            $coste = $costeInvestigaciones->generarDatosCostesInvestigacion($nivel, $codigo, $idInvestigacion);
            $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
            $costeAntiguo->save();
        }

        return redirect('/juego/investigacion');
    }

    //Acceso a subir nivel de construccion
    public function cancelar ($idColaInvestigacion = 1)
    {
        //Recuperar construccion
        $cola = EnInvestigaciones::where('id', $idColaInvestigacion)->first();

        //Comprobamos si hay algun edificio por encima del nivel que se ha cancelado
        $listaCola = EnInvestigaciones::where([['Investigaciones_id', '=', $cola->investigaciones->id], ['nivel', '>', $cola->nivel]])->get();

        if ($cola->accion == 'Investigando') {
            $nivel = $cola->nivel - 1;
        }
        $reciclaje = Constantes::where('codigo', 'perdidaCancelar')->first()->valor;

        //Generamos el coste del edificio
        $costeConstrucciones = new CostesInvestigaciones();
        $costeAntiguo = CostesInvestigaciones::where('Investigaciones_id', $cola->investigaciones->id)->first();
        $coste = $costeConstrucciones->generarDatosCostesInvestigacion($nivel, $cola->investigaciones->codigo, $cola->investigaciones->id);
        $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
        $costeAntiguo->save();

        //Ahora cancelamos toda la cola con nivel superiore a la cancelada
        foreach ($listaCola as $colita) {
            //En caso de ser una construccion debe devolver parte de los recursos
            if ($colita->accion == "Investigando") {
                $costeconstruccion = new CostesInvestigaciones();
                $coste = $costeconstruccion->generarDatosCostesInvestigacion($colita->nivel, $colita->investigaciones->codigo, $colita->investigaciones->id);

                //Restaurar beneficio por reciclaje
                $colita->planetas->recursos->mineral += ($coste->mineral * $reciclaje);
                $colita->planetas->recursos->cristal += ($coste->cristal * $reciclaje);
                $colita->planetas->recursos->gas += ($coste->gas * $reciclaje);
                $colita->planetas->recursos->plastico += ($coste->plastico * $reciclaje);
                $colita->planetas->recursos->ceramica += ($coste->ceramica * $reciclaje);
                $colita->planetas->recursos->liquido += ($coste->liquido * $reciclaje);
                $colita->planetas->recursos->micros += ($coste->micros * $reciclaje);
                $colita->planetas->recursos->save();
            }
            $colita->delete();
        }
        //En caso de ser una construccion debe devolver parte de los recursos
        if ($cola->accion == "Investigando") {
            $coste = $cola->investigaciones->coste;
            $recursos = $cola->planetas->recursos;

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

        return redirect('/juego/investigacion');
    }

    //Acceso a subir nivel de construccion
    public function datos ($codigo)
    {
        $nombreInvestigacion = trans('investigacion.' . $codigo);
        $descripcionInvestigacion = trans('investigacion.' . $codigo . 'Descripcion');
        return compact('descripcionInvestigacion', 'nombreInvestigacion');
    }
}