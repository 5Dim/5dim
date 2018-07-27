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

            case  "XG":// sin espacios ni signos
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=2;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;	// energía
            $inirec14=1; //tiempo
            $inirec15=.7; //moneda
            $inirec16=1.2;  //defensa
            $inirec18=0;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$Tnave*(20/(2*$Tnave+.000001)); // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 			//cantidad tipos cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 			//cantidad tipos cañones media, cantidad por tipo
            $CRnave3 = 0; 			//cantidad tipos cañones pesados, cantidad por tipo
            $CRnave4 = 0; 			//cantidad tipos cañones insertado, cantidad por tipo
            $CRnave5 = 0; 			//cantidad tipos DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 			//cantidad tipos bombas, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 			//cantidad tipos cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 			//cantidad tipos CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 			//cantidad tipos CARGA MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 		//cantidad tipos CARGA GRANDE, cantidad por tipo
            $CRnave11 = 9;	 		//mejoras
            $CRnave12 = 10;	 		// blindajes
            $CRnave13 = 1;	 		// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "MIZAR":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=2;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;	// energía
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1.5;  //defensa
            $inirec18=5;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=12; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 2; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 2; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 9;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 1;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HIDRA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=2;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;	// energía
            $inirec14=1; //tiempo
            $inirec15=.5; //moneda
            $inirec16=.8;  //defensa
            $inirec18=6;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 1; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 2; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 12;	 	//mejoras
            $CRnave12 = 8;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;



            case  "MEDUSA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec7=25000;
            $inirec8=1;
            $inirec11=2;
            $inirec12= .8;
            $inirec13=1;	// energía
            $inirec14=1; //tiempo
            $inirec15=7; //moneda
            $inirec16=1.3;  //defensa
            $inirec18=4.5;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 1; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 8; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 12;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "DEFENSOR":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec7=35000;
            $inirec8=$ec9=0;$inirec10=0;
            $inirec11=20;
            $inirec12=1;  ///de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=	// energía
            $inirec14=1; //tiempo
            $inirec15=8; //moneda
            $inirec16=1.2;  //defensa
            $inirec18=6;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 12; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 4; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 4; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 21;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "VG":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=20;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;	// energía
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1;  //defensa
            $inirec18=0;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 9;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NEBULA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=20;
            $inirec12=1.5; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;	// energía
            $inirec14=1; //tiempo
            $inirec15=.7; //moneda
            $inirec16=.8;  //defensa
            $inirec18=8.5;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 8; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 40; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 2; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 21;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 5;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "VENGANZA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=20;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.1;	// energía
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1.1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=10;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=14; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 1; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 1; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 2; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 1; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 24;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "MITRA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=30;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=.9;	// energía
            $inirec14=1.1; //tiempo
            $inirec15=1.2; //moneda
            $inirec16=.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=12;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 3; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 6; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 24;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 3;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "CERBERO":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=2000;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.8;	// energía
            $inirec14=1.1; //tiempo
            $inirec15=1.1; //moneda
            $inirec16=.8;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=0;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=4; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 20; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 1; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 37;	 	//mejoras
            $CRnave12 = 20;	 	// blindajes
            $CRnave13 = 8;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "DEDALO":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=60;
            $inirec12=2.6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=.7;	// energía
            $inirec14=1.2; //tiempo
            $inirec15=.7; //moneda
            $inirec16=.9;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=15;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 6; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 90; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 4; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 39;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 3;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "YG":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=1;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.5;	// energía
            $inirec14=1; //tiempo
            $inirec15=.8; //moneda
            $inirec16=1.2;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=0;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 18;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "COBRA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1.1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.1;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=.8; //moneda
            $inirec16=1.1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=15;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=15; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 3; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 3; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 3;	 	// motores



            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "OPHIR":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=60;
            $inirec12=3.6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;	// energía
            $inirec14=.4; //tiempo
            $inirec15=.5; //moneda
            $inirec16=.5;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=14;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=$inirec18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 21;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 5;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NEMESIS":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=600;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.3;	// energía
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=14;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=12; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 10; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 15; 	// cañones media, cantidad por tipo
            $CRnave3 = 1; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 3; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 31;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 6;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "TARTESO":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=150;
            $inirec12=2.6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.4;	// energía
            $inirec14=1.2; //tiempo
            $inirec15=1.2; //moneda
            $inirec16=1.9;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=19;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=19; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 3; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 3; 	// cañones media, cantidad por tipo
            $CRnave3 = 1; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 3; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 30; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 2; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 40;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 6;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ECLIPSE":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=190;
            $inirec12=3; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.3;	// energía
            $inirec14=.7; //tiempo
            $inirec15=1.6; //moneda
            $inirec16=.9;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=12;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=12; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 30; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 21;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 1;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "LEVIATAN":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=1500;
            $inirec12=3; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=18;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=.7; //moneda
            $inirec16=.7;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=20;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 60; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 3; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 5; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 60;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 8;	 	// motores



            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "RAPTOR":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.1;	// energía
            $inirec14=1.1; //tiempo
            $inirec15=.7; //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=14;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 1; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 2; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 24;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "FENIX":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.5;
            $inirec11=750;
            $inirec12=1.8; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=.8;	// energía
            $inirec14=.7; //tiempo
            $inirec15=1.7; //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=18;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 2; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 2; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 6; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 1;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 41;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 8;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NABUCO":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=70;
            $inirec12=.8; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.5;	// energía
            $inirec14=1; //tiempo
            $inirec15=1.1; //moneda
            $inirec16=1.5;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=14;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 4; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 2; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 3; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 31;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "HERA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1.0;
            $inirec11=80;
            $inirec12=.8; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.5;	// energía
            $inirec14=1; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=.7;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=14;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 12; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 6; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 2; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 2; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 3; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 35;	 	//mejoras
            $CRnave12 = 16;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "LUNA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=.8;
            $inirec11=40;
            $inirec12=.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.9;	// energía
            $inirec14=1.5; //tiempo
            $inirec15=1.5; //moneda
            $inirec16=1.7;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=10;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 20; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 21;	 	//mejoras
            $CRnave12 = 20;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SG":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=0;
            $inirec11=1;
            $inirec12=.5; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.6;	// energía
            $inirec14=.6; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.2;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=0;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 12;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "VALKIRIA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1.8;
            $inirec11=4;
            $inirec12=1.0; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.1;	// energía
            $inirec14=.8; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=0.9;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=14;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 1; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "EUFORIA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=40;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=9;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 15; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 2; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 31;	 	//mejoras
            $CRnave12 = 15;	 	// blindajes
            $CRnave13 = 6;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "TRAUMA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.1;
            $inirec11=110;
            $inirec12=2.4; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=8.2;	// energía
            $inirec14=1.1; //tiempo
            $inirec15=1.3; //moneda
            $inirec16=.9;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=13;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 10; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 9; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 5; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 10; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 24;	 	// blindajes
            $CRnave13 = 8;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "FRAGMA":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=700;
            $inirec12=3.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=4.9;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=.8; //moneda
            $inirec16=0.7;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=7;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=3; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 10; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 15; 	// cañones media, cantidad por tipo
            $CRnave3 = 6; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 5; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 50; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 2; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 52;	 	//mejoras
            $CRnave12 = 26;	 	// blindajes
            $CRnave13 = 12;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BASALTO":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=.8;
            $inirec11=650;
            $inirec12=5.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=10.9;	// energía
            $inirec14=1.2; //tiempo
            $inirec15=1.1; //moneda
            $inirec16=1.7;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=12;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=2; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 5; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 20; 	// cañones media, cantidad por tipo
            $CRnave3 = 12; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 4; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 10; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 75; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 6; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 1;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 26;	 	// blindajes
            $CRnave13 = 12;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HELIOS":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=.8;
            $inirec11=110;
            $inirec12=2.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=.6;	// energía
            $inirec14=.5; //tiempo
            $inirec15=.6; //moneda
            $inirec16=.5;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=12;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 4; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 16; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 4;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "EBOLA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.3;
            $inirec11=450;
            $inirec12=4.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=15.9;	// energía
            $inirec14=1.8; //tiempo
            $inirec15=1.7; //moneda
            $inirec16=2.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=19; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 8; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 16; 	// cañones media, cantidad por tipo
            $CRnave3 = 4; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 40; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 4; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 54;	 	//mejoras
            $CRnave12 = 26;	 	// blindajes
            $CRnave13 = 6;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "AQUILES":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.1;
            $inirec11=850;
            $inirec12=3.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=10.9;	// energía
            $inirec14=2.5; //tiempo
            $inirec15=2.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=18;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=19; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 5; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 30; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 64;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 8;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ESCORPION":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=.6;
            $inirec11=3;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.3;	// energía
            $inirec14=0.5; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.2;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=12;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 6; 	// cañones media, cantidad por tipo
            $CRnave3 = 1; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 4; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 21;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "PULSAR":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=.5;
            $inirec11=20;
            $inirec12=3.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.5;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=.8; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=18;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=19; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 12; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 6; 	// cañones media, cantidad por tipo
            $CRnave3 = 2; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 3; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 39;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores



            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SONDA":// sin espacios ni signos


            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=.4;
            $inirec11=1;
            $inirec12=1.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=.2; //tiempo
            $inirec15=.5; //moneda
            $inirec16=.5;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=19; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 6;	 	// blindajes
            $CRnave13 = 2;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "FALCATA":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1.2;
            $inirec11=2;
            $inirec12=.7; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.8;	// energía
            $inirec14=.8; //tiempo
            $inirec15=.6; //moneda
            $inirec16=1.1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=10;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 21;	 	//mejoras
            $CRnave12 = 9;	 	// blindajes
            $CRnave13 = 2;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NIOBE":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=140;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.3; //moneda
            $inirec16=1.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 8; 	// cañones media, cantidad por tipo
            $CRnave3 = 4; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 1; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 10; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 30;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NOMADA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=.5;
            $inirec11=30;
            $inirec12=4.5; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=.8; //tiempo
            $inirec15=.6; //moneda
            $inirec16=1.1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 4; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 35; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 6;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "CETUS":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=190;
            $inirec12=10.5; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.1;	// energía
            $inirec14=2.0; //tiempo
            $inirec15=1.2; //moneda
            $inirec16=0.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 200; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "FOBOS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1.8; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.9;	// energía
            $inirec14=.8; //tiempo
            $inirec15=.7; //moneda
            $inirec16=1.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=12;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=14; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 10; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 8; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 20;	 	// blindajes
            $CRnave13 = 8;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "AGAMENON":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=190;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.2;	// energía
            $inirec14=1.3; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=.8;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 12; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 6; 	// cañones media, cantidad por tipo
            $CRnave3 = 2; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 60; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "VARUNA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=190;
            $inirec12=1.2; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.1;	// energía
            $inirec14=.7; //tiempo
            $inirec15=1.5; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 1; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 10; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 10; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BERSERKER":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=240;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.9;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.2;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 10; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 5; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 3; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 3;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "AGRESOR":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1.2;
            $inirec11=100;
            $inirec12=1.4; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.3;	// energía
            $inirec14=1.1; //tiempo
            $inirec15=1.6; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=15;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 3; 	// cañones media, cantidad por tipo
            $CRnave3 = 2; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 2; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 14; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 3;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "VULCANO":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=240;
            $inirec12=3.5; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=17;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 15; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 15; 	// cañones media, cantidad por tipo
            $CRnave3 = 10; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 5; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 40; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 10; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 18;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "DENIX":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=1400;
            $inirec12=4; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=4.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.8; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=2.5;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=2; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 24; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 24; 	// cañones media, cantidad por tipo
            $CRnave3 = 10; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 1; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 8; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 80; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 1; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 10;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "OBITUS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=140;
            $inirec12=2.2; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.0;	// energía
            $inirec14=2.0; //tiempo
            $inirec15=1.3; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=19;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 6; 	// cañones media, cantidad por tipo
            $CRnave3 = 3; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 13; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 35;	 	//mejoras
            $CRnave12 = 16;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "CARONTE":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=1000;
            $inirec12=12; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.5;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.2;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=8;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=8; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 12; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 9; 	// cañones media, cantidad por tipo
            $CRnave3 = 6; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 4; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 6; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 60; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 6; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 8;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "VERMIS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=340;
            $inirec12=6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=.6; //tiempo
            $inirec15=.7; //moneda
            $inirec16=1.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 4; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 1; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HATHOR":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=140;
            $inirec12=2.8; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.5;	// energía
            $inirec14=1.3; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=20;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 2; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 5; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 4; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 15; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 1; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "TEOTL":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=1540;
            $inirec12=6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.0;	// energía
            $inirec14=1.3; //tiempo
            $inirec15=.6; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=20;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 8; 	// cañones media, cantidad por tipo
            $CRnave3 = 4; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 3; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 10; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "YGR":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=1;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=.5; //tiempo
            $inirec15=1; //moneda
            $inirec16=1.2;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 1; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 15;	 	//mejoras
            $CRnave12 = 9;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ISHTAR":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=10;
            $inirec12=6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=.1; //tiempo
            $inirec15=1.8; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 2; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 3; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 8; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 2;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "CROM":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.5;
            $inirec11=2800;
            $inirec12=10; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.4;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.9; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 15; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 6; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 15; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 100; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 4; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 18;	 	// blindajes
            $CRnave13 = 5;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "FREYJA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=2;
            $inirec11=3440;
            $inirec12=3; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.5;	// energía
            $inirec14=1.9; //tiempo
            $inirec15=1.5; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=25;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=25; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 20; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 6; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 8; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 50; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 2; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 4;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "INTI":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=.5;
            $inirec11=100;
            $inirec12=4; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=.8;	// energía
            $inirec14=.4; //tiempo
            $inirec15=.7; //moneda
            $inirec16=0.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 10; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 30; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 4; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 21;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 2;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BARRACUDA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=.3;
            $inirec11=100;
            $inirec12=3; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=.6; //moneda
            $inirec16=1.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 25; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 20;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "KALI":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=5140;
            $inirec12=6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.5;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=.3; //moneda
            $inirec16=1.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 30; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 15; 	// cañones media, cantidad por tipo
            $CRnave3 = 6; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 4; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 400; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 10; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 3;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 20;	 	// blindajes
            $CRnave13 = 16;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "MARDUK":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=1400;
            $inirec12=3; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=3.0;	// energía
            $inirec14=.5; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=18;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 12; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 2; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 4; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 60; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 6; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 40;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 6;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NIMROD":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=.7;
            $inirec11=3240;
            $inirec12=1.5; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.8;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=0.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=14;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 15; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 12; 	// cañones media, cantidad por tipo
            $CRnave3 = 6; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 3; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 40; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 6; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 41;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "LORICA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=1340;
            $inirec12=2; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.1;	// energía
            $inirec14=.5; //tiempo
            $inirec15=0.3; //moneda
            $inirec16=2.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=16;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 12; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 8; 	// cañones media, cantidad por tipo
            $CRnave3 = 4; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 5; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 75; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 2; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 26;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NOVA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=140;
            $inirec12=6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.8;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=19;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 20; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 4; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 6; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 15; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 1;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 4;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ASUR":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=.7;
            $inirec11=340;
            $inirec12=4; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.5;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=.8; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=20;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 8; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 8; 	// cañones media, cantidad por tipo
            $CRnave3 = 4; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 4; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 6; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 150; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 10; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 5;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 18;	 	// blindajes
            $CRnave13 = 6;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "CASANDRA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.2;
            $inirec11=940;
            $inirec12=6; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=2.5;	// energía
            $inirec14=1.5; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=.8;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=20;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 10; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 12; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 10; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 200; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 20; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 10;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 8;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;





            case  "PLACA TERMICA":
            $Tnavet = "caza";
            $Tnave = 0;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "MAMPARO":
            $Tnavet = "ligera";
            $Tnave = 1;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "CUADERNA":
            $Tnavet = "media";
            $Tnave = 2;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ESTRUCTURA":
            $Tnavet = "pesada";
            $Tnave = 3;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "RECOLECTOR":
            $Tnavet = "ligera";
            $Tnave = 1;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "REMOLCADOR":
            $Tnavet = "pesada";
            $Tnave = 3;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ANUBIS":
            $Tnavet = "estacion";
            $Tnave = 4;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BENGALA":
            $Tnavet = "ligera";
            $Tnave = 1;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.0;	// energía
            $inirec14=1.0; //tiempo
            $inirec15=1.0; //moneda
            $inirec16=1.0;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 0; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 0; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;


            case  "ISIS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=40;
            $inirec12=2; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.9;	// energía
            $inirec14=.7; //tiempo
            $inirec15=1.2; //moneda
            $inirec16=1.4;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=19;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=19; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 18; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 1; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 4; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 30; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 6; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 18;	 	// blindajes
            $CRnave13 = 4;	 	// motores



            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;





            case  "WUKONG":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=40;
            $inirec12=1; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.8;	// energía
            $inirec14=.5; //tiempo
            $inirec15=.6; //moneda
            $inirec16=1.6;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=19;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 1; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 2; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ENLIL":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=40;
            $inirec12=2; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.9;	// energía
            $inirec14=.7; //tiempo
            $inirec15=1.2; //moneda
            $inirec16=1.4;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=19;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=19; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 1; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 4; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 2; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 2; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 2; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "ESUS":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=80;
            $inirec12=4; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1.9;	// energía
            $inirec14=.7; //tiempo
            $inirec15=1.2; //moneda
            $inirec16=1.4;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=17;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=18; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 2; 	// cañones media, cantidad por tipo
            $CRnave3 = 10; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 4; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 10; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 1; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 10; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 10; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 10;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 6;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;







            case  "BAAL":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=400;
            $inirec12=2; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=3.5;	// energía
            $inirec14=.8; //tiempo
            $inirec15=1.1; //moneda
            $inirec16=1.9;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=15;  //velocidad	base, se ajusta para no pasar del maximo en el diseño
            $maxvel=19; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 5; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 1; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 5; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 5; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 5; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 2;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;







        }

        /// defensas  ///////////////////////////////////////////


        // tropas   ///////////////////////////////////////////

        return $coste;

    }

    function calculos($cualidades,$armas,$constantes,$fuselajes_id,$tipo,$tamano){

        $coste =new CualidadesFuselajes();

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
        $coste->gastoFuel=$cualidades[$n] * $factorCombustibleT * $factorCombustible;$n++;
        $coste->masa=$cualidades[$n] ;$n++;
        $coste->energia=$cualidades[$n] * $factorEnergiaT * $factorEnergia;$n++;
        $coste->tiempo=$cualidades[$n] * $factorTiempo *$factorTiempo;$n++;
        $coste->mantenimiento=$cualidades[$n] *$factorMantenimientoT * $factorMantenimiento;$n++;
        $coste->defensa=$cualidades[$n] * $factorDefensaT * $factorDefensa;$n++;
        $coste->velocidad=$cualidades[$n] * $factorVelocidadT * $factorVelocidad;$n++;
        $coste->velocidadMax=$cualidades[$n] ;$n++;


        $n=0;
        $coste->armasLigeras=$armas[$n] ;$n++;
        $coste->armasMedias=$armas[$n] ;$n++;
        $coste->armasPesadas=$armas[$n] ;$n++;
        $coste->armasInsertadas=$armas[$n] ;$n++;
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