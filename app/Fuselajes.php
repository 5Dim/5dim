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

        $fuselajes=new Fuselajes();
        $listaNombres=$fuselajes->listaNombres();

        $fuselajes=[];
        foreach($listaNombres as $codigo){
        switch($codigo){

            case "XG":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "MIZAR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "HIDRA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "MEDUSA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "DEFENSOR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "VG":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "NEBULA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "VENGANZA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "MITRA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "CERBERO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "DEDALO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "YG":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "COBRA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "OPHIR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "NEMESIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "TARTESO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "ECLIPSE":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "LEVIATAN":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "RAPTOR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "FENIX":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "NABUCO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "HERA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "LUNA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "SG":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;

            case "VALKIRIA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "EUFORIA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "TRAUMA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "FRAGMA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "BASALTO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "HELIOS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "EBOLA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "AQUILES":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ESCORPION":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "PULSAR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "SONDA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "FALCATA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "NIOBE":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "NOMADA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "CETUS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "FOBOS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "AGAMENON":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "VARUNA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "BERSERKER":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "AGRESOR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "VULCANO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "DENIX":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "OBITUS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "CARONTE":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "VERMIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "HATHOR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "TEOTL":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "YGR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "ISHTAR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "CROM":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "FREYJA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "INTI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "BARRACUDA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "KALI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "MARDUK":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "NIMROD":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "LORICA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "NOVA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "ASUR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "CASANDRA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="alianza";
            array_push($fuselajes, $fuselaje);
            break;


            case "PLACA TERMICA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;

            case "MAMPARO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;

            case "CUADERNA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;

            case "ESTRUCTURA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;

            case "RECOLECTOR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;

            case "REMOLCADOR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;

            case "ANUBIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;


            case "BENGALA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;

            case "ISIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="compra";
            array_push($fuselajes, $fuselaje);
            break;


            case "WUKONG":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="compra";
            array_push($fuselajes, $fuselaje);
            break;


            case "ENLIL":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="compra";
            array_push($fuselajes, $fuselaje);
            break;


            case "ESUS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="compra";
            array_push($fuselajes, $fuselaje);
            break;


            case "BAAL":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="compra";
            array_push($fuselajes, $fuselaje);
            break;


            }
        }







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