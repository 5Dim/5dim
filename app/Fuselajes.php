<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\CostesFuselajes;
use App\CualidadesFuselajes;

class Fuselajes extends Model
{
    public $timestamps = false;

    public function cualidades ()
    {
        return $this->hasOne(CualidadesFuselajes::class);
    }

    public function costes ()
    {
        return $this->hasOne(CostesFuselajes::class);
    }

    public function jugadores ()
    {
        return $this->belongsToMany(Jugadores::class);
    }

    public function listaNombres () {
        $listaNombres = [
            "XG",
            "MIZAR",
            "HIDRA",
            "SONDA",
            "DEFENSOR",
            "MEDUSA",
            "OPHIR",
            "RAPTOR",
            "NABUCO",
            "VG",
            "ESCORPION",
            "VENGANZA",
            "COBRA",
            "CERBERO",
            "NEBULA",
            "MITRA",
            "YG",
            "TARTESO" ,
            "VALKIRIA",
            "NEMESIS" ,
            "DEDALO",
            "ECLIPSE" ,
            "FENIX",
            "HERA",
            "LEVIATAN" ,
            "SG",
            "LUNA",
            "FRAGMA",
            "CETUS" ,
            "EUFORIA",
            "NOMADA",
            "TRAUMA",
            "HELIOS" ,
            "PULSAR",
            "NIOBE" ,
            "FALCATA",
            "EBOLA",
            "BASALTO",
            "AQUILES",

            "FOBOS" ,
            "AGAMENON" ,
            "VARUNA" ,
            "BERSERKER" ,
            "AGRESOR" ,
            "VULCANO",
            "DENIX" ,
            "OBITUS" ,
            "CARONTE",
            "VERMIS",
            "HATHOR",
            "TEOTL",
            "YGR" ,
            "ISHTAR",
            "CROM" ,
            "FREYJA",
            "INTI" ,
            "BARRACUDA",
            "KALI",
            "MARDUK",
            "NIMROD" ,
            "LORICA",
            "NOVA"  ,
            "ASUR" ,
            "CASANDRA",

            "PLACA TERMICA",
            "MAMPARO" ,
            "CUADERNA" ,
            "ESTRUCTURA",

            "RECOLECTOR",
            "REMOLCADOR",
            "ANUBIS" ,
            "BENGALA" ,

            "ISIS" ,
            "WUKONG",
            "ENLIL" ,
            "ESUS" ,
            "BAAL" ,

        ];
        return $listaNombres;
    }

    public function  generarDatosFuselajes(){

        $costesFuselaje=new CostesFuselajes();
        $cualidadesFuselaje=new CualidadesFuselajes();

        $fuselajes=[];

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="XG";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="MIZAR";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="HIDRA";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="MEDUSA";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="DEFENSOR";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="VG";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="NEBULA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="VENGANZA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="MITRA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="CERBERO";
                $fuselaje->tamaño="estacion";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="4";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="DEDALO";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="YG";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="COBRA";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="OPHIR";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="NEMESIS";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="TARTESO";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ECLIPSE";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="LEVIATAN";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="RAPTOR";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="FENIX";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="NABUCO";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="HERA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="LUNA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="SG";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="VALKIRIA";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="EUFORIA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="TRAUMA";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="FRAGMA";
                $fuselaje->tamaño="estacion";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="4";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="BASALTO";
                $fuselaje->tamaño="estacion";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="4";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="HELIOS";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="EBOLA";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="AQUILES";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ESCORPION";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="PULSAR";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="SONDA";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="FALCATA";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="NIOBE";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="NOMADA";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="CETUS";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="jugador";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="FOBOS";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="AGAMENON";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="VARUNA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="BERSERKER";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="AGRESOR";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="VULCANO";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="DENIX";
                $fuselaje->tamaño="estacion";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="4";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="OBITUS";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="CARONTE";
                $fuselaje->tamaño="estacion";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="4";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="VERMIS";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="HATHOR";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="TEOTL";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="YGR";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ISHTAR";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="CROM";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="FREYJA";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="INTI";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="BARRACUDA";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="KALI";
                $fuselaje->tamaño="estacion";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="4";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="MARDUK";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="NIMROD";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="LORICA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="NOVA";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ASUR";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="CASANDRA";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="alianza";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="PLACA TERMICA";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->categoria="prediseñada";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="MAMPARO";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="prediseñada";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="CUADERNA";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="prediseñada";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ESTRUCTURA";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="prediseñada";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="RECOLECTOR";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="prediseñada";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="REMOLCADOR";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="prediseñada";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ANUBIS";
                $fuselaje->tamaño="estacion";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="4";
                $fuselaje->categoria="prediseñada";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="BENGALA";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="prediseñada";
                array_push($fuselajes, $fuselaje);

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ISIS";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="compra";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="WUKONG";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->categoria="compra";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ENLIL";
                $fuselaje->tamaño="media";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="2";
                $fuselaje->categoria="compra";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="ESUS";
                $fuselaje->tamaño="ligera";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="1";
                $fuselaje->categoria="compra";
                array_push($fuselajes, $fuselaje);


                $fuselaje =new Fuselajes();
                $fuselaje->codigo="BAAL";
                $fuselaje->tamaño="pesada";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="3";
                $fuselaje->categoria="compra";
                array_push($fuselajes, $fuselaje);










            foreach($fuselajes as $estefuselaje){
                $estefuselaje->save();
                $costesFuselajes=$costesFuselaje->generarDatosCostesFuselajes($estefuselaje->codigo,$estefuselaje->id);
                $costesFuselajes->save();
                $cualidadesFuselajes=$cualidadesFuselaje->generarDatosCualidadesFuselajes($estefuselaje->codigo,$estefuselaje->id);
                $cualidadesFuselajes->save();
            }

        //return $result;
    }

}