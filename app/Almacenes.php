<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacenes extends Model
{
    public $timestamps = false;

    public function  generarDatosAlmacenes(){

  /*       33 almacen mineral  $cantalmainir1 = 10000;  $potalmar1= 7;
        34 almacen cristal $cantalmainir2 = 10000;  $potalmar2= 8;

        resto $cantalmainir3 = 0;$potalmar3= 10;
        basicos  $arec3 = $cantalmainir3 + ((10000* (pow ($linearecursos->EDIFICIO12 ,3)))/$potalmar3); */

        $almacenes=[];
        $cantalmainir=0;
        $potalmar=10;
        
            for($n=1;$n<100;$n++){
                $capacidad=$cantalmainir + ((10000* (pow ($n ,3)))/$potalmar);
                $almacen =new Almacenes();
                $almacen->nivel=$n;
                $almacen->capacidad=$capacidad;
                array_push($almacenes, $almacen);
            }

            foreach($almacenes as $estealmacen){
                $estealmacen->save();
            }
        
        //return $result;
    }
}
