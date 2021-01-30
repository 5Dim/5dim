<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostesArmas extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function  generarDatosCostesArmas(){

        $costes=[];

        /// construcciones y produccion
        $fcmot=1;  //factor corrector costos motor
        $fcenermot=1; // energia que te el motor
        $fcpotmot=0.9; // potencia que te el motor
        $fcblind=3;  //factor corrector blindaje
        $fccc=1; //Factor corrector comp. de carga
        $fcae=1; //factor corrector costo armas energía
        $fcab=1; //factor corrector costo armas balistica
        $fcap=1; //factor corrector costo armas plasma
        $fcam=1; //factor corrector costo armas MA
        $fcbomb=4; //factor reduccion costos bombas



                $coste =new CostesArmas();
                $coste->armas_codigo="59";  //motor quimico
                $coste->mineral=2000*$fcmot*.5;
                $coste->cristal=1500*$fcmot*.3;
                $coste->gas=1000*$fcmot;
                $coste->plastico=$fcmot*100; //4
                $coste->ceramica=$fcmot*50; //5
                $coste->liquido=$fcmot*80; //6
                $coste->micros=$fcmot*10;   //7
                $coste->fuel=$fcmot*1;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*8; //11
                $coste->masa=500;
                $coste->energia=750*$fcenermot*24;
                $coste->tiempo=$fcmot*200;
                $coste->mantenimiento=$fcmot*1;
                $coste->defensa=0;
                $coste->ataque=0;
                $coste->velocidad=100*$fcpotmot; //velocidad
                $coste->maniobra=6000*$fcpotmot; //maniobra
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="60"; //motor nuk
                $coste->mineral=12000*$fcmot*.5;
                $coste->cristal=4300*$fcmot*.3;
                $coste->gas=250*$fcmot;
                $coste->plastico=$fcmot*430; //4
                $coste->ceramica=$fcmot*200; //5
                $coste->liquido=$fcmot*60; //6
                $coste->micros=$fcmot*30;   //7
                $coste->fuel=$fcmot*3;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*1; //11
                $coste->masa=1000;
                $coste->energia=645*$fcenermot*20;
                $coste->tiempo=$fcmot*600;
                $coste->mantenimiento=$fcmot*1;
                $coste->defensa=0;
                $coste->ataque=0;
                $coste->velocidad=4000*$fcpotmot; //velocidad
                $coste->maniobra=4000*$fcpotmot; //maniobra
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="61"; //motor ion
                $coste->mineral=15000*$fcmot*.5;
                $coste->cristal=5000*$fcmot*.3;
                $coste->gas=267*$fcmot;
                $coste->plastico=$fcmot*1107; //4
                $coste->ceramica=$fcmot*686; //5
                $coste->liquido=$fcmot*350; //6
                $coste->micros=$fcmot*904;   //7
                $coste->fuel=$fcmot*4;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*1; //11
                $coste->masa=4000;
                $coste->energia=310*$fcenermot*21;
                $coste->tiempo=$fcmot*300;
                $coste->mantenimiento=$fcmot*1;
                $coste->defensa=0;
                $coste->ataque=0;
                $coste->velocidad=5700*$fcpotmot; //velocidad
                $coste->maniobra=700*$fcpotmot; //maniobra
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="62"; //motor plasma
                $coste->mineral=8280*$fcmot*.5;
                $coste->cristal=4300*$fcmot*.3;
                $coste->gas=1230*$fcmot;
                $coste->plastico=$fcmot*5300; //4
                $coste->ceramica=$fcmot*485; //5
                $coste->liquido=$fcmot*220; //6
                $coste->micros=$fcmot*1050;   //7
                $coste->fuel=$fcmot*3;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*4; //11
                $coste->masa=6000;
                $coste->energia=845*$fcenermot*19;
                $coste->tiempo=$fcmot*700;
                $coste->mantenimiento=$fcmot*1;
                $coste->defensa=0;
                $coste->ataque=0;
                $coste->velocidad=4500*$fcpotmot; //velocidad
                $coste->maniobra=4800*$fcpotmot; //maniobra
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="63"; //motor MA
                $coste->mineral=32500*$fcmot*.5;
                $coste->cristal=7095*$fcmot*.3;
                $coste->gas=290*$fcmot;
                $coste->plastico=$fcmot*190; //4
                $coste->ceramica=$fcmot*430; //5
                $coste->liquido=$fcmot*385; //6
                $coste->micros=$fcmot*8730;   //7
                $coste->fuel=$fcmot*3;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*5; //11
                $coste->masa=10000;
                $coste->energia=1060*$fcenermot*18;
                $coste->tiempo=$fcmot*2000*20;
                $coste->mantenimiento=$fcmot*1;
                $coste->defensa=0;
                $coste->ataque=0;
                $coste->velocidad=6000*$fcpotmot; //velocidad
                $coste->maniobra=6000*$fcpotmot; //maniobra
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="64"; //motor HMA
                $coste->mineral=1000*$fcmot*.5;
                $coste->cristal=2000*$fcmot*.3;
                $coste->gas=3000*$fcmot;
                $coste->plastico=$fcmot*4000; //4
                $coste->ceramica=$fcmot*6000; //5
                $coste->liquido=$fcmot*8000; //6
                $coste->micros=$fcmot*1000;   //7
                $coste->fuel=$fcmot*10;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcmot*2000; //11
                $coste->masa=14000;
                $coste->energia=400*$fcenermot;
                $coste->tiempo=$fcmot*3000;
                $coste->mantenimiento=$fcmot*0200;
                $coste->defensa=20000;
                $coste->ataque=0;
                $coste->velocidad=2000000;
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

            /////// blindajes

                $coste =new CostesArmas();
                $coste->armas_codigo="65"; //blindaje titanio
                $coste->mineral=$fcblind*15000;
                $coste->cristal=$fcblind*2000;
                $coste->gas=$fcblind*1700;
                $coste->plastico=$fcblind*3000; //4
                $coste->ceramica=$fcblind*630; //5
                $coste->liquido=$fcblind*0; //6
                $coste->micros=$fcblind*0;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*4700;
                $coste->energia=0;
                $coste->tiempo=$fcblind*100;
                $coste->mantenimiento=$fcblind*1;
                $coste->defensa=8000;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="66"; //blindaje reactivo
                $coste->mineral=$fcblind*12000;
                $coste->cristal=$fcblind*1300;
                $coste->gas=$fcblind*50;
                $coste->plastico=$fcblind*500; //4
                $coste->ceramica=$fcblind*0; //5
                $coste->liquido=$fcblind*0; //6
                $coste->micros=$fcblind*0;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*4500;
                $coste->energia=-2500*$fcblind;
                $coste->tiempo=$fcblind*50;
                $coste->mantenimiento=$fcblind*2;
                $coste->defensa=14500;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="67"; //blindaje resinas
                $coste->mineral=$fcblind*5000;
                $coste->cristal=$fcblind*700;
                $coste->gas=$fcblind*1000;
                $coste->plastico=$fcblind*2000; //4
                $coste->ceramica=$fcblind*2500; //5
                $coste->liquido=$fcblind*1000; //6
                $coste->micros=$fcblind*500;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*5000;
                $coste->energia=0*$fcblind;
                $coste->tiempo=$fcblind*300;
                $coste->mantenimiento=$fcblind*3;
                $coste->defensa=17800;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);


                $coste =new CostesArmas();
                $coste->armas_codigo="68"; //blindaje placas
                $coste->mineral=$fcblind*35000;
                $coste->cristal=$fcblind*1000;
                $coste->gas=$fcblind*1000;
                $coste->plastico=$fcblind*0; //4
                $coste->ceramica=$fcblind*0; //5
                $coste->liquido=$fcblind*1300; //6
                $coste->micros=$fcblind*500;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*5300;
                $coste->energia=0*$fcblind;
                $coste->tiempo=$fcblind*50;
                $coste->mantenimiento=$fcblind*4;
                $coste->defensa=23500;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequenia=0;
                $coste->cargaMediana=0;
                $coste->cargaGrande=0;
                $coste->cargaEnorme=0;
                $coste->cargaMega=0;
                array_push($costes, $coste);

                $coste =new CostesArmas();
                $coste->armas_codigo="69"; //blindaje carbonadio
                $coste->mineral=$fcblind*60000;
                $coste->cristal=$fcblind*2500;
                $coste->gas=$fcblind*1500;
                $coste->plastico=$fcblind*2200; //4
                $coste->ceramica=$fcblind*1000; //5
                $coste->liquido=$fcblind*3000; //6
                $coste->micros=$fcblind*2000;   //7
                $coste->fuel=$fcblind*0;     //8
                $coste->ma=0;       //9
                $coste->municion=0; //10
                $coste->personal=$fcblind*0; //11
                $coste->masa=$fcblind*5700;
                $coste->energia=0*$fcblind;
                $coste->tiempo=$fcblind*150;
                $coste->mantenimiento=$fcblind*5;
                $coste->defensa=37500;
                $coste->ataque=0;
                $coste->velocidad=0;
                $coste->carga=0;
                $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // control de punteria
            $coste->mineral=25;//este va para todos
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
            $coste->masa=0;    //12
            $coste->energia=0;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=0;
            $coste->defensa=-1;
            $coste->ataque=5;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=10;
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
            $coste->energia=0;
            $coste->tiempo=1;       //14
            $coste->mantenimiento=1;
            $coste->defensa=0;
            $coste->ataque=10;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);

            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco cazas
            $coste->mineral=50; //esto para todos
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
            $coste->ataque=5;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco ligeras
            $coste->mineral=50; //esto para todos
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
            $coste->ataque=5;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco medias
            $coste->mineral=50; //esto para todos
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
            $coste->ataque=5;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco pesadas
            $coste->mineral=50; //esto para todos
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
            $coste->ataque=5;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo=$niveltec+69;$niveltec++; // foco bombas
            $coste->mineral=50; //esto para todos
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
            $coste->ataque=5;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*45000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*1000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=20000;
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*90000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*5000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=40000;
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*450000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*10000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=200000;
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*1125000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*12000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=500000;
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*2250000;    //12
            $coste->energia=0*$fccc;
            $coste->tiempo=$fccc*20000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=1000000;
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*6750000;    //12
            $coste->energia=2000*$fccc;
            $coste->tiempo=$fccc*25000;       //14
            $coste->mantenimiento=$fccc*0;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=3000000;
            $coste->cargaPequenia=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=0;
            array_push($costes, $coste);


            $coste =new CostesArmas();
            $coste->armas_codigo="96"; //carga mega (ESTACION)
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
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*90000;    //12
            $coste->energia=-5000*$fccc;
            $coste->tiempo=$fccc*3600;       //14
            $coste->mantenimiento=$fccc*10;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=1;
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
            $coste->masa=$fccc*450000;    //12
            $coste->energia=-10000*$fccc;
            $coste->tiempo=$fccc*6000;       //14
            $coste->mantenimiento=$fccc*15;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*2250000;    //12
            $coste->energia=-30000*$fccc;
            $coste->tiempo=$fccc*8000;       //14
            $coste->mantenimiento=$fccc*15;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
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
            $coste->masa=$fccc*6750000;    //12
            $coste->energia=-50000*$fccc;
            $coste->tiempo=$fccc*12000;       //14
            $coste->mantenimiento=$fccc*35;
            $coste->defensa=0;
            $coste->ataque=0;
            $coste->velocidad=0;
            $coste->carga=0;
            $coste->cargaPequenia=0;
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
            $coste->cargaPequenia=0;
            $coste->cargaMediana=0;
            $coste->cargaGrande=0;
            $coste->cargaEnorme=0;
            $coste->cargaMega=1;
            array_push($costes, $coste);


/////////////////////////////  ARMAS   //////////////////////////////////////////////////////

        // costos de armas son por cada 1 de energia
        $factorPesoArmas=80/100;

        $coste =new CostesArmas();
        $coste->armas_codigo="11"; //arma ligera energia
        $coste->mineral=$fcae*6000 * .5;
        $coste->cristal=$fcae*2400 * .3;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*300;
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*400;
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000;
        $coste->energia=-$fcae*800;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*5;
        $coste->defensa=0;
        $coste->ataque=5000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="12"; //arma media energia
        $coste->mineral=$fcae*6000 * 27 * .5;
        $coste->cristal=$fcae*2400 * 27;   // * .3+
        $coste->gas=$fcae*300 * 27;
        $coste->plastico=$fcae*300 * 27;   //-
        $coste->ceramica=$fcae*500 * 27;
        $coste->liquido=$fcae*400 * 27;
        $coste->micros=$fcae*80 * 27;      //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 2;
        $coste->energia=-$fcae*800 * 2;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=10000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="13"; //arma pesada energia
        $coste->mineral=$fcae*6000 * 100 * .5;
        $coste->cristal=$fcae*2400 * 100;   // * .3+
        $coste->gas=$fcae*300 * 100;
        $coste->plastico=$fcae*300 * 100;   //-
        $coste->ceramica=$fcae*500 * 100;
        $coste->liquido=$fcae*400 * 100;
        $coste->micros=$fcae*80 * 100;      //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 4;
        $coste->energia=-$fcae*800 * 3;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=20000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="14"; //arma insertado energia
        $coste->mineral=$fcae*6000 * 25 * .5;
        $coste->cristal=$fcae*2400 * 25;   // * .3+
        $coste->gas=$fcae*300 * 25;
        $coste->plastico=$fcae*300 * 25;   //-
        $coste->ceramica=$fcae*500 * 25;
        $coste->liquido=$fcae*400 * 25;
        $coste->micros=$fcae*80 * 25;      //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 8;
        $coste->energia=-$fcae*800 * 1.5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=100000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="15"; //arma misiles energia
        $coste->mineral=$fcae*6000 * 40 * .5;
        $coste->cristal=$fcae*2400 * 40;   // * .3+
        $coste->gas=$fcae*300 * 40;
        $coste->plastico=$fcae*300 * 40;   //-
        $coste->ceramica=$fcae*500 * 40;
        $coste->liquido=$fcae*400 * 40;
        $coste->micros=$fcae*80 * 40;      //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 4;
        $coste->energia=-$fcae*800 * 2.5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="16"; //arma bombas energia
        $coste->mineral=$fcae*6000 * $fcbomb * .5;
        $coste->cristal=$fcae*2400 * $fcbomb;   // * .3+
        $coste->gas=$fcae*300 * $fcbomb;
        $coste->plastico=$fcae*300 * $fcbomb;   //-
        $coste->ceramica=$fcae*500 * $fcbomb;
        $coste->liquido=$fcae*400 * $fcbomb;
        $coste->micros=$fcae*80 * $fcbomb;      //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 2;
        $coste->energia=-$fcae*3000/5; //determina su potencia(a menos mas)
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae* $fcbomb;
        $coste->defensa=0;
        $coste->ataque=9000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="21"; //arma ligera plasma
        $coste->mineral=$fcae*5500; // * .5-
        $coste->cristal=$fcae*2000 * .3;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*650; //+
        $coste->liquido=$fcae*350;  //-
        $coste->micros=$fcae*100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 2;
        $coste->energia=-$fcae*700;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*5;
        $coste->defensa=0;
        $coste->ataque=5000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="22"; //arma media plasma
        $coste->mineral=$fcae*5500 * 27; // * .5-
        $coste->cristal=$fcae*2000 * 27 * .3;
        $coste->gas=$fcae*300 * 27;
        $coste->plastico=$fcae*400 * 27;
        $coste->ceramica=$fcae*650 * 27; //+
        $coste->liquido=$fcae*350 * 27;  //-
        $coste->micros=$fcae*100 * 27;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 4;
        $coste->energia=-$fcae*700 * 2;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=10000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="23"; //arma pesada plasma
        $coste->mineral=$fcae*5500 * 100; // * .5-
        $coste->cristal=$fcae*2000 * 100 * .3;
        $coste->gas=$fcae*300 * 100;
        $coste->plastico=$fcae*400 * 100;
        $coste->ceramica=$fcae*650 * 100; //+
        $coste->liquido=$fcae*350 * 100;  //-
        $coste->micros=$fcae*100 * 100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 8;
        $coste->energia=-$fcae*700 * 3;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=20000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="24"; //arma insertado plasma
        $coste->mineral=$fcae*5500 * 25; // * .5-
        $coste->cristal=$fcae*2000 * 25 * .3;
        $coste->gas=$fcae*300 * 25;
        $coste->plastico=$fcae*400 * 25;
        $coste->ceramica=$fcae*650 * 25; //+
        $coste->liquido=$fcae*350 * 25;  //-
        $coste->micros=$fcae*100 * 25;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 16;
        $coste->energia=-$fcae*700 * 1.5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=100000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="25"; //arma misiles plasma
        $coste->mineral=$fcae*5500 * 40; // * .5-
        $coste->cristal=$fcae*2000 * 40 * .3;
        $coste->gas=$fcae*300 * 40;
        $coste->plastico=$fcae*400 * 40;
        $coste->ceramica=$fcae*650 * 40; //+
        $coste->liquido=$fcae*350 * 40;  //-
        $coste->micros=$fcae*100 * 40;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 4;
        $coste->energia=-$fcae*700 * 2.5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="26"; //arma bombas plasma
        $coste->mineral=$fcae*5500 * $fcbomb; // * .5-
        $coste->cristal=$fcae*2000 * $fcbomb * .3;
        $coste->gas=$fcae*300 * $fcbomb;
        $coste->plastico=$fcae*400 * $fcbomb;
        $coste->ceramica=$fcae*650 * $fcbomb; //+
        $coste->liquido=$fcae*350 * $fcbomb;  //-
        $coste->micros=$fcae*100 * $fcbomb;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 2;
        $coste->energia=-$fcae*2500/5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae* $fcbomb;
        $coste->defensa=0;
        $coste->ataque=10000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);



        $coste =new CostesArmas();
        $coste->armas_codigo="31"; //arma ligera balistica
        $coste->mineral=$fcae*8000;     // * .5+
        $coste->cristal=$fcae*2000 * .3;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*200;     //-
        $coste->ceramica=$fcae*500;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*80;        //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 2;
        $coste->energia=-$fcae*630;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*5;
        $coste->defensa=0;
        $coste->ataque=5000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="32"; //arma media balistica
        $coste->mineral=$fcae*8000 * 27;    // * .5+
        $coste->cristal=$fcae*2000 * 27 * .3;
        $coste->gas=$fcae*300 * 27;
        $coste->plastico=$fcae*200 * 27;    //-
        $coste->ceramica=$fcae*500 * 27;
        $coste->liquido=$fcae*500 * 27;
        $coste->micros=$fcae*80 * 27;       //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 4;
        $coste->energia=-$fcae*630 * 2;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="33"; //arma pesada balistica
        $coste->mineral=$fcae*8000 * 100;   // * .5+
        $coste->cristal=$fcae*2000 * 100 * .3;
        $coste->gas=$fcae*300 * 100;
        $coste->plastico=$fcae*200 * 100;   //-
        $coste->ceramica=$fcae*500 * 100;
        $coste->liquido=$fcae*500 * 100;
        $coste->micros=$fcae*80 * 100;      //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 8;
        $coste->energia=-$fcae*630 * 3;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=20000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="34"; //arma insertado balistica
        $coste->mineral=$fcae*8000 * 25;    // * .5+
        $coste->cristal=$fcae*2000 * 25 * .3;
        $coste->gas=$fcae*300 * 25;
        $coste->plastico=$fcae*200 * 25;    //-
        $coste->ceramica=$fcae*500 * 25;
        $coste->liquido=$fcae*500 * 25;
        $coste->micros=$fcae*80 * 25;       //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 16;
        $coste->energia=-$fcae*630 * 1.5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=100000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="35"; //arma misiles balistica
        $coste->mineral=$fcae*8000 * 40;    // * .5+
        $coste->cristal=$fcae*2000 * 40 * .3;
        $coste->gas=$fcae*300 * 40;
        $coste->plastico=$fcae*200 * 40;    //-
        $coste->ceramica=$fcae*500 * 40;
        $coste->liquido=$fcae*500 * 40;
        $coste->micros=$fcae*80 * 40;       //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 4;
        $coste->energia=-$fcae*630 * 2.5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="36"; //arma bombas balistica
        $coste->mineral=$fcae*8000 * $fcbomb;    // * .5+
        $coste->cristal=$fcae*2000 * $fcbomb * .3;
        $coste->gas=$fcae*300 * $fcbomb;
        $coste->plastico=$fcae*200 * $fcbomb;    //-
        $coste->ceramica=$fcae*500 * $fcbomb;
        $coste->liquido=$fcae*500 * $fcbomb;
        $coste->micros=$fcae*80 * $fcbomb;       //-
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 2;
        $coste->energia=-$fcae*2000/5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae* $fcbomb;
        $coste->defensa=0;
        $coste->ataque=7000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="41"; //arma ligera M-A
        $coste->mineral=$fcae*6000 * .5;
        $coste->cristal=$fcae*2000 * .3;
        $coste->gas=$fcae*300;
        $coste->plastico=$fcae*400;
        $coste->ceramica=$fcae*600;
        $coste->liquido=$fcae*500;
        $coste->micros=$fcae*120;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*700;
        $coste->energia=-$fcae*680;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*5;
        $coste->defensa=0;
        $coste->ataque=5000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="42"; //arma media M-A
        $coste->mineral=$fcae*6000 * 27 * .5;
        $coste->cristal=$fcae*2000 * 27 * .3;
        $coste->gas=$fcae*300 * 27;
        $coste->plastico=$fcae*400 * 27;
        $coste->ceramica=$fcae*500 * 27;
        $coste->liquido=$fcae*500 * 27;
        $coste->micros=$fcae*100 * 27;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 2;
        $coste->energia=-$fcae*700 * 2;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="43"; //arma pesada M-A
        $coste->mineral=$fcae*6000 * 100 * .5;
        $coste->cristal=$fcae*2000 * 100 * .3;
        $coste->gas=$fcae*300 * 100;
        $coste->plastico=$fcae*400 * 100;
        $coste->ceramica=$fcae*500 * 100;
        $coste->liquido=$fcae*500 * 100;
        $coste->micros=$fcae*100 * 100;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 4;
        $coste->energia=-$fcae*700 * 3;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=20000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="44"; //arma insertado M-A
        $coste->mineral=$fcae*6000 * 25 * .5;
        $coste->cristal=$fcae*2000 * 25 * .3;
        $coste->gas=$fcae*300 * 25;
        $coste->plastico=$fcae*400 * 25;
        $coste->ceramica=$fcae*500 * 25;
        $coste->liquido=$fcae*500 * 25;
        $coste->micros=$fcae*100 * 25;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 8;
        $coste->energia=-$fcae*700 * 1.5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=100000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);


        $coste =new CostesArmas();
        $coste->armas_codigo="45"; //arma misiles M-A
        $coste->mineral=$fcae*6000 * 40 * .5;
        $coste->cristal=$fcae*2000 * 40 * .3;
        $coste->gas=$fcae*300 * 40;
        $coste->plastico=$fcae*400 * 40;
        $coste->ceramica=$fcae*500 * 40;
        $coste->liquido=$fcae*500 * 40;
        $coste->micros=$fcae*100 * 40;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 4;
        $coste->energia=-$fcae*700 * 2.5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae*50;
        $coste->defensa=0;
        $coste->ataque=1000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
        $coste->cargaMediana=0;
        $coste->cargaGrande=0;
        $coste->cargaEnorme=0;
        $coste->cargaMega=0;
        array_push($costes, $coste);

        $coste =new CostesArmas();
        $coste->armas_codigo="46"; //arma bombas M-A
        $coste->mineral=$fcae*6000 * $fcbomb * .5;
        $coste->cristal=$fcae*2000 * $fcbomb * .3;
        $coste->gas=$fcae*300 * $fcbomb;
        $coste->plastico=$fcae*400 * $fcbomb;
        $coste->ceramica=$fcae*500 * $fcbomb;
        $coste->liquido=$fcae*500 * $fcbomb;
        $coste->micros=$fcae*100 * $fcbomb;
        $coste->fuel=0;
        $coste->ma=0;
        $coste->municion=$fcae*10;
        $coste->personal=$fcae*1;
        $coste->masa=$factorPesoArmas*$fcae*1000 * 8;
        $coste->energia=-$fcae*4000/5;
        $coste->tiempo=$fcae*1900;
        $coste->mantenimiento=$fcae* $fcbomb;
        $coste->defensa=0;
        $coste->ataque=13000;
        $coste->velocidad=0;
        $coste->carga=0;
        $coste->cargaPequenia=0;
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
