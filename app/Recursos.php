<?php

namespace App;

use App\Planetas;
use App\Almacenes;
use App\Construcciones;
use App\Producciones;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    public static function calcularRecursos ($id)
    {
        //Definimos los objetos que vamos a necesitar
        $recursos = Recursos::where('planetas_id', $id)->first();
        //$planeta = Planeta::where('id', $id)->first();
        $edificios = Construcciones::where('planetas_id', $id)->get();
        $producciones = [];
        $almacenes = [];

        //Calculamos producciones
        for ($i = 0 ; $i < count($edificios) ; $i++) {
            if (substr($edificios[$i]->codigo, 0, 3) == "ind") {
                $produccion = Producciones::select(strtolower(substr($edificios[$i]->codigo, 3)))->where('nivel', $edificios[$i]->nivel)->first();
                array_push($producciones, $produccion);
            }elseif (substr($edificios[$i]->codigo, 0, 4) == "mina") {
                $produccion = Producciones::select(strtolower(substr($edificios[$i]->codigo, 4)))->where('nivel', $edificios[$i]->nivel)->first();
                array_push($producciones, $produccion);
            //Calculamos almacenes
            }elseif (substr($edificios[$i]->codigo, 0, 3) == "alm") {
                $almacen = Almacenes::where('nivel', $edificios[$i]->nivel)->first();
                array_push($almacenes, $almacen);
            }
        }

        //Calculamos recursos
        $fechaInicio = strtotime($recursos->updated_at);
        $fechaFin = time();

        //Calculamos el tiempo que ha producido
        $fechaCalculo = $fechaFin - $fechaInicio;

        //Calculamos lo producido
        $contProducciones = 0;
        $recursos->mineral = ($producciones[$contProducciones]->mineral / 3600 * $fechaCalculo) + $recursos->mineral; $contProducciones++;
        $recursos->cristal = ($producciones[$contProducciones]->cristal / 3600 * $fechaCalculo) + $recursos->cristal; $contProducciones++;
        $recursos->gas = ($producciones[$contProducciones]->gas / 3600 * $fechaCalculo) + $recursos->gas; $contProducciones++;
        $recursos->plastico = ($producciones[$contProducciones]->plastico / 3600 * $fechaCalculo) + $recursos->plastico; $contProducciones++;
        $recursos->ceramica = ($producciones[$contProducciones]->ceramica / 3600 * $fechaCalculo) + $recursos->ceramica; $contProducciones++;
        $recursos->liquido = ($producciones[$contProducciones]->liquido / 3600 * $fechaCalculo) + $recursos->liquido; $contProducciones++;
        $recursos->micros = ($producciones[$contProducciones]->micros / 3600 * $fechaCalculo) + $recursos->micros; $contProducciones++;
        $recursos->fuel = ($producciones[$contProducciones]->fuel / 3600 * $fechaCalculo) + $recursos->fuel; $contProducciones++;
        $recursos->ma = ($producciones[$contProducciones]->ma / 3600 * $fechaCalculo) + $recursos->ma; $contProducciones++;
        $recursos->municion = ($producciones[$contProducciones]->municion / 3600 * $fechaCalculo) + $recursos->municion; $contProducciones++;

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