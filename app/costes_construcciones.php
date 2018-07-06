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

        $r1cce=["minaGas",.5,.3,0,0,0,0,0,$nivel];
        $coste= $costesc->calculos($r1cce);
        array_push($costes, $coste);


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
    $cntinic2 = 27 * $factorprod;     $lapotencia2 = 2.1;
    $cntinic3 = 25  * $factorprod;     $lapotencia3 = 2.0;
    $cntinic4 = 20 * $factorprod;     $lapotencia4 = 1.8;
    $cntinic5 = 30 * $factorprod;     $lapotencia5 = 1.7;
    $cntinic6 = 19 * $factorprod;     $lapotencia6 = 1.65;
    $cntinic7 = 19 * $factorprod;     $lapotencia7 = 1.55;
    $cntinic8 = 17 * $factorprod;     $lapotencia8 = 1.65;
    $cntinic9 = 12 * $factorprod;     $lapotencia9 = 2.0;
    $cntinic10 = 2 * $factorprod;     $lapotencia10 = 2.3;
    $cntinic11 = 15 * $factorprod;     $lapotencia11 = .9;

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