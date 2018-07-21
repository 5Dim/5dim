<?php

namespace App;
use App\Constantes;

use Illuminate\Database\Eloquent\Model;

class CostesFuselajes extends Model
{
    public $timestamps = false;

    public function fuselajes ()
    {
        return $this->belongsTo(Fuselajes::class);
    }


    public function  generarDatosCostesFuselajes($codigo,$fuselajes_id)
    {
        $costesc = new CostesFuselajes();

        $constantes=Constantes::where('tipo','fuselajes')->get();;

        /// naves   ///////////////////////////////////////////

        /// $factn es factor de ajuste de cada nave individual
        switch($codigo){
            case "XG":
            $Tnave = "caza";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "MIZAR":
            $Tnave = "ligera";
            $factn=.6;
            $r1cce = [$codigo,30000,8000,5000,20000,4500,5000,11000,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "HIDRA":
            $Tnave = "ligera";
            $factn=.65;
            $r1cce = [$codigo,35000,10000,5000,25000,30000,15000,30000, 2,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "MEDUSA":
            $Tnave = "ligera";
            $factn=.85;
            $r1cce = [$codigo,20000,8000,10000,10000,30000,8000,25000, 3,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "DEFENSOR":
            $Tnave = "media";
            $factn=.9;
            $r1cce = [$codigo,100000,40000,20000,10000,60000,10000,35000, 6,20];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "VG":
            $Tnave = "caza";
            $factn=.85;
            $r1cce = [$codigo,6000,200,0,300,20,5,15, 5,20];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "NEBULA":
            $Tnave = "media";
            $factn=1.5;
            $r1cce = [$codigo,150000,100000,55000,80000,40000,15000,55000, 0,20];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "VENGANZA":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,100000,80000,50000,40000,55000,58000,45000, 0,20];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "MITRA":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,90000,50000,25000,8000,20000,2000,15000, 0,30];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "CERBERO":
            $Tnave = "estacion";
            $factn=2;
            $r1cce = [$codigo,200000,50000,200000,90000,30000,100000,55000, 0,2000];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "DEDALO":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,300000,40000,60000,20000,60000,10000,15000, 0,60];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "YG":
            $Tnave = "caza";
            $factn=1;
            $r1cce = [$codigo,8000,2500,0,1000,0,10,10, 0,1];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "COBRA":
            $Tnave = "ligera";
            $factn=.8;
            $r1cce = [$codigo,50000,10000,5000,15000,20000,15000,35000, 0,10];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "OPHIR":
            $Tnave = "ligera";
            $factn=1;
            $r1cce = [$codigo,15000,10000,15000,10000,5000,15000,10000, 0,60];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "NEMESIS":
            $Tnave = "pesada";
            $factn=.9;
            $r1cce = [$codigo,800000,300000,130000,100000,160000,100000,65000, 0,600];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "TARTESO":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,280000,80000,10000,40000,50000,20000,35000, 0,150];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ECLIPSE":
            $Tnave = "ligera";
            $factn=1;
            $r1cce = [$codigo,60000,25000,18000,8000,5000,13000,8000, 0,190];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "LEVIATAN":
            $Tnave = "pesada";
            $factn=1;
            $r1cce = [$codigo,1500000,500000,130000,130000,260000,90000,65000, 0,1500];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "RAPTOR":
            $Tnave = "ligera";
            $factn=.8;
            $r1cce = [$codigo,45000,8000,4000,20000,20000,10000,15000,1.5, 0,75];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "FENIX":
            $Tnave = "pesada";
            $factn=1;
            $r1cce = [$codigo,1500000,1000000,350000,60000,100000,130000,400000,.5, 0,750];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "NABUCO":
            $Tnave = "ligera";
            $factn=.8;
            $r1cce = [$codigo,40000,9000,5000,15000,2000,8000,13000,1.5, 0,70];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "HERA":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,400000,250000,15000,50000,25000,10000,45000,1.0, 0,80];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "LUNA":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,250000,150000,10000,30000,35000,8000,25000,.8, 0,40];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "SG":
            $Tnave = "caza";
            $factn=.85;
            $r1cce = [$codigo,10000,2000,0,800,0,8,8,0, 0,1];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "VALKIRIA":
            $Tnave = "ligera";
            $factn=.8;
            $r1cce = [$codigo,55000,6000,8000,15000,2500,10000,50000,1.8, 0,4];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "EUFORIA":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,500000,300000,150000,170000,8000,32000,35000,1, 0,40];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "TRAUMA":
            $Tnave = "pesada";
            $factn=.9;
            $r1cce = [$codigo,6500000,3500000,200000,650000,300000,190000,105000,1.1, 0,110];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "FRAGMA":
            $Tnave = "estacion";
            $factn=2;
            $r1cce = [$codigo,1500000,600000,600000,600000,350000,200000,55000,1, 0,700];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "BASALTO":
            $Tnave = "estacion";
            $factn=2;
            $r1cce = [$codigo,5000000,2000000,3000000,2300000,450000,1000000,135000,.8, 0,650];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "HELIOS":
            $Tnave = "pesada";
            $factn=2.5;
            $r1cce = [$codigo,2000000,300000,150000,500000,200000,200000,35000,.8, 0,110];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "EBOLA":
            $Tnave = "pesada";
            $factn=1.2;
            $r1cce = [$codigo,6500000,2400000,800000,1250000,250000,200000,305000,1.3, 0,450];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "AQUILES":
            $Tnave = "pesada";
            $factn=1.3;
            $r1cce = [$codigo,6000000,3000000,750000,1950000,100000,300000,605000,1.1, 0,850];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ESCORPION":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,400000,350000,130000,65000,15000,42000,45000,.6, 0,3];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "PULSAR":
            $Tnave = "media";
            $factn=1.1;
            $r1cce = [$codigo,850000,650000,230000,165000,25000,42000,35000,.5, 0,20];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "SONDA":
            $Tnave = "ligera";
            $factn=1;
            $r1cce = [$codigo,100,150,0,100,10000,2000,5000,.4, 0,1];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "FALCATA":
            $Tnave = "caza";
            $factn=.85;
            $r1cce = [$codigo,12000,1500,0,500,0,5,5,1.2, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "NIOBE":
            $Tnave = "media";
            $factn=1.1;
            $r1cce = [$codigo,1000000,600000,200000,205000,20000,62000,38000,1, 0,140];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "NOMADA":
            $Tnave = "ligera";
            $factn=.9;
            $r1cce = [$codigo,65000,10000,16000,20000,25000,9000,18000,.5, 0,30];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "CETUS":
            $Tnave = "pesada";
            $factn=2.2;
            $r1cce = [$codigo,6000000,2100000,250000,1300000,300000,180000,50000,1, 0,190];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "FOBOS":
            $Tnave = "media";
            $factn=.9;
            $r1cce = [$codigo,12000,30000,18000,90000,65000,5000,15000,1, 0,10];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "AGAMENON":
            $Tnave = "media";
            $factn=1.4;
            $r1cce = [$codigo,170000,100000,55000,70000,35000,10000,45000,1, 0,190];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "VARUNA":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,150000,55000,35000,13000,65000,65000,45000,1, 0,190];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "BERSERKER":
            $Tnave = "pesada";
            $factn=.9;
            $r1cce = [$codigo,2500000,800000,130000,100000,110000,80000,50000,1, 0,240];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "AGRESOR":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,80000,35000,15000,15000,7000,3000,5000,1.2, 0,100];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "VULCANO":
            $Tnave = "pesada";
            $factn=.9;
            $r1cce = [$codigo,6000000,3000000,300000,880000,200000,220000,75000,1, 0,240];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "DENIX":
            $Tnave = "estacion";
            $factn=2;
            $r1cce = [$codigo,4000000,1800000,2000000,1900000,590000,1000000,185000, 0,1400];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "OBITUS":
            $Tnave = "media";
            $factn=1.0;
            $r1cce = [$codigo,950000,670000,200000,145000,22000,52000,95000,1, 0,140];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "CARONTE":
            $Tnave = "estacion";
            $factn=2;
            $r1cce = [$codigo,1550000,500000,200000,95000,59000,150000,35000,1, 0,1000];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "VERMIS":
            $Tnave = "media";
            $factn=1.5;
            $r1cce = [$codigo,180000,110000,57000,85000,35000,13000,35000,1, 0,340];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "HATHOR":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,100000,60000,190000,85000,65000,60000,42000,1, 0,140];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "TEOTL":
            $Tnave = "pesada";
            $factn=1;
            $r1cce = [$codigo,6000000,3000000,300000,60000,80000,100000,300000,1, 0,1540];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "YGR":
            $Tnave = "caza";
            $factn=1;
            $r1cce = [$codigo,8500,2600,0,800,500,1,1,1, 0,1];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ISHTAR":
            $Tnave = "ligera";
            $factn=.8;
            $r1cce = [$codigo,55000,12000,8000,19000,10000,18000,30000,1, 0,10];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "CROM":
            $Tnave = "pesada";
            $factn=.9;
            $r1cce = [$codigo,10500000,4200000,220000,600000,350000,250000,125000,1.5, 0,2800];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "FREYJA":
            $Tnave = "pesada";
            $factn=1.2;
            $r1cce = [$codigo,5900000,3400000,1000000,1950000,200000,250000,345000,2, 0,3440];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "INTI":
            $Tnave = "media";
            $factn=1.5;
            $r1cce = [$codigo,150000,120000,50000,75000,30000,12000,65000,.5, 0,100];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "BARRACUDA":
            $Tnave = "ligera";
            $factn=.85;
            $r1cce = [$codigo,35000,4000,5000,5000,20000,4000,10000,.3, 0,100];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "KALI":
            $Tnave = "estacion";
            $factn=2;
            $r1cce = [$codigo,2800000,1000000,200000,95000,200000,180000,105000, 0,5140];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "MARDUK":
            $Tnave = "pesada";
            $factn=1;
            $r1cce = [$codigo,6000000,2500000,300000,50000,80000,100000,200000,1, 0,1400];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "NIMROD":
            $Tnave = "pesada";
            $factn=.9;
            $r1cce = [$codigo,4000000,1000000,100000,110000,170000,70000,80000,.7, 0,3240];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "LORICA":
            $Tnave = "media";
            $factn=1.5;
            $r1cce = [$codigo,250000,120000,155000,180000,50000,25000,50000,1, 0,1340];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "NOVA":
            $Tnave = "pesada";
            $factn=1.1;
            $r1cce = [$codigo,7500000,3500000,300000,65000,70000,160000,300000, 0,140];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ASUR":
            $Tnave = "pesada";
            $factn=1;
            $r1cce = [$codigo,8500000,3900000,350000,680000,250000,210000,150000,.7, 0,340];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "CASANDRA":
            $Tnave = "pesada";
            $factn=1.0;
            $r1cce = [$codigo,12500000,4000000,500000,68000,100000,170000,280000,1.2, 0,940];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "PLACA TERMICA":
            $Tnave = "caza";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,10];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "MAMPARO":
            $Tnave = "ligera";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "CUADERNA":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ESTRUCTURA":
            $Tnave = "pesada";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "RECOLECTOR":
            $Tnave = "ligera";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "REMOLCADOR":
            $Tnave = "pesada";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ANUBIS":
            $Tnave = "estacion";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "BENGALA":
            $Tnave = "ligera";
            $factn=1;
            $r1cce = [$codigo,5000,150,0,100,2,3,5,1, 0,2];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ISIS":
            $Tnave = "media";
            $factn=1.5;
            $r1cce = [$codigo,150000,120000,50000,75000,30000,12000,65000,1, 0,40];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "WUKONG":
            $Tnave = "caza";
            $factn=.95;
            $r1cce = [$codigo,10000,2000,1500,1800,500,8,8,1, 0,40];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ENLIL":
            $Tnave = "media";
            $factn=1;
            $r1cce = [$codigo,120000,82000,50000,40000,60000,60000,40000,1, 0,40];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "ESUS":
            $Tnave = "ligera";
            $factn=.8;
            $r1cce = [$codigo,60000,7000,8000,15000,-25000,10000,50000,1, 0,80];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;

            case "BAAL":
            $Tnave = "pesada";
            $factn=.9;
            $r1cce = [$codigo,8000000,3000000,300000,880000,200000,220000,75000,1, 0,400];
            $coste = $costesc->calculos($r1cce,$constantes,$fuselajes_id,'nave',$Tnave,$factn);
            break;




        }

        /// defensas  ///////////////////////////////////////////


        // tropas   ///////////////////////////////////////////

        return $coste;

    }

    function calculos($r1cce,$constantes,$fuselajes_id,$tipo,$tamano,$factn){

        $coste =new CostesFuselajes();

            $factorCostoT=$constantes->where('codigo','fuselaje'.$tipo.'RecursosTodas')->first()->valor;
            $factorCosto=$constantes->where('codigo','fuselaje'.$tipo.'Recursos'.$tamano)->first()->valor;
            $factorPuntos=$constantes->where('codigo','fuselajenaveCostoPuntosTodas')->first()->valor;

        $n=1;

        $coste->fuselajes_id = $fuselajes_id;
        $coste->mineral=(int)($r1cce[$n] *$factn * $factorCosto * $factorCostoT); $n++;
        $coste->cristal=(int)($r1cce[$n] *$factn * $factorCosto * $factorCostoT); $n++;
        $coste->gas=    (int)($r1cce[$n] *$factn * $factorCosto * $factorCostoT); $n++;
        $coste->plastico=(int)($r1cce[$n] *$factn * $factorCosto * $factorCostoT); $n++;
        $coste->ceramica=(int)($r1cce[$n] *$factn * $factorCosto * $factorCostoT); $n++;
        $coste->liquido=(int)($r1cce[$n] *$factn * $factorCosto * $factorCostoT); $n++;
        $coste->micros=(int)($r1cce[$n] *$factn * $factorCosto * $factorCostoT); $n++;
        $coste->personal=(int)($r1cce[$n] *$factn * $factorCosto * $factorCostoT); $n++;

        if ($r1cce[$n] +$factorPuntos>-1){
            $coste->puntos=$r1cce[$n] +$factorPuntos;
        }   else {
            $coste->puntos=0;
        }


        return($coste);

    }

}