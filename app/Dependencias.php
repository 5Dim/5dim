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
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);

        $dependencia =new Dependencias();
        $dependencia->codigo='minaGas';
        $dependencia->codigoRequiere='minaCristal';
        $dependencia->nivelRequiere=3;
        array_push($dependencias, $dependencia);


        foreach($dependencias as $estaDependencia){
            $estaDependencia->save();
        }
}
}