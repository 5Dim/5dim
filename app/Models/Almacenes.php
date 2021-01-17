<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacenes extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function  generarDatosAlmacenes()
    {
        /*
        33 almacen mineral  $cantalmainir1 = 10000;  $potalmar1= 7;
        34 almacen cristal $cantalmainir2 = 10000;  $potalmar2= 8;

        resto $cantalmainir3 = 0;$potalmar3= 10;
        basicos  $arec3 = $cantalmainir3 + ((10000* (pow ($linearecursos->EDIFICIO12 ,3)))/$potalmar3); */

        $almacenes = [];
        $cantalmainir = 0; // Cantidad inicial
        $potalmar = 10; //Potencia almacenamiento

        for ($n = 0; $n < 250; $n++) {
            $capacidad = $cantalmainir + ((10000 * (pow($n, 3))) / $potalmar);
            $almacen = new Almacenes();
            $almacen->nivel = $n;
            $almacen->capacidad = $capacidad;
            array_push($almacenes, $almacen);
        }

        foreach ($almacenes as $estealmacen) {
            $estealmacen->save();
        }

        //return $result;
    }

    public static function calcularAlmacenes($construcciones)
    {
        $almacenes = [];

        for ($i = 0; $i < count($construcciones); $i++) {
            if (substr($construcciones[$i]->codigo, 0, 3) == "alm") {
                $almacen = Almacenes::where('nivel', $construcciones[$i]->nivel)->first();
                array_push($almacenes, $almacen);
            }
        }

        return $almacenes;
    }
}
