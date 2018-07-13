<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;
use App\CostesConstrucciones;
use App\Constantes;
use App\Planetas;
use App\Dependencias;

class ConstruccionController extends Controller
{
    //Acceso a construcciones
    public function index()
    {
        //En que planeta estamos
        if (empty(session()->get('planetas_id'))) {
            session()->put('planetas_id', 1);
            $planeta = Planetas::where('id', session()->get('planetas_id'))->first();
        }else {
            $planeta = Planetas::where('id', session()->get('planetas_id'))->first();
        }

        //Calculamos ordenes terminadas
        EnConstrucciones::terminarColaConstrucciones();

        //Comprobamos construcciones en el planeta, si no las hay las generamos para una colonia nueva
        $construcciones = Construcciones::where('planetas_id', $planeta->id)->get();
        if (empty($construcciones[0]->codigo)) {
            $construccion = new Construcciones();
            $construccion->nuevaColonia($planeta->id);
            $construcciones = Construcciones::where('planetas_id', $planeta->id)->get();

        }

        //Comprobamos si tiene recursos
        $recursos = Recursos::where('planetas_id', $planeta->id)->first();
        /*
        if (empty($recursos->mineral == 0)) {
            $recursos = new Construcciones();
            $construccion->nuevaColonia($planeta);
            $construcciones = Construcciones::where('planetas_id', $planeta)->get();
        }
        */

        //Inicializamos las variables para produccion y almacenes
        $producciones = [];
        $almacenes = [];

        //Calculamos producciones
        for ($i = 0 ; $i < count($construcciones) ; $i++) {
            if (substr($construcciones[$i]->codigo, 0, 3) == "ind") {
                $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                array_push($producciones, $produccion);
            }elseif (substr($construcciones[$i]->codigo, 0, 4) == "mina") {
                $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 4)))->where('nivel', $construcciones[$i]->nivel)->first();
                array_push($producciones, $produccion);
            //Calculamos almacenes
            }elseif (substr($construcciones[$i]->codigo, 0, 3) == "alm") {
                $almacen = Almacenes::where('nivel', $construcciones[$i]->nivel)->first();
                array_push($almacenes, $almacen);
            }
        }

        //Recalculamos los recursos para ese planeta
        Recursos::calcularRecursos($planeta->id);
        $recursos = Recursos::where('planetas_id', $planeta->id)->first();

        //Comrpobamos si existe una cola
        $colaConstruccion= [];
        $colaConstruccion2=[];
        foreach ($planeta->construcciones as $construccion){
            if(!empty($construccion->enConstrucciones[0])){
                array_push($colaConstruccion2, $construccion->enConstrucciones);
            }
        }
        for ($i=0; $i < count($colaConstruccion2); $i++) {
            if (!empty($colaConstruccion2[$i])) {
                foreach ($colaConstruccion2[$i] as $colita) {
                    array_push($colaConstruccion, $colita);
                }
            }
        }

        //Personal en uso
        $personal = 0;
        foreach ($colaConstruccion as $cola) {
            $personal += $cola->personal;
        }


        //Enviamos los datos para la velocidad de construccion
        $velocidadConst=Constantes::where('codigo','velocidadConst')->first();

        //Enviamos la variable tipo del planeta para ocultar y mostrar cosas
        $tipoPlaneta = $planeta->tipo;

        // vemos las dependencias
        $dependencias=Dependencias::where('tipo','construccion')->get();

        //Devolvemos la vista con todas las variables
        return view('juego.construccion', compact('recursos', 'almacenes', 'producciones', 'construcciones', 'colaConstruccion','velocidadConst', 'tipoPlaneta','dependencias', 'personal'));
    }

    //Acceso a subir nivel de construccion
    public function construir ($idConstruccion, $personal)
    {
        //En que planeta estamos
        if (empty(session()->get('planetas_id'))) {
            session()->put('planetas_id', 1);
            $planeta = Planetas::where('id', session()->get('planetas_id'))->first();
        }else {
            $planeta = Planetas::where('id', session()->get('planetas_id'))->first();
        }

        //Recuperar construccion
        $construccion = Construcciones::where('id', $idConstruccion)->first();

        //Comrpobamos si existe una cola
        $colaConstruccion= [];
        $colaConstruccion2=[];
        foreach ($planeta->construcciones as $construccion){
            if(!empty($construccion->enConstrucciones[0])){
                array_push($colaConstruccion2, $construccion->enConstrucciones);
            }
        }
        for ($i=0; $i < count($colaConstruccion2); $i++) {
            if (!empty($colaConstruccion2[$i])) {
                foreach ($colaConstruccion2[$i] as $colita) {
                    array_push($colaConstruccion, $colita);
                }
            }
        }

        //Personal en uso
        $personalUsado = 0;
        foreach ($colaConstruccion as $cola) {
            $personalUsado += $cola->personal;
        }

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

        //Fecha prueba
        $fechaFin = strtotime($inicio) + $tiempo;

        //Comprobamos que el edificio se puede construir
        $error = false;
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
        }elseif ($construccion->planetas->recursos->personal-$personalUsado < $personal) {
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

        return redirect('/juego/construccion');
    }

    //Acceso a subir nivel de construccion
    public function reciclar ($idConstruccion = 1, $personal = 15000)
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
            $nivel = $cola->nivel;
            $construccion->nivel - 1;

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

        $nivelCola = EnConstrucciones::where('construcciones_id', $cola->construcciones->id)->max('nivel');
        $nivel = empty($nivelCola) ? $cola->construcciones->nivel : $nivelCola;
        $reciclaje = Constantes::where('codigo', 'perdidaCancelar')->first()->valor;

        //Generamos el coste del edificio
        $costeConstrucciones = new CostesConstrucciones();
        $costeAntiguo = CostesConstrucciones::where('construcciones_id', $cola->construcciones->id)->first();
        $coste = $costeConstrucciones->generarDatosCostesConstruccion($nivel, $cola->construcciones->codigo, $cola->construcciones->id);
        $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
        $costeAntiguo->save();

        //Ahora cancelamos toda la cola con nivel superiore a la cancelada
        foreach ($listaCola as $cola) {
            //En caso de ser una construccion debe devolver parte de los recursos
            if ($cola->accion == "Construyendo") {
                $costeconstruccion = new CostesConstrucciones();
                $coste = $costeconstruccion->generarDatosCostesConstruccion($cola->construcciones->codigo, $cola->nivel, $cola->construcciones->id);
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
    public function datos ($codigo, $locale)
    {
        $nombreConstruccion = trans('construccion.' . $codigo);
        $descripcionConstruccion = trans('construccion.' . $codigo . 'Descripcion');
        return compact('descripcionConstruccion', 'nombreConstruccion');
    }
}