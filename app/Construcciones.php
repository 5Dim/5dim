<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CostesConstrucciones;
use App\Industrias;

class Construcciones extends Model
{
    // No queremos timestamps en este modelo
    public $timestamps = false;

    /**
     * Relacion de los construcciones con el planeta
     */
    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }

    /**
     * Relacion de los planetas con los usuarios
     */
    public function enConstrucciones ()
    {
        return $this->hasMany(EnConstrucciones::class);
    }

    /**
     * Relacion de los construcciones con el coste
     */
    public function coste ()
    {
        return $this->hasOne(CostesConstrucciones::class);
    }

    public function listaNombres () {
        $listaNombres = [
            "minaMineral",
            "minaCristal",
            "minaGas",
            "minaPlastico",
            "minaCeramica",
            "indLiquido",
            "indMicros",
            "indFuel",
            "indMA",
            "indMunicion",
            "indPersonal",
            "almMineral",
            "almCristal",
            "almGas",
            "almPlastico",
            "almCeramica",
            "almLiquido",
            "almMicros",
            "almFuel",
            "almMA",
            "almMunicion",
            "fabNaves",
            "fabTropas",
            "fabDefensas",
            "refugio",
            "escudo",
            "laboratorio",
            "banco",
            "comercio",
            "observacion",
            "potenciador",
            "nodEstructura",
            "nodMotorMA",
        ];
        return $listaNombres;
    }

    public function sumarCostes($coste) {
        $nuevoCoste = $coste->mineral + $coste->cristal + $coste->gas + $coste->plastico + $coste->ceramica + $coste->liquido + $coste->micros;

        return $nuevoCoste;
    }

    public function calcularTiempoConstrucciones($preciototal, $personal){
        $velocidadConst=Constantes::where('codigo','velocidadConst')->first();
        if ($personal > 0) {
            $result = ((($preciototal + 12) * $velocidadConst->valor) / $personal);
        }else{
            $result = false;
        }
        return $result;
    }

    public function nuevaColonia ($planeta) {
        $listaConstrucciones = [];
        $construccion = new Construcciones();
        $listaNombres = $construccion->listaNombres();

        for ($i = 0 ; $i < count($listaNombres) ; $i++) {
            $construccion = new Construcciones();
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
            $costeConstruccion = new CostesConstrucciones();
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
}