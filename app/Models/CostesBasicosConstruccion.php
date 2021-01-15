<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostesBasicosConstruccion extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function  generarDatosCostesBasicosConstruccion()
    {

        $costesB=[];

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="minaMineral";
            $costesc->mineral=.55;
            $costesc->cristal=00;
            $costesc->gas=00;
            $costesc->plastico=00;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);


            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="minaCristal";
            $costesc->mineral=.5;
            $costesc->cristal=.3;
            $costesc->gas=00;
            $costesc->plastico=00;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="minaGas";
            $costesc->mineral=01;
            $costesc->cristal=.9;
            $costesc->gas=00;
            $costesc->plastico=00;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="minaPlastico";
            $costesc->mineral=.8;
            $costesc->cristal=.7;
            $costesc->gas=.6;
            $costesc->plastico=00;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="minaCeramica"; ///5
            $costesc->mineral=.7;
            $costesc->cristal=.6;
            $costesc->gas=.5;
            $costesc->plastico=.4;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="indLiquido";
            $costesc->mineral=.6;
            $costesc->cristal=.5;
            $costesc->gas=.4;
            $costesc->plastico=.3;
            $costesc->ceramica=.2;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="indMicros";
            $costesc->mineral=.4;
            $costesc->cristal=.4;
            $costesc->gas=.5;
            $costesc->plastico=.1;
            $costesc->ceramica=00;
            $costesc->liquido=.8;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="indFuel";
            $costesc->mineral=1;
            $costesc->cristal=1.8;
            $costesc->gas=.2;
            $costesc->plastico=0;
            $costesc->ceramica=3;
            $costesc->liquido=0;
            $costesc->micros=1;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="indMA";
            $costesc->mineral=1.5;
            $costesc->cristal=2;
            $costesc->gas=.2;
            $costesc->plastico=.5;
            $costesc->ceramica=03;
            $costesc->liquido=00;
            $costesc->micros=01;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="indMunicion"; //100
            $costesc->mineral=.2;
            $costesc->cristal=.3;
            $costesc->gas=00;
            $costesc->plastico=.4;
            $costesc->ceramica=.1;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="indPersonal";
            $costesc->mineral=.2;
            $costesc->cristal=00;
            $costesc->gas=00;
            $costesc->plastico=.2;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almMineral";
            $costesc->mineral=.5;
            $costesc->cristal=.3;
            $costesc->gas=00;
            $costesc->plastico=00;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almCristal";
            $costesc->mineral=.6;
            $costesc->cristal=.3;
            $costesc->gas=00;
            $costesc->plastico=00;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almGas";
            $costesc->mineral=.2;
            $costesc->cristal=.2;
            $costesc->gas=00;
            $costesc->plastico=00;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almPlastico";
            $costesc->mineral=01;
            $costesc->cristal=01;
            $costesc->gas=00;
            $costesc->plastico=00;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almCeramica";
            $costesc->mineral=1.5;
            $costesc->cristal=1.1;
            $costesc->gas=0;
            $costesc->plastico=1.2;
            $costesc->ceramica=00;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almLiquido";
            $costesc->mineral=1.5;
            $costesc->cristal=1.1;
            $costesc->gas=0;
            $costesc->plastico=0;
            $costesc->ceramica=1;
            $costesc->liquido=0;
            $costesc->micros=0;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almMicros";
            $costesc->mineral=05;
            $costesc->cristal=4.5;
            $costesc->gas=0;
            $costesc->plastico=0;
            $costesc->ceramica=0;
            $costesc->liquido=0;
            $costesc->micros=0;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almFuel";
            $costesc->mineral=1.1;
            $costesc->cristal=1.1;
            $costesc->gas=.8;
            $costesc->plastico=0;
            $costesc->ceramica=1;
            $costesc->liquido=0;
            $costesc->micros=0;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almMA";
            $costesc->mineral=02;
            $costesc->cristal=2.5;
            $costesc->gas=1.2;
            $costesc->plastico=1.1;
            $costesc->ceramica=1.7;
            $costesc->liquido=2;
            $costesc->micros=2.5;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="almMunicion";
            $costesc->mineral=1.2;
            $costesc->cristal=1.2;
            $costesc->gas=0;
            $costesc->plastico=0;
            $costesc->ceramica=1.2;
            $costesc->liquido=00;
            $costesc->micros=00;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="laboratorio";
            $costesc->mineral=02;
            $costesc->cristal=2;
            $costesc->gas=1;
            $costesc->plastico=1.5;
            $costesc->ceramica=1.2;
            $costesc->liquido=.2;
            $costesc->micros=2;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="fabNaves";
            $costesc->mineral=3;
            $costesc->cristal=3;
            $costesc->gas=.2;
            $costesc->plastico=1.5;
            $costesc->ceramica=1;
            $costesc->liquido=.5;
            $costesc->micros=1.5;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="fabTropas";
            $costesc->mineral=.5;
            $costesc->cristal=.1;
            $costesc->gas=00;
            $costesc->plastico=.2;
            $costesc->ceramica=.6;
            $costesc->liquido=00;
            $costesc->micros=.1;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="fabDefensas";
            $costesc->mineral=1;
            $costesc->cristal=.8;
            $costesc->gas=0;
            $costesc->plastico=0;
            $costesc->ceramica=1;
            $costesc->liquido=0;
            $costesc->micros=.5;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="observacion";
            $costesc->mineral=.5;
            $costesc->cristal=1;
            $costesc->gas=0;
            $costesc->plastico=0;
            $costesc->ceramica=0;
            $costesc->liquido=0;
            $costesc->micros=3.5;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="refugio";
            $costesc->mineral=1.5;
            $costesc->cristal=1.5;
            $costesc->gas=15.5;
            $costesc->plastico=6.9;
            $costesc->ceramica=8.5;
            $costesc->liquido=1;
            $costesc->micros=0;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="terraformador";
            $costesc->mineral=80;
            $costesc->cristal=60;
            $costesc->gas=40.;
            $costesc->plastico=.3;
            $costesc->ceramica=1;
            $costesc->liquido=8.5;
            $costesc->micros=1;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="comercio";
            $costesc->mineral=03;
            $costesc->cristal=15;
            $costesc->gas=5;
            $costesc->plastico=1.5;
            $costesc->ceramica=.6;
            $costesc->liquido=1.2;
            $costesc->micros=3.5;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="escudo";
            $costesc->mineral=2.5;
            $costesc->cristal=1.1;
            $costesc->gas=.1;
            $costesc->plastico=23;
            $costesc->ceramica=16;
            $costesc->liquido=6.1;
            $costesc->micros=.3;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="potenciador";
            $costesc->mineral=55;
            $costesc->cristal=18;
            $costesc->gas=.1;
            $costesc->plastico=24;
            $costesc->ceramica=12.5;
            $costesc->liquido=4.3;
            $costesc->micros=.7;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="inhibidorHMA";
            $costesc->mineral=70;
            $costesc->cristal=20;
            $costesc->gas=15;
            $costesc->plastico=1;
            $costesc->ceramica=32;
            $costesc->liquido=2.3;
            $costesc->micros=1.3;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="nodEstructura";
            $costesc->mineral=3.5;
            $costesc->cristal=3.5;
            $costesc->gas=0;
            $costesc->plastico=2;
            $costesc->ceramica=0;
            $costesc->liquido=0;
            $costesc->micros=2.8;
            array_push($costesB, $costesc);

            $costesc = new CostesBasicosConstruccion();
            $costesc->codigo="nodMotorMA";
            $costesc->mineral=3.5;
            $costesc->cristal=2.8;
            $costesc->gas=2;
            $costesc->plastico=2.8;
            $costesc->ceramica=2.5;
            $costesc->liquido=4.5;
            $costesc->micros=2;
            array_push($costesB, $costesc);

            foreach($costesB as $estaproduccion){
                $estaproduccion->save();
            }


    }






}
