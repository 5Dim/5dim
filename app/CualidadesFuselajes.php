<?php

namespace App;
use App\Constantes;

use Illuminate\Database\Eloquent\Model;

class CualidadesFuselajes extends Model
{
    public $timestamps = false;

    public function fuselajes ()
    {
        return $this->belongsTo(Fuselajes::class);
    }


    public function  generarDatosCualidadesFuselajes($codigo,$fuselajes_id)
    {
        $costesc = new CualidadesFuselajes();

        $constantes=Constantes::where('tipo','fuselajes')->get();

        /// naves   ///////////////////////////////////////////


        switch($codigo){
            case "XG":
            $cualidades = [$codigo,1,2,1,1,1,.7,1.2,0,0,0,1];
            $armas = [2,0,0,0,0,0,0,0,0,9,10,1];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave','caza');
            break;


            case "MIZAR":
            $Tnave = "ligera";
            $cualidades = [$codigo,1,1,1,1,1.5,5,12,1];
            $armas = [2,0,0,0,0,2,0,2,0,0,9,10,1];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "HIDRA":
            $Tnave = "ligera";
            $cualidades = [$codigo,1,1,1,.5,.8,6,2,1];
            $armas = [2,1,0,0,0,2,1,0,0,0,12,8,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "MEDUSA":
            $Tnave = "ligera";
            $cualidades = [$codigo,.8,1,1,.7,1.3,4.5,2,1];
            $armas = [4,2,0,0,0,1,0,8,0,0,12,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "DEFENSOR":
            $Tnave = "media";
            $cualidades = [$codigo,1,1,1,.8,1.2,6,10,1];
            $armas = [12,4,0,0,0,0,4,0,0,0,21,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "VG":
            $Tnave = "caza";
            $cualidades = [$codigo,1,1,1,1,1,0,0,1];
            $armas = [4,0,0,0,0,0,0,0,0,0,9,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "NEBULA":
            $Tnave = "media";
            $cualidades = [$codigo,1.5,1,1,.7,.8,8.5,10,1];
            $armas = [8,2,0,0,0,0,1,40,2,0,21,13,5];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "VENGANZA":
            $Tnave = "media";
            $cualidades = [$codigo,1,1.1,1,1,1.1,10,14,1];
            $armas = [4,1,0,0,0,1,1,2,1,0,24,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "MITRA":
            $Tnave = "media";
            $cualidades = [$codigo,1,.9,1.1,1.2,.6,12,10,1];
            $armas = [3,0,0,0,0,0,6,0,0,0,24,13,3];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "CERBERO":
            $Tnave = "estacion";
            $cualidades = [$codigo,1,1.8,1.1,1.1,.8,0,4,1];
            $armas = [20,10,0,0,0,1,1,20,0,0,37,20,8];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "DEDALO":
            $Tnave = "media";
            $cualidades = [$codigo,2.6,.7,1.2,.7,.9,15,$Tnave*(20/((2*$Tnave)+.000001)),1];
            $armas = [6,2,0,0,0,0,6,90,4,0,39,13,3];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "YG":
            $Tnave = "caza";
            $cualidades = [$codigo,1,1.5,1,.8,1.2,0,$Tnave*(20/((2*$Tnave)+.000001)),1];
            $armas = [2,0,0,0,0,0,1,0,0,0,18,10,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "COBRA":
            $Tnave = "ligera";
            $cualidades = [$codigo,1.1,1.1,1.0,.8,1.1,15,15,1];
            $armas = [3,3,0,0,0,0,2,0,0,0,27,13,3];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "OPHIR":
            $Tnave = "ligera";
            $cualidades = [$codigo,3.6,1,.4,.5,.5,14,$Tnave*(20/((2*$Tnave)+.000001)),1];
            $armas = [0,0,0,0,0,0,0,20,0,0,21,10,5];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "NEMESIS":
            $Tnave = "pesada";
            $cualidades = [$codigo,1,1.3,1,1,1,14,12,1];
            $armas = [10,15,1,0,0,0,2,0,3,0,31,10,6];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "TARTESO":
            $Tnave = "media";
            $cualidades = [$codigo,2.6,1.4,1.2,1.2,1.9,19,14,1];
            $armas = [3,3,1,0,0,3,2,30,2,0,40,13,6];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ECLIPSE":
            $Tnave = "ligera";
            $cualidades = [$codigo,3,1.3,.7,1.6,.9,12,12,1];
            $armas = [0,0,0,0,0,0,0,30,0,0,21,10,1];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "LEVIATAN":
            $Tnave = "pesada";
            $cualidades = [$codigo,3,18,1.0,.7,.7,20,18,1];
            $armas = [60,10,3,0,0,0,5,0,0,0,60,13,8];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "RAPTOR":
            $Tnave = "ligera";
            $cualidades = [$codigo,1,1.1,1.1,.7,1,16,14,1];
            $armas = [2,0,1,0,0,2,0,0,0,0,24,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "FENIX":
            $Tnave = "pesada";
            $cualidades = [$codigo,1.8,.8,.7,1.7,1,18,18,1];
            $armas = [4,0,2,1,0,2,0,0,6,1,41,13,8];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "NABUCO":
            $Tnave = "ligera";
            $cualidades = [$codigo,.8,1.5,1,1.1,1.5,14,18,1];
            $armas = [4,4,0,0,0,2,3,0,0,0,31,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "HERA":
            $Tnave = "media";
            $cualidades = [$codigo,.8,1.5,1,1.0,.7,14,18,1];
            $armas = [12,6,0,2,0,2,3,0,0,0,35,16,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "LUNA":
            $Tnave = "media";
            $cualidades = [$codigo,.7,1.9,1.5,1.5,1.7,10,16,1];
            $armas = [6,2,0,0,0,20,0,0,0,0,21,20,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "SG":
            $Tnave = "caza";
            $cualidades = [$codigo,.5,1.6,.6,1.0,1.2,0,0,1];
            $armas = [6,0,0,0,0,0,0,0,0,0,12,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "VALKIRIA":
            $Tnave = "ligera";
            $cualidades = [$codigo,1.0,1.1,.8,1.0,0.9,14,18,1];
            $armas = [4,1,0,0,0,0,1,0,0,0,27,12,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "EUFORIA":
            $Tnave = "media";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,9,16,1];
            $armas = [4,4,3,2,0,0,4,0,0,0,31,15,6];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "TRAUMA":
            $Tnave = "pesada";
            $cualidades = [$codigo,2.4,8.2,1.1,1.3,.9,13,16,1];
            $armas = [10,10,9,0,0,5,10,20,0,0,45,24,8];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "FRAGMA":
            $Tnave = "estacion";
            $cualidades = [$codigo,3.7,4.9,1.0,.8,0.7,7,3,1];
            $armas = [10,15,6,0,0,0,5,50,2,0,52,26,12];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "BASALTO":
            $Tnave = "estacion";
            $cualidades = [$codigo,5.7,10.9,1.2,1.1,1.7,12,2,1];
            $armas = [5,20,12,4,0,0,10,75,6,1,45,26,12];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "HELIOS":
            $Tnave = "pesada";
            $cualidades = [$codigo,2.7,.6,.5,.6,.5,12,18,1];
            $armas = [0,2,0,0,0,4,0,20,16,4,27,10,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "EBOLA":
            $Tnave = "pesada";
            $cualidades = [$codigo,4.7,15.9,1.8,1.7,2.0,16,19,1];
            $armas = [8,16,4,1,0,0,40,4,0,0,54,26,6];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "AQUILES":
            $Tnave = "pesada";
            $cualidades = [$codigo,3.7,10.9,2.5,2.0,1.0,18,19,1];
            $armas = [0,5,0,0,0,0,30,0,0,0,64,13,8];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ESCORPION":
            $Tnave = "media";
            $cualidades = [$codigo,1,1.3,0.5,1.0,1.2,12,16,1];
            $armas = [6,6,1,0,0,0,4,0,0,0,21,13,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "PULSAR":
            $Tnave = "media";
            $cualidades = [$codigo,3.7,1.5,1.0,.8,1.0,18,19,1];
            $armas = [12,6,2,1,0,0,3,0,0,0,39,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "SONDA":
            $Tnave = "ligera";
            $cualidades = [$codigo,1.7,1.0,.2,.5,.5,16,19,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,6,6,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "FALCATA":
            $Tnave = "caza";
            $cualidades = [$codigo,.7,1.8,.8,.6,1.1,10,0,1];
            $armas = [6,0,0,0,0,0,1,0,0,0,21,9,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "NIOBE":
            $Tnave = "media";
            $cualidades = [$codigo,1,2.0,1.0,1.3,1.6,16,20,1];
            $armas = [2,10,4,0,0,1,2,10,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "NOMADA":
            $Tnave = "ligera";
            $cualidades = [$codigo,4.5,1.0,.8,.6,1.1,16,18,1];
            $armas = [6,4,0,0,0,0,0,35,0,0,27,6,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "CETUS":
            $Tnave = "pesada";
            $cualidades = [$codigo,10.5,1.1,2.0,1.2,0.6,16,16,1];
            $armas = [4,0,0,0,0,0,1,200,0,0,45,13,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "FOBOS":
            $Tnave = "media";
            $cualidades = [$codigo,1.8,1.9,.8,.7,1.6,12,14,1];
            $armas = [10,8,0,0,0,0,2,20,0,0,27,20,8];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "AGAMENON":
            $Tnave = "media";
            $cualidades = [$codigo,1,2.2,1.3,1.0,.8,16,16,1];
            $armas = [12,6,2,0,0,0,2,15,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "VARUNA":
            $Tnave = "media";
            $cualidades = [$codigo,1.2,1.1,.7,1.5,1.0,16,16,1];
            $armas = [2,2,1,1,0,0,10,10,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "BERSERKER":
            $Tnave = "pesada";
            $cualidades = [$codigo,1,2.9,1.0,1.0,1.2,16,20,1];
            $armas = [10,10,5,1,0,3,2,0,0,0,45,10,3];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "AGRESOR":
            $Tnave = "media";
            $cualidades = [$codigo,1.4,2.3,1.1,1.6,1.0,15,18,1];
            $armas = [0,3,2,2,0,0,14,0,0,0,27,10,3];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "VULCANO":
            $Tnave = "pesada";
            $cualidades = [$codigo,3.5,2.0,1.0,1.0,1.6,17,20,1];
            $armas = [15,15,10,0,0,0,5,40,10,0,45,18,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "DENIX":
            $Tnave = "estacion";
            $cualidades = [$codigo,4,4.0,1.0,1.8,1.0,2.5,2,1];
            $armas = [24,24,10,0,0,1,8,80,1,0,45,13,10];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "OBITUS":
            $Tnave = "media";
            $cualidades = [$codigo,2.2,2.0,2.0,1.3,1.0,19,20,1];
            $armas = [0,6,3,0,0,0,13,0,0,0,35,16,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "CARONTE":
            $Tnave = "estacion";
            $cualidades = [$codigo,12,1.5,1.0,1.0,1.2,8,3.5,1];
            $armas = [12,9,6,4,0,0,6,60,6,0,45,13,8];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "VERMIS":
            $Tnave = "media";
            $cualidades = [$codigo,6,1.0,.6,.7,1.6,16,18,1];
            $armas = [0,2,0,0,0,0,4,20,1,0,27,10,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "HATHOR":
            $Tnave = "media";
            $cualidades = [$codigo,2.8,1.5,1.3,1.0,1.0,20,16,1];
            $armas = [0,0,2,1,0,5,4,15,1,0,27,13,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "TEOTL":
            $Tnave = "pesada";
            $cualidades = [$codigo,6,2.0,1.3,.6,1.0,20,20,1];
            $armas = [6,8,4,3,0,10,0,20,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "YGR":
            $Tnave = "caza";
            $cualidades = [$codigo,1,1.0,.5,1,1.2,16,0,1];
            $armas = [4,1,0,0,0,0,0,0,0,0,15,9,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ISHTAR":
            $Tnave = "ligera";
            $cualidades = [$codigo,6,1.0,.1,1.8,1.0,16,20,1];
            $armas = [2,0,2,0,0,0,3,8,0,0,27,10,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "CROM":
            $Tnave = "pesada";
            $cualidades = [$codigo,10,2.4,1.0,1.9,1.0,16,20,1];
            $armas = [15,10,6,0,0,0,15,100,4,0,45,18,5];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "FREYJA":
            $Tnave = "pesada";
            $cualidades = [$codigo,3,2.5,1.9,1.5,1.0,25,20,1];
            $armas = [20,10,6,1,0,0,8,50,2,0,45,13,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "INTI":
            $Tnave = "media";
            $cualidades = [$codigo,4,.8,.4,.7,0.6,16,16,1];
            $armas = [10,2,0,0,0,0,0,30,4,0,21,10,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "BARRACUDA":
            $Tnave = "ligera";
            $cualidades = [$codigo,3,1.0,1.0,.6,1.6,16,18,1];
            $armas = [2,0,0,0,0,0,2,25,0,0,27,20,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "KALI":
            $Tnave = "estacion";
            $cualidades = [$codigo,6,1.5,1.0,.3,1.6,16,3,1];
            $armas = [30,15,6,0,0,0,4,400,10,3,45,20,16];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "MARDUK":
            $Tnave = "pesada";
            $cualidades = [$codigo,3,3.0,.5,1.0,1.0,18,20,1];
            $armas = [0,0,12,0,0,2,4,60,6,0,40,13,6];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "NIMROD":
            $Tnave = "pesada";
            $cualidades = [$codigo,1.5,2.8,1.0,1.0,0.6,14,18,1];
            $armas = [15,12,6,0,0,0,3,40,6,0,41,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "LORICA":
            $Tnave = "media";
            $cualidades = [$codigo,2,2.1,.5,0.3,2.6,16,18,1];
            $armas = [12,8,4,0,0,0,5,75,2,0,45,26,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "NOVA":
            $Tnave = "pesada";
            $cualidades = [$codigo,6,1.8,1.0,1.0,1.0,19,20,1];
            $armas = [20,0,4,0,0,0,6,0,15,1,45,13,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ASUR":
            $Tnave = "pesada";
            $cualidades = [$codigo,4,1.5,1.0,.8,1.0,20,20,1];
            $armas = [8,8,4,0,0,4,6,150,10,5,45,18,6];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "CASANDRA":
            $Tnave = "pesada";
            $cualidades = [$codigo,6,2.5,1.5,1.0,.8,20,20,1];
            $armas = [10,12,0,0,0,0,10,200,20,10,45,13,8];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "PLACA TERMICA":
            $Tnave = "caza";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,1,0,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "MAMPARO":
            $Tnave = "ligera";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,1,0,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "CUADERNA":
            $Tnave = "media";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,1,0,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ESTRUCTURA":
            $Tnave = "pesada";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,1,0,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "RECOLECTOR":
            $Tnave = "ligera";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,1,0,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "REMOLCADOR":
            $Tnave = "pesada";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,1,0,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ANUBIS":
            $Tnave = "estacion";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,1,0,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "BENGALA":
            $Tnave = "ligera";
            $cualidades = [$codigo,1,1.0,1.0,1.0,1.0,1,0,1];
            $armas = [0,0,0,0,0,0,0,0,0,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ISIS":
            $Tnave = "media";
            $cualidades = [$codigo,2,1.9,.7,1.2,1.4,19,19,1];
            $armas = [18,1,0,1,0,0,4,30,6,0,45,18,4];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "WUKONG":
            $Tnave = "caza";
            $cualidades = [$codigo,1,1.8,.5,.6,1.6,19,0,1];
            $armas = [2,1,0,0,0,0,2,0,0,0,27,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ENLIL":
            $Tnave = "media";
            $cualidades = [$codigo,2,1.9,.7,1.2,1.4,19,19,1];
            $armas = [4,2,1,10,0,2,1,2,2,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "ESUS":
            $Tnave = "ligera";
            $cualidades = [$codigo,4,1.9,.7,1.2,1.4,17,18,1];
            $armas = [2,2,10,10,0,10,1,10,10,10,45,13,6];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;

            case "BAAL":
            $Tnave = "pesada";
            $cualidades = [$codigo,2,3.5,.8,1.1,1.9,15,19,1];
            $armas = [2,10,5,1,0,5,5,20,5,0,45,13,2];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnave);
            break;



        }

        /// defensas  ///////////////////////////////////////////


        // tropas   ///////////////////////////////////////////

        return $coste;

    }

    function calculos($cualidades,$armas,$constantes,$fuselajes_id,$tipo,$tamano){

        $coste =new CostesFuselajes();

        $factorEnergiaT=$constantes->where('codigo','fuselaje'.$tipo.'EnergiaTodas')->first()->valor;
        $factorEnergia=$constantes->where('codigo','fuselaje'.$tipo.'Energia'.$tamano)->first()->valor;

        $factorDefensaT=$constantes->where('codigo','fuselaje'.$tipo.'DefensaTodas')->first()->valor;
        $factorDefensa=$constantes->where('codigo','fuselaje'.$tipo.'Defensa'.$tamano)->first()->valor;

        $factorCombustibleT=$constantes->where('codigo','fuselaje'.$tipo.'CombustibleTodas')->first()->valor;
        $factorCombustible=$constantes->where('codigo','fuselaje'.$tipo.'Combustible'.$tamano)->first()->valor;

        $factorMantenimientoT=$constantes->where('codigo','fuselaje'.$tipo.'MantenimientoTodas')->first()->valor;
        $factorMantenimiento=$constantes->where('codigo','fuselaje'.$tipo.'Mantenimiento'.$tamano)->first()->valor;

        $factorVelocidadT=$constantes->where('codigo','fuselaje'.$tipo.'VelocidadTodas')->first()->valor;
        $factorVelocidad=$constantes->where('codigo','fuselaje'.$tipo.'Velocidad'.$tamano)->first()->valor;

        $factorTiempoT=$constantes->where('codigo','fuselaje'.$tipo.'TiempoTodas')->first()->valor;
        $factorTiempo=$constantes->where('codigo','fuselaje'.$tipo.'Tiempo'.$tamano)->first()->valor;



        $coste->fuselajes_id = $fuselajes_id;

        $n=1;
        $coste->masa=$cualidades[$n] ;$n++;
        $coste->energia=$cualidades[$n] * $factorEnergiaT * $factorEnergia;$n++;
        $coste->tiempo=$cualidades[$n] * $factorTiempo *$factorTiempo;$n++;
        $coste->mantenimiento=$cualidades[$n] *$factorMantenimientoT * $factorMantenimiento;$n++;
        $coste->defensa=$cualidades[$n] * $factorDefensaT * $factorDefensa;$n++;
        $coste->velocidad=$cualidades[$n] * $factorVelocidadT * $factorVelocidad;$n++;
        $coste->velocidadMax=$cualidades[$n] ;$n++;
        $coste->gastoFuel=$cualidades[$n] * $factorCombustibleT * $factorCombustible;$n++;

        $n=0;
        $coste->armasLigera=$armas[$n] ;$n++;
        $coste->armasMedia=$armas[$n] ;$n++;
        $coste->armasPesadas=$armas[$n] ;$n++;
        $coste->armasInsertada=$armas[$n] ;$n++;
        $coste->armasBombas=$armas[$n] ;$n++;
        $coste->armasMisiles=$armas[$n] ;$n++;

        $coste->cargaPequeña=$armas[$n] ;$n++;
        $coste->cargaMedia=$armas[$n] ;$n++;
        $coste->cargaGrande=$armas[$n] ;$n++;

        $coste->mejoras=$armas[$n];$n++;
        $coste->blindajes=$armas[$n];$n++;
        $coste->motores=$armas[$n];$n++;

        return($coste);

    }

}