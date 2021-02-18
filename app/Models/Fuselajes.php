<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CostesFuselajes;
use App\Models\CualidadesFuselajes;

class Fuselajes extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function cualidades()
    {
        return $this->hasOne(CualidadesFuselajes::class);
    }

    public function costes()
    {
        return $this->hasOne(CostesFuselajes::class);
    }

    public function jugadores()
    {
        return $this->belongsToMany(Jugadores::class);
    }

    public function disenios()
    {
        return $this->hasMany(Disenios::class);
    }

    public function listaNombres()
    {
        $listaNombres = [
            "ARTEMISA",
            "MIZAR",
            "ISHTAR",
            "SONDA",
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
            "SETH",
            "SUSANOO",
            "LOKI",
            "DIANA",
            "AFRODITA",
            "MOIRAS",
            "HORUS",
            "THOR",
            "NEMESIS",
            "ANHUR",
            "VARUNA",
            "HÉCATE",
            "BES",
            "BACO",
            "SKADI",
            "ILLITÍA",
            "OSIRIS",
            "NUT",
            "ZEUS",
            "ODIN",
            "KALI",
            "HEL",

            "ANAT",
            "DEIMOS",
            "IMHOTEP",
            "BERSERKER",
            "BASTET",
            "BALDER",
            "SHIVA",
            "SEJMET",
            "KARMA",
            "IRIS",
            "HATHOR",
            "HEIMDALL",
            "ARES",
            "IZANAMI",
            "ULL",
            "FREYA",
            "TEMIS",
            "HEFESTO",
            "GANESHA",
            "MORFEO",
            "TYR",
            "NUNET",
            "ESTIGIA",
            "NIX",
            "AURA",

            //Nodriza
            // "PLACA TERMICA",
            // "MAMPARO",
            // "CUADERNA",
            // "ESTRUCTURA",

            //Prediseniadas
            // "RECOLECTOR",
            // "REMOLCADOR",
            // "RA",
            // "OBSERVADOR",

            //Novas
            "ISIS",
            "WUKONG",
            "ENLIL",
            "ESUS",
            "BAAL",
            /*
            //DEFENSAS
            //Ligeras
            "YETI",
            "CROM",
            "DAGON",
            "HASTUR",
            "VALKIRIA",
            "KITSUNE",
            "AZAZEL",
            "NAZGUL",
            "BALROG",
            "CTHULHU",

            //Medias
            "MORLOCK",
            "SARLACC",
            "RATHTARS",
            "ROC",
            "SHOGGOTZ",
            "UNGOLIANTH",
            "NECROCOLOSO",
            "RANCOR",
            "DALEK",
            "BYAKKO",

            //Pesadas
            "CÍCLOPE",
            "ORCO",
            "TROLL",
            "OGRO",
            "ETTIN",

            //Estacion
            "ARPÍA",
            "WYVERN",
            "MANTÍCORA",
            "DRAGÓN",
            "FÉNIX",

            //estacion
            "BISILISCO",
            "CENTAURO",
            "CANCERBERO",
            "RAKSHASA",
            "LICÁNTROPO",

            //Mech
            // "GORGONA",
            // "NAGA",
            // "HIDRA",
            // "LEVIATÁN",
            // "KRAKEN",

            // //MegaBot
            // "HOMÚNCULO",
            // "GARGOLA",
            // "GOLEM",
            */

        ];
        return $listaNombres;
    }

    public static function generarDatosFuselajes()
    {

        $costesFuselaje = new CostesFuselajes();
        $cualidadesFuselaje = new CualidadesFuselajes();

        $fuselajes = new Fuselajes();
        $listaNombres = $fuselajes->listaNombres();

        $fuselajes = [];
        foreach ($listaNombres as $codigo) {
            switch ($codigo) {

                case "ARTEMISA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "caza";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "0";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "MIZAR":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "ISHTAR":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 1;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "HESTIA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 2;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "SOBEK":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 7;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "CRONOS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "caza";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "0";
                    $fuselaje->coste = 5;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "ÉRIDE":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 5;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "ANUBIS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 9;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "KHEPRI":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 11;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "AGNI":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 3;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "DIANA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 20;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "HADES":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "caza";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 10;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "RAIJIN":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 17;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "ATENEA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 4;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "LOKI":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 12;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "SETH":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 15;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "AFRODITA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 11;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "THOR":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 17;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "AMATERATSU":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 6;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "MOIRAS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 16;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "SHINIGAMI":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 14;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "HORUS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 24;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ANHUR":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 13;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "NEMESIS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "caza";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "0";
                    $fuselaje->coste = 14;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "SUSANOO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 10;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "BES":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 21;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "SKADI":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 21;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "VARUNA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 13;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "KALI":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 27;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ILLITÍA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 24;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ODIN":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 31;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "HEL":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 27;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "AMMIT":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 9;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "OSIRIS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 25;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "SONDA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ZEUS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "caza";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "0";
                    $fuselaje->coste = 20;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "NUT":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 28;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "BACO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 15;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "HÉCATE":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 19;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ANAT":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 26;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "DEIMOS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 16;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "IMHOTEP":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 28;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "BERSERKER":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 23;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "BASTET":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 29;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "BALDER":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 14;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "SHIVA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 22;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "SEJMET":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 22;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "KARMA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 8;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "IRIS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 25;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "HATHOR":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 29;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "HEIMDALL":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 30;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ARES":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "caza";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "0";
                    $fuselaje->coste = 18;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "IZANAMI":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 19;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ULL":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 23;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "FREYA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 25;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "TEMIS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 29;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "HEFESTO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 9;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "GANESHA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 18;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "MORFEO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 26;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "TYR":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 28;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "NUNET":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 26;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ESTIGIA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 29;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "NIX":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 30;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "AURA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 31;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;



                    // case "PLACA TERMICA":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "caza";
                    //     $fuselaje->tipo = "nave";
                    //     $fuselaje->tnave = "0";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "prediseniada";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "MAMPARO":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "ligera";
                    //     $fuselaje->tipo = "nave";
                    //     $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "prediseniada";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "CUADERNA":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "media";
                    //     $fuselaje->tipo = "nave";
                    //     $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "prediseniada";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "ESTRUCTURA":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "pesada";
                    //     $fuselaje->tipo = "nave";
                    //     $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "prediseniada";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "RECOLECTOR":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "ligera";
                    //     $fuselaje->tipo = "nave";
                    //     $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "prediseniada";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "REMOLCADOR":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "masiva";
                    //     $fuselaje->tipo = "nave";
                    //     $fuselaje->tnave = "5";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "prediseniada";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "RA":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "estacion";
                    //     $fuselaje->tipo = "nave";
                    //     $fuselaje->tnave = "4";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "prediseniada";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;


                    // case "OBSERVADOR":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "ligera";
                    //     $fuselaje->tipo = "nave";
                    //     $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "prediseniada";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                case "ISIS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "compra";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "WUKONG":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "caza";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "0";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "compra";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ENLIL":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "compra";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "ESUS":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "compra";
                    array_push($fuselajes, $fuselaje);
                    break;


                case "BAAL":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "nave";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "compra";
                    array_push($fuselajes, $fuselaje);
                    break;

                    /*

                //DEFENSAS ///////////////////////////////////////////////////////////////////////////
                // Ligeras
                case "YETI":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "CROM":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "DAGON":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "HASTUR":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "VALKIRIA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "KITSUNE":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "AZAZEL":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "NAZGUL":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "ligera";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "1";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                // case "BALROG":
                //     $fuselaje = new Fuselajes();
                //     $fuselaje->codigo = $codigo;
                //     $fuselaje->tamanio = "ligera";
                //     $fuselaje->tipo = "defensa";
                //     $fuselaje->tnave = "1";
                //     $fuselaje->coste = 0;
                //     $fuselaje->categoria = "jugador";
                //     array_push($fuselajes, $fuselaje);
                //     break;

                // case "CTHULHU":
                //     $fuselaje = new Fuselajes();
                //     $fuselaje->codigo = $codigo;
                //     $fuselaje->tamanio = "ligera";
                //     $fuselaje->tipo = "defensa";
                //     $fuselaje->tnave = "1";
                //     $fuselaje->coste = 0;
                //     $fuselaje->categoria = "jugador";
                //     array_push($fuselajes, $fuselaje);
                //     break;

                // case "MORLOCK":
                //     $fuselaje = new Fuselajes();
                //     $fuselaje->codigo = $codigo;
                //     $fuselaje->tamanio = "ligera";
                //     $fuselaje->tipo = "defensa";
                //     $fuselaje->tnave = "1";
                //     $fuselaje->coste = 0;
                //     $fuselaje->categoria = "jugador";
                //     array_push($fuselajes, $fuselaje);
                //     break;

                // case "SARLACC":
                //     $fuselaje = new Fuselajes();
                //     $fuselaje->codigo = $codigo;
                //     $fuselaje->tamanio = "ligera";
                //     $fuselaje->tipo = "defensa";
                //     $fuselaje->tnave = "1";
                //     $fuselaje->coste = 0;
                //     $fuselaje->categoria = "jugador";
                //     array_push($fuselajes, $fuselaje);
                //     break;

                // case "RATHTARS":
                //     $fuselaje = new Fuselajes();
                //     $fuselaje->codigo = $codigo;
                //     $fuselaje->tamanio = "ligera";
                //     $fuselaje->tipo = "defensa";
                //     $fuselaje->tnave = "1";
                //     $fuselaje->coste = 0;
                //     $fuselaje->categoria = "jugador";
                //     array_push($fuselajes, $fuselaje);
                //     break;

                // case "ROC":
                //     $fuselaje = new Fuselajes();
                //     $fuselaje->codigo = $codigo;
                //     $fuselaje->tamanio = "ligera";
                //     $fuselaje->tipo = "defensa";
                //     $fuselaje->tnave = "1";
                //     $fuselaje->coste = 0;
                //     $fuselaje->categoria = "jugador";
                //     array_push($fuselajes, $fuselaje);
                //     break;


                    // Medias
                case "ARPÍA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "WYVERN":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "MANTÍCORA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "DRAGÓN":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "FÉNIX":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "DALEK":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "BYAKKO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "media";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "2";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;



                    //Pesadas
                case "CÍCLOPE":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "ORCO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "TROLL":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "OGRO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "ETTIN":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "NECROCOLOSO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "RANCOR":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "pesada";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "3";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;



                    // Estacion
                case "BISILISCO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "CENTAURO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "CANCERBERO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "RAKSHASA":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "LICÁNTROPO":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "SHOGGOTZ":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;

                case "UNGOLIANTH":
                    $fuselaje = new Fuselajes();
                    $fuselaje->codigo = $codigo;
                    $fuselaje->tamanio = "estacion";
                    $fuselaje->tipo = "defensa";
                    $fuselaje->tnave = "4";
                    $fuselaje->coste = 0;
                    $fuselaje->categoria = "jugador";
                    array_push($fuselajes, $fuselaje);
                    break;



                    //Mechas
                    // case "GORGONA":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "mech";
                    //     $fuselaje->tipo = "defensa";
                    //     $fuselaje->tnave = "10";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "jugador";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "NAGA":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "mech";
                    //     $fuselaje->tipo = "defensa";
                    //     $fuselaje->tnave = "10";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "jugador";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "HIDRA":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "mech";
                    //     $fuselaje->tipo = "defensa";
                    //     $fuselaje->tnave = "10";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "jugador";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "LEVIATÁN":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "mech";
                    //     $fuselaje->tipo = "defensa";
                    //     $fuselaje->tnave = "10";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "jugador";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "KRAKEN":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "mech";
                    //     $fuselaje->tipo = "defensa";
                    //     $fuselaje->tnave = "10";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "jugador";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;



                    //     //MegaBots
                    // case "HOMÚNCULO":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "megaBot";
                    //     $fuselaje->tipo = "defensa";
                    //     $fuselaje->tnave = "11";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "jugador";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "GARGOLA":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "megaBot";
                    //     $fuselaje->tipo = "defensa";
                    //     $fuselaje->tnave = "11";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "jugador";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    // case "GOLEM":
                    //     $fuselaje = new Fuselajes();
                    //     $fuselaje->codigo = $codigo;
                    //     $fuselaje->tamanio = "megaBot";
                    //     $fuselaje->tipo = "defensa";
                    //     $fuselaje->tnave = "11";
                    $fuselaje->coste = 0;
                    //     $fuselaje->categoria = "jugador";
                    //     array_push($fuselajes, $fuselaje);
                    //     break;

                    */
            }
        }







        foreach ($fuselajes as $estefuselaje) {
            $estefuselaje->save();
            $costesFuselajes = $costesFuselaje->generarDatosCostesFuselajes($estefuselaje->codigo, $estefuselaje->id);
            $costesFuselajes->save();
            $cualidadesFuselajes = $cualidadesFuselaje->generarDatosCualidadesFuselajes($estefuselaje->codigo, $estefuselaje->id);
            $cualidadesFuselajes->save();
        }

        //return $result;
    }
}
