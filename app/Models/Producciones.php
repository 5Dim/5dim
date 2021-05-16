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

    public static function generarDatosProducciones()
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
        $industrias = Industrias::where('planetas_id', $planetaActual->id)->first();
        $produccion = new Producciones;

        foreach ($construcciones as $construccion) {
            if (substr($construccion->codigo, 0, 3) == "ind" || substr($construccion->codigo, 0, 4) == "mina") {
                if (substr($construccion->codigo, 0, 3) == "ind") {
                    $industria = strtolower(substr($construccion->codigo, 3));
                    if ($industria == 'liquido') {
                        if ($industrias->liquido == 1) {
                            $produccion->liquido = Producciones::where('nivel', $construccion->nivel)->first()->liquido;
                        } else {
                            $produccion->liquido = 0;
                        }
                    } elseif ($industria == 'micros') {
                        if ($industrias->micros == 1) {
                            $produccion->micros = Producciones::where('nivel', $construccion->nivel)->first()->micros;
                        } else {
                            $produccion->micros = 0;
                        }
                    } elseif ($industria == 'fuel') {
                        if ($industrias->fuel == 1) {
                            $produccion->fuel = Producciones::where('nivel', $construccion->nivel)->first()->fuel;
                        } else {
                            $produccion->fuel = 0;
                        }
                    } elseif ($industria == 'ma') {
                        if ($industrias->ma == 1) {
                            $produccion->ma = Producciones::where('nivel', $construccion->nivel)->first()->ma;
                        } else {
                            $produccion->ma = 0;
                        }
                    } elseif ($industria == 'municion') {
                        if ($industrias->municion == 1) {
                            $produccion->municion = Producciones::where('nivel', $construccion->nivel)->first()->municion;
                        } else {
                            $produccion->municion = 0;
                        }
                    } elseif ($industria == 'personal') {
                        $produccion->personal = Producciones::where('nivel', $construccion->nivel)->first()->personal;
                    }
                } elseif (substr($construccion->codigo, 0, 4) == "mina") {
                    $mina = strtolower(substr($construccion->codigo, 4));
                    if ($mina == 'mineral') {
                        $produccion->mineral = Producciones::where('nivel', $construccion->nivel)->first()->mineral;
                    } elseif ($mina == 'cristal') {
                        $produccion->cristal = Producciones::where('nivel', $construccion->nivel)->first()->cristal;
                    } elseif ($mina == 'gas') {
                        $produccion->gas = Producciones::where('nivel', $construccion->nivel)->first()->gas;
                    } elseif ($mina == 'plastico') {
                        $produccion->plastico = Producciones::where('nivel', $construccion->nivel)->first()->plastico;
                    } elseif ($mina == 'ceramica') {
                        $produccion->ceramica = Producciones::where('nivel', $construccion->nivel)->first()->ceramica;
                    }
                }
            }
        }

        if ($calcular) {
            //Calculamos los yacimientos y el terraformador
            $Terraformador = $planetaActual->construcciones->where('codigo', 'terraformadorMinero')->first();
            $nivelTerraformador = 0;
            if ($Terraformador != null) {
                $nivelTerraformador = $Terraformador->nivel;
            }
            $produccion->mineral *= (1 + ($planetaActual->cualidades->mineral + $nivelTerraformador) / 100);
            $produccion->cristal *= (1 + ($planetaActual->cualidades->cristal + $nivelTerraformador) / 100);
            $produccion->gas *= (1 + ($planetaActual->cualidades->gas + $nivelTerraformador) / 100);
            $produccion->plastico *= (1 + ($planetaActual->cualidades->plastico + $nivelTerraformador) / 100);
            $produccion->ceramica *= (1 + ($planetaActual->cualidades->ceramica + $nivelTerraformador) / 100);

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
            $produccion->personal = $produccion->personal;
            $produccion->mineral = $produccion->mineral - ($produccion->liquido * $CConstantes->where('codigo', 'costoLiquido')->first()->valor);
            $produccion->cristal = $produccion->cristal - ($produccion->micros * $CConstantes->where('codigo', 'costoMicros')->first()->valor);
            $produccion->gas = $produccion->gas - ($produccion->fuel * $CConstantes->where('codigo', 'costoFuel')->first()->valor);
            $produccion->plastico = $produccion->plastico - ($produccion->ma * $CConstantes->where('codigo', 'costoMa')->first()->valor);
            $produccion->ceramica = $produccion->ceramica - ($produccion->municion * $CConstantes->where('codigo', 'costoMunicion')->first()->valor);

            $produccion->liquido = $produccion->liquido * $factorLiquido;
            $produccion->micros = $produccion->micros * $factorMicros;
            $produccion->fuel = $produccion->fuel * $factorFuel;
            $produccion->ma = $produccion->ma * $factorMa;
            $produccion->municion = $produccion->municion * $factorMunicion;
        } else {
            $produccion->personal = $produccion->personal;
            $produccion->mineral = $produccion->mineral;
            $produccion->cristal = $produccion->cristal;
            $produccion->gas = $produccion->gas;
            $produccion->plastico = $produccion->plastico;
            $produccion->ceramica = $produccion->ceramica;

            $produccion->liquido = $produccion->liquido;
            $produccion->micros = $produccion->micros;
            $produccion->fuel = $produccion->fuel;
            $produccion->ma = $produccion->ma;
            $produccion->municion = $produccion->municion;
        }

        //calculo de niveles totales
        $constanteCreditos = Constantes::where('codigo', 'monedaPorNivel')->first()->valor;
        $numeroNiveles = 0;
        foreach ($construcciones as $construccion) {
            if ($construccion->codigo != "almMineral" and $construccion->codigo != "almCristal") {
                $numeroNiveles += $construccion->nivel;
            }
        }
        $produccion->creditos = $numeroNiveles * 1000 * $constanteCreditos;

        return $produccion;
    }

    public static function produccionRecoleccion($idPlaneta, $calcular = true)
    {
        $cualidades = Planetas::find($idPlaneta)->cualidades;
        $mejoraInvestigacionRecoleccion = 1+(Investigaciones::where('codigo', 'invRecoleccion')->first()->nivel * Constantes::where('codigo', 'mejorainvRecoleccion')->first()->valor);

        $produccion = new Producciones();
        if ($calcular) {
            $produccion->mineral = Producciones::where('nivel', $cualidades->mineral)->first()->mineral * $mejoraInvestigacionRecoleccion;
            $produccion->cristal = Producciones::where('nivel', $cualidades->cristal)->first()->cristal * $mejoraInvestigacionRecoleccion;
            $produccion->gas = Producciones::where('nivel', $cualidades->gas)->first()->gas * $mejoraInvestigacionRecoleccion;
            $produccion->plastico = Producciones::where('nivel', $cualidades->plastico)->first()->plastico * $mejoraInvestigacionRecoleccion;
            $produccion->ceramica = Producciones::where('nivel', $cualidades->ceramica)->first()->ceramica * $mejoraInvestigacionRecoleccion;
        } else {
            $produccion->mineral = Producciones::where('nivel', $cualidades->mineral)->first()->mineral;
            $produccion->cristal = Producciones::where('nivel', $cualidades->cristal)->first()->cristal;
            $produccion->gas = Producciones::where('nivel', $cualidades->gas)->first()->gas;
            $produccion->plastico = Producciones::where('nivel', $cualidades->plastico)->first()->plastico;
            $produccion->ceramica = Producciones::where('nivel', $cualidades->ceramica)->first()->ceramica;
        }
        $produccion->totalPosible=floor($produccion->mineral+$produccion->cristal+$produccion->gas+$produccion->plastico+$produccion->ceramica);
        return $produccion;
    }
}
