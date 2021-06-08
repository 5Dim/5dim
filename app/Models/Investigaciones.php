<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CostesInvestigaciones;
use App\Models\Construcciones;
use App\Models\Constantes;

class Investigaciones extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function jugadores()
    {
        return $this->belongsTo(Jugadores::class);
    }

    public function enInvestigaciones()
    {
        return $this->hasMany(EnInvestigaciones::class);
    }

    public static function sumatorio($num)
    {
        $sum = 0;
        for ($i = $num; $i > 0; $i--) {
            $sum += $num;
        }
        return $sum;
    }

    public function listaNombres()
    {
        $listaNombres = [
            // Armas
            "invEnergia",
            "invPlasma",
            "invBalistica",
            "invMa",
            // Blindajes
            "invTitanio",
            "invReactivo",
            "invResinas",
            "invPlacas",
            "invCarbonadio",
            // Civiles
            "invCarga",
            "invHangar",
            "invRecoleccion",
            "invIa",
            // Imperiales
            "invEnsamblajeFuselajes",
            "invImperio",
            "invObservacion",
            // Motores
            "invPropQuimico",
            "invPropIon",
            "invPropNuk",
            "invPropPlasma",
            "invPropMa",
            // "invPropHMA",
            // Industriales
            "invIndLiquido",
            "invIndMicros",
            "invIndFuel",
            "invIndMa",
            "invIndMunicion",
        ];
        return $listaNombres;
    }

    public function sumarCostes($coste)
    {
        $nuevoCoste =
            $coste->mineral +
            $coste->cristal +
            $coste->gas +
            $coste->plastico +
            $coste->ceramica +
            $coste->liquido +
            $coste->micros +
            $coste->fuel +
            $coste->ma +
            $coste->municion;

        return $nuevoCoste;
    }

    public function nuevoJugador($idJugador)
    {
        $listaInvestigaciones = [];
        $investigaciones = new Investigaciones();
        $listaNombres = $investigaciones->listaNombres();

        $listaCategorias = [
            // Armamento
            "armas",
            "armas",
            "armas",
            "armas",
            // Blindajes
            "blindaje",
            "blindaje",
            "blindaje",
            "blindaje",
            "blindaje",
            // Civiles
            "civil",
            "civil",
            "civil",
            "civil",
            // Imperiales
            "imperial",
            "imperial",
            "imperial",
            // Motores
            "motor",
            "motor",
            "motor",
            "motor",
            "motor",
            // "invPropHMA",
            // Industriales
            "industria",
            "industria",
            "industria",
            "industria",
            "industria",
        ];

        for ($i = 0; $i < count($listaNombres); $i++) {
            $investigacion = new Investigaciones();
            $investigacion->jugadores_id = $idJugador;
            $investigacion->codigo = $listaNombres[$i];
            $investigacion->categoria = $listaCategorias[$i];
            $investigacion->nivel = 0;
            array_push($listaInvestigaciones, $investigacion);
        }

        foreach ($listaInvestigaciones as $investigacion) {
            $investigacion->save();
        }
    }

    public static function investigaciones()
    {
        $investigaciones = Investigaciones::where('jugadores_id', session()->get('jugadores_id'))->get();
        if (empty($investigaciones[0]->codigo)) {
            $investigacion = new Investigaciones();
            $investigacion->nuevoJugador(session()->get('jugadores_id'));
            $investigaciones = Investigaciones::where('jugadores_id', session()->get('jugadores_id'))->get();
        }
        return $investigaciones;
    }

    public function calcularTiempoInvestigaciones($preciototal, $personal, $nivel, $planetaActual)
    {
        //$planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $velInvest = Constantes::where('codigo', 'velInvest')->first()->valor;
        $factinvest = 100 * $velInvest;
        $nivelLaboratorio = Construcciones::where([
            ['planetas_id', $planetaActual->id],
            ['codigo', 'laboratorio'],
        ])->first()->nivel + 1;
        if ($personal > 0 && $nivelLaboratorio > 0) {
            $result = ($factinvest * ($nivel) * (($preciototal) / ($personal * $nivelLaboratorio)));
            if ($result == 0) {
                $result = 0.01;
            }
        } else {
            $result = false;
        }
        return $result;
    }
}
