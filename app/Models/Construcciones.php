<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CostesConstrucciones;
use App\Models\Industrias;

class Construcciones extends Model
{
    use HasFactory;

    // No queremos timestamps en este modelo
    public $timestamps = false;

    public function planetas ()
    {
        return $this->belongsTo(Planetas::class);
    }

    public function enConstrucciones ()
    {
        return $this->hasMany(EnConstrucciones::class);
    }

    public function coste ()
    {
        return $this->hasOne(CostesConstrucciones::class);
    }

    public function listaNombres () {
        $listaNombres = [
            "indPersonal",
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
            "refugio",
            "fabDefensas",
            "fabNaves",
            "fabTropas",
            "escudo",
            "laboratorio",
            "terraformador",
            "comercio",
            "observacion",
            "potenciador",
            "inhibidorHMA",
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

        /*
        for ($i = 0 ; $i < count($listaNombres) ; $i++) {
            $costeConstruccion = new CostesConstrucciones();
            $coste = $costeConstruccion->generarDatosCostesConstruccion(0, $listaNombres[$i], $listaConstrucciones[$i]->id);
            $coste->save();
        }
        */

        $industrias=new Industrias();
        $industrias->planetas_id=$planeta;
        $industrias->liquido=false;
        $industrias->micros=false;
        $industrias->fuel=false;
        $industrias->ma=false;
        $industrias->municion=false;
        $industrias->save();

    }

    public static function construcciones ($planetaActual) {
        $construcciones = Construcciones::where('planetas_id', $planetaActual->id)->get();
        if (empty($construcciones[0]->codigo)) {
            $construccion = new Construcciones();
            $construccion->nuevaColonia($planetaActual->id);
            $construcciones = Construcciones::where('planetas_id', $planetaActual->id)->get();
        }
        return $construcciones;
    }
}
