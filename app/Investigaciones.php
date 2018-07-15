<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\CostesInvestigaciones;

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
}