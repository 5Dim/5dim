<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CostesBasicosInvestigacion extends Model
{


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


            $valores=["invEnergia","costoInvestArmas",2,2,2,2,2,2,2,2,2,2,3000,6000,0,0,0,0,0,0,0,0];calculos($valores);
            $valores=["invPlasma","costoInvestArmas",2,2,2,2,2,2,2,2,2,.2,1000,0,6000,0,10000,0,0,0,0,3000];calculos($valores);
            $valores=["invBalistica","costoInvestArmas",1.5,2,2,2,2,2,2,2,2,2,1000,0,0,2000,0,0,0,0,0,1000];calculos($valores);
            $valores=["invMa","costoInvestArmas",2,2,2,2,2,2,2,2,2,2,0,0,10000,0,8000,500,500,0,15000,0];calculos($valores);

            $valores=["invCarga","costoInvestDiseño",2,2,2,2,2,2,2,2,2,2,15000,0,0,0,0,0,0,0,0,0];calculos($valores);
            $valores=["invBlindaje","costoInvestDiseño",2,2,2,2,2,2,2,2,2,2,1000,0,0,0,12000,0,0,0,0,1200];calculos($valores);
            $valores=["invIa","costoInvestDiseño",2,1.9,2,2,2,2,2.5,2,2,2,0,1000,0,0,0,1000,10000,0,0,0];calculos($valores);

            $valores=["invImperio","costoInvestImperio",2,2,2,2,2,2,2,2,2,2,0,0,0,0,0,0,25000,0,0,0];calculos($valores);
            $valores=["invObservacion","costoInvestImperio",1.5,2,2,2,2,2,1.5,2,2,2,2000,0,0,0,0,0,20000,0,0,0];calculos($valores);

            $valores=["invEnsamblajeNaves","costoInvestDiseño",2,2,2,2,2,2,2,2,2,2,4000,0,0,1000,0,0,6000,0,0,0];calculos($valores);
            $valores=["invEnsamblajeTropas","costoInvestDiseño",2,2,2,2,2,2,2,2,2,2,4000,0,0,1000,0,0,6000,0,0,0];calculos($valores);
            $valores=["invEnsamblajeDefensas","costoInvestDiseño",2,2,2,2,2,2,2,2,2,2,4000,0,0,1000,0,0,6000,0,0,0];calculos($valores);

            $valores=["invPropQuimico","costoInvestMotores",1,1,1,1,1,1,1,1.1,1,1,200,2000,400,500,0,500,0,1400,0,0];calculos($valores);
            $valores=["invPropNuk","costoInvestMotores",2,2,2,2,2,2,2,2.1,2,2,0,0,4000,0,0,1500,0,800,0,0];calculos($valores);
            $valores=["invPropIon","costoInvestMotores",2,2.2,1.5,2.3,1.1,1.2,2,2,2,2,0,8000,0,650,4000,0,0,0,0,0];calculos($valores);
            $valores=["invPropPlasma","costoInvestMotores",1.8,2,2.2,2,1.005,2,2,2,2,2,100000,0,8000,0,0,0,4000,0,0,0];calculos($valores);
            $valores=["invPropMa","costoInvestMotores",2,2,.5,2,1.9,.5,2.3,2,2.2,2,300000,200000,0,0,100000,0,8000,6000,9000,0];calculos($valores);
            $valores=["invPropHMA","costoInvestMotores",2,2,2,2,2,2,2,2,2,2,0,0,0,0,0,0,40000,0,0,0];calculos($valores);

            $valores=["invIndLiquido","costoInvestIndustrias",2,2,2,2,2,2,2,2,2,2,3000,6000,0,0,0,0,0,0,0,0];calculos($valores);
            $valores=["invIndMicros","costoInvestIndustrias",2,2,2,2,2,2,2,2,2,2,0,0,40000,0,0,0,0,0,15000,0];calculos($valores);
            $valores=["invIndFuel","costoInvestIndustrias",2,2,2,1.6,2,2,2,2,1.5,2,0,0,0,2500,0,0,0,0,6000,0];calculos($valores);
            $valores=["invIndMa","costoInvestIndustrias",1.4,1.3,1,2,.5,2.1,1.2,2,1.8,2,20000,40000,10000,10000,10000,5000,0,0,150000,0];calculos($valores);
            $valores=["invIndMunicion","costoInvestIndustrias",.8,2,2,.3,2,2,2,2,2,.2,3000,0,0,5000,0,0,0,0,15000,10000];calculos($valores);



function calculos ($valores){




            foreach($costesB as $estaproduccion){
                $estaproduccion->save();
            }
    }

    }






}