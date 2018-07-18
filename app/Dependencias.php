<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    public $timestamps = false;

    public function  generarDatosDependencias(){


        $dependencias=[];

        $dependencia =new Dependencias();
        $dependencia->codigo='minaCristal';
        $dependencia->codigoRequiere='minaMineral';
        $dependencia->nivelRequiere=1;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almMineral';
        $dependencia->codigoRequiere='minaMineral';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();//12
        $dependencia->codigo='almGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //4
        $dependencia->codigo='minaPlastico';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almPlastico';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaCeramica';
        $dependencia->codigoRequiere='minaGas';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almCeramica';
        $dependencia->codigoRequiere='minaGas';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);


        $dependencia =new Dependencias(); //6
        $dependencia->codigo='indLiquido';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almLiquido';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //7
        $dependencia->codigo='indMicros';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=3;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almMicros';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=3;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //8
        $dependencia->codigo='indFuel';
        $dependencia->codigoRequiere='indMicros';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //8
        $dependencia->codigo='almFuel';
        $dependencia->codigoRequiere='indMicros';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        array_push($dependencias, $dependencia);
        $dependencia =new Dependencias(); //9
        $dependencia->codigo='indMA';
        $dependencia->codigoRequiere='indMunicion';
        $dependencia->nivelRequiere=4;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //10
        $dependencia->codigo='almMA';
        $dependencia->codigoRequiere='indMunicion';
        $dependencia->nivelRequiere=4;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);


        $dependencia =new Dependencias(); //10
        $dependencia->codigo='indMunicion';
        $dependencia->codigoRequiere='indFuel';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //8
        $dependencia->codigo='almMunicion';
        $dependencia->codigoRequiere='indFuel';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);


        $dependencia =new Dependencias();
        $dependencia->codigo='fabNaves';
        $dependencia->codigoRequiere='fabDefensas';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='fabTropas';
        $dependencia->codigoRequiere='fabNaves';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='fabDefensas';
        $dependencia->codigoRequiere='refugio';
        $dependencia->nivelRequiere=2;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='escudo';
        $dependencia->codigoRequiere='fabDefensas';
        $dependencia->nivelRequiere=6;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='banco';
        $dependencia->codigoRequiere='laboratorio';
        $dependencia->nivelRequiere=4;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='comercio';
        $dependencia->codigoRequiere='banco';
        $dependencia->nivelRequiere=4;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='potenciador';
        $dependencia->codigoRequiere='observacion';
        $dependencia->nivelRequiere=4;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='inhibidorHMA';
        $dependencia->codigoRequiere='escudo';
        $dependencia->nivelRequiere=15;
        $dependencia->tipo='construccion';
        array_push($dependencias, $dependencia);

        /////  dependencias investigaciones  //////////////////////////////////////////////

        $dependencia =new Dependencias();
        $dependencia->codigo='invMa';
        $dependencia->codigoRequiere='invBalistica';
        $dependencia->nivelRequiere=6;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invIa';
        $dependencia->codigoRequiere='invPlasma';
        $dependencia->nivelRequiere=4;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invPropIon';
        $dependencia->codigoRequiere='invEnergia';
        $dependencia->nivelRequiere=5;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invPropPlasma';
        $dependencia->codigoRequiere='invPlasma';
        $dependencia->nivelRequiere=8;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invPropMa';
        $dependencia->codigoRequiere='invMa';
        $dependencia->nivelRequiere=10;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invPropHma';
        $dependencia->codigoRequiere='invEnergia';
        $dependencia->nivelRequiere=20;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invIndLiquido';
        $dependencia->codigoRequiere='invImperio';
        $dependencia->nivelRequiere=4;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invIndMicros';
        $dependencia->codigoRequiere='invImperio';
        $dependencia->nivelRequiere=5;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invIndFuel';
        $dependencia->codigoRequiere='invImperio';
        $dependencia->nivelRequiere=6;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invIndMa';
        $dependencia->codigoRequiere='invImperio';
        $dependencia->nivelRequiere=7;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='invIndMunicion';
        $dependencia->codigoRequiere='invImperio';
        $dependencia->nivelRequiere=8;
        $dependencia->tipo='investigacion';
        array_push($dependencias, $dependencia);




        foreach($dependencias as $estaDependencia){
            $estaDependencia->save();
        }
}
}