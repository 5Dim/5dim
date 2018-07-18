<?php

namespace App;
use App\Constantes;

use Illuminate\Database\Eloquent\Model;

class CostesFuselajes extends Model
{
    public $timestamps = false;

    public function fuselajes ()
    {
        return $this->belongsTo(Fuselajes::class);
    }


    public function  generarDatosCostesFuselajes($codigo,$fuselajes_id)
    {
        $costesc = new CostesFuselajes();

        $constantes=Constantes::where('tipo','fuselajes')->get();;

        /// naves   ///////////////////////////////////////////


        switch($codigo){
            case "XG":
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1,0,0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave','caza');
            break;
        }

        /// defensas  ///////////////////////////////////////////


        // tropas   ///////////////////////////////////////////

        return $coste;

    }

    function calculos($r1cce,$constantes,$fuselajes_id,$tipo,$tamano){

        $coste =new CostesFuselajes();

            $factorCosto=$constantes::where('codigo','fuselaje'+$tipo+'RecursosTodas')->first()->valor;
            $factorCostoT=$constantes::where('codigo','fuselaje'+$tipo+'Recursos'+$tamano)->first()->valor;

        $n=1;

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

        return($coste);

    }

}