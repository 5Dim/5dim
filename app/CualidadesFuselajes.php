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

        $constantes=Constantes::where('tipo','fuselajes')->get();

        /// naves   ///////////////////////////////////////////


        switch($codigo){
            case "XG":
            $Tnave=0;
            $maxvel=$Tnave*(20/(2*$Tnave+.000001));
            $cualidades = [$codigo,1,2,1,1,1,.7,1.2,0,0,$maxvel,1];
            $armas = [$codigo,2,0,0,0,0,0,0,0,0,9,10,1];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave','caza');
            break;
        }

        /// defensas  ///////////////////////////////////////////


        // tropas   ///////////////////////////////////////////

        return $coste;

    }

    function calculos($cualidades,$armas,$constantes,$fuselajes_id,$tipo,$tamano){

        $coste =new CostesFuselajes();

        $factorEnergiaT=$constantes->where('codigo','fuselaje'.$tipo.'EnergiaTodas')->first()->valor;
        $factorEnergia=$constantes->where('codigo','fuselaje'.$tipo.'Energia'.$tamano)->first()->valor;

        $factorDefensaT=$constantes->where('codigo','fuselaje'.$tipo.'DefensaTodas')->first()->valor;
        $factorDefensa=$constantes->where('codigo','fuselaje'.$tipo.'Defensa'.$tamano)->first()->valor;

        $factorCombustibleT=$constantes->where('codigo','fuselaje'.$tipo.'CombustibleTodas')->first()->valor;
        $factorCombustible=$constantes->where('codigo','fuselaje'.$tipo.'Combustible'.$tamano)->first()->valor;

        $factorMantenimientoT=$constantes->where('codigo','fuselaje'.$tipo.'MantenimientoTodas')->first()->valor;
        $factorMantenimiento=$constantes->where('codigo','fuselaje'.$tipo.'Mantenimiento'.$tamano)->first()->valor;

        $factorVelocidadT=$constantes->where('codigo','fuselaje'.$tipo.'VelocidadTodas')->first()->valor;
        $factorVelocidad=$constantes->where('codigo','fuselaje'.$tipo.'Velocidad'.$tamano)->first()->valor;

        $factorTiempoT=$constantes->where('codigo','fuselaje'.$tipo.'TiempoTodas')->first()->valor;
        $factorTiempo=$constantes->where('codigo','fuselaje'.$tipo.'Tiempo'.$tamano)->first()->valor;



        $coste->fuselajes_id = $fuselajes_id;

        $n=1;
        $coste->masa=$cualidades[$n] ;$n++;
        $coste->energia=$cualidades[$n] * $factorEnergiaT * $factorEnergia;$n++;
        $coste->tiempo=$cualidades[$n] * $factorTiempo *$factorTiempo;$n++;
        $coste->mantenimiento=$cualidades[$n] *$factorMantenimientoT * $factorMantenimiento;$n++;
        $coste->defensa=$cualidades[$n] * $factorDefensaT * $factorDefensa;$n++;
        $coste->velocidad=$cualidades[$n] * $factorVelocidadT * $factorVelocidad;$n++;
        $coste->velocidadMax=$cualidades[$n] ;$n++;
        $coste->gastoFuel=$cualidades[$n] * $factorCombustibleT * $factorCombustible;$n++;

        $n=1;
        $coste->armasLigera=$armas[$n] ;$n++;
        $coste->armasMedia=$armas[$n] ;$n++;
        $coste->armasPesadas=$armas[$n] ;$n++;
        $coste->armasInsertada=$armas[$n] ;$n++;
        $coste->armasBombas=$armas[$n] ;$n++;
        $coste->armasMisiles=$armas[$n] ;$n++;

        $coste->cargaPequeña=$armas[$n] ;$n++;
        $coste->cargaMedia=$armas[$n] ;$n++;
        $coste->cargaGrande=$armas[$n] ;$n++;

        $coste->mejoras=$armas[$n];$n++;
        $coste->blindajes=$armas[$n];$n++;
        $coste->motores=$armas[$n];$n++;

        return($coste);

    }

}