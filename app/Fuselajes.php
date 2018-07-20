<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

        $fuselajes=[];

                $fuselaje =new Fuselajes();
                $fuselaje->codigo="xg";
                $fuselaje->tamaño="caza";
                $fuselaje->tipo="nave";
                $fuselaje->tnave="0";
                $fuselaje->alianza="no";

                array_push($fuselajes, $fuselaje);


            foreach($fuselajes as $estefuselaje){
                $estefuselaje->save();
            }

        //return $result;
    }

}