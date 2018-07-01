<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producciones extends Model
{

    public $timestamps = false;

    public function  generarDatosProducciones(){

    /*
    	eval ("\$crCR$ciclico = ((\$cntinic$ciclico * pow ((int) (\$jugones->EDIFICIO$ciclico) , \$lapotencia$ciclico)))/3600;");

	eval ("\$NCRj$ciclico$eljugon = ( \$lapso * \$crCR$ciclico );");
    eval ("\$crTcogidosr$ciclico = \$crTcogidosr$ciclico + ( \$lapso * \$crCR$ciclico );");

    (($cntinic1 * pow (nivel , $lapotencia1)))/3600  por segundo

    */

    //$Avelprodminas=1.6;  // produccion de recursos en minas

    $Avelprodminas=1.6;//Constantes::where('codigo','Avelprodminas')->first()->valor;
    $factorprod = 1.7 * $Avelprodminas; //por lo que se multiplica la producción

    $cntinic1 = 37 * $factorprod;     $lapotencia1 = 2.2;
    $cntinic2 = 27 * $factorprod;     $lapotencia2 = 2.1;
    $cntinic3 = 25  * $factorprod;     $lapotencia3 = 2.0;
    $cntinic4 = 20 * $factorprod;     $lapotencia4 = 1.8;
    $cntinic5 = 30 * $factorprod;     $lapotencia5 = 1.7;
    $cntinic6 = 19 * $factorprod;     $lapotencia6 = 1.65;
    $cntinic7 = 19 * $factorprod;     $lapotencia7 = 1.55;
    $cntinic8 = 17 * $factorprod;     $lapotencia8 = 1.65;
    $cntinic9 = 12 * $factorprod;     $lapotencia9 = 2.0;
    $cntinic10 = 2 * $factorprod;     $lapotencia10 = 2.3;
    $cntinic11 = 15 * $factorprod;     $lapotencia11 = .9;

        $producciones=[];

            for($nivel=1;$nivel<100;$nivel++){
                $produccion =new Producciones();
                $produccion->nivel=$nivel;

                $produccion->mineral=(($cntinic1 * pow ($nivel , $lapotencia1)));
                $produccion->cristal=(($cntinic2 * pow ($nivel , $lapotencia2)));
                $produccion->gas=(($cntinic3 * pow ($nivel , $lapotencia3)));
                $produccion->plastico=(($cntinic4 * pow ($nivel , $lapotencia4)));
                $produccion->ceramica=(($cntinic5 * pow ($nivel , $lapotencia5)));
                $produccion->liquido=(($cntinic6 * pow ($nivel , $lapotencia6)));
                $produccion->micros=(($cntinic7 * pow ($nivel , $lapotencia7)));
                $produccion->fuel=(($cntinic8 * pow ($nivel , $lapotencia8)));
                $produccion->ma=(($cntinic9 * pow ($nivel , $lapotencia9)));
                $produccion->municion=(($cntinic10 * pow ($nivel , $lapotencia10)));
                $produccion->personal=(($cntinic11 * pow ($nivel , $lapotencia11)));

                array_push($producciones, $produccion);
            }

            foreach($producciones as $estaproduccion){
                $estaproduccion->save();
            }
    }
}