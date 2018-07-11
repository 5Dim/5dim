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
        $colaConstruccion = EnConstrucciones::whereBetween('construcciones_id', [$construcciones[0]->id, $construcciones[count($construcciones) - 1]->id])->get();

        //Enviamos los datos para la velocidad de construccion
        $velocidadConst=Constantes::where('codigo','velocidadConst')->first();

        //Enviamos la variable tipo del planeta para ocultar y mostrar cosas
        $tipoPlaneta = $planeta->tipo;

        //Devolvemos la vista con todas las variables
        return view('juego.construccion', compact('recursos', 'almacenes', 'producciones', 'construcciones', 'colaConstruccion','velocidadConst', 'tipoPlaneta'));
    }

    //Acceso a subir nivel de construccion
    public function construir ($idConstruccion = 1, $personal = 15000)
    {
        //Recuperar construccion
        $construccion = Construcciones::where('id', $idConstruccion)->first();

        $nivelCola = EnConstrucciones::where('construcciones_id', $idConstruccion)->max('nivel');
        $recursos = $construccion->planetas->recursos;

        //Rellenar variables
        $nivel = empty($nivelCola) ? $construccion->nivel + 1 : $nivelCola + 1;
        $codigo = $construccion->codigo;
        $costeTotal = $construccion->sumarCostes($construccion->coste);

        $tiempo = $construccion->calcularTiempoConstrucciones($costeTotal, $personal);

        //Fecha prueba
        $fechaFin = time() + $tiempo;

        //Comprobamos si ya hay cola de este edificio y cual es accion para no pisarla
        $yaEnCola = EnConstrucciones::where('construcciones_id', $idConstruccion)->get();
        $accion = empty($yaEnCola[0]) ? 'Construyendo' : $yaEnCola[0]->accion;

        //Comprobamos que el edificio se puede construir
        $error = false;
        if ($recursos->mineral < $construccion->coste->mineral) {
            $error = true;
        }elseif ($recursos->cristal < $construccion->coste->cristal) {
            $error = true;
        }elseif ($recursos->gas < $construccion->coste->gas) {
            $error = true;
        }elseif ($recursos->plastico < $construccion->coste->plastico) {
            $error = true;
        }elseif ($recursos->ceramica < $construccion->coste->ceramica) {
            $error = true;
        }elseif ($recursos->liquido < $construccion->coste->liquido) {
            $error = true;
        }elseif ($recursos->micros < $construccion->coste->micros) {
            $error = true;
        }elseif ($accion != "Construyendo") {
            $error = true;
        }

        //Si no tenemos ningun error continuamos
        if (!$error) {
            //Restamos el coste a los recursos
            $recursos->mineral -= $construccion->coste->mineral;
            $recursos->cristal -= $construccion->coste->cristal;
            $recursos->gas -= $construccion->coste->gas;
            $recursos->plastico -= $construccion->coste->plastico;
            $recursos->ceramica -= $construccion->coste->ceramica;
            $recursos->liquido -= $construccion->coste->liquido;
            $recursos->micros -= $construccion->coste->micros;
            $recursos->save();

            //Generamos la cola
            $construyendo = new EnConstrucciones();
            $construyendo->personal = $personal;
            $construyendo->construcciones_id = $idConstruccion;
            $construyendo->nivel = $nivel;
            $construyendo->accion = "Construyendo";
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

        //Rellenar variables
        $nivel = $construccion->nivel - 1;
        $codigo = $construccion->codigo;
        $costeTotal = $construccion->sumarCostes($construccion->coste);
        $tiempo = $construccion->calcularTiempoConstrucciones($costeTotal, $personal) / 10;

        //Fecha prueba
        $fechaFin = time() + $tiempo;

        //Comprobamos si ya hay cola de este edificio y cual es accion para no pisarla
        $yaEnCola = EnConstrucciones::where('construcciones_id', $idConstruccion)->get();
        $accion = empty($yaEnCola[0]) ? 'Construyendo' : $yaEnCola[0]->accion;

        //Comprobamos si tiene suficiente personal
        $error = false;
        if ($construccion->planetas->recursos->personal < $personal) {
            $error = true;
        }elseif ($accion != "Reciclando") {
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
        $colaConstruccion = EnConstrucciones::where('id', $idColaConstruccion)->first();

        //Comprobamos si hay algun edificio por encima del nivel que se ha cancelado
        $listaCola = EnConstrucciones::where([['construcciones_id', '=', $colaConstruccion->construcciones->id], ['nivel', '>', $colaConstruccion->nivel]])->get();

        //Ahora cancelamos toda la cola con nivel superiore a la cancelada
        foreach ($listaCola as $cola) {
            $cola->delete();
        }
        $colaConstruccion->delete();

        $nivelCola = EnConstrucciones::where('construcciones_id', $colaConstruccion->construcciones->id)->max('nivel');
        $nivel = empty($nivelCola) ? $colaConstruccion->construcciones->nivel : $nivelCola;

        //Generamos el coste del edificio
        $costeConstrucciones = new CostesConstrucciones();
        $costeAntiguo = CostesConstrucciones::where('construcciones_id', $colaConstruccion->construcciones->id)->first();
        $coste = $costeConstrucciones->generarDatosCostesConstruccion($nivel, $colaConstruccion->construcciones->codigo, $colaConstruccion->construcciones->id);
        $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
        $costeAntiguo->save();

        return redirect('/juego/construccion');
    }
}