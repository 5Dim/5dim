<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Construcciones extends Model
{
    public $timestamps = false;
    public function listaNombres () {
        $listaNombres = [
            "mina_mineral",
            "mina_cristal",
            "mina_gas",
            "mina_plastico",
            "mina_ceramica",
            "industria_liquido",
            "industria_micros",
            "industria_fuel",
            "industria_ma",
            "industria_municion",
            "academia",
            "almacen_mineral",
            "almacen_cristal",
            "almacen_gas",
            "almacen_plastico",
            "almacen_ceramica",
            "almacen_liquido",
            "almacen_micros",
            "almacen_fuel",
            "almacen_ma",
            "almacen_municion",
            //Faltan el resto de edificios
        ];
        return $listaNombres;
    }
    public function nuevaColonia ($planeta = 1) {
        $listaConstrucciones = [];
        $construccion = new Construcciones();
        $listaNombres = $construccion->listaNombres();

        for ($i = 0 ; $i < count($listaNombres) ; $i++) {
            $construccion = new Construcciones();
            $construccion->planetas_id = $planeta;
            $construccion->codigo = $listaNombres[$i];
            $construccion->nivel = 0;
            array_push($listaConstrucciones, $construccion);
        }
        /*
        //Mina Mineral
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'mina_mineral';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);

        //Mina Cristal
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'mina_cristal';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);

        //Mina Gas
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'mina_gas';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);

        //Mina Plastico
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'mina_plastico';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Mina Ceramica
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'mina_ceramica';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);

        //Industria Liquido
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'industria_liquido';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Industria Micros
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'industria_micros';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Industria Fuel
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'industria_fuel';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Industria MA
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'industria_ma';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Industria Municion
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'industria_municion';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Academia
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'academia';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Mineral
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_mineral';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Cristal
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_cristal';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Gas
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_gas';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Plastico
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_plastico';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Ceramica
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_ceramica';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Liquido
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_liquido';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Micros
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_micros';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Fuel
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_fuel';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen MA
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_ma';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);


        //Almacen Municion
        $construccion = new Construcciones();
        $construccion->planetas_id = $planeta;
        $construccion->codigo = 'almacen_municion';
        $construccion->nivel = 0;
        array_push($listaConstrucciones, $construccion);
        */

        return $listaConstrucciones;
    }
}