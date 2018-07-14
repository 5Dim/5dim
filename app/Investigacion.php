<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{



    public function listaNombres () {
        $listaNombres = [
            "invEnergia",
            "invPlasma",
            "invBalistica",
            "invMa",
            "invBlindaje",
            "invCarga",
            "invEnsamblajeDefensas",
            "invEnsamblajeNaves",
            "invEnsamblajeTropas",
            "invIa",
            "invImperio",
            "invIndFuel",
            "invIndLiquido",
            "invIndMa",
            "invIndMicros",
            "invIndMunicion",
            "invMa",
            "invObservacion",
            "invPlasma",
            "invPropHMA",
            "invPropIon",
            "invPropMa",
            "invPropNuk",
            "invPropPlasma",
        ];
        return $listaNombres;
    }

}