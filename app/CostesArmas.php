<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostesArmas extends Model
{
    public $timestamps = false;

    public function  generarDatosCostesArmas(){

        $costes=[];

        /// construcciones y produccion
        $fcmot=1;  //factor corrector costos motor
        $fcenermot=1; // energia que te el motor
        $fcblind=1;  //factor corrector blindaje
        $fccc=1; //Factor corrector comp. de carga
        $fcae=1; //factor corrector costo armas energía
        $fcab=1; //factor corrector costo armas balistica
        $fcap=1; //factor corrector costo armas plasma
        $fcam=1; //factor corrector costo armas MA


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
                $coste->masa=3000;
                $coste->energia=750*$fcenermot;
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
                $coste->mineral=10000*$fcmot;
                $coste->cristal=4000*$fcmot;
                $coste->gas=250*$fcmot;
                $coste->plastico=$fcmot*430; //4
                $coste->ceramica=$fcmot*200; //5
                $coste->liquido=$fcmot*60; //6
                $coste->micros=$fcmot*30;   //7
                $coste->fuel=$fcmot*60;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*1; //11
                $coste->masa=10000;
                $coste->energia=645*$fcenermot;
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
                $coste->mineral=25000*$fcmot;
                $coste->cristal=13000*$fcmot;
                $coste->gas=670*$fcmot;
                $coste->plastico=$fcmot*2070; //4
                $coste->ceramica=$fcmot*865; //5
                $coste->liquido=$fcmot*500; //6
                $coste->micros=$fcmot*240;   //7
                $coste->fuel=$fcmot*30;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*1; //11
                $coste->masa=40000;
                $coste->energia=310*$fcenermot;
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
                $coste->mineral=1880*$fcmot;
                $coste->cristal=2030*$fcmot;
                $coste->gas=230*$fcmot;
                $coste->plastico=$fcmot*1130; //4
                $coste->ceramica=$fcmot*485; //5
                $coste->liquido=$fcmot*220; //6
                $coste->micros=$fcmot*91;   //7
                $coste->fuel=$fcmot*200;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*4; //11
                $coste->masa=60000;
                $coste->energia=845*$fcenermot;
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
                $coste->mineral=17500*$fcmot;
                $coste->cristal=7095*$fcmot;
                $coste->gas=290*$fcmot;
                $coste->plastico=$fcmot*190; //4
                $coste->ceramica=$fcmot*430; //5
                $coste->liquido=$fcmot*385; //6
                $coste->micros=$fcmot*273;   //7
                $coste->fuel=$fcmot*40;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*5; //11
                $coste->masa=100000;
                $coste->energia=1060*$fcenermot;
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
                $coste->fuel=$fcmot*100;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*2000; //11
                $coste->masa=14000;
                $coste->energia=400*$fcenermot;
                $coste->tiempo=$fcmot*3000;
                $coste->mantenimiento=$fcmot*0200;
                $coste->defensa=20000;
                $coste->ataque=0;
                $coste->velocidad=15000;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

            /////// blindajes

                $coste =new CostesArmas();
                $coste->armas_codigo="65"; //blindaje titanio
                $coste->mineral=$fcblind*5000;
                $coste->cristal=$fcblind*2000;
                $coste->gas=$fcblind*1700;
                $coste->plastico=$fcblind*2760; //4
                $coste->ceramica=$fcblind*630; //5
                $coste->liquido=$fcblind*0; //6
                $coste->micros=$fcblind*0;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*5000;
                $coste->energia=0;
                $coste->tiempo=$fcblind*100;
                $coste->mantenimiento=$fcblind*.1;
                $coste->defensa=78;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="66"; //blindaje reactivo
                $coste->mineral=$fcblind*1000;
                $coste->cristal=$fcblind*1000;
                $coste->gas=$fcblind*500;
                $coste->plastico=$fcblind*500; //4
                $coste->ceramica=$fcblind*0; //5
                $coste->liquido=$fcblind*0; //6
                $coste->micros=$fcblind*0;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*700;
                $coste->energia=-5000*$fcblind;
                $coste->tiempo=$fcblind*50;
                $coste->mantenimiento=$fcblind*50;
                $coste->defensa=10000;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="67"; //blindaje resinas
                $coste->mineral=$fcblind*500;
                $coste->cristal=$fcblind*500;
                $coste->gas=$fcblind*1000;
                $coste->plastico=$fcblind*2000; //4
                $coste->ceramica=$fcblind*2000; //5
                $coste->liquido=$fcblind*1000; //6
                $coste->micros=$fcblind*500;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*100;
                $coste->energia=0*$fcblind;
                $coste->tiempo=$fcblind*300;
                $coste->mantenimiento=$fcblind*250;
                $coste->defensa=8000;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);


                $coste =new CostesArmas();
                $coste->armas_codigo="68"; //blindaje placas
                $coste->mineral=$fcblind*3000;
                $coste->cristal=$fcblind*2000;
                $coste->gas=$fcblind*1000;
                $coste->plastico=$fcblind*0; //4
                $coste->ceramica=$fcblind*0; //5
                $coste->liquido=$fcblind*1500; //6
                $coste->micros=$fcblind*500;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*1200;
                $coste->energia=0*$fcblind;
                $coste->tiempo=$fcblind*50;
                $coste->mantenimiento=$fcblind*300;
                $coste->defensa=9000;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="69"; //blindaje carbonadio
                $coste->mineral=$fcblind*4500;
                $coste->cristal=$fcblind*4500;
                $coste->gas=$fcblind*4500;
                $coste->plastico=$fcblind*4500; //4
                $coste->ceramica=$fcblind*5500; //5
                $coste->liquido=$fcblind*6500; //6
                $coste->micros=$fcblind*3500;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*700;
                $coste->energia=0*$fcblind;
                $coste->tiempo=$fcblind*150;
                $coste->mantenimiento=$fcblind*600;
                $coste->defensa=12000;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequeña=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);


            ////// mejoras vas por % de los recursos //////////////////////////////////////////////

            $niveltec=1;

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // compactador
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=-2;
            $coste->tiempo=5;       //14
            $coste->mantenimiento=1;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=30;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // control de punteria
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=0;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=0;
            $coste->defensa=-1;
            $coste->ataque=5;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // escudos
            $coste->mineral=2;
            $coste->cristal=2;
            $coste->gas=2;
            $coste->plastico=2; //4
            $coste->ceramica=2; //5
            $coste->liquido=2; //6
            $coste->micros=2;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=-5;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=2;
            $coste->defensa=5;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // prop maniobra
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=-2;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=1;    //12
            $coste->energia=0;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=1;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // c nanos
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=0;
            $coste->tiempo=-5;       //14
            $coste->mantenimiento=0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);



            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // salvas
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=-5; //10
            $coste->personal=0; //11
            $coste->masa=5;    //12
            $coste->energia=0;
            $coste->tiempo=0;       //14
            $coste->mantenimiento=0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // aleaciones
            $coste->mineral=2;
            $coste->cristal=2;
            $coste->gas=2;
            $coste->plastico=2; //4
            $coste->ceramica=2; //5
            $coste->liquido=2; //6
            $coste->micros=2;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=-5;    //12
            $coste->energia=0;
            $coste->tiempo=2;       //14
            $coste->mantenimiento=0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // standart
            $coste->mineral=7;
            $coste->cristal=7;
            $coste->gas=7;
            $coste->plastico=7; //4
            $coste->ceramica=7; //5
            $coste->liquido=7; //6
            $coste->micros=7;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=0;
            $coste->tiempo=0;       //14
            $coste->mantenimiento=-5;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // plegado
            $coste->mineral=75;
            $coste->cristal=75;
            $coste->gas=75;
            $coste->plastico=75; //4
            $coste->ceramica=75; //5
            $coste->liquido=75; //6
            $coste->micros=75;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=0;
            $coste->tiempo=10;       //14
            $coste->mantenimiento=5;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=10;
            $coste->cargaMediana=10;
            $coste->cargaGrande=10;
            $coste->cargaEnorme=10;
            $coste->cargaMega=10;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // ariete
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=10;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=1;
            $coste->defensa=0;
            $coste->ataque=10;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=-5;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=1;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco cazas
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=-5;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=1;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco ligeras
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=-5;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=1;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco pesadas
            $coste->mineral=10;
            $coste->cristal=10;
            $coste->gas=10;
            $coste->plastico=10; //4
            $coste->ceramica=10; //5
            $coste->liquido=10; //6
            $coste->micros=10;   //7
            $coste->fuel=0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=0; //11
            $coste->masa=0;    //12
            $coste->energia=-5;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=1;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);



            //// carga      //////////////////////////////////////////


            $coste =new CostesArmas();
            $coste->armas_codigo="90"; //carga peq1
            $coste->mineral=$fccc*3000;
            $coste->cristal=$fccc*0;
            $coste->gas=$fccc*0;
            $coste->plastico=$fccc*0; //4
            $coste->ceramica=$fccc*0; //5
            $coste->liquido=$fccc*0; //6
            $coste->micros=$fccc*0;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*0; //11
            $coste->masa=$fccc*30000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*1000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=20000;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo="91"; //carga peq2
            $coste->mineral=$fccc*1500;
            $coste->cristal=$fccc*2000;
            $coste->gas=$fccc*0;
            $coste->plastico=$fccc*0; //4
            $coste->ceramica=$fccc*0; //5
            $coste->liquido=$fccc*0; //6
            $coste->micros=$fccc*0;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*0; //11
            $coste->masa=$fccc*350000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*5000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=40000;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo="92"; //carga mediana
            $coste->mineral=$fccc*70000;
            $coste->cristal=$fccc*15000;
            $coste->gas=$fccc*0;
            $coste->plastico=$fccc*0; //4
            $coste->ceramica=$fccc*10000; //5
            $coste->liquido=$fccc*0; //6
            $coste->micros=$fccc*0;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*0; //11
            $coste->masa=$fccc*500000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*10000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=200000;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo="93"; //carga cargaGrande
            $coste->mineral=$fccc*100000;
            $coste->cristal=$fccc*20000;
            $coste->gas=$fccc*0;
            $coste->plastico=$fccc*0; //4
            $coste->ceramica=$fccc*20000; //5
            $coste->liquido=$fccc*0; //6
            $coste->micros=$fccc*0;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*0; //11
            $coste->masa=$fccc*800000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*12000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=500000;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo="94"; //carga cargaGrande2
            $coste->mineral=$fccc*50000;
            $coste->cristal=$fccc*20000;
            $coste->gas=$fccc*0;
            $coste->plastico=$fccc*20000; //4
            $coste->ceramica=$fccc*0; //5
            $coste->liquido=$fccc*0; //6
            $coste->micros=$fccc*50000;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*0; //11
            $coste->masa=$fccc*900000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*20000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=1000000;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo="95"; //carga enorme
            $coste->mineral=$fccc*100000;
            $coste->cristal=$fccc*40000;
            $coste->gas=$fccc*40000;
            $coste->plastico=$fccc*40000; //4
            $coste->ceramica=$fccc*40000; //5
            $coste->liquido=$fccc*0; //6
            $coste->micros=$fccc*50000;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*0; //11
            $coste->masa=$fccc*2500000;    //12
            $coste->energia=2000*$fccc;
            $coste->tiempo=$fccc*25000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=3000000;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo="96"; //carga mega
            $coste->mineral=$fccc*200000;
            $coste->cristal=$fccc*40000;
            $coste->gas=$fccc*80000;
            $coste->plastico=$fccc*80000; //4
            $coste->ceramica=$fccc*40000; //5
            $coste->liquido=$fccc*40000; //6
            $coste->micros=$fccc*100000;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*0; //11
            $coste->masa=$fccc*3000000;    //12
            $coste->energia=5000*$fccc;
            $coste->tiempo=$fccc*35000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=7000000;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo="97"; //carga hangar  cazas
            $coste->mineral=$fccc*7000;
            $coste->cristal=$fccc*500;
            $coste->gas=$fccc*0;
            $coste->plastico=$fccc*500; //4
            $coste->ceramica=$fccc*500; //5
            $coste->liquido=$fccc*500; //6
            $coste->micros=$fccc*1000;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*10; //11
            $coste->masa=$fccc*100000;    //12
            $coste->energia=-5000*$fccc;
            $coste->tiempo=$fccc*3600;       //14
            $coste->mantenimiento=$fccc*10;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=1;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo="98"; //carga hangar  ligeras
            $coste->mineral=$fccc*50000;
            $coste->cristal=$fccc*2000;
            $coste->gas=$fccc*0;
            $coste->plastico=$fccc*2000; //4
            $coste->ceramica=$fccc*2000; //5
            $coste->liquido=$fccc*2000; //6
            $coste->micros=$fccc*4000;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*35; //11
            $coste->masa=$fccc*500000;    //12
            $coste->energia=-10000*$fccc;
            $coste->tiempo=$fccc*6000;       //14
            $coste->mantenimiento=$fccc*15;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=1;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo="99"; //carga hangar  medias
            $coste->mineral=$fccc*200000;
            $coste->cristal=$fccc*100000;
            $coste->gas=$fccc*10000;
            $coste->plastico=$fccc*20000; //4
            $coste->ceramica=$fccc*10000; //5
            $coste->liquido=$fccc*50000; //6
            $coste->micros=$fccc*500;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*200; //11
            $coste->masa=$fccc*1000000;    //12
            $coste->energia=-30000*$fccc;
            $coste->tiempo=$fccc*8000;       //14
            $coste->mantenimiento=$fccc*15;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=1;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo="100"; // hangar pesadas
            $coste->mineral=$fccc*400000;
            $coste->cristal=$fccc*150000;
            $coste->gas=$fccc*20000;
            $coste->plastico=$fccc*40000; //4
            $coste->ceramica=$fccc*20000; //5
            $coste->liquido=$fccc*50000; //6
            $coste->micros=$fccc*2000;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*200; //11
            $coste->masa=$fccc*150000;    //12
            $coste->energia=-50000*$fccc;
            $coste->tiempo=$fccc*12000;       //14
            $coste->mantenimiento=$fccc*35;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=1;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo="101"; //carga hangar  estaciones
            $coste->mineral=$fccc*600000;
            $coste->cristal=$fccc*200000;
            $coste->gas=$fccc*30000;
            $coste->plastico=$fccc*40000; //4
            $coste->ceramica=$fccc*50000; //5
            $coste->liquido=$fccc*50000; //6
            $coste->micros=$fccc*10000;   //7
            $coste->fuel=$fccc*0;     //8
            $coste->ma=0;       //9
            $coste->municion=0; //10
            $coste->personal=$fccc*300; //11
            $coste->masa=$fccc*2500000;    //12
            $coste->energia=-90000*$fccc;
            $coste->tiempo=$fccc*19000;       //14
            $coste->mantenimiento=$fccc*50;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequeña=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=1;
            array_push($costes, $coste);


/////////////////////////////  ARMAS   //////////////////////////////////////////////////////

        // costos de armas son por cada 1000 de energia

        $coste =new CostesArmas();
        $coste->armas_codigo="11"; //arma ligera energia
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=100;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="12"; //arma media energia
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=500;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="13"; //arma pesada energia
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=2000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="14"; //arma insertado energia
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=10000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="15"; //arma misiles energia
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="16"; //arma bombas energia
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="21"; //arma ligera plasma
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=100;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="22"; //arma media plasma
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=500;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="23"; //arma pesada plasma
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=2000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="24"; //arma insertado plasma
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=10000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="25"; //arma misiles plasma
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="26"; //arma bombas plasma
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);



        $coste =new CostesArmas();
        $coste->armas_codigo="31"; //arma ligera balistica
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=100;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="32"; //arma media balistica
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=500;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="33"; //arma pesada balistica
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=2000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="34"; //arma insertado balistica
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=10000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="35"; //arma misiles balistica
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="36"; //arma bombas balistica
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="41"; //arma ligera M-A
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=100;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="42"; //arma media M-A
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=500;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="43"; //arma pesada M-A
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=2000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="44"; //arma insertado M-A
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=10000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="45"; //arma misiles M-A
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequeña=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="46"; //arma bombas M-A
        $coste->mineral=$fcae*6000;
        $coste->cristal=$fcae*2000;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$fcae*1000;
        $coste->energia=-$fcae*1000;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
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