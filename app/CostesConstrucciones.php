<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostesConstrucciones extends Model
{
    public $timestamps = false;
/// eval ("\$prc1 = \$r1cce$kktua * ((pow (\$elnivel , \$potcosto))*((\$cntinic1 * pow (\$elnivel , \$lapotencia1)))*\$factoramort);");


    /**
     * Relacion de los construcciones con el coste
     */
    public function construcciones ()
    {
        return $this->belongsTo(Construcciones::class);
    }

    public function modificarCostes($costeAntiguo, $costeNuevo) {
        $costeAntiguo->mineral = $costeNuevo->mineral;
        $costeAntiguo->cristal = $costeNuevo->cristal;
        $costeAntiguo->gas = $costeNuevo->gas;
        $costeAntiguo->plastico = $costeNuevo->plastico;
        $costeAntiguo->ceramica = $costeNuevo->ceramica;
        $costeAntiguo->liquido = $costeNuevo->liquido;
        $costeAntiguo->micros = $costeNuevo->micros;
        return $costeAntiguo;
    }

    public function  generarDatosCostesConstruccion($nivel, $codigo, $idConstruccion)
    {
        $costesc = new CostesConstrucciones();

        switch($codigo){
            case "minaMineral":
            $r1cce = [$codigo,.55,0,0,0,0,0,0,$nivel];
            $coste = $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "minaCristal":
            $r1cce=[$codigo,.5,.3,0,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "minaGas":
            $r1cce=[$codigo,.7,.4,0.3,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "minaPlasticos":
            $r1cce=[$codigo,1,.9,0,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "minaCeramica":
            $r1cce=[$codigo,.8,.7,.6,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "indLiquidos":
            $r1cce=[$codigo,.7,.6,.5,.4,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "indMicros":
            $r1cce=[$codigo,.6,.5,.4,.3,.2,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "indFuel":
            $r1cce=[$codigo,.4,.4,.5,.1,0,.8,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "indMA":
            $r1cce=[$codigo,1,1.8,.2,0,3,0,1,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "indMunicion":
            $r1cce=[$codigo,1.5,2,.2,.5,3,0,1,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "indPersonal":
            $r1cce=[$codigo,.2,.3,0,.4,.1,0,0,$nivel]; //10
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almMineral":
            $r1cce=[$codigo,.5,.3,0,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almCristal":
            $r1cce=[$codigo,.6,.3,0,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almGas":
            $r1cce=[$codigo,.2,0,0,.2,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almPlasticos":
            $r1cce=[$codigo,1,1,0,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almPlasticos":
            $r1cce=[$codigo,1.3,1.3,0,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almCeramica":
            $r1cce=[$codigo,1.5,1.1,0,1.2,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almLiquidos":
            $r1cce=[$codigo,1.5,1.1,0,0,1,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almMicros":
            $r1cce=[$codigo,5,4.5,0,0,0,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almFuel":
            $r1cce=[$codigo,1.1,1.1,.8,0,1,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almMA":
            $r1cce=[$codigo,2,2.5,1.2,1.1,1.7,2,2.5,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "almMunicion":
            $r1cce=[$codigo,1.2,1.2,0,0,1.2,0,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "laboratorio":
            $r1cce=[$codigo,2,2,1,1.5,1.2,.2,2,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "fabNaves":
            $r1cce=[$codigo,3,3,.2,1.5,1,.5,1.5,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "fabTropas":
            $r1cce=[$codigo,.5,.1,0,.2,.6,0,.1,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "fabDefensas":
            $r1cce=[$codigo,1,.8,0,0,1,0,.5,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "observacion":
            $r1cce=[$codigo,.5,1.0,0,0,0,0,3.5,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "refugio":
            $r1cce=[$codigo,1.5,1.5,15.5,6.9,8.5,1,0,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "banco":
            $r1cce=[$codigo,.2,.5,3.5,0.3,1,2.8,1,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "comercio":
            $r1cce=[$codigo,3,15,5.3,1.5,.6,1.2,3.5,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "escudo":
            $r1cce=[$codigo,2.5,1.1,.1,23.1,16,6.1,.3,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "potenciador":
            $r1cce=[$codigo,55,18,.1,24.1,12.5,4.3,.7,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "nodEstructura":
            $r1cce=[$codigo,3.5,3.5,0,2,0,0,2.8,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;

            case "nodMotorMA":
            $r1cce=[$codigo,3.5,2.8,2,2.8,2.5,4.5,2,$nivel];
            $coste= $costesc->calculos($r1cce, $idConstruccion);
            break;
        }

        return $coste;

    }




    function calculos($r1cce, $idConstruccion){

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


        $coste =new CostesConstrucciones();
        //$coste->codigo=$r1cce[0];
        //$coste->nivel=$r1cce[8];
        $coste->construcciones_id = $idConstruccion;
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