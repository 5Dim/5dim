<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class costes_construcciones extends Model
{
    public $timestamps = false;
    protected $primaryKey = ['codigo', 'nivel'];
    public $incrementing = false;
/// eval ("\$prc1 = \$r1cce$kktua * ((pow (\$elnivel , \$potcosto))*((\$cntinic1 * pow (\$elnivel , \$lapotencia1)))*\$factoramort);");



public function  generarDatosCostesConstruccion(){

    $costes=[];
    $costesc=new costes_construcciones();

    for ($nivel=1;$nivel<100;$nivel++){

        $r1cce=["minaMineral",.55,0,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["minaCristal",.5,.3,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["minaPlasticos",1,.9,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["minaCeramica",.8,.7,.6,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["indLiquidos",.7,.6,.5,.4,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["indMicros",.6,.5,.4,.3,.2,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["indFuel",.4,.4,.5,.1,0,.8,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["indMA",1,1.8,.2,0,3,0,1,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["indMunicion",1.5,2,.2,.5,3,0,1,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["indPersonal",.2,.3,0,.4,.1,0,0,$nivel]; //10
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almMineral",.5,.3,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almCristal",.6,.3,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almgas",.2,0,0,.2,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almPlasticos",1,1,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almPlasticos",1.3,1.3,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almCeramica",1.5,1.1,0,1.2,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almLiquidos",1.5,1.1,0,0,1,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almMicros",5,4.5,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almFuel",1.1,1.1,.8,0,1,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almMA",2,2.5,1.2,1.1,1.7,2,2.5,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["almMunicion",1.2,1.2,0,0,1.2,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["laboratorio",2,2,1,1.5,1.2,.2,2,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["fabNaves",3,3,.2,1.5,1,.5,1.5,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["fabTropas",.5,.1,0,.2,.6,0,.1,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["fabDefensas",1,.8,0,0,1,0,.5,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["observacion",.5,1.0,0,0,0,0,3.5,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["refugio",1.5,1.5,15.5,6.9,8.5,1,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["banco",.2,.5,3.5,0.3,1,2.8,1,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["comercio",3,15,5.3,1.5,.6,1.2,3.5,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["nodEstructura",3.5,3.5,0,2,0,0,2.8,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        if ($nivel<51){

        $r1cce=["escudo",2.5,1.1,.1,23.1,16,6.1,.3,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["potenciador",55,18,.1,24.1,12.5,4.3,.7,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);

        $r1cce=["nodMotorMA",3.5,2.8,2,2.8,2.5,4.5,2,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);
        }

    }

    foreach($costes as $estecoste){
        $estecoste->save();
    }

}




function calculos($r1cce){

    $Avelprodminas2=1.6; //para costes edificios, por defecto es igual a $Avelprodminas, para uni mutante
    $potcosto = .7; //la potencia del costo
    $factoramort = 5/ $Avelprodminas2; //indica que en esas horas se amortiza la mina mineral nivel 1
    $factorprod = 1.7 * $Avelprodminas2; //por lo que se multiplica la producción

    $cntinic1 = 37 * $factorprod;     $lapotencia1 = 2.2;
    $cntinic2 = 27 * $factorprod;     $lapotencia2 = 2.2; //2.1
    $cntinic3 = 25  * $factorprod;     $lapotencia3 = 2.2; //2
    $cntinic4 = 20 * $factorprod;     $lapotencia4 = 2.2;  //1.8
    $cntinic5 = 30 * $factorprod;     $lapotencia5 =2.2;   //1.7
    $cntinic6 = 19 * $factorprod;     $lapotencia6 = 2.2;  // 1.65
    $cntinic7 = 19 * $factorprod;     $lapotencia7 = 2.2;  // 1.55


    $coste =new costes_construcciones();
    $coste->codigo=$r1cce[0];
    $coste->nivel=$r1cce[8];
    $coste->mineral=$r1cce[1] * ((pow ($r1cce[8] , $potcosto))*(($cntinic1 * pow ($r1cce[8] , $lapotencia1)))*$factoramort);
    $coste->cristal=$r1cce[2] * ((pow ($r1cce[8] , $potcosto))*(($cntinic2 * pow ($r1cce[8] , $lapotencia2)))*$factoramort);
    $coste->gas=    $r1cce[3] * ((pow ($r1cce[8] , $potcosto))*(($cntinic3 * pow ($r1cce[8] , $lapotencia3)))*$factoramort);
    $coste->plastico=$r1cce[4] * ((pow ($r1cce[8] , $potcosto))*(($cntinic4 * pow ($r1cce[8] , $lapotencia4)))*$factoramort);
    $coste->ceramica=$r1cce[5] * ((pow ($r1cce[8] , $potcosto))*(($cntinic5 * pow ($r1cce[8] , $lapotencia5)))*$factoramort);
    $coste->liquido=$r1cce[6] * ((pow ($r1cce[8] , $potcosto))*(($cntinic6 * pow ($r1cce[8] , $lapotencia6)))*$factoramort);
    $coste->micros=$r1cce[7] * ((pow ($r1cce[8] , $potcosto))*(($cntinic7 * pow ($r1cce[8] , $lapotencia7)))*$factoramort);

    return($coste);

}

}