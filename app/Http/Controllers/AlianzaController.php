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

class AlianzaController extends Controller
{

    public function index ()
    {
        $planeta = Planetas::where('id', session()->get('planetas_id'))->first();

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

        //Inicializamos las variables para produccion y almacenes
        $producciones = [];
        $almacenes = [];

        //Calculamos producciones
        for ($i = 0 ; $i < count($construcciones) ; $i++) {
            if (substr($construcciones[$i]->codigo, 0, 3) == "ind") {
                $industrias = Industrias::where('planetas_id', session()->get('planetas_id'))->first();
                $industria = strtolower(substr($construcciones[$i]->codigo, 3));
                if ($industria == 'liquido') {
                    if ($industrias->liquido == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    }else{
                        $produccion = new Producciones;
                        $produccion->liquido = 0;
                    }
                }elseif ($industria == 'micros') {
                    if ($industrias->micros == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    }else{
                        $produccion = new Producciones;
                        $produccion->micros = 0;
                    }
                }elseif ($industria == 'fuel') {
                    if ($industrias->fuel == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    }else{
                        $produccion = new Producciones;
                        $produccion->fuel = 0;
                    }
                }elseif ($industria == 'ma') {
                    if ($industrias->ma == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    }else{
                        $produccion = new Producciones;
                        $produccion->ma = 0;
                    }
                }elseif ($industria == 'municion') {
                    if ($industrias->municion == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    }else{
                        $produccion = new Producciones;
                        $produccion->municion = 0;
                    }
                }elseif ($industria == 'personal') {
                    $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                }
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

        //Calcular gastos de producciones
        $producciones[0]->mineral -= ($producciones[5]->liquido * Constantes::where('codigo', 'costoLiquido')->first()->valor);
        $producciones[1]->cristal -= ($producciones[6]->micros * Constantes::where('codigo', 'costoMicros')->first()->valor);
        $producciones[2]->gas -= ($producciones[7]->fuel * Constantes::where('codigo', 'costoFuel')->first()->valor);
        $producciones[3]->plastico -= ($producciones[8]->ma * Constantes::where('codigo', 'costoMa')->first()->valor);
        $producciones[4]->ceramica -= ($producciones[9]->municion * Constantes::where('codigo', 'costoMunicion')->first()->valor);

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

        //Enviamos la variable tipo del planeta para ocultar y mostrar cosas
        $tipoPlaneta = $planeta->tipo;

        return view('juego.recursosFrame', compact('recursos', 'almacenes', 'producciones', 'personal', 'tipoPlaneta'));
    }
}