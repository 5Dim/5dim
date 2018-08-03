<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostesArmas extends Model
{
    public $timestamps = false;

    public function  generarDatosCostesArmas(){

        $costes=[];

        /// construcciones y produccion
        $fcmot=10;  //factor corrector costos motor

                $coste =new CostesArmas();
                $coste->armas_codigo="59";  //motor quimico
                $coste->mineral=2000*$fcmot;
                $coste->cristal=1500*$fcmot;
                $coste->gas=1000*$fcmot;
                $coste->plastico=$fcmot*0; //4
                $coste->ceramica=$fcmot*0; //5
                $coste->liquido=$fcmot*0; //6
                $coste->micros=$fcmot*0;   //7
                $coste->fuel=$fcmot*1500;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*100; //11
                $coste->masa=10000;
                $coste->energia=11000;
                $coste->tiempo=$fcmot*200;
                $coste->mantenimiento=$fcmot*200;
                $coste->defensa=-10000;
                $coste->ataque=0;
                $coste->velocidad=1000;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="60"; //motor nuk
                $coste->mineral=3000*$fcmot;
                $coste->cristal=2500*$fcmot;
                $coste->gas=2000*$fcmot;
                $coste->plastico=$fcmot*1500; //4
                $coste->ceramica=$fcmot*1200; //5
                $coste->liquido=$fcmot*800; //6
                $coste->micros=$fcmot*500;   //7
                $coste->fuel=$fcmot*800;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*200; //11
                $coste->masa=2000;
                $coste->energia=11000;
                $coste->tiempo=$fcmot*600;
                $coste->mantenimiento=$fcmot*300;
                $coste->defensa=-9000;
                $coste->ataque=0;
                $coste->velocidad=5000;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="61"; //motor ion
                $coste->mineral=8000*$fcmot;
                $coste->cristal=7000*$fcmot;
                $coste->gas=6000*$fcmot;
                $coste->plastico=$fcmot*5500; //4
                $coste->ceramica=$fcmot*5000; //5
                $coste->liquido=$fcmot*4500; //6
                $coste->micros=$fcmot*4000;   //7
                $coste->fuel=$fcmot*300;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*300; //11
                $coste->masa=8000;
                $coste->energia=5000;
                $coste->tiempo=$fcmot*300;
                $coste->mantenimiento=$fcmot*600;
                $coste->defensa=-15000;
                $coste->ataque=0;
                $coste->velocidad=10000;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="62"; //motor plasma
                $coste->mineral=500*$fcmot;
                $coste->cristal=1000*$fcmot;
                $coste->gas=2000*$fcmot;
                $coste->plastico=$fcmot*3000; //4
                $coste->ceramica=$fcmot*2500; //5
                $coste->liquido=$fcmot*2000; //6
                $coste->micros=$fcmot*1500;   //7
                $coste->fuel=$fcmot*2000;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*500; //11
                $coste->masa=15000;
                $coste->energia=12000;
                $coste->tiempo=$fcmot*700;
                $coste->mantenimiento=$fcmot*700;
                $coste->defensa=-20000;
                $coste->ataque=0;
                $coste->velocidad=12000;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="63"; //motor MA
                $coste->mineral=4500*$fcmot;
                $coste->cristal=3500*$fcmot;
                $coste->gas=2500*$fcmot;
                $coste->plastico=$fcmot*500; //4
                $coste->ceramica=$fcmot*2500; //5
                $coste->liquido=$fcmot*3500; //6
                $coste->micros=$fcmot*4500;   //7
                $coste->fuel=$fcmot*400;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*1000; //11
                $coste->masa=20000;
                $coste->energia=15000;
                $coste->tiempo=$fcmot*2000;
                $coste->mantenimiento=$fcmot*2200;
                $coste->defensa=-40000;
                $coste->ataque=0;
                $coste->velocidad=10000;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="64"; //motor HMA
                $coste->mineral=1000*$fcmot;
                $coste->cristal=2000*$fcmot;
                $coste->gas=3000*$fcmot;
                $coste->plastico=$fcmot*4000; //4
                $coste->ceramica=$fcmot*6000; //5
                $coste->liquido=$fcmot*8000; //6
                $coste->micros=$fcmot*1000;   //7
                $coste->fuel=$fcmot*1000;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*2000; //11
                $coste->masa=4000;
                $coste->energia=7000;
                $coste->tiempo=$fcmot*3000;
                $coste->mantenimiento=$fcmot*0200;
                $coste->defensa=-20000;
                $coste->ataque=0;
                $coste->velocidad=15000;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);




                foreach($costes as $estearma){
                    $estearma->save();
                }

    }


}