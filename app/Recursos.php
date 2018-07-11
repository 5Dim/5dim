<?php

namespace App;

use App\Planetas;
use App\Almacenes;
use App\Construcciones;
use App\Constantes;
use App\Producciones;
use App\Industrias;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    public static function calcularRecursos ($id)
    {
        //Definimos los objetos que vamos a necesitar
        $recursos = Recursos::where('planetas_id', $id)->first();
        //$planeta = Planeta::where('id', $id)->first();
        $construcciones = Construcciones::where('planetas_id', $id)->get();
        $industrias = Industrias::where('planetas_id', $id)->get()->first();
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

        //Calculamos recursos
        $fechaInicio = strtotime($recursos->updated_at);
        $fechaFin = time();

        //Calculamos el tiempo que ha producido
        $fechaCalculo = $fechaFin - $fechaInicio;

        //Calculamos lo producido
        //Minas
        $contProducciones = 0;
        $recursos->mineral = ($producciones[$contProducciones]->mineral / 3600 * $fechaCalculo) + $recursos->mineral; $contProducciones++;
        $recursos->cristal = ($producciones[$contProducciones]->cristal / 3600 * $fechaCalculo) + $recursos->cristal; $contProducciones++;
        $recursos->gas = ($producciones[$contProducciones]->gas / 3600 * $fechaCalculo) + $recursos->gas; $contProducciones++;
        $recursos->plastico = ($producciones[$contProducciones]->plastico / 3600 * $fechaCalculo) + $recursos->plastico; $contProducciones++;
        $recursos->ceramica = ($producciones[$contProducciones]->ceramica / 3600 * $fechaCalculo) + $recursos->ceramica; $contProducciones++;

        //Industrias
        $liquido = ($producciones[$contProducciones]->liquido / 3600 * $fechaCalculo); $contProducciones++;
        $micros = ($producciones[$contProducciones]->micros / 3600 * $fechaCalculo); $contProducciones++;
        $fuel = ($producciones[$contProducciones]->fuel / 3600 * $fechaCalculo); $contProducciones++;
        $ma = ($producciones[$contProducciones]->ma / 3600 * $fechaCalculo); $contProducciones++;
        $municion = ($producciones[$contProducciones]->municion / 3600 * $fechaCalculo); $contProducciones++;



        /// esto deberia ser un puto bucle si fueramos por numeros y no por textos..
        if ($industrias!=null){

            $gastoFliquido=0;
            if ($industrias->liquido!=0){
                $costo=Constantes::where('codigo', 'costoLiquido')->first()->valor;
                $gastoFliquido=$liquido * $costo;
                if ($gastoFliquido>$recursos->mineral){
                    $gastoFliquido=$recursos->mineral;
                    $liquido=$gastoFliquido /$costo;
                }
            }
            $recursos->mineral -= $gastoFliquido;
            $recursos->liquido += $liquido;

            $gastoFmicros=0;
            if ($industrias->micros!=0){
                $costo=Constantes::where('codigo', 'costoMicros')->first()->valor;
                $gastoFmicros=$micros *  $costo;
                if ($gastoFmicros>$recursos->cristal){
                    $gastoFmicros=$recursos->cristal;
                    $micros=$gastoFmicros /$costo;
                }
            }
            $recursos->cristal -= $gastoFmicros;
            $recursos->micros += $micros;

            $gastoFfuel=0;
            if ($industrias->fuel!=0){
                $costo=Constantes::where('codigo', 'costoFuel')->first()->valor;
                $gastoFfuel=$fuel *  $costo;
                if ($gastoFfuel>$recursos->gas){
                    $gastoFfuel=$recursos->gas;
                    $fuel=$gastoFfuel /$costo;
                }
            }
            $recursos->gas -= $gastoFfuel;
            $recursos->fuel += $fuel;

            $gastoFma=0;
            if ($industrias->ma!=0){
                $costo=Constantes::where('codigo', 'costoMa')->first()->valor;
                $gastoFma=$ma *  $costo;
                if ($gastoFma>$recursos->plastico){
                    $gastoFma=$recursos->plastico;
                    $ma=$gastoFma /$costo;
                }
            }
            $recursos->plastico -= $gastoFma;
            $recursos->ma += $ma;

            $gastoFmunicion=0;
            if ($industrias->municion!=0){
                $costo=Constantes::where('codigo', 'costoMunicion')->first()->valor;
                $gastoFmunicion=$municion *  $costo;
                if ($gastoFmunicion>$recursos->ceramica){
                    $gastoFmunicion=$recursos->ceramica;
                    $municion=$gastoFmunicion /$costo;
                }
            }
            $recursos->ceramica -= $gastoFmunicion;
            $recursos->municion += $municion;
        }



        //Personal
        $recursos->personal = ($producciones[$contProducciones]->personal / 3600 * $fechaCalculo) + $recursos->personal; $contProducciones++;

        //Comprobamos almacenes
        $contAlmacenes = 0;
        $recursos->mineral >= $almacenes[$contAlmacenes]->capacidad ? $recursos->mineral = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->cristal >= $almacenes[$contAlmacenes]->capacidad ? $recursos->cristal = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->gas >= $almacenes[$contAlmacenes]->capacidad ? $recursos->gas = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->plastico >= $almacenes[$contAlmacenes]->capacidad ? $recursos->plastico = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->ceramica >= $almacenes[$contAlmacenes]->capacidad ? $recursos->ceramica = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->liquido >= $almacenes[$contAlmacenes]->capacidad ? $recursos->liquido = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->micros >= $almacenes[$contAlmacenes]->capacidad ? $recursos->micros = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->fuel >= $almacenes[$contAlmacenes]->capacidad ? $recursos->fuel = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->ma >= $almacenes[$contAlmacenes]->capacidad ? $recursos->ma = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->municion >= $almacenes[$contAlmacenes]->capacidad ? $recursos->municion = $almacenes[$contAlmacenes]->capacidad : ''; $contAlmacenes++;
        $recursos->personal;

        //Guardamos los cambios
        $recursos->save();
    }

    /**
     * Relacion de los planetas con los usuarios
     */
    public function planeta ()
    {
        return $this->belongsTo(Planetas::class);
    }
}