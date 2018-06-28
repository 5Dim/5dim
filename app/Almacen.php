<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nivel', 'capacidad',
    ];

    public function  generarDatosAlmacenes(){

        // 33 almacen mineral  $cantalmainir1 = 10000;  $potalmar1= 7;
        // 34 almacen cristal $cantalmainir2 = 10000;  $potalmar2= 8;

        // resto $cantalmainir3 = 0;$potalmar3= 10;

        // basicos  $arec3 = $cantalmainir3 + ((10000* (pow ($linearecursos->EDIFICIO12 ,3)))/$potalmar3);

        $result=[];

        //// mineral y cristal
        $cantalmainir=1000;
        $potalmar=7;
        for($e=33;$e<34;$e++){
            for($n=1;$n<100;$n++){
                $capacidad=$cantalmainir + ((10000* (pow ($n ,3)))/$potalmar);
                $almacen =new Almacen();
                $almacen->nivel=$n;
                $almacen->capacidad=$capacidad;
                array_push($result, $almacen);
            }

        }



      
        return $result;
    }
}