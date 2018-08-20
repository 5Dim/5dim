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


    public function  generarDatosCualidadesFuselajes($codigo, $fuselajes_id)
    {
        $costesc = new CualidadesFuselajes();

        $constantes=Constantes::where('tipo','fuselajes')->get();

        /// naves   ///////////////////////////////////////////


        switch($codigo){

            case  "ARTEMISA":// sin espacios ni signos
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=2;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 2;	 		//mejoras
            $CRnave12 = 1;	 		// blindajes
            $CRnave13 = 1;	 		// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NIKE":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=2;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1; ////defensa
            $inirec18=1;  //factor de velocidad base
            $maxvel=8; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 2;	 	//mejoras
            $CRnave12 = 4;	 	// blindajes
            $CRnave13 = 1;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HACHIMAN":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=2;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;////defensa
            $inirec18=1;  //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 2;	 	//mejoras
            $CRnave12 = 4;	 	// blindajes
            $CRnave13 = 6;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;



            case  "HESTIA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec7=25000;
            $inirec8=1;
            $inirec11=2;
            $inirec12=1;    //
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1; ////defensa
            $inirec18=1;    //factor de velocidad base
            $maxvel=6; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 6;	 	// blindajes
            $CRnave13 = 6;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SOBEK":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec7=35000;
            $inirec8=$ec9=0;$inirec10=0;
            $inirec11=20;
            $inirec12=1;    /////de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1; ////defensa
            $inirec18=1;  //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 32;	 	// blindajes
            $CRnave13 = 23;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "CRONOS":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=20;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1;///defensa
            $inirec18=1;  //factor de velocidad base
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 1;	 	// blindajes
            $CRnave13 = 7;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ÉRIDE":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=20;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;////defensa
            $inirec18=1;    //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 2;	 	//mejoras
            $CRnave12 = 7;	 	// blindajes
            $CRnave13 = 22;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ANUBIS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=20;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 28;	 	// blindajes
            $CRnave13 = 34;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "KHEPRI":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=30;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 18;	 	// blindajes
            $CRnave13 = 40;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "AGNI":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=2000;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;  //factor de velocidad base
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 18; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 12; 	// cañones media, cantidad por tipo
            $CRnave3 = 6; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 4;	 	//mejoras
            $CRnave12 = 210;	 	// blindajes
            $CRnave13 = 60;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "DIANA":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=60;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 26;	 	// blindajes
            $CRnave13 = 52;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HADES":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=1;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;  //factor de velocidad base
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 4;	 	//mejoras
            $CRnave12 = 1;	 	// blindajes
            $CRnave13 = 26;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "RAIJIN":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 48;	 	// motores



            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ATENEA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=60;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=10; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 2;	 	// blindajes
            $CRnave13 = 12;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "LOKI":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=600;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1; //moneda
            $inirec16=1;///defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 100;	 	// blindajes
            $CRnave13 = 162;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SETH":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=150;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 50;	 	// blindajes
            $CRnave13 = 120;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "AFRODITA":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=190;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 5;	 	// blindajes
            $CRnave13 = 27;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "THOR":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=1500;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 80;	 	// blindajes
            $CRnave13 = 1322;	 	// motores



            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "AMATERATSU":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;///defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 6;	 	// blindajes
            $CRnave13 = 24;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "MOIRAS":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.5;
            $inirec11=750;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1;///defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 4;	 	//mejoras
            $CRnave12 = 110;	 	// blindajes
            $CRnave13 = 106;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SHINIGAMI":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=70;
            $inirec12=1;    ////factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 88;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "HORUS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1.0;
            $inirec11=80;
            $inirec12=1;    ////factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 24;	 	// blindajes
            $CRnave13 = 144;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ANHUR":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=.8;
            $inirec11=40;
            $inirec12=1;    ////factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 56;	 	// blindajes
            $CRnave13 = 168;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NEMESIS":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=0;
            $inirec11=1;
            $inirec12=1;    ////factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 4;	 	//mejoras
            $CRnave12 = 2;	 	// blindajes
            $CRnave13 = 20;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SUSANU":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1.8;
            $inirec11=4;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 5;	 	// blindajes
            $CRnave13 = 37;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BES":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=40;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 30;	 	// blindajes
            $CRnave13 = 268;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SKADI":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.1;
            $inirec11=110;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1;///defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 168;	 	// blindajes
            $CRnave13 = 1056;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "VARUNA":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=700;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;  //factor de velocidad base
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 6; 	// cañones media, cantidad por tipo
            $CRnave3 = 12; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 2; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 18; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 20; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 2; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 1;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 308;	 	// blindajes
            $CRnave13 = 486;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "KALI":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=.8;
            $inirec11=650;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 48; 	// cañones media, cantidad por tipo
            $CRnave3 = 30; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 18; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 12; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 50; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 10; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 2;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 8;	 	//mejoras
            $CRnave12 = 490;	 	// blindajes
            $CRnave13 = 1500;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ILLITÍA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=.8;
            $inirec11=110;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 55;	 	// blindajes
            $CRnave13 = 48;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "ODIN":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.3;
            $inirec11=450;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 8;	 	//mejoras
            $CRnave12 = 328;	 	// blindajes
            $CRnave13 = 2316;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HEL":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.1;
            $inirec11=850;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 64;	 	//mejoras
            $CRnave12 = 116;	 	// blindajes
            $CRnave13 = 1250;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "AMMIT":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=.6;
            $inirec11=3;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 36;	 	// blindajes
            $CRnave13 = 72;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "OSIRIS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=.5;
            $inirec11=20;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 28;	 	// blindajes
            $CRnave13 = 646;	 	// motores



            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ISHTAR":// sin espacios ni signos


            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=.4;
            $inirec11=1;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 2;	 	//mejoras
            $CRnave12 = 1;	 	// blindajes
            $CRnave13 = 1;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ZEUS":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1.2;
            $inirec11=2;
            $inirec12=1;    ////factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 1;	 	// blindajes
            $CRnave13 = 74;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NUT":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=140;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 36;	 	// blindajes
            $CRnave13 = 800;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BACO":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=.5;
            $inirec11=30;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 4;	 	//mejoras
            $CRnave12 = 4;	 	// blindajes
            $CRnave13 = 44;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HÉCATE":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=190;
            $inirec12=1;    //; //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 60;	 	// blindajes
            $CRnave13 = 250;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "ANAT":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 56;	 	// blindajes
            $CRnave13 = 90;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "DEIMOS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=190;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 24;	 	// blindajes
            $CRnave13 = 154;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "IMHOTEP":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=190;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 26;	 	// blindajes
            $CRnave13 = 96;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BERSERKER":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=240;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 112;	 	// blindajes
            $CRnave13 = 462;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BASTET":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1.2;
            $inirec11=100;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 4;	 	//mejoras
            $CRnave12 = 22;	 	// blindajes
            $CRnave13 = 190;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "BALDER":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=240;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 212;	 	// blindajes
            $CRnave13 = 532;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SHIVA":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=1400;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;    //factor de velocidad base
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 30; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 24; 	// cañones media, cantidad por tipo
            $CRnave3 = 12; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 6; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 8; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 10; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 4; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 2;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 364;	 	// blindajes
            $CRnave13 = 344;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "SEJMET":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=140;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 32;	 	// blindajes
            $CRnave13 = 208;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "KARMA":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=1000;
            $inirec12=1;    ////factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;  //factor de velocidad base
            $maxvel=0; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 12; 	// cañones media, cantidad por tipo
            $CRnave3 = 6; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 3; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 6; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 40; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 10; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 266;	 	// blindajes
            $CRnave13 = 130;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "IRIS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=340;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 40;	 	// blindajes
            $CRnave13 = 36;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HATHOR":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=140;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 24;	 	// blindajes
            $CRnave13 = 98;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HEIMDALL":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=1540;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 115;	 	// blindajes
            $CRnave13 = 252;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ARES":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=1;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 1;	 	// blindajes
            $CRnave13 = 24;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "IZANAMI":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 8;	 	// blindajes
            $CRnave13 = 44;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ULL":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.5;
            $inirec11=2800;
            $inirec12=1;    ////factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 146;	 	// blindajes
            $CRnave13 = 578;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "FREYA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=2;
            $inirec11=3440;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=20; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 8;	 	//mejoras
            $CRnave12 = 104;	 	// blindajes
            $CRnave13 = 520;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "TEMIS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=.5;
            $inirec11=100;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 4;	 	//mejoras
            $CRnave12 = 14;	 	// blindajes
            $CRnave13 = 15;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "HEFESTO":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=.3;
            $inirec11=100;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 4;	 	//mejoras
            $CRnave12 = 13;	 	// blindajes
            $CRnave13 = 44;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "GANESHA":
            $Tnavet = "estacion";
            $Tnave = 4;
            $inirec8=1;
            $inirec11=5140;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=06; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 3; 	// cañones media, cantidad por tipo
            $CRnave3 = 2; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 6; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 500; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 50; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 20;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 8;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 252;	 	// blindajes
            $CRnave13 = 312;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "MORFEO":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=1400;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 125;	 	// blindajes
            $CRnave13 = 356;	 	// motores




            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "TYR":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=.7;
            $inirec11=3240;
            $inirec12=1;    // //factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 68;	 	// blindajes
            $CRnave13 = 308;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NUNET":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=1340;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 8;	 	//mejoras
            $CRnave12 = 120;	 	// blindajes
            $CRnave13 = 232;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ESTIGIA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=140;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 105;	 	// blindajes
            $CRnave13 = 232;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "NIX":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=.7;
            $inirec11=340;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 165;	 	// blindajes
            $CRnave13 = 420;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "AURA":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1.2;
            $inirec11=940;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1;////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 8;	 	//mejoras
            $CRnave12 = 120;	 	// blindajes
            $CRnave13 = 400;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
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
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
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
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
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
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
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
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 2;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
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
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 1;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
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
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 2;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "RA":
            $Tnavet = "estacion";
            $Tnave = 4;

            $factn=1;
            $inirec1= 5000;
            $inirec2= 150;
            $inirec3= 0;
            $inirec4= 100;
            $inirec5= 2;
            $inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "OBSERVADOR":
            $Tnavet = "ligera";
            $Tnave = 1;

            $factn=1;
            $inirec1= 5000;		$inirec2= 150;	$inirec3= 0;
            $inirec4= 100;		$inirec5= 2;	$inirec6= 3;
            $inirec7= 5;
            $inirec8=1;
            $inirec11=10;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec17=0;  //ataque
            $inirec18=1;  //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 2;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;


            case  "ISIS":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=40;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 18;	 	// blindajes
            $CRnave13 = 18;	 	// motores



            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;





            case  "WUKONG":
            $Tnavet = "caza";
            $Tnave = 0;
            $inirec8=1;
            $inirec11=40;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 27;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 6;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;




            case  "ENLIL":
            $Tnavet = "media";
            $Tnave = 2;
            $inirec8=1;
            $inirec11=40;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 12;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;






            case  "ESUS":
            $Tnavet = "ligera";
            $Tnave = 1;
            $inirec8=1;
            $inirec11=80;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 20;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;







            case  "BAAL":
            $Tnavet = "pesada";
            $Tnave = 3;
            $inirec8=1;
            $inirec11=400;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1; ; //moneda
            $inirec16=1; ////defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 45;	 	//mejoras
            $CRnave12 = 12;	 	// blindajes
            $CRnave13 = 360;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'nave',$Tnavet);
            break;


            //DEFENSAS ORBITALES  ///////////////////////////////////////////
            case  "Defensa 1": //Basada en la AMATERATSU
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 2; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 1; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 0; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 8;	 	// blindajes
            $CRnave13 = 24;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            case  "Defensa 2": //Basada en la SHINIGAMI
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,
            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 4; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 3; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 18;	 	// blindajes
            $CRnave13 = 90;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            case  "Defensa 3": //Basada en la KHEPRI
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,
            $CRnave1 = 4; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 4; 	// cañones media, cantidad por tipo
            $CRnave3 = 0; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 3; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 10;	 	// blindajes
            $CRnave13 = 88;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            case  "Defensa 4": //Basada en la LOKI
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 3;	 	//mejoras
            $CRnave12 = 100;	 	// blindajes
            $CRnave13 = 162;	 	// motores

            case  "Defensa 5": //Basada en la OSIRIS
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 5;	 	//mejoras
            $CRnave12 = 42;	 	// blindajes
            $CRnave13 = 666;	 	// motores


            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            case  "Defensa 6": //Basada en la THOR
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 95;	 	// blindajes
            $CRnave13 = 1322;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            case  "Defensa 7": //Basada en la SKADI
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 10; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 10; 	// cañones media, cantidad por tipo
            $CRnave3 = 9; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 6; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 10; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 7;	 	//mejoras
            $CRnave12 = 196;	 	// blindajes
            $CRnave13 = 1056;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            case  "Defensa 8": //Basada en la NUNET
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 12; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 8; 	// cañones media, cantidad por tipo
            $CRnave3 = 4; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 0; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 5; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 8;	 	//mejoras
            $CRnave12 = 140;	 	// blindajes
            $CRnave13 = 232;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            case  "Defensa 9": //Basada en la ODIN
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 12; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 18; 	// cañones media, cantidad por tipo
            $CRnave3 = 4; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 12; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 38; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 8;	 	//mejoras
            $CRnave12 = 392;	 	// blindajes
            $CRnave13 = 2316;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            case  "Defensa 10": //Basada en la KALI
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1;  //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

            $CRnave1 = 6; 	// cañones ligeros, cantidad por tipo
            $CRnave2 = 48; 	// cañones media, cantidad por tipo
            $CRnave3 = 30; 	//cañones pesados, cantidad por tipo
            $CRnave4 = 18; 	//cañones insertado, cantidad por tipo
            $CRnave5 = 0; 	// DEFENSAS, cantidad por tipo
            $CRnave6 = 0; 	// BOMBAS, cantidad por tipo  ***  selectedA1 *
            $CRnave7 = 12; 	// cañones Misiles, cantidad por tipo
            $CRnave8 = 0; 	// CARGA PEQUEÑA, cantidad por tipo
            $CRnave9 = 0; 	// MEDIANA, cantidad por tipo
            $CRnave10 = 0;	 //CARGA GRANDE, cantidad por tipo
            $CRnave14 = 0;
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 8;	 	//mejoras
            $CRnave12 = 504;	 	// blindajes
            $CRnave13 = 1600;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;

            //DEFENSAS TERRESTRES  ///////////////////////////////////////////
            case  "Defensa 11": //Basada en la RAIJIN
            $Tnavet = "defensa";
            $Tnave = 1;
            $inirec8=1.5;
            $inirec11=75;
            $inirec12=1;    ///factor de masa, se multiplica a una estimación segun las ranuras, a mas mejor velocidad x cosas
            $inirec13=1;    //energia
            $inirec14=1; ; //tiempo
            $inirec15=1;  //moneda
            $inirec16=1;  //defensa ya tiene en cuenta el tamaño y cuando sale
            $inirec18=1;   //factor de velocidad base
            $maxvel=16; // indica la velocidad máxima que puede tener este diseño,

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
            $CRnave14 = 0;    //Carga ENorme
            $CRnave15 = 0;    //Carga Mega(estaciones)
            $CRnave11 = 6;	 	//mejoras
            $CRnave12 = 14;	 	// blindajes
            $CRnave13 = 64;	 	// motores

            $cualidades = [$codigo,$inirec8,$inirec12,$inirec13,$inirec14,$inirec15,$inirec16,$inirec18,$maxvel];
            $armas = [$CRnave1,$CRnave2,$CRnave3,$CRnave4,$CRnave6,$CRnave7,$CRnave8,$CRnave9,$CRnave10,$CRnave14,$CRnave15,$CRnave11,$CRnave12,$CRnave13];
            $coste = $costesc->calculos($cualidades,$armas,$constantes,$fuselajes_id,'defensa',$Tnavet);
            break;






        }




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
        $coste->cargaEnorme=$armas[$n] ;$n++;
        $coste->cargaMega=$armas[$n] ;$n++;

        $coste->mejoras=$armas[$n];$n++;
        $coste->blindajes=$armas[$n];$n++;
        $coste->motores=$armas[$n];$n++;

        return($coste);

    }

}