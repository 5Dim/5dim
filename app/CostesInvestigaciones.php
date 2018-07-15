<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostesInvestigaciones extends Model
{
    public $timestamps = false;

    public function investigaciones ()
    {
        return $this->belongsTo(Investigaciones::class);
    }


    public function  generarDatosCostesInvestigacion($nivel, $codigo, $idInvestigaciones)
    {
        $costesi = new CostesInvestigaciones();

        switch($codigo){
            case "invEnergia":
            $r1cce = [$codigo,.55,0,0,0,0,0,0,$nivel];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones);
            break;

            case "minaCristal":
            $r1cce=[$codigo,.5,.3,0,0,0,0,0,$nivel];
            $coste= $costesi->calculos($r1cce, $idInvestigaciones);
            break;

            case "minaGas":
            $r1cce=[$codigo,1,.9,0,0,0,0,0,$nivel];
            $coste= $costesi->calculos($r1cce, $idInvestigaciones);
            break;


        }

        return $coste;

    }




    function calculos($r1cce, $idInvestigaciones){

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


        $coste =new CostesInvestigaciones();
        //$coste->codigo=$r1cce[0];
        //$coste->nivel=$r1cce[8];
        $coste->investigacion_id = $idInvestigaciones;
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