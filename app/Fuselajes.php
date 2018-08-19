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
            "ARTEMISA",
            "NIKE",
            "HACHIMAN",
            "ISHTAR",
            "SOBEK",
            "HESTIA",
            "ATENEA",
            "AMATERATSU",
            "SHINIGAMI",
            "CRONOS",
            "AMMIT",
            "ANUBIS",
            "RAIJIN",
            "AGNI",
            "ÉRIDE",
            "KHEPRI",
            "HADES",
            "SETH" ,
            "SUSANU",
            "LOKI" ,
            "DIANA",
            "AFRODITA" ,
            "MOIRAS",
            "HORUS",
            "THOR" ,
            "NEMESIS",
            "ANHUR",
            "VARUNA",
            "HÉCATE" ,
            "BES",
            "BACO",
            "SKADI",
            "ILLITÍA" ,
            "OSIRIS",
            "NUT" ,
            "ZEUS",
            "ODIN",
            "KALI",
            "HEL",

            "ANAT" ,
            "DEIMOS" ,
            "IMHOTEP" ,
            "BERSERKER" ,
            "BASTET" ,
            "BALDER",
            "SHIVA" ,
            "SEJMET" ,
            "KARMA",
            "IRIS",
            "HATHOR",
            "HEIMDALL",
            "ARES" ,
            "IZANAMI",
            "ULL" ,
            "FREYA",
            "TEMIS" ,
            "HEFESTO",
            "GANESHA",
            "MORFEO",
            "TYR" ,
            "NUNET",
            "ESTIGIA"  ,
            "NIX" ,
            "AURA",

            //Nodriza
            "PLACA TERMICA",
            "MAMPARO" ,
            "CUADERNA" ,
            "ESTRUCTURA",

            //Prediseñadas
            "RECOLECTOR",
            "REMOLCADOR",
            "RA" ,
            "OBSERVADOR" ,

            //Novas
            "ISIS" ,
            "WUKONG",
            "ENLIL" ,
            "ESUS" ,
            "BAAL" ,

            //Defensas
            "Defensa 1",
            // "Defensa 2",
            // "Defensa 3",
            // "Defensa 4",
            // "Defensa 5",
            // "Defensa 6",
            // "Defensa 7",
            // "Defensa 8",

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

            case "ARTEMISA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "NIKE":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "HACHIMAN":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "HESTIA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "SOBEK":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "CRONOS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "ÉRIDE":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "ANUBIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "KHEPRI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "AGNI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "DIANA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "HADES":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "RAIJIN":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "ATENEA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "LOKI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "SETH":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "AFRODITA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "THOR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "AMATERATSU":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "MOIRAS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "SHINIGAMI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "HORUS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ANHUR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "NEMESIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "SUSANU":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;

            case "BES":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "SKADI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "VARUNA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "KALI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ILLITÍA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ODIN":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "HEL":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "AMMIT":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "OSIRIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ISHTAR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ZEUS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "NUT":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "BACO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "HÉCATE":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ANAT":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "DEIMOS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "IMHOTEP":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "BERSERKER":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "BASTET":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "BALDER":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "SHIVA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "SEJMET":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "KARMA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "IRIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "HATHOR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "HEIMDALL":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ARES":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="caza";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="0";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "IZANAMI":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ULL":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "FREYA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "TEMIS":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "HEFESTO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="ligera";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="1";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "GANESHA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "MORFEO":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "TYR":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "NUNET":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="media";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="2";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "ESTIGIA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "NIX":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
            array_push($fuselajes, $fuselaje);
            break;


            case "AURA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="pesada";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="3";
            $fuselaje->categoria="jugador";
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
            $fuselaje->tamaño="masiva";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="5";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;

            case "RA":
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="estacion";
            $fuselaje->tipo="nave";
            $fuselaje->tnave="4";
            $fuselaje->categoria="prediseñada";
            array_push($fuselajes, $fuselaje);
            break;


            case "OBSERVADOR":
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

            case "Defensa 1": //basada en la AMATERATSU
            $fuselaje =new Fuselajes();
            $fuselaje->codigo=$codigo;
            $fuselaje->tamaño="defensa";
            $fuselaje->tipo="defensa";
            $fuselaje->tnave="6";
            $fuselaje->categoria="jugador";
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