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
    public function subirNivel ($idEdificio = 1)
    {
        //Recuperar construccion
        $edificio = Construcciones::where('id', $idEdificio)->first();
        $nivelCola = EnConstrucciones::where('construcciones_id', $idEdificio)->max('nivel');

        //Rellenar variables
        $nivel = empty($nivelCola) ? $edificio->nivel + 1 : $nivelCola + 1;
        $codigo = $edificio->codigo;
        $idConstruccion = $edificio->id;

        //Fecha prueba
        $fechaFin = time() + 3600;

        //Generamos la cola
        $construyendo = new EnConstrucciones();
        $construyendo->personal = 15000000;
        $construyendo->construcciones_id = $idConstruccion;
        $construyendo->nivel = $nivel;
        $construyendo->accion = "Construyendo";
        $construyendo->finished_at = date('Y/m/d H:i:s', $fechaFin);
        $construyendo->save();

        //Generamos el coste del edificio
        $costeConstrucciones = new CostesConstrucciones();
        $costeAntiguo = CostesConstrucciones::where('construcciones_id', $edificio->id)->first();
        $coste = $costeConstrucciones->generarDatosCostesConstruccion($nivel, $codigo, $idConstruccion);
        $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
        $costeAntiguo->save();
        //$edificio->coste = $costeAntiguo;
        //$edificio->coste->save();

        return redirect('/juego/construccion');
    }
}