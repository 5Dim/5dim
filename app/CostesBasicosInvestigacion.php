<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostesBasicosInvestigacion extends Model
{


    public $timestamps = false;



    public function  generarDatosCostesBasicosConstruccion()
    {


        function calculos ($valores){

            $costesc = new CostesBasicosInvestigacion();

            $n=0;
            $costesc->codigo=$valores[$n];$n++;
            $costesc->constante=$valores[$n];$n++;
            $costesc->descuentoM=$valores[$n];$n++;
            $costesc->descuentoC=$valores[$n];$n++;
            $costesc->mineral=$valores[$n];$n++;
            $costesc->cristal=$valores[$n];$n++;
            $costesc->gas=$valores[$n];$n++;
            $costesc->plastico=$valores[$n];$n++;
            $costesc->ceramica=$valores[$n];$n++;
            $costesc->liquido=$valores[$n];$n++;
            $costesc->micros=$valores[$n];$n++;
            $costesc->fuel=$valores[$n];$n++;
            $costesc->ma=$valores[$n];$n++;
            $costesc->municion=$valores[$n];$n++;

            $costesc->Imineral=$valores[$n];$n++;
            $costesc->Icristal=$valores[$n];$n++;
            $costesc->Igas=$valores[$n];$n++;
            $costesc->Iplastico=$valores[$n];$n++;
            $costesc->Iceramica=$valores[$n];$n++;
            $costesc->Iliquido=$valores[$n];$n++;
            $costesc->Imicros=$valores[$n];$n++;
            $costesc->Ifuel=$valores[$n];$n++;
            $costesc->Ima=$valores[$n];$n++;
            $costesc->Imunicion=$valores[$n];$n++;

            $costesc->save();

        }

        $valores=["invEnergia","costoInvestArmas","descuentoMInvestArmas","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,3000,6000,0,0,0,0,0,0,0,0];calculos($valores);
        $valores=["invPlasma","costoInvestArmas","descuentoMInvestArmas","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,.2,1000,0,6000,0,10000,0,0,0,0,3000];calculos($valores);
        $valores=["invBalistica","costoInvestArmas","descuentoMInvestArmas","descuentoCInvestArmas",1.5,2,2,2,2,2,2,2,2,2,1000,0,0,2000,0,0,0,0,0,1000];calculos($valores);
        $valores=["invMa","costoInvestArmas","descuentoMInvestArmas","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,0,0,10000,0,8000,500,500,0,15000,0];calculos($valores);

        $valores=["invCarga","costoInvestDiseño","descuentoMInvestDiseño","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,15000,0,0,0,0,0,0,0,0,0];calculos($valores);
        $valores=["invBlindaje","costoInvestDiseño","descuentoMInvestDiseño","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,1000,0,0,0,12000,0,0,0,0,1200];calculos($valores);
        $valores=["invIa","costoInvestDiseño","descuentoMInvestDiseño","descuentoCInvestArmas",2,1.9,2,2,2,2,2.5,2,2,2,0,1000,0,0,0,1000,10000,0,0,0];calculos($valores);

        $valores=["invImperio","costoInvestImperio","descuentoMInvestImperio","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,0,0,0,0,0,0,25000,0,0,0];calculos($valores);
        $valores=["invObservacion","costoInvestImperio","descuentoMInvestImperio","descuentoCInvestArmas",1.5,2,2,2,2,2,1.5,2,2,2,2000,0,0,0,0,0,20000,0,0,0];calculos($valores);

        $valores=["invEnsamblajeNaves","costoInvestDiseño","descuentoMInvestDiseño","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,4000,0,0,1000,0,0,6000,0,0,0];calculos($valores);
        $valores=["invEnsamblajeTropas","costoInvestDiseño","descuentoMInvestDiseño","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,4000,0,0,1000,0,0,6000,0,0,0];calculos($valores);
        $valores=["invEnsamblajeDefensas","costoInvestDiseño","descuentoMInvestDiseño","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,4000,0,0,1000,0,0,6000,0,0,0];calculos($valores);

        $valores=["invPropQuimico","costoInvestMotores","descuentoMInvestMotores","descuentoCInvestArmas",1,1,1,1,1,1,1,1.1,1,1,200,2000,400,500,0,500,0,1400,0,0];calculos($valores);
        $valores=["invPropNuk","costoInvestMotores","descuentoMInvestMotores","descuentoCInvestArmas",2,2,2,2,2,2,2,2.1,2,2,0,0,4000,0,0,1500,0,800,0,0];calculos($valores);
        $valores=["invPropIon","costoInvestMotores","descuentoMInvestMotores","descuentoCInvestArmas",2,2.2,1.5,2.3,1.1,1.2,2,2,2,2,0,8000,0,650,4000,0,0,0,0,0];calculos($valores);
        $valores=["invPropPlasma","costoInvestMotores","descuentoMInvestMotores","descuentoCInvestArmas",1.8,2,2.2,2,1.005,2,2,2,2,2,100000,0,8000,0,0,0,4000,0,0,0];calculos($valores);
        $valores=["invPropMa","costoInvestMotores","descuentoMInvestMotores","descuentoCInvestArmas",2,2,.5,2,1.9,.5,2.3,2,2.2,2,300000,200000,0,0,100000,0,8000,6000,9000,0];calculos($valores);
        $valores=["invPropHMA","costoInvestMotores","descuentoMInvestMotores","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,0,0,0,0,0,0,40000,0,0,0];calculos($valores);

        $valores=["invIndLiquido","costoInvestIndustrias","descuentoMInvestIndustrias","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,3000,6000,0,0,0,0,0,0,0,0];calculos($valores);
        $valores=["invIndMicros","costoInvestIndustrias","descuentoMInvestIndustrias","descuentoCInvestArmas",2,2,2,2,2,2,2,2,2,2,0,0,40000,0,0,0,0,0,15000,0];calculos($valores);
        $valores=["invIndFuel","costoInvestIndustrias","descuentoMInvestIndustrias","descuentoCInvestArmas",2,2,2,1.6,2,2,2,2,1.5,2,0,0,0,2500,0,0,0,0,6000,0];calculos($valores);
        $valores=["invIndMa","costoInvestIndustrias","descuentoMInvestIndustrias","descuentoCInvestArmas",1.4,1.3,1,2,.5,2.1,1.2,2,1.8,2,20000,40000,10000,10000,10000,5000,0,0,150000,0];calculos($valores);
        $valores=["invIndMunicion","costoInvestIndustrias","descuentoMInvestIndustrias","descuentoCInvestArmas",.8,2,2,.3,2,2,2,2,2,.2,3000,0,0,5000,0,0,0,0,15000,10000];calculos($valores);





    }



}