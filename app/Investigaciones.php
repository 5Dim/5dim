<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\CostesInvestigaciones;
use App\Construcciones;
use App\Constantes;

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

    public function nuevoJugador ($idJugador) {
        $listaInvestigaciones = [];
        $investigaciones = new Investigaciones();
        $listaNombres = $investigaciones->listaNombres();

        for ($i = 0 ; $i < count($listaNombres) ; $i++) {
            $investigacion = new Investigaciones();
            $investigacion->jugadores_id = $idJugador;
            $investigacion->codigo = $listaNombres[$i];
            $investigacion->nivel=0;
            array_push($listaInvestigaciones, $investigacion);
        }

        foreach ($listaInvestigaciones as $investigacion) {
            $investigacion->save();
        }

        for ($i = 0 ; $i < count($listaNombres) ; $i++) {
            $costeInvestigaciones = new CostesInvestigaciones();
            $coste = $costeInvestigaciones->generarDatosCostesInvestigacion(0, $listaNombres[$i], $listaInvestigaciones[$i]->id);
            $coste->save();
        }
    }

    public static function investigaciones ($planetaActual) {
        $investigaciones = Investigaciones::where('jugadores_id', $planetaActual->jugadores->id)->get();
        if (empty($investigaciones[0]->codigo)) {
            $investigacion = new Investigaciones();
            $investigacion->nuevoJugador($planetaActual->jugadores->id);
            $investigaciones = Investigaciones::where('jugadores_id', $planetaActual->jugadores->id)->get();
        }
        return $investigaciones;
    }

    public function calcularTiempoInvestigaciones($preciototal, $personal, $nivel, $planetaActual){
        //$planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $velInvest=Constantes::where('codigo','velInvest')->first()->valor;
        $factinvest=100*$velInvest;
        $nivelLaboratorio=Construcciones::where([
            ['planetas_id', $planetaActual->id],
            ['codigo','laboratorio'],
            ])->first();
        if ($personal > 0 && $nivelLaboratorio->nivel > 0) {
            $result = ($factinvest*($nivel+1) * (($preciototal)/($personal*$nivelLaboratorio->nivel)));
        }else{
            $result = false;
        }
        return $result;
    }
}