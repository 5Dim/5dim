<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Constantes;
use App\Models\Industrias;

class Producciones extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function  generarDatosProducciones()
    {
        //$Avelprodminas=1.6;  // produccion de recursos en minas

        $Avelprodminas = Constantes::where('codigo', 'avelprodminas')->first()->valor;
        $factorprod = 1.7 * $Avelprodminas; //por lo que se multiplica la producción

        $cntinic1 = 37 * $factorprod;
        $lapotencia1 = 2.2;
        $cntinic2 = 27 * $factorprod;
        $lapotencia2 = 2.1;
        $cntinic3 = 25  * $factorprod;
        $lapotencia3 = 2.0;
        $cntinic4 = 30 * $factorprod;
        $lapotencia4 = 1.8;
        $cntinic5 = 30 * $factorprod;
        $lapotencia5 = 1.7;
        $cntinic6 = 19 * $factorprod;
        $lapotencia6 = 1.65;
        $cntinic7 = 19 * $factorprod;
        $lapotencia7 = 1.55;
        $cntinic8 = 17 * $factorprod;
        $lapotencia8 = 1.65;
        $cntinic9 = 12 * $factorprod;
        $lapotencia9 = 2.0;
        $cntinic10 = 2 * $factorprod;
        $lapotencia10 = 2.3;
        $cntinic11 = 18 * $factorprod;
        $lapotencia11 = .9;

        $producciones = [];

        for ($nivel = 0; $nivel < 100; $nivel++) {
            $produccion = new Producciones();
            $produccion->nivel = $nivel;

            $produccion->mineral = (($cntinic1 * pow($nivel, $lapotencia1)));
            $produccion->cristal = (($cntinic2 * pow($nivel, $lapotencia2)));
            $produccion->gas = (($cntinic3 * pow($nivel, $lapotencia3)));
            $produccion->plastico = (($cntinic4 * pow($nivel, $lapotencia4)));
            $produccion->ceramica = (($cntinic5 * pow($nivel, $lapotencia5)));
            $produccion->liquido = (($cntinic6 * pow($nivel, $lapotencia6)));
            $produccion->micros = (($cntinic7 * pow($nivel, $lapotencia7)));
            $produccion->fuel = (($cntinic8 * pow($nivel, $lapotencia8)));
            $produccion->ma = (($cntinic9 * pow($nivel, $lapotencia9)));
            $produccion->municion = (($cntinic10 * pow($nivel, $lapotencia10)));
            $produccion->personal = (($cntinic11 * pow($nivel, $lapotencia11)));

            array_push($producciones, $produccion);
        }

        foreach ($producciones as $estaproduccion) {
            $estaproduccion->save();
        }
    }

    public static function calcularProducciones($construcciones, $planetaActual, $calcular = true)
    {
        $producciones = [];

        for ($i = 0; $i < count($construcciones); $i++) {
            if (substr($construcciones[$i]->codigo, 0, 3) == "ind") {
                $industrias = Industrias::where('planetas_id', $planetaActual->id)->first();
                $industria = strtolower(substr($construcciones[$i]->codigo, 3));
                if ($industria == 'liquido') {
                    if ($industrias->liquido == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    } else {
                        $produccion = new Producciones;
                        $produccion->liquido = 0;
                    }
                } elseif ($industria == 'micros') {
                    if ($industrias->micros == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    } else {
                        $produccion = new Producciones;
                        $produccion->micros = 0;
                    }
                } elseif ($industria == 'fuel') {
                    if ($industrias->fuel == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    } else {
                        $produccion = new Producciones;
                        $produccion->fuel = 0;
                    }
                } elseif ($industria == 'ma') {
                    if ($industrias->ma == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    } else {
                        $produccion = new Producciones;
                        $produccion->ma = 0;
                    }
                } elseif ($industria == 'municion') {
                    if ($industrias->municion == 1) {
                        $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                    } else {
                        $produccion = new Producciones;
                        $produccion->municion = 0;
                    }
                } elseif ($industria == 'personal') {
                    $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                }
                array_push($producciones, $produccion);
            } elseif (substr($construcciones[$i]->codigo, 0, 4) == "mina") {
                $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 4)))->where('nivel', $construcciones[$i]->nivel)->first();
                array_push($producciones, $produccion);
            }
        }

        // dd($producciones);

        if ($calcular) {
            //Si no tiene cualidades asociadas, las genera
            if (empty($planetaActual->cualidades)) {
                $planetaActual->cualidades = new CualidadesPlanetas;
                $planetaActual->cualidades->mineral = rand($min = 30, $max = 99);
                $planetaActual->cualidades->cristal = rand($min = 30, $max = 99);
                $planetaActual->cualidades->gas = rand($min = 30, $max = 99);
                $planetaActual->cualidades->plastico = rand($min = 30, $max = 99);
                $planetaActual->cualidades->ceramica = rand($min = 30, $max = 99);
                $planetaActual->cualidades->eje_x = 0;
                $planetaActual->cualidades->eje_y = 0;
                $planetaActual->cualidades->enfriamiento = 0;
                $planetaActual->cualidades->planetas_id = $planetaActual->id;
                $planetaActual->cualidades->save();
            }

            //Calculamos los yacimientos y el terraformador
            $nivelTerraformador = $planetaActual->construcciones->where('codigo', 'terraformadorMinero')->first()->nivel;
            $producciones[1]->mineral *= (1 + ($planetaActual->cualidades->mineral + $nivelTerraformador) / 100);
            $producciones[2]->cristal *= (1 + ($planetaActual->cualidades->cristal + $nivelTerraformador) / 100);
            $producciones[3]->gas *= (1 + ($planetaActual->cualidades->gas + $nivelTerraformador) / 100);
            $producciones[4]->plastico *= (1 + ($planetaActual->cualidades->plastico + $nivelTerraformador) / 100);
            $producciones[5]->ceramica *= (1 + ($planetaActual->cualidades->ceramica + $nivelTerraformador) / 100);

            //Constantes de costes
            $CConstantes = Constantes::where('tipo', 'construccion')->get();

            // Investigaciones de industrias
            $investigaciones = Investigaciones::investigaciones($planetaActual);
            $mejoraIndustrias = Constantes::where('codigo', 'mejorainvIndustrias')->first()->valor;
            $factorLiquido = (1 + ($investigaciones->where('codigo', 'invIndLiquido')->first()->nivel * ($mejoraIndustrias)));
            $factorMicros = (1 + ($investigaciones->where('codigo', 'invIndMicros')->first()->nivel * ($mejoraIndustrias)));
            $factorFuel = (1 + ($investigaciones->where('codigo', 'invIndFuel')->first()->nivel * ($mejoraIndustrias)));
            $factorMa = (1 + ($investigaciones->where('codigo', 'invIndMa')->first()->nivel * ($mejoraIndustrias)));
            $factorMunicion = (1 + ($investigaciones->where('codigo', 'invIndMunicion')->first()->nivel * ($mejoraIndustrias)));

            //Calcular gastos de producciones
            $produccion->personal = $producciones[0]->personal;
            $produccion->mineral = $producciones[1]->mineral - ($producciones[6]->liquido * $CConstantes->where('codigo', 'costoLiquido')->first()->valor);
            $produccion->cristal = $producciones[2]->cristal - ($producciones[7]->micros * $CConstantes->where('codigo', 'costoMicros')->first()->valor);
            $produccion->gas = $producciones[3]->gas - ($producciones[8]->fuel * $CConstantes->where('codigo', 'costoFuel')->first()->valor);
            $produccion->plastico = $producciones[4]->plastico - ($producciones[9]->ma * $CConstantes->where('codigo', 'costoMa')->first()->valor);
            $produccion->ceramica = $producciones[5]->ceramica - ($producciones[10]->municion * $CConstantes->where('codigo', 'costoMunicion')->first()->valor);

            $produccion->liquido = $producciones[6]->liquido * $factorLiquido;
            $produccion->micros = $producciones[7]->micros * $factorMicros;
            $produccion->fuel = $producciones[8]->fuel * $factorFuel;
            $produccion->ma = $producciones[9]->ma * $factorMa;
            $produccion->municion = $producciones[10]->municion * $factorMunicion;
        } else {
            $produccion->personal = $producciones[0]->personal;
            $produccion->mineral = $producciones[1]->mineral;
            $produccion->cristal = $producciones[2]->cristal;
            $produccion->gas = $producciones[3]->gas;
            $produccion->plastico = $producciones[4]->plastico;
            $produccion->ceramica = $producciones[5]->ceramica;

            $produccion->liquido = $producciones[6]->liquido;
            $produccion->micros = $producciones[7]->micros;
            $produccion->fuel = $producciones[8]->fuel;
            $produccion->ma = $producciones[9]->ma;
            $produccion->municion = $producciones[10]->municion;
        }

        //calculo de niveles totales
        $constanteCreditos = Constantes::where('codigo', 'monedaPorNivel')->first()->valor;
        $numeroNiveles = 0;
        foreach ($construcciones as $construccion) {
            if ($construccion->codigo != "almMineral" and $construccion->codigo != "almCristal") {
                $numeroNiveles += $construccion->nivel;
            }
        }
        // $produccion = new Producciones();
        $produccion->creditos = $numeroNiveles * 1000 * $constanteCreditos;
        // array_push($producciones, $produccion);

        // dd($produccion);

        return $produccion;
    }
}
