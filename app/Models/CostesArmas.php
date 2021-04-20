<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostesArmas extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function generarDatosCostesArmas()
    {
        $costes = [];

        /// construcciones y produccion
        $fcmot = 1;  //factor corrector costos motor
        $fcenermot = 1; // energia que te el motor
        $fcpotmot = 0.9; // potencia que te el motor
        $fcblind = 3;  //factor corrector blindaje
        $fccc = 1; //Factor corrector comp. de carga
        $fcae = 1; //factor corrector costo armas energía
        $fcab = 1; //factor corrector costo armas balistica
        $fcap = 1; //factor corrector costo armas plasma
        $fcam = 1; //factor corrector costo armas MA
        $fcbomb = 4; //factor reduccion costos bombas
        $fman = 1; // Factor de coste para mantenimiento (creditos)


        $coste = new CostesArmas();
        $coste->armas_codigo = "59";  //motor quimico
        $coste->mineral =  $fcmot * 2000;
        $coste->cristal =  $fcmot * 600;
        $coste->gas =  $fcmot * 1000;
        $coste->plastico = $fcmot * 100; //4
        $coste->ceramica = $fcmot * 400; //5
        $coste->liquido = $fcmot * 80; //6
        $coste->micros = $fcmot * 10;   //7
        $coste->fuel = $fcmot * 1;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcmot * 8; //11
        $coste->masa = 500;
        $coste->energia = 750 * $fcenermot * 24;
        $coste->tiempo = $fcmot * 200;
        $coste->mantenimiento = $fman * $fcmot * 4;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 100 * $fcpotmot; //velocidad
        $coste->maniobra = 6000 * $fcpotmot; //maniobra
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "60"; //motor nuk
        $coste->mineral = $fcmot * 1500;
        $coste->cristal = $fcmot * 1400;
        $coste->gas = $fcmot * 450;
        $coste->plastico = $fcmot * 1000; //4
        $coste->ceramica = $fcmot * 200; //5
        $coste->liquido = $fcmot * 250; //6
        $coste->micros = $fcmot * 20;   //7
        $coste->fuel = $fcmot * 3;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcmot * 1; //11
        $coste->masa = 1000;
        $coste->energia = 645 * $fcenermot * 20;
        $coste->tiempo = $fcmot * 600;
        $coste->mantenimiento = $fman * $fcmot * 5;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 4000 * $fcpotmot; //velocidad
        $coste->maniobra = 4000 * $fcpotmot; //maniobra
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "61"; //motor ion
        $coste->mineral = $fcmot * 1900;
        $coste->cristal = $fcmot * 1200;
        $coste->gas = $fcmot * 500;
        $coste->plastico = $fcmot * 700; //4
        $coste->ceramica = $fcmot * 1500; //5
        $coste->liquido = $fcmot * 60; //6
        $coste->micros = $fcmot * 50;   //7
        $coste->fuel = $fcmot * 4;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcmot * 1; //11
        $coste->masa = 4000;
        $coste->energia = 310 * $fcenermot * 21;
        $coste->tiempo = $fcmot * 300;
        $coste->mantenimiento = $fman * $fcmot * 9;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 5700 * $fcpotmot; //velocidad
        $coste->maniobra = 700 * $fcpotmot; //maniobra
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "62"; //motor plasma
        $coste->mineral = $fcmot * 2000;
        $coste->cristal = $fcmot * 1300;
        $coste->gas =  $fcmot * 400;
        $coste->plastico = $fcmot * 750; //4
        $coste->ceramica = $fcmot * 350; //5
        $coste->liquido = $fcmot * 1400; //6
        $coste->micros = $fcmot * 45;   //7
        $coste->fuel = $fcmot * 3;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcmot * 4; //11
        $coste->masa = 6000;
        $coste->energia = 845 * $fcenermot * 19;
        $coste->tiempo = $fcmot * 700;
        $coste->mantenimiento = $fman * $fcmot * 14;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 4500 * $fcpotmot; //velocidad
        $coste->maniobra = 4800 * $fcpotmot; //maniobra
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "63"; //motor MA
        $coste->mineral = $fcmot * 3000;
        $coste->cristal = $fcmot * 2150;
        $coste->gas = $fcmot * 450;
        $coste->plastico = $fcmot * 500; //4
        $coste->ceramica = $fcmot * 400; //5
        $coste->liquido = $fcmot * 275; //6
        $coste->micros = $fcmot * 1000;   //7
        $coste->fuel = $fcmot * 3;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcmot * 50; //11
        $coste->masa = 10000;
        $coste->energia = 1060 * $fcenermot * 18;
        $coste->tiempo = $fcmot * 2000 * 20;
        $coste->mantenimiento = $fman * $fcmot * 20;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 6000 * $fcpotmot; //velocidad
        $coste->maniobra = 6000 * $fcpotmot; //maniobra
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "64"; //motor HMA
        $coste->mineral = $fcmot * 500;
        $coste->cristal = $fcmot * 700;
        $coste->gas =  $fcmot * 3000;
        $coste->plastico = $fcmot * 4000; //4
        $coste->ceramica = $fcmot * 6000; //5
        $coste->liquido = $fcmot * 8000; //6
        $coste->micros = $fcmot * 1000;   //7
        $coste->fuel = $fcmot * 10;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcmot * 2000; //11
        $coste->masa = 14000;
        $coste->energia = 400 * $fcenermot;
        $coste->tiempo = $fcmot * 3000;
        $coste->mantenimiento = $fman * $fcmot * 0200;
        $coste->defensa = 20000;
        $coste->ataque = 0;
        $coste->velocidad = 2000000;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        /////// blindajes

        $coste = new CostesArmas();
        $coste->armas_codigo = "65"; //blindaje titanio
        $coste->mineral = $fcblind * 5000;
        $coste->cristal = $fcblind * 3000;
        $coste->gas = $fcblind * 1500;
        $coste->plastico = $fcblind * 500; //4
        $coste->ceramica = $fcblind * 600; //5
        $coste->liquido = $fcblind * 200; //6
        $coste->micros = $fcblind * 50;   //7
        $coste->fuel = $fcblind * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcblind * 0; //11
        $coste->masa = $fcblind * 4700;
        $coste->energia = 0;
        $coste->tiempo = $fcblind * 100;
        $coste->mantenimiento = $fman * $fcblind * 2;
        $coste->defensa = 8000;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "66"; //blindaje reactivo
        $coste->mineral = $fcblind * 7500;
        $coste->cristal = $fcblind * 3500;
        $coste->gas = $fcblind * 1000;
        $coste->plastico = $fcblind * 1350; //4
        $coste->ceramica = $fcblind * 500; //5
        $coste->liquido = $fcblind * 200; //6
        $coste->micros = $fcblind * 50;   //7
        $coste->fuel = $fcblind * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcblind * 0; //11
        $coste->masa = $fcblind * 4500;
        $coste->energia = -2500 * $fcblind;
        $coste->tiempo = $fcblind * 50;
        $coste->mantenimiento = $fman * $fcblind * 4;
        $coste->defensa = 10000;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "67"; //blindaje resinas
        $coste->mineral = $fcblind * 15000;
        $coste->cristal = $fcblind * 10000;
        $coste->gas = $fcblind * 700;
        $coste->plastico = $fcblind * 600; //4
        $coste->ceramica = $fcblind * 500; //5
        $coste->liquido = $fcblind * 300; //6
        $coste->micros = $fcblind * 120;   //7
        $coste->fuel = $fcblind * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcblind * 0; //11
        $coste->masa = $fcblind * 5000;
        $coste->energia = 0 * $fcblind;
        $coste->tiempo = $fcblind * 300;
        $coste->mantenimiento = $fman * $fcblind * 6;
        $coste->defensa = 12000;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "68"; //blindaje placas
        $coste->mineral = $fcblind * 5000;
        $coste->cristal = $fcblind * 3000;
        $coste->gas = $fcblind * 1400;
        $coste->plastico = $fcblind * 1100; //4
        $coste->ceramica = $fcblind * 900; //5
        $coste->liquido = $fcblind * 300; //6
        $coste->micros = $fcblind * 70;   //7
        $coste->fuel = $fcblind * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcblind * 0; //11
        $coste->masa = $fcblind * 5300;
        $coste->energia = 0 * $fcblind;
        $coste->tiempo = $fcblind * 50;
        $coste->mantenimiento = $fman * $fcblind * 5;
        $coste->defensa = 15000;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "69"; //blindaje carbonadio
        $coste->mineral = $fcblind * 10000;
        $coste->cristal = $fcblind * 10000;
        $coste->gas = $fcblind * 300;
        $coste->plastico = $fcblind * 300; //4
        $coste->ceramica = $fcblind * 300; //5
        $coste->liquido = $fcblind * 500; //6
        $coste->micros = $fcblind * 350;   //7
        $coste->fuel = $fcblind * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fcblind * 0; //11
        $coste->masa = $fcblind * 5700;
        $coste->energia = 0 * $fcblind;
        $coste->tiempo = $fcblind * 150;
        $coste->mantenimiento = $fman * $fcblind * 8;
        $coste->defensa = 20000;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        ////// mejoras vas por % de los recursos //////////////////////////////////////////////

        $niveltec = 1;

        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // compactador
        $coste->mineral = 10;
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 5;       //14
        $coste->mantenimiento = $fman * 1;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 20;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // control de punteria
        $coste->mineral = 25; //este va para todos
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = -20; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 1;       //14
        $coste->mantenimiento = $fman * 0;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // escudos
        $coste->mineral = 2;
        $coste->cristal = 2;
        $coste->gas = 2;
        $coste->plastico = 2; //4
        $coste->ceramica = 2; //5
        $coste->liquido = 2; //6
        $coste->micros = 2;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 1;       //14
        $coste->mantenimiento = $fman * 2;
        $coste->defensa = 20;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // prop maniobra
        $coste->mineral = 10;
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 10;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 1;       //14
        $coste->mantenimiento = $fman * 1;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->maniobra = 20;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // c nanos
        $coste->mineral = 10;
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = -20;       //14
        $coste->mantenimiento = $fman * 0;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);



        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // Prop. Hyper
        $coste->mineral = 10;
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 0;       //14
        $coste->mantenimiento = $fman * 0;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 20;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // aleaciones
        $coste->mineral = 2;
        $coste->cristal = 2;
        $coste->gas = 2;
        $coste->plastico = 2; //4
        $coste->ceramica = 2; //5
        $coste->liquido = 2; //6
        $coste->micros = 2;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 20;    //12
        $coste->energia = 0;
        $coste->tiempo = 2;       //14
        $coste->mantenimiento = $fman * 0;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // standart
        $coste->mineral = 7;
        $coste->cristal = 7;
        $coste->gas = 7;
        $coste->plastico = 7; //4
        $coste->ceramica = 7; //5
        $coste->liquido = 7; //6
        $coste->micros = 7;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 0;       //14
        $coste->mantenimiento = $fman * -20;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // plegado
        $coste->mineral = 75;
        $coste->cristal = 75;
        $coste->gas = 75;
        $coste->plastico = 75; //4
        $coste->ceramica = 75; //5
        $coste->liquido = 75; //6
        $coste->micros = 75;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 10;       //14
        $coste->mantenimiento = $fman * 5;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 20;
        $coste->cargaMediana = 20;
        $coste->cargaGrande = 20;
        $coste->cargaEnorme = 20;
        $coste->cargaMega = 20;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // ariete
        $coste->mineral = 10;
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 10;       //14
        $coste->mantenimiento = $fman * 10;
        $coste->defensa = 0;
        $coste->ataque = 20;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // foco cazas
        $coste->mineral = 50; //esto para todos
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 10;       //14
        $coste->mantenimiento = $fman * 10;
        $coste->defensa = 0;
        $coste->ataque = 20;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // foco ligeras
        $coste->mineral = 50; //esto para todos
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 10;       //14
        $coste->mantenimiento = $fman * 10;
        $coste->defensa = 0;
        $coste->ataque = 20;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // foco medias
        $coste->mineral = 50; //esto para todos
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 10;       //14
        $coste->mantenimiento = $fman * 10;
        $coste->defensa = 0;
        $coste->ataque = 20;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // foco pesadas
        $coste->mineral = 50; //esto para todos
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 10;       //14
        $coste->mantenimiento = $fman * 10;
        $coste->defensa = 0;
        $coste->ataque = 20;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = $niveltec + 69;
        $niveltec++; // foco estaciones
        $coste->mineral = 50; //esto para todos
        $coste->cristal = 10;
        $coste->gas = 10;
        $coste->plastico = 10; //4
        $coste->ceramica = 10; //5
        $coste->liquido = 10; //6
        $coste->micros = 10;   //7
        $coste->fuel = 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = 0; //11
        $coste->masa = 0;    //12
        $coste->energia = 0;
        $coste->tiempo = 10;       //14
        $coste->mantenimiento = $fman * 10;
        $coste->defensa = 0;
        $coste->ataque = 20;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        //// carga      //////////////////////////////////////////


        $coste = new CostesArmas();
        $coste->armas_codigo = "90"; //carga peq1
        $coste->mineral = $fccc * 3000;
        $coste->cristal = $fccc * 0;
        $coste->gas = $fccc * 0;
        $coste->plastico = $fccc * 0; //4
        $coste->ceramica = $fccc * 0; //5
        $coste->liquido = $fccc * 0; //6
        $coste->micros = $fccc * 0;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 0; //11
        $coste->masa = $fccc * 45000;    //12
        $coste->energia = 0 * $fccc;
        $coste->tiempo = $fccc * 1000;       //14
        $coste->mantenimiento = $fman * $fccc * 2;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 20000;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "91"; //carga peq2
        $coste->mineral = $fccc * 1500;
        $coste->cristal = $fccc * 2000;
        $coste->gas = $fccc * 0;
        $coste->plastico = $fccc * 0; //4
        $coste->ceramica = $fccc * 0; //5
        $coste->liquido = $fccc * 0; //6
        $coste->micros = $fccc * 0;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 0; //11
        $coste->masa = $fccc * 90000;    //12
        $coste->energia = 0 * $fccc;
        $coste->tiempo = $fccc * 5000;       //14
        $coste->mantenimiento = $fman * $fccc * 4;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 40000;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "92"; //carga mediana
        $coste->mineral = $fccc * 70000;
        $coste->cristal = $fccc * 15000;
        $coste->gas = $fccc * 0;
        $coste->plastico = $fccc * 0; //4
        $coste->ceramica = $fccc * 10000; //5
        $coste->liquido = $fccc * 0; //6
        $coste->micros = $fccc * 0;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 0; //11
        $coste->masa = $fccc * 450000;    //12
        $coste->energia = 0 * $fccc;
        $coste->tiempo = $fccc * 10000;       //14
        $coste->mantenimiento = $fman * $fccc * 15;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 200000;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "93"; //carga cargaGrande
        $coste->mineral = $fccc * 100000;
        $coste->cristal = $fccc * 20000;
        $coste->gas = $fccc * 0;
        $coste->plastico = $fccc * 0; //4
        $coste->ceramica = $fccc * 20000; //5
        $coste->liquido = $fccc * 0; //6
        $coste->micros = $fccc * 0;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 0; //11
        $coste->masa = $fccc * 1125000;    //12
        $coste->energia = 0 * $fccc;
        $coste->tiempo = $fccc * 12000;       //14
        $coste->mantenimiento = $fman * $fccc * 40;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 500000;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "94"; //carga cargaGrande2
        $coste->mineral = $fccc * 50000;
        $coste->cristal = $fccc * 20000;
        $coste->gas = $fccc * 0;
        $coste->plastico = $fccc * 20000; //4
        $coste->ceramica = $fccc * 0; //5
        $coste->liquido = $fccc * 0; //6
        $coste->micros = $fccc * 30000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 0; //11
        $coste->masa = $fccc * 2250000;    //12
        $coste->energia = 0 * $fccc;
        $coste->tiempo = $fccc * 20000;       //14
        $coste->mantenimiento = $fman * $fccc * 75;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 1000000;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "95"; //carga enorme
        $coste->mineral = $fccc * 100000;
        $coste->cristal = $fccc * 40000;
        $coste->gas = $fccc * 40000;
        $coste->plastico = $fccc * 40000; //4
        $coste->ceramica = $fccc * 40000; //5
        $coste->liquido = $fccc * 0; //6
        $coste->micros = $fccc * 50000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 0; //11
        $coste->masa = $fccc * 6750000;    //12
        $coste->energia = 0 * $fccc;
        $coste->tiempo = $fccc * 25000;       //14
        $coste->mantenimiento = $fman * $fccc * 130;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 3000000;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "96"; //carga mega (ESTACION)
        $coste->mineral = $fccc * 200000;
        $coste->cristal = $fccc * 40000;
        $coste->gas = $fccc * 80000;
        $coste->plastico = $fccc * 80000; //4
        $coste->ceramica = $fccc * 40000; //5
        $coste->liquido = $fccc * 40000; //6
        $coste->micros = $fccc * 100000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 0; //11
        $coste->masa = $fccc * 3000000;    //12
        $coste->energia = 5000 * $fccc;
        $coste->tiempo = $fccc * 35000;       //14
        $coste->mantenimiento = $fman * $fccc * 350;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 7000000;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "97"; //carga hangar  cazas
        $coste->mineral = $fccc * 7000;
        $coste->cristal = $fccc * 500;
        $coste->gas = $fccc * 0;
        $coste->plastico = $fccc * 500; //4
        $coste->ceramica = $fccc * 500; //5
        $coste->liquido = $fccc * 500; //6
        $coste->micros = $fccc * 1000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 10; //11
        $coste->masa = $fccc * 90000;    //12
        $coste->energia = -5000 * $fccc;
        $coste->tiempo = $fccc * 3600;       //14
        $coste->mantenimiento = $fman * $fccc * 10;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 1;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "98"; //carga hangar  ligeras
        $coste->mineral = $fccc * 50000;
        $coste->cristal = $fccc * 2000;
        $coste->gas = $fccc * 0;
        $coste->plastico = $fccc * 2000; //4
        $coste->ceramica = $fccc * 2000; //5
        $coste->liquido = $fccc * 2000; //6
        $coste->micros = $fccc * 4000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 35; //11
        $coste->masa = $fccc * 450000;    //12
        $coste->energia = -10000 * $fccc;
        $coste->tiempo = $fccc * 6000;       //14
        $coste->mantenimiento = $fman * $fccc * 15;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 1;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "99"; //carga hangar  medias
        $coste->mineral = $fccc * 200000;
        $coste->cristal = $fccc * 100000;
        $coste->gas = $fccc * 10000;
        $coste->plastico = $fccc * 20000; //4
        $coste->ceramica = $fccc * 10000; //5
        $coste->liquido = $fccc * 50000; //6
        $coste->micros = $fccc * 500;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 200; //11
        $coste->masa = $fccc * 2250000;    //12
        $coste->energia = -30000 * $fccc;
        $coste->tiempo = $fccc * 8000;       //14
        $coste->mantenimiento = $fman * $fccc * 15;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 1;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "100"; // hangar pesadas
        $coste->mineral = $fccc * 400000;
        $coste->cristal = $fccc * 150000;
        $coste->gas = $fccc * 20000;
        $coste->plastico = $fccc * 40000; //4
        $coste->ceramica = $fccc * 20000; //5
        $coste->liquido = $fccc * 50000; //6
        $coste->micros = $fccc * 2000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 200; //11
        $coste->masa = $fccc * 6750000;    //12
        $coste->energia = -50000 * $fccc;
        $coste->tiempo = $fccc * 12000;       //14
        $coste->mantenimiento = $fman * $fccc * 35;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 1;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "101"; //carga hangar  estaciones
        $coste->mineral = $fccc * 600000;
        $coste->cristal = $fccc * 200000;
        $coste->gas = $fccc * 30000;
        $coste->plastico = $fccc * 40000; //4
        $coste->ceramica = $fccc * 50000; //5
        $coste->liquido = $fccc * 50000; //6
        $coste->micros = $fccc * 10000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 300; //11
        $coste->masa = $fccc * 2500000;    //12
        $coste->energia = -90000 * $fccc;
        $coste->tiempo = $fccc * 19000;       //14
        $coste->mantenimiento = $fman * $fccc * 50;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 1;
        array_push($costes, $coste);



        $coste = new CostesArmas();
        $coste->armas_codigo = "102"; //recolector
        $coste->mineral = $fccc * 7000;
        $coste->cristal = $fccc * 500;
        $coste->gas = $fccc * 0;
        $coste->plastico = $fccc * 500; //4
        $coste->ceramica = $fccc * 500; //5
        $coste->liquido = $fccc * 500; //6
        $coste->micros = $fccc * 1000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 10; //11
        $coste->masa = $fccc * 90000;    //12
        $coste->energia = -5000 * $fccc;
        $coste->tiempo = $fccc * 3600;       //14
        $coste->mantenimiento = $fman * $fccc * 25;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        $coste->recolector = 10000;
        $coste->extractor = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "103"; //extractor
        $coste->mineral = $fccc * 600000;
        $coste->cristal = $fccc * 200000;
        $coste->gas = $fccc * 30000;
        $coste->plastico = $fccc * 40000; //4
        $coste->ceramica = $fccc * 50000; //5
        $coste->liquido = $fccc * 50000; //6
        $coste->micros = $fccc * 10000;   //7
        $coste->fuel = $fccc * 0;     //8
        $coste->ma = 0;       //9
        $coste->municion = 0; //10
        $coste->personal = $fccc * 300; //11
        $coste->masa = $fccc * 2500000;    //12
        $coste->energia = -90000 * $fccc;
        $coste->tiempo = $fccc * 19000;       //14
        $coste->mantenimiento = $fman * $fccc * 500;
        $coste->defensa = 0;
        $coste->ataque = 0;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        $coste->recolector = 0;
        $coste->extractor = 250000;
        array_push($costes, $coste);



        /////////////////////////////  ARMAS   //////////////////////////////////////////////////////

        // costos de armas son por cada 1 de energia
        $factorPesoArmas = 80 / 100;

        $coste = new CostesArmas();
        $coste->armas_codigo = "11"; //arma ligera energia
        $coste->mineral = $fcae * 6000 * .5;
        $coste->cristal = $fcae * 2400 * .3;
        $coste->gas = $fcae * 300;
        $coste->plastico = $fcae * 300;
        $coste->ceramica = $fcae * 500;
        $coste->liquido = $fcae * 400;
        $coste->micros = $fcae * 100;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcae * 10;
        $coste->personal = $fcae * 1;
        $coste->masa = $factorPesoArmas * $fcae * 1000;
        $coste->energia = -$fcae * 800;
        $coste->tiempo = $fcae * 1900;
        $coste->mantenimiento = $fman * $fcae * 5;
        $coste->defensa = 0;
        $coste->ataque = 5000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "12"; //arma media energia
        $coste->mineral = $fcae * 6000 * 27 * .5;
        $coste->cristal = $fcae * 2400 * 27;   // * .3+
        $coste->gas = $fcae * 300 * 27;
        $coste->plastico = $fcae * 300 * 27;   //-
        $coste->ceramica = $fcae * 500 * 27;
        $coste->liquido = $fcae * 400 * 27;
        $coste->micros = $fcae * 80 * 27;      //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcae * 10;
        $coste->personal = $fcae * 1;
        $coste->masa = $factorPesoArmas * $fcae * 1000 * 2;
        $coste->energia = -$fcae * 800 * 2;
        $coste->tiempo = $fcae * 1900;
        $coste->mantenimiento = $fman * $fcae * 50;
        $coste->defensa = 0;
        $coste->ataque = 10000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "13"; //arma pesada energia
        $coste->mineral = $fcae * 6000 * 100 * .5;
        $coste->cristal = $fcae * 2400 * 100;   // * .3+
        $coste->gas = $fcae * 300 * 100;
        $coste->plastico = $fcae * 300 * 100;   //-
        $coste->ceramica = $fcae * 500 * 100;
        $coste->liquido = $fcae * 400 * 100;
        $coste->micros = $fcae * 80 * 100;      //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcae * 10;
        $coste->personal = $fcae * 1;
        $coste->masa = $factorPesoArmas * $fcae * 1000 * 4;
        $coste->energia = -$fcae * 800 * 3;
        $coste->tiempo = $fcae * 1900;
        $coste->mantenimiento = $fman * $fcae * 50;
        $coste->defensa = 0;
        $coste->ataque = 20000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "14"; //arma insertado energia
        $coste->mineral = $fcae * 6000 * 25 * .5;
        $coste->cristal = $fcae * 2400 * 25;   // * .3+
        $coste->gas = $fcae * 300 * 25;
        $coste->plastico = $fcae * 300 * 25;   //-
        $coste->ceramica = $fcae * 500 * 25;
        $coste->liquido = $fcae * 400 * 25;
        $coste->micros = $fcae * 80 * 25;      //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcae * 10;
        $coste->personal = $fcae * 1;
        $coste->masa = $factorPesoArmas * $fcae * 1000 * 8;
        $coste->energia = -$fcae * 800 * 1.5;
        $coste->tiempo = $fcae * 1900;
        $coste->mantenimiento = $fman * $fcae * 50;
        $coste->defensa = 0;
        $coste->ataque = 100000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "15"; //arma misiles energia
        $coste->mineral = $fcae * 6000 * 40 * .5;
        $coste->cristal = $fcae * 2400 * 40;   // * .3+
        $coste->gas = $fcae * 300 * 40;
        $coste->plastico = $fcae * 300 * 40;   //-
        $coste->ceramica = $fcae * 500 * 40;
        $coste->liquido = $fcae * 400 * 40;
        $coste->micros = $fcae * 80 * 40;      //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcae * 10;
        $coste->personal = $fcae * 1;
        $coste->masa = $factorPesoArmas * $fcae * 1000 * 4;
        $coste->energia = -$fcae * 800 * 2.5;
        $coste->tiempo = $fcae * 1900;
        $coste->mantenimiento = $fman * $fcae * 50;
        $coste->defensa = 0;
        $coste->ataque = 1000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "16"; //arma bombas energia
        $coste->mineral = $fcae * 6000 * $fcbomb * .5;
        $coste->cristal = $fcae * 2400 * $fcbomb;   // * .3+
        $coste->gas = $fcae * 300 * $fcbomb;
        $coste->plastico = $fcae * 300 * $fcbomb;   //-
        $coste->ceramica = $fcae * 500 * $fcbomb;
        $coste->liquido = $fcae * 400 * $fcbomb;
        $coste->micros = $fcae * 80 * $fcbomb;      //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcae * 10;
        $coste->personal = $fcae * 1;
        $coste->masa = $factorPesoArmas * $fcae * 1000 * 2;
        $coste->energia = -$fcae * 3000 / 5; //determina su potencia(a menos mas)
        $coste->tiempo = $fcae * 1900;
        $coste->mantenimiento = $fman * $fcae * $fcbomb;
        $coste->defensa = 0;
        $coste->ataque = 9000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "21"; //arma ligera plasma
        $coste->mineral = $fcap * 5500; // * .5-
        $coste->cristal = $fcap * 2000 * .3;
        $coste->gas = $fcap * 300;
        $coste->plastico = $fcap * 400;
        $coste->ceramica = $fcap * 650; //+
        $coste->liquido = $fcap * 350;  //-
        $coste->micros = $fcap * 100;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcap * 10;
        $coste->personal = $fcap * 1;
        $coste->masa = $factorPesoArmas * $fcap * 1000 * 2;
        $coste->energia = -$fcap * 700;
        $coste->tiempo = $fcap * 1900;
        $coste->mantenimiento = $fman * $fcap * 5;
        $coste->defensa = 0;
        $coste->ataque = 5000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "22"; //arma media plasma
        $coste->mineral = $fcap * 5500 * 27; // * .5-
        $coste->cristal = $fcap * 2000 * 27 * .3;
        $coste->gas = $fcap * 300 * 27;
        $coste->plastico = $fcap * 400 * 27;
        $coste->ceramica = $fcap * 650 * 27; //+
        $coste->liquido = $fcap * 350 * 27;  //-
        $coste->micros = $fcap * 100 * 27;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcap * 10;
        $coste->personal = $fcap * 1;
        $coste->masa = $factorPesoArmas * $fcap * 1000 * 4;
        $coste->energia = -$fcap * 700 * 2;
        $coste->tiempo = $fcap * 1900;
        $coste->mantenimiento = $fman * $fcap * 50;
        $coste->defensa = 0;
        $coste->ataque = 10000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "23"; //arma pesada plasma
        $coste->mineral = $fcap * 5500 * 100; // * .5-
        $coste->cristal = $fcap * 2000 * 100 * .3;
        $coste->gas = $fcap * 300 * 100;
        $coste->plastico = $fcap * 400 * 100;
        $coste->ceramica = $fcap * 650 * 100; //+
        $coste->liquido = $fcap * 350 * 100;  //-
        $coste->micros = $fcap * 100 * 100;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcap * 10;
        $coste->personal = $fcap * 1;
        $coste->masa = $factorPesoArmas * $fcap * 1000 * 8;
        $coste->energia = -$fcap * 700 * 3;
        $coste->tiempo = $fcap * 1900;
        $coste->mantenimiento = $fman * $fcap * 50;
        $coste->defensa = 0;
        $coste->ataque = 20000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "24"; //arma insertado plasma
        $coste->mineral = $fcap * 5500 * 25; // * .5-
        $coste->cristal = $fcap * 2000 * 25 * .3;
        $coste->gas = $fcap * 300 * 25;
        $coste->plastico = $fcap * 400 * 25;
        $coste->ceramica = $fcap * 650 * 25; //+
        $coste->liquido = $fcap * 350 * 25;  //-
        $coste->micros = $fcap * 100 * 25;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcap * 10;
        $coste->personal = $fcap * 1;
        $coste->masa = $factorPesoArmas * $fcap * 1000 * 16;
        $coste->energia = -$fcap * 700 * 1.5;
        $coste->tiempo = $fcap * 1900;
        $coste->mantenimiento = $fman * $fcap * 50;
        $coste->defensa = 0;
        $coste->ataque = 100000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "25"; //arma misiles plasma
        $coste->mineral = $fcap * 5500 * 40; // * .5-
        $coste->cristal = $fcap * 2000 * 40 * .3;
        $coste->gas = $fcap * 300 * 40;
        $coste->plastico = $fcap * 400 * 40;
        $coste->ceramica = $fcap * 650 * 40; //+
        $coste->liquido = $fcap * 350 * 40;  //-
        $coste->micros = $fcap * 100 * 40;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcap * 10;
        $coste->personal = $fcap * 1;
        $coste->masa = $factorPesoArmas * $fcap * 1000 * 4;
        $coste->energia = -$fcap * 700 * 2.5;
        $coste->tiempo = $fcap * 1900;
        $coste->mantenimiento = $fman * $fcap * 50;
        $coste->defensa = 0;
        $coste->ataque = 1000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "26"; //arma bombas plasma
        $coste->mineral = $fcap * 5500 * $fcbomb; // * .5-
        $coste->cristal = $fcap * 2000 * $fcbomb * .3;
        $coste->gas = $fcap * 300 * $fcbomb;
        $coste->plastico = $fcap * 400 * $fcbomb;
        $coste->ceramica = $fcap * 650 * $fcbomb; //+
        $coste->liquido = $fcap * 350 * $fcbomb;  //-
        $coste->micros = $fcap * 100 * $fcbomb;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcap * 10;
        $coste->personal = $fcap * 1;
        $coste->masa = $factorPesoArmas * $fcap * 1000 * 2;
        $coste->energia = -$fcap * 2500 / 5;
        $coste->tiempo = $fcap * 1900;
        $coste->mantenimiento = $fman * $fcap * $fcbomb;
        $coste->defensa = 0;
        $coste->ataque = 10000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);



        $coste = new CostesArmas();
        $coste->armas_codigo = "31"; //arma ligera balistica
        $coste->mineral = $fcab * 8000;     // * .5+
        $coste->cristal = $fcab * 2000 * .3;
        $coste->gas = $fcab * 300;
        $coste->plastico = $fcab * 200;     //-
        $coste->ceramica = $fcab * 500;
        $coste->liquido = $fcab * 500;
        $coste->micros = $fcab * 80;        //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcab * 15;
        $coste->personal = $fcab * 1;
        $coste->masa = $factorPesoArmas * $fcab * 1500 * 2;
        $coste->energia = -$fcab * 630;
        $coste->tiempo = $fcab * 1900;
        $coste->mantenimiento = $fman * $fcab * 5;
        $coste->defensa = 0;
        $coste->ataque = 5000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "32"; //arma media balistica
        $coste->mineral = $fcab * 8000 * 27;    // * .5+
        $coste->cristal = $fcab * 2000 * 27 * .3;
        $coste->gas = $fcab * 300 * 27;
        $coste->plastico = $fcab * 200 * 27;    //-
        $coste->ceramica = $fcab * 500 * 27;
        $coste->liquido = $fcab * 500 * 27;
        $coste->micros = $fcab * 80 * 27;       //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcab * 15;
        $coste->personal = $fcab * 1;
        $coste->masa = $factorPesoArmas * $fcab * 1500 * 4;
        $coste->energia = -$fcab * 630 * 2;
        $coste->tiempo = $fcab * 1900;
        $coste->mantenimiento = $fman * $fcab * 50;
        $coste->defensa = 0;
        $coste->ataque = 1000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "33"; //arma pesada balistica
        $coste->mineral = $fcab * 8000 * 100;   // * .5+
        $coste->cristal = $fcab * 2000 * 100 * .3;
        $coste->gas = $fcab * 300 * 100;
        $coste->plastico = $fcab * 200 * 100;   //-
        $coste->ceramica = $fcab * 500 * 100;
        $coste->liquido = $fcab * 500 * 100;
        $coste->micros = $fcab * 80 * 100;      //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcab * 15;
        $coste->personal = $fcab * 1;
        $coste->masa = $factorPesoArmas * $fcab * 1500 * 8;
        $coste->energia = -$fcab * 630 * 3;
        $coste->tiempo = $fcab * 1900;
        $coste->mantenimiento = $fman * $fcab * 50;
        $coste->defensa = 0;
        $coste->ataque = 20000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "34"; //arma insertado balistica
        $coste->mineral = $fcab * 8000 * 25;    // * .5+
        $coste->cristal = $fcab * 2000 * 25 * .3;
        $coste->gas = $fcab * 300 * 25;
        $coste->plastico = $fcab * 200 * 25;    //-
        $coste->ceramica = $fcab * 500 * 25;
        $coste->liquido = $fcab * 500 * 25;
        $coste->micros = $fcab * 80 * 25;       //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcab * 15;
        $coste->personal = $fcab * 1;
        $coste->masa = $factorPesoArmas * $fcab * 1500 * 16;
        $coste->energia = -$fcab * 630 * 1.5;
        $coste->tiempo = $fcab * 1900;
        $coste->mantenimiento = $fman * $fcab * 50;
        $coste->defensa = 0;
        $coste->ataque = 100000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "35"; //arma misiles balistica
        $coste->mineral = $fcab * 8000 * 40;    // * .5+
        $coste->cristal = $fcab * 2000 * 40 * .3;
        $coste->gas = $fcab * 300 * 40;
        $coste->plastico = $fcab * 200 * 40;    //-
        $coste->ceramica = $fcab * 500 * 40;
        $coste->liquido = $fcab * 500 * 40;
        $coste->micros = $fcab * 80 * 40;       //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcab * 15;
        $coste->personal = $fcab * 1;
        $coste->masa = $factorPesoArmas * $fcab * 1500 * 4;
        $coste->energia = -$fcab * 630 * 2.5;
        $coste->tiempo = $fcab * 1900;
        $coste->mantenimiento = $fman * $fcab * 50;
        $coste->defensa = 0;
        $coste->ataque = 1000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "36"; //arma bombas balistica
        $coste->mineral = $fcab * 8000 * $fcbomb;    // * .5+
        $coste->cristal = $fcab * 2000 * $fcbomb * .3;
        $coste->gas = $fcab * 300 * $fcbomb;
        $coste->plastico = $fcab * 200 * $fcbomb;    //-
        $coste->ceramica = $fcab * 500 * $fcbomb;
        $coste->liquido = $fcab * 500 * $fcbomb;
        $coste->micros = $fcab * 80 * $fcbomb;       //-
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcab * 15;
        $coste->personal = $fcab * 1;
        $coste->masa = $factorPesoArmas * $fcab * 1500 * 2;
        $coste->energia = -$fcab * 2000 / 5;
        $coste->tiempo = $fcab * 1900;
        $coste->mantenimiento = $fman * $fcab * $fcbomb;
        $coste->defensa = 0;
        $coste->ataque = 7000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "41"; //arma ligera M-A
        $coste->mineral = $fcam * 6000 * .5;
        $coste->cristal = $fcam * 2000 * .3;
        $coste->gas = $fcam * 300;
        $coste->plastico = $fcam * 400;
        $coste->ceramica = $fcam * 600;
        $coste->liquido = $fcam * 500;
        $coste->micros = $fcam * 120;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcam * 10;
        $coste->personal = $fcam * 1;
        $coste->masa = $factorPesoArmas * $fcam * 700;
        $coste->energia = -$fcam * 680;
        $coste->tiempo = $fcam * 1900;
        $coste->mantenimiento = $fman * $fcam * 5;
        $coste->defensa = 0;
        $coste->ataque = 5000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "42"; //arma media M-A
        $coste->mineral = $fcam * 6000 * 27 * .5;
        $coste->cristal = $fcam * 2000 * 27 * .3;
        $coste->gas = $fcam * 300 * 27;
        $coste->plastico = $fcam * 400 * 27;
        $coste->ceramica = $fcam * 500 * 27;
        $coste->liquido = $fcam * 500 * 27;
        $coste->micros = $fcam * 100 * 27;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcam * 10;
        $coste->personal = $fcam * 1;
        $coste->masa = $factorPesoArmas * $fcam * 1000 * 2;
        $coste->energia = -$fcam * 700 * 2;
        $coste->tiempo = $fcam * 1900;
        $coste->mantenimiento = $fman * $fcam * 50;
        $coste->defensa = 0;
        $coste->ataque = 1000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "43"; //arma pesada M-A
        $coste->mineral = $fcam * 6000 * 100 * .5;
        $coste->cristal = $fcam * 2000 * 100 * .3;
        $coste->gas = $fcam * 300 * 100;
        $coste->plastico = $fcam * 400 * 100;
        $coste->ceramica = $fcam * 500 * 100;
        $coste->liquido = $fcam * 500 * 100;
        $coste->micros = $fcam * 100 * 100;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcam * 10;
        $coste->personal = $fcam * 1;
        $coste->masa = $factorPesoArmas * $fcam * 1000 * 4;
        $coste->energia = -$fcam * 700 * 3;
        $coste->tiempo = $fcam * 1900;
        $coste->mantenimiento = $fman * $fcam * 50;
        $coste->defensa = 0;
        $coste->ataque = 20000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "44"; //arma insertado M-A
        $coste->mineral = $fcam * 6000 * 25 * .5;
        $coste->cristal = $fcam * 2000 * 25 * .3;
        $coste->gas = $fcam * 300 * 25;
        $coste->plastico = $fcam * 400 * 25;
        $coste->ceramica = $fcam * 500 * 25;
        $coste->liquido = $fcam * 500 * 25;
        $coste->micros = $fcam * 100 * 25;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcam * 10;
        $coste->personal = $fcam * 1;
        $coste->masa = $factorPesoArmas * $fcam * 1000 * 8;
        $coste->energia = -$fcam * 700 * 1.5;
        $coste->tiempo = $fcam * 1900;
        $coste->mantenimiento = $fman * $fcam * 50;
        $coste->defensa = 0;
        $coste->ataque = 100000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);


        $coste = new CostesArmas();
        $coste->armas_codigo = "45"; //arma misiles M-A
        $coste->mineral = $fcam * 6000 * 40 * .5;
        $coste->cristal = $fcam * 2000 * 40 * .3;
        $coste->gas = $fcam * 300 * 40;
        $coste->plastico = $fcam * 400 * 40;
        $coste->ceramica = $fcam * 500 * 40;
        $coste->liquido = $fcam * 500 * 40;
        $coste->micros = $fcam * 100 * 40;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcam * 10;
        $coste->personal = $fcam * 1;
        $coste->masa = $factorPesoArmas * $fcam * 1000 * 4;
        $coste->energia = -$fcam * 700 * 2.5;
        $coste->tiempo = $fcam * 1900;
        $coste->mantenimiento = $fman * $fcam * 50;
        $coste->defensa = 0;
        $coste->ataque = 1000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);

        $coste = new CostesArmas();
        $coste->armas_codigo = "46"; //arma bombas M-A
        $coste->mineral = $fcam * 6000 * $fcbomb * .5;
        $coste->cristal = $fcam * 2000 * $fcbomb * .3;
        $coste->gas = $fcam * 300 * $fcbomb;
        $coste->plastico = $fcam * 400 * $fcbomb;
        $coste->ceramica = $fcam * 500 * $fcbomb;
        $coste->liquido = $fcam * 500 * $fcbomb;
        $coste->micros = $fcam * 100 * $fcbomb;
        $coste->fuel = 0;
        $coste->ma = 0;
        $coste->municion = $fcam * 10;
        $coste->personal = $fcam * 1;
        $coste->masa = $factorPesoArmas * $fcam * 1000 * 8;
        $coste->energia = -$fcam * 4000 / 5;
        $coste->tiempo = $fcam * 1900;
        $coste->mantenimiento = $fman * $fcam * $fcbomb;
        $coste->defensa = 0;
        $coste->ataque = 13000;
        $coste->velocidad = 0;
        $coste->carga = 0;
        $coste->cargaPequenia = 0;
        $coste->cargaMediana = 0;
        $coste->cargaGrande = 0;
        $coste->cargaEnorme = 0;
        $coste->cargaMega = 0;
        array_push($costes, $coste);




        foreach ($costes as $estearma) {
            $estearma->save();
        }
    }
}
