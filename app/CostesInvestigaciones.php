<?php

namespace App;

use App\Constantes;

use Illuminate\Database\Eloquent\Model;

class CostesInvestigaciones extends Model
{
    public $timestamps = false;

    public function investigaciones ()
    {
        return $this->belongsTo(Investigaciones::class);
    }

    public function modificarCostes($costeAntiguo, $costeNuevo) {
        $costeAntiguo->mineral = $costeNuevo->mineral;
        $costeAntiguo->cristal = $costeNuevo->cristal;
        $costeAntiguo->gas = $costeNuevo->gas;
        $costeAntiguo->plastico = $costeNuevo->plastico;
        $costeAntiguo->ceramica = $costeNuevo->ceramica;
        $costeAntiguo->liquido = $costeNuevo->liquido;
        $costeAntiguo->micros = $costeNuevo->micros;
        $costeAntiguo->fuel = $costeNuevo->fuel;
        $costeAntiguo->ma = $costeNuevo->ma;
        $costeAntiguo->municion = $costeNuevo->municion;
        return $costeAntiguo;
    }


    public function  generarDatosCostesInvestigacion($nivel, $codigo, $idInvestigaciones)
    {
        $costesi = new CostesInvestigaciones();

        $IConstantes=Constantes::where('tipo','investigacion')->get();

        $investCorrector=$IConstantes->where('codigo','investCorrector')->first()->valor;
        $Ifactor=$IConstantes->where('codigo','Ifactor')->first()->valor;
        $costoInvestArmas=$IConstantes->where('codigo','costoInvestArmas')->first()->valor;
        $costoInvestMotores=$IConstantes->where('codigo','costoInvestMotores')->first()->valor;
        $costoInvestIndustrias=$IConstantes->where('codigo','costoInvestIndustrias')->first()->valor;
        $costoInvestImperio=$IConstantes->where('codigo','costoInvestImperio')->first()->valor;
        $costoInvestDiseño=$IConstantes->where('codigo','costoInvestDiseño')->first()->valor;


        //  $esteprecio = (int)((pow ($nivel , ($esteexp * $Ifactor))) * $esteinic) * $corrector;

        switch($codigo){
            case "invEnergia":
            $costoIT=$costoInvestArmas;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,3000,6000,0,0,0,0,0,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invPlasma":
            $costoIT=$costoInvestArmas;
            $r1cce = [$codigo,2,0,0,2,0,0,0,0,.0,2,$nivel];
            $costosIniciales = [$codigo,1000,0,6000,0,10000,0,0,0,0,3000];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invBalistica":
            $costoIT=$costoInvestArmas;
            $r1cce = [$codigo,1.5,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,1000,0,0,2000,0,0,0,0,0,1000];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invMa":
            $costoIT=$costoInvestArmas;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,0,0,10000,0,8000,500,500,0,15000,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;





            case "invCarga":
            $costoIT=$costoInvestDiseño;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,15000,0,0,0,0,0,0,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invBlindaje":
            $costoIT=$costoInvestDiseño;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,1000,0,0,0,12000,0,0,0,0,1200];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invIa":
            $costoIT=$costoInvestDiseño;
            $r1cce = [$codigo,2,1.9,2,2,2,2,2.5,2,2,2,$nivel];
            $costosIniciales = [$codigo,0,1000,0,0,0,1000,10000,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;



            case "invImperio":
            $costoIT=$costoInvestImperio;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,0,0,0,0,0,0,25000,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invObservacion":
            $costoIT=$costoInvestImperio;
            $r1cce = [$codigo,1.5,2,2,2,2,2,1.5,2,2,2,$nivel];
            $costosIniciales = [$codigo,2000,0,0,0,0,0,20000,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;



            case "invEnsamblajeNaves":
            $costoIT=$costoInvestDiseño;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,4000,0,0,1000,0,0,6000,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invEnsamblajeTropas":
            $costoIT=$costoInvestDiseño;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,4000,0,0,1000,0,0,6000,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invEnsamblajeDefensas":
            $costoIT=$costoInvestDiseño;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,4000,0,0,1000,0,0,6000,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;



            case "invPropNuk":
            $costoIT=$costoInvestMotores;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2.1,2,2,$nivel];
            $costosIniciales = [$codigo,0,0,4000,0,0,1500,0,800,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invPropIon":
            $costoIT=$costoInvestMotores;
            $r1cce = [$codigo,2,2.2,1.5,2.3,1.1,1.2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,0,8000,0,650,4000,0,0,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invPropPlasma":
            $costoIT=$costoInvestMotores;
            $r1cce = [$codigo,1.8,2,2.2,2,1.005,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,100000,0,8000,0,0,0,4000,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invPropMa":
            $costoIT=$costoInvestMotores;
            $r1cce = [$codigo,2,2,.5,2,1.9,.5,2.3,2,2.2,2,$nivel];
            $costosIniciales = [$codigo,300000,200000,0,0,100000,0,8000,6000,9000,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invPropHMA":
            $costoIT=$costoInvestMotores;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,0,0,0,0,0,0,40000,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;


            case "invIndLiquido":
            $costoIT=$costoInvestIndustrias;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,3000,6000,0,0,0,0,0,0,0,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invIndMicros":

            $costoIT=$costoInvestIndustrias;
            $r1cce = [$codigo,2,2,2,2,2,2,2,2,2,2,$nivel];
            $costosIniciales = [$codigo,0,0,40000,0,0,0,0,0,15000,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invIndFuel":
            $costoIT=$costoInvestIndustrias;
            $r1cce = [$codigo,2,2,2,1.6,2,2,2,2,1.5,2,$nivel];
            $costosIniciales = [$codigo,0,0,0,2500,0,0,0,0,6000,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invIndMa":
            $costoIT=$costoInvestIndustrias;
            $r1cce = [$codigo,1.4,1.3,1,2,.5,2.1,1.2,2,1.8,2,$nivel];
            $costosIniciales = [$codigo,20000,40000,10000,10000,10000,5000,0,0,150000,0];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

            case "invIndMunicion":
            $costoIT=$costoInvestIndustrias;
            $r1cce = [$codigo,.8,2,2,.3,2,2,2,2,2,.2,$nivel];
            $costosIniciales = [$codigo,3000,0,0,5000,0,0,0,0,15000,10000];
            $coste = $costesi->calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT);
            break;

        }

        return $coste;

    }




    function calculos($r1cce, $idInvestigaciones,$investCorrector,$costosIniciales,$Ifactor,$costoIT){


        $coste =new CostesInvestigaciones();
        //$coste->codigo=$r1cce[0];
        $n=1;
        $nivel=$r1cce[10];
        $coste->investigaciones_id = $idInvestigaciones;
        $coste->mineral=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->cristal=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->gas=    (int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->plastico=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->ceramica=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->liquido=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->micros=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->fuel=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->ma=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;
        $coste->municion=(int)((pow ($nivel , ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector; $n++;


        return($coste);

    }


}