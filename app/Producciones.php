<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Constantes;

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

            for($nivel=0;$nivel<100;$nivel++){
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

        public static function calcularProducciones ($construcciones, $planetaActual) {
            $producciones = [];

            for ($i = 0 ; $i < count($construcciones) ; $i++) {
                if (substr($construcciones[$i]->codigo, 0, 3) == "ind") {
                    $industrias = Industrias::where('planetas_id', $planetaActual->id)->first();
                    $industria = strtolower(substr($construcciones[$i]->codigo, 3));
                    if ($industria == 'liquido') {
                        if ($industrias->liquido == 1) {
                            $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                        }else{
                            $produccion = new Producciones;
                            $produccion->liquido = 0;
                        }
                    }elseif ($industria == 'micros') {
                        if ($industrias->micros == 1) {
                            $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                        }else{
                            $produccion = new Producciones;
                            $produccion->micros = 0;
                        }
                    }elseif ($industria == 'fuel') {
                        if ($industrias->fuel == 1) {
                            $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                        }else{
                            $produccion = new Producciones;
                            $produccion->fuel = 0;
                        }
                    }elseif ($industria == 'ma') {
                        if ($industrias->ma == 1) {
                            $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                        }else{
                            $produccion = new Producciones;
                            $produccion->ma = 0;
                        }
                    }elseif ($industria == 'municion') {
                        if ($industrias->municion == 1) {
                            $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                        }else{
                            $produccion = new Producciones;
                            $produccion->municion = 0;
                        }
                    }elseif ($industria == 'personal') {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    }
                    array_push($producciones, $produccion);
                }elseif (substr($construcciones[$i]->codigo, 0, 4) == "mina") {
                    $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 4)))->where('nivel', $construcciones[$i]->nivel)->first();
                    array_push($producciones, $produccion);
                }
            }

            //Calcular gastos de producciones
            $CConstantes=Constantes::where('tipo','construccion')->get();

            $producciones[1]->mineral -= ($producciones[6]->liquido * $CConstantes->where('codigo', 'costoLiquido')->first()->valor);
            $producciones[2]->cristal -= ($producciones[7]->micros * $CConstantes->where('codigo', 'costoMicros')->first()->valor);
            $producciones[3]->gas -= ($producciones[8]->fuel * $CConstantes->where('codigo', 'costoFuel')->first()->valor);
            $producciones[4]->plastico -= ($producciones[9]->ma * $CConstantes->where('codigo', 'costoMa')->first()->valor);
            $producciones[5]->ceramica -= ($producciones[10]->municion * $CConstantes->where('codigo', 'costoMunicion')->first()->valor);

            return $producciones;
        }


    }