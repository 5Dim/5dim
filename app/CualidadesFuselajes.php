<?php

namespace App;
use App\Constantes;

use Illuminate\Database\Eloquent\Model;

class CualidadesFuselajes extends Model
{
    public $timestamps = false;

    public function fuselajes ()
    {
        return $this->belongsTo(Fuselajes::class);
    }


    public function  generarDatosCualidadesFuselajes($codigo,$fuselajes_id)
    {
        $costesc = new CualidadesFuselajes();

        $constantes=Constantes::where('tipo','fuselajes')->get();;

        /// naves   ///////////////////////////////////////////


        switch($codigo){
            case "XG":
            $Tnave=0;
            $maxvel=$Tnave*(20/(2*$Tnave+.000001));
            $cualidades = [$codigo,1,2,1,1,1,.7,1.2,0,0,$maxvel];
            $armas = [$codigo,2,0,0,0,0,0,0,0,0,0,9,10,1];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave','caza');
            break;
        }

        /// defensas  ///////////////////////////////////////////


        // tropas   ///////////////////////////////////////////

        return $coste;

    }

    function calculos($cualidades,$armas,$constantes,$fuselajes_id,$tipo,$tamano){

        $coste =new CostesFuselajes();

            $factorCosto=$constantes::where('codigo','fuselaje'+$tipo+'RecursosTodas')->first()->valor;
            $factorCostoT=$constantes::where('codigo','fuselaje'+$tipo+'Recursos'+$tamano)->first()->valor;

        $n=1;
/*
        $coste->fuselajes_id = $fuselajes_id;
        $coste->mineral=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->cristal=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->gas=    (int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->plastico=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->ceramica=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->liquido=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->micros=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->fuel=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->ma=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
        $coste->municion=(int)($r1cce[$n] * $factorCosto * $factorCostoT); $n++;
*/
        return($coste);

    }

}