<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function  generarDatosDependencias()
    {
        $dependencias = [];

        // Minas
        $dependencia = new Dependencias();
        $dependencia->codigo = 'indPersonal';
        $dependencia->codigoRequiere = 'minaMineral';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'minaMineral';
        $dependencia->codigoRequiere = 'minaMineral';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'minaCristal';
        $dependencia->codigoRequiere = 'minaMineral';
        $dependencia->nivelRequiere = 1;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'minaGas';
        $dependencia->codigoRequiere = 'minaCristal';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias(); //4
        $dependencia->codigo = 'minaPlastico';
        $dependencia->codigoRequiere = 'minaCristal';
        $dependencia->nivelRequiere = 3;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'minaCeramica';
        $dependencia->codigoRequiere = 'minaGas';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        // Industrias
        $dependencia = new Dependencias(); //6
        $dependencia->codigo = 'indLiquido';
        $dependencia->codigoRequiere = 'indPersonal';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias(); //7
        $dependencia->codigo = 'indMicros';
        $dependencia->codigoRequiere = 'indPersonal';
        $dependencia->nivelRequiere = 3;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias(); //8
        $dependencia->codigo = 'indFuel';
        $dependencia->codigoRequiere = 'indMicros';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias(); //9
        $dependencia->codigo = 'indMA';
        $dependencia->codigoRequiere = 'indMunicion';
        $dependencia->nivelRequiere = 4;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias(); //10
        $dependencia->codigo = 'indMunicion';
        $dependencia->codigoRequiere = 'indFuel';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        // Almacenes
        $dependencia = new Dependencias(); //12
        $dependencia->codigo = 'almGas';
        $dependencia->codigoRequiere = 'minaCristal';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'almPlastico';
        $dependencia->codigoRequiere = 'minaCristal';
        $dependencia->nivelRequiere = 3;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'almCeramica';
        $dependencia->codigoRequiere = 'minaGas';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'almLiquido';
        $dependencia->codigoRequiere = 'indPersonal';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'almMicros';
        $dependencia->codigoRequiere = 'indPersonal';
        $dependencia->nivelRequiere = 3;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias(); //8
        $dependencia->codigo = 'almFuel';
        $dependencia->codigoRequiere = 'indMicros';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias(); //10
        $dependencia->codigo = 'almMA';
        $dependencia->codigoRequiere = 'indMunicion';
        $dependencia->nivelRequiere = 4;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias(); //8
        $dependencia->codigo = 'almMunicion';
        $dependencia->codigoRequiere = 'indFuel';
        $dependencia->nivelRequiere = 2;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        //Militares
        $dependencia = new Dependencias();
        $dependencia->codigo = 'refugio';
        $dependencia->codigoRequiere = 'minaMineral';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'hangar';
        $dependencia->codigoRequiere = 'refugio';
        $dependencia->nivelRequiere = 1;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        //Desarrollo
        $dependencia = new Dependencias();
        $dependencia->codigo = 'laboratorio';
        $dependencia->codigoRequiere = 'minaMineral';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'comercio';
        $dependencia->codigoRequiere = 'laboratorio';
        $dependencia->nivelRequiere = 4;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        // Observacion
        $dependencia = new Dependencias();
        $dependencia->codigo = 'observacion';
        $dependencia->codigoRequiere = 'minaMineral';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'inhibidorHMA';
        $dependencia->codigoRequiere = 'observacion';
        $dependencia->nivelRequiere = 15;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        // Especializaciones
        $dependencia = new Dependencias();
        $dependencia->codigo = 'terraformadorMinero';
        $dependencia->codigoRequiere = 'laboratorio';
        $dependencia->nivelRequiere = 4;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        // Especiales
        $dependencia = new Dependencias();
        $dependencia->codigo = 'terraformadorMinero';
        $dependencia->codigoRequiere = 'laboratorio';
        $dependencia->nivelRequiere = 4;
        $dependencia->tipo = 'construccion';
        array_push($dependencias, $dependencia);

        /////  dependencias investigaciones  //////////////////////////////////////////////

        // Militares
        $dependencia = new Dependencias();
        $dependencia->codigo = 'invEnergia';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invPlasma';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invBalistica';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invMa';
        $dependencia->codigoRequiere = 'invBalistica';
        $dependencia->nivelRequiere = 6;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        // Civil
        $dependencia = new Dependencias();
        $dependencia->codigo = 'invBlindaje';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invCarga';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invIa';
        $dependencia->codigoRequiere = 'invPlasma';
        $dependencia->nivelRequiere = 4;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        // Imperio
        $dependencia = new Dependencias();
        $dependencia->codigo = 'invEnsamblajeFuselajes';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invImperio';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invObservacion';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        // Motores
        $dependencia = new Dependencias();
        $dependencia->codigo = 'invPropQuimico';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invPropNuk';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invPropIon';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 5;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invPropPlasma';
        $dependencia->codigoRequiere = 'invPlasma';
        $dependencia->nivelRequiere = 8;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invPropMa';
        $dependencia->codigoRequiere = 'invMa';
        $dependencia->nivelRequiere = 10;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invPropHma';
        $dependencia->codigoRequiere = 'invEnergia';
        $dependencia->nivelRequiere = 20;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        // Industriales
        $dependencia = new Dependencias();
        $dependencia->codigo = 'invIndLiquido';
        $dependencia->codigoRequiere = 'invImperio';
        $dependencia->nivelRequiere = 3;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invIndMicros';
        $dependencia->codigoRequiere = 'invImperio';
        $dependencia->nivelRequiere = 4;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invIndFuel';
        $dependencia->codigoRequiere = 'invImperio';
        $dependencia->nivelRequiere = 5;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invIndMa';
        $dependencia->codigoRequiere = 'invImperio';
        $dependencia->nivelRequiere = 6;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'invIndMunicion';
        $dependencia->codigoRequiere = 'invImperio';
        $dependencia->nivelRequiere = 7;
        $dependencia->tipo = 'investigacion';
        array_push($dependencias, $dependencia);


        ///////////////   FUSELAJES  ////////////////////////////////////////////////////////////////////

        $dependencia = new Dependencias();
        $dependencia->codigo = 'MIZAR';
        $dependencia->codigoRequiere = 'invEnsamblajeFuselajes';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'fuselaje';
        array_push($dependencias, $dependencia);

        $dependencia = new Dependencias();
        $dependencia->codigo = 'XG';
        $dependencia->codigoRequiere = 'invEnsamblajeFuselajes';
        $dependencia->nivelRequiere = 0;
        $dependencia->tipo = 'fuselaje';
        array_push($dependencias, $dependencia);

        foreach ($dependencias as $estaDependencia) {
            $estaDependencia->save();
        }
    }
}
