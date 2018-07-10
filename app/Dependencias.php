<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    public $timestamps = false;

    public function  generarDatosDependencias(){

        $dependencias=[];

        $dependencia =new Dependencias();
        $dependencia->codigo='Avelprodminas';
        $dependencia->codigoRequiere='produccion de recursos en minas';
        $dependencia->nivelRequiere=1;
        array_push($dependencias, $dependencia);


        foreach($dependencias as $estaDependencia){
            $estaDependencia->save();
        }
}
}