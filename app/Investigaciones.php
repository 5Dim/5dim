<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\CostesInvestigaciones;
use App\Construcciones;

class Investigaciones extends Model
{
    // No queremos timestamps en este modelo
    public $timestamps = false;

    /**
     * Relacion de los construcciones con el planeta
     */
    public function jugadores ()
    {
        return $this->belongsTo(Jugadores::class);
    }

    /**
     * Relacion de los planetas con los usuarios
     */
    public function enInvestigaciones ()
    {
        return $this->hasMany(EnInvestigaciones::class);
    }

    /**
     * Relacion de los construcciones con el coste
     */
    public function coste ()
    {
        return $this->hasOne(CostesInvestigaciones::class);
    }


    public function listaNombres () {
        $listaNombres = [
            "invEnergia",
            "invPlasma",
            "invBalistica",
            "invMa",

            "invBlindaje",
            "invCarga",
            "invIa",

            "invEnsamblajeNaves",
            "invEnsamblajeDefensas",
            "invEnsamblajeTropas",
            "invImperio",
            "invObservacion",

            "invPropNuk",
            "invPropIon",
            "invPropPlasma",
            "invPropMa",
            "invPropHMA",

            "invIndLiquido",
            "invIndMicros",
            "invIndFuel",
            "invIndMa",
            "invIndMunicion",


        ];
        return $listaNombres;
    }

    public function nuevoJugador ($jugador) {
        $listaConstrucciones = [];
        $construccion = new Investigaciones();
        $listaNombres = $construccion->listaNombres();

        for ($i = 0 ; $i < count($listaNombres) ; $i++) {
            $construccion = new Investigaciones();
            $construccion->planetas_id = $planeta;
            $construccion->codigo = $listaNombres[$i];
            if ($listaNombres[$i] == 'almMineral' or $listaNombres[$i] == 'almCristal') {
                $construccion->nivel = 99;
            }else{
                $construccion->nivel = 0;
            }
            array_push($listaConstrucciones, $construccion);
        }

        foreach ($listaConstrucciones as $construccion) {
            $construccion->save();
        }

        for ($i = 0 ; $i < count($listaNombres) ; $i++) {
            $costeConstruccion = new CostesInvestigaciones();
            $coste = $costeConstruccion->generarDatosCostesConstruccion(0, $listaNombres[$i], $listaConstrucciones[$i]->id);
            $coste->save();
        }

        $industrias=new Industrias();
        $industrias->planetas_id=$planeta;
        $industrias->liquido=false;
        $industrias->micros=false;
        $industrias->fuel=false;
        $industrias->ma=false;
        $industrias->municion=false;
        $industrias->save();

    }

    public static function investigaciones ($planetaActual) {
        $construcciones = Investigaciones::where('planetas_id', $planetaActual->id)->get();
        if (empty($construcciones[0]->codigo)) {
            $construccion = new Investigaciones();
            $construccion->nuevaColonia($planetaActual->id);
            $construcciones = Investigaciones::where('planetas_id', $planetaActual->id)->get();
        }
        return $construcciones;
    }

    public function calcularTiempoInvestigaciones($preciototal, $personal,$nivel){
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $velInvest=Constantes::where('codigo','velInvest')->first();
        $factinvest=10000*$velInvest;
        $construccion = new Construcciones();
        $nivelLaboratorio=$construccion::where([
            ['planetas_id',$planetaActual],
            ['codigo','laboratorio'],
            ])->first();
        if ($personal > 0 && $nivelLaboratorio->nivel>0) {
            $result = ($factinvest*($nivel+1) * (($preciototal)/($personal*$nivelLaboratorio>nivel)));
        }else{
            $result = false;
        }
        return $result;
    }
}