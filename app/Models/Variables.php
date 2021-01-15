<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variables extends Model
{
    use HasFactory;

    public function  generarDatosVariables($universo = 0)
    {


        $variables = [];


        $variable = new variables();
        $variable->universo_id = $universo;
        $variable->codigo = 'catiInvest';
        $variable->descripcion = 'investigaciones simultaneas-velocdad produccion';
        $variable->cambiaCodigo = 'InvestSimultaneas';
        $variable->variacion = 1;
        $variable->influyeCodigo = 'Avelprodminas';
        $variable->influyeVariacion = -.5;
        array_push($variables, $variable);

        $variable = new variables();
        $variable->universo_id = $universo;
        $variable->codigo = 'catiInvest2';
        $variable->descripcion = 'investigaciones simultaneas - ejemplo';
        $variable->cambiaCodigo = 'InvestSimultaneas';
        $variable->variacion = 1;
        $variable->influyeCodigo = 'Avelprodminas';
        $variable->influyeVariacion = -.5;
        array_push($variables, $variable);


        foreach ($variables as $estaproduccion) {
            $estaproduccion->save();
        }
    }
}
