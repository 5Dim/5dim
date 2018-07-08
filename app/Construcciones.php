<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Construcciones extends Model
{
    // No queremos timestamps en este modelo
    public $timestamps = false;

    /**
     * Relacion de los construcciones con el planeta
     */
    public function planeta ()
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
            "minaPlasticos",
            "minaCeramica",
            "indLiquidos",
            "indMicros",
            "indFuel",
            "indMA",
            "indMunicion",
            "indPersonal",
            "almMineral",
            "almCristal",
            "almGas",
            "almPlasticos",
            "almCeramica",
            "almLiquidos",
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