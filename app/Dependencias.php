<?php

namespace App;
use App\Construcciones;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    public $timestamps = false;

    public function  generarDatosDependencias(){

        $construccion = new Construcciones();
        $listaNombres = $construccion->listaNombres();

        $dependencias=[];

        $dependencia =new Dependencias();
        $dependencia->codigo='minaCristal';
        $dependencia->codigoRequiere='minaMineral';
        $dependencia->nivelRequiere=1;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();//12
        $dependencia->codigo='almGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //4
        $dependencia->codigo='minaPlastico';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almPlastico';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaCeramica';
        $dependencia->codigoRequiere='minaGas';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almCeramica';
        $dependencia->codigoRequiere='minaGas';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);


        $dependencia =new Dependencias(); //6
        $dependencia->codigo='indLiquido';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almLiquido';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //7
        $dependencia->codigo='indMicros';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='almMicros';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //8
        $dependencia->codigo='indFuel';
        $dependencia->codigoRequiere='indMicros';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //8
        $dependencia->codigo='almFuel';
        $dependencia->codigoRequiere='indMicros';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);


        $dependencia =new Dependencias(); //9
        $dependencia->codigo='indMA';
        $dependencia->codigoRequiere='indPersonal';
        $dependencia->nivelRequiere=8;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //9
        $dependencia->codigo='indMA';
        $dependencia->codigoRequiere='indMicros';
        $dependencia->nivelRequiere=4;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias(); //9
        $dependencia->codigo='indMA';
        $dependencia->codigoRequiere='indFuel';
        $dependencia->nivelRequiere=4;

        array_push($dependencias, $dependencia);
        $dependencia =new Dependencias(); //9
        $dependencia->codigo='indMA';
        $dependencia->codigoRequiere='indMunicion';
        $dependencia->nivelRequiere=4;
        array_push($dependencias, $dependencia);


        $dependencia =new Dependencias(); //10
        $dependencia->codigo='indMunicion';
        $dependencia->codigoRequiere='indFuel';
        $dependencia->nivelRequiere=2;
        array_push($dependencias, $dependencia);

                                        // 11 academia






        foreach($dependencias as $estaDependencia){
            $estaDependencia->save();
        }
}
}