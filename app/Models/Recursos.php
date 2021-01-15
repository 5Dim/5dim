<?php

namespace App\Models;

use App\Models\Planetas;
use App\Models\Almacenes;
use App\Models\Construcciones;
use App\Models\Constantes;
use App\Models\Producciones;
use App\Models\Industrias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
    use HasFactory;
    public function planetas()
    {
        return $this->belongsTo(Planetas::class);
    }

    public static function calcularRecursos($id)
    {
        //Buscamos el planeta actual
        $planetaActual = Planetas::find($id);
        //Definimos los objetos que vamos a necesitar
        $recursos = Recursos::where('planetas_id', $id)->first();
        //$planeta = Planeta::where('id', $id)->first();
        $construcciones = Construcciones::where('planetas_id', $id)->get();
        $industrias = Industrias::where('planetas_id', $id)->first();
        $producciones = [];
        $almacenes = [];

        //Si no existen los recursos, los creamos
        if (empty($recursos)) {
            $recursos = new Recursos;
            $recursos->mineral = 1000000000;
            $recursos->cristal = 1000000000;
            $recursos->gas = 0;
            $recursos->plastico = 0;
            $recursos->ceramica = 0;
            $recursos->liquido = 0;
            $recursos->micros = 0;
            $recursos->fuel = 0;
            $recursos->ma = 0;
            $recursos->municion = 0;
            $recursos->personal = 1000000000;
            $recursos->creditos = 1000000000;
            $recursos->planetas_id = session()->get('planetas_id');
            $recursos->save();
        }

        $investigaciones = $recursos->planetas->jugadores->investigaciones;

        //Calculamos producciones
        for ($i = 0; $i < count($construcciones); $i++) {
            if (substr($construcciones[$i]->codigo, 0, 3) == "ind") {
                $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 3)))->where('nivel', $construcciones[$i]->nivel)->first();
                array_push($producciones, $produccion);
            } elseif (substr($construcciones[$i]->codigo, 0, 4) == "mina") {
                $produccion = Producciones::select(strtolower(substr($construcciones[$i]->codigo, 4)))->where('nivel', $construcciones[$i]->nivel)->first();
                array_push($producciones, $produccion);
                //Calculamos almacenes
            } elseif (substr($construcciones[$i]->codigo, 0, 3) == "alm") {
                $almacen = Almacenes::where('nivel', $construcciones[$i]->nivel)->first();
                array_push($almacenes, $almacen);
            }
        }

        //Calculamos recursos
        $fechaInicio = strtotime($recursos->updated_at);
        $fechaFin = time();

        //Calculamos el tiempo que ha producido
        $fechaCalculo = $fechaFin - $fechaInicio;

        //Calculamos lo producido

        //Calculamos los yacimientos y el terraformador
        $nivelTerraformador = $planetaActual->construcciones->where('codigo', 'terraformador')->first()->nivel;

        //Minas
        $contProducciones = 1;
        $recursos->mineral += (($producciones[$contProducciones]->mineral * (1 + ($planetaActual->cualidades->mineral + $nivelTerraformador) / 100)) / 3600 * $fechaCalculo);
        $contProducciones++;
        $recursos->cristal += (($producciones[$contProducciones]->cristal * (1 + ($planetaActual->cualidades->cristal + $nivelTerraformador) / 100)) / 3600 * $fechaCalculo);
        $contProducciones++;
        $recursos->gas += (($producciones[$contProducciones]->gas * (1 + ($planetaActual->cualidades->gas + $nivelTerraformador) / 100)) / 3600 * $fechaCalculo);
        $contProducciones++;
        $recursos->plastico += (($producciones[$contProducciones]->plastico * (1 + ($planetaActual->cualidades->plastico + $nivelTerraformador) / 100)) / 3600 * $fechaCalculo);
        $contProducciones++;
        $recursos->ceramica += (($producciones[$contProducciones]->ceramica * (1 + ($planetaActual->cualidades->ceramica + $nivelTerraformador) / 100)) / 3600 * $fechaCalculo);
        $contProducciones++;

        //Industrias
        $liquido = ($producciones[$contProducciones]->liquido / 3600 * $fechaCalculo);
        $contProducciones++;
        $micros = ($producciones[$contProducciones]->micros / 3600 * $fechaCalculo);
        $contProducciones++;
        $fuel = ($producciones[$contProducciones]->fuel / 3600 * $fechaCalculo);
        $contProducciones++;
        $ma = ($producciones[$contProducciones]->ma / 3600 * $fechaCalculo);
        $contProducciones++;
        $municion = ($producciones[$contProducciones]->municion / 3600 * $fechaCalculo);
        $contProducciones++;

        //Calculamos industrias
        if (!empty($industrias)) {
            $mejoraIndustrias = Constantes::where('codigo', 'mejorainvIndustrias')->first()->valor;
            $gastoFliquido = 0;
            if ($industrias->liquido == 1) {
                $costo = Constantes::where('codigo', 'costoLiquido')->first()->valor;
                $gastoFliquido = $liquido * $costo;
                if ($gastoFliquido > $recursos->mineral) {
                    $gastoFliquido = $recursos->mineral;
                    $liquido = $gastoFliquido / $costo;
                }
                $recursos->mineral -= $gastoFliquido;
                $recursos->liquido += $liquido * (1 + ($investigaciones->where('codigo', 'invIndLiquido')->first()->nivel * ($mejoraIndustrias)));
            }

            $gastoFmicros = 0;
            if ($industrias->micros == 1) {
                $costo = Constantes::where('codigo', 'costoMicros')->first()->valor;
                $gastoFmicros = $micros * $costo;
                if ($gastoFmicros > $recursos->cristal) {
                    $gastoFmicros = $recursos->cristal;
                    $micros = $gastoFmicros / $costo;
                }
                $recursos->cristal -= $gastoFmicros;
                $recursos->micros += $micros * (1 + ($investigaciones->where('codigo', 'invIndMicros')->first()->nivel * ($mejoraIndustrias)));
            }

            $gastoFfuel = 0;
            if ($industrias->fuel == 1) {
                $costo = Constantes::where('codigo', 'costoFuel')->first()->valor;
                $gastoFfuel = $fuel *  $costo;
                if ($gastoFfuel > $recursos->gas) {
                    $gastoFfuel = $recursos->gas;
                    $fuel = $gastoFfuel / $costo;
                }
                $recursos->gas -= $gastoFfuel;
                $recursos->fuel += $fuel * (1 + ($investigaciones->where('codigo', 'invIndFuel')->first()->nivel * ($mejoraIndustrias)));
            }

            $gastoFma = 0;
            if ($industrias->ma == 1) {
                $costo = Constantes::where('codigo', 'costoMa')->first()->valor;
                $gastoFma = $ma *  $costo;
                if ($gastoFma > $recursos->plastico) {
                    $gastoFma = $recursos->plastico;
                    $ma = $gastoFma / $costo;
                }
                $recursos->plastico -= $gastoFma;
                $recursos->ma += $ma * (1 + ($investigaciones->where('codigo', 'invIndMa')->first()->nivel * ($mejoraIndustrias)));
            }

            $gastoFmunicion = 0;
            if ($industrias->municion == 1) {
                $costo = Constantes::where('codigo', 'costoMunicion')->first()->valor;
                $gastoFmunicion = $municion *  $costo;
                if ($gastoFmunicion > $recursos->ceramica) {
                    $gastoFmunicion = $recursos->ceramica;
                    $municion = $gastoFmunicion / $costo;
                }
                $recursos->ceramica -= $gastoFmunicion;
                $recursos->municion += $municion * (1 + ($investigaciones->where('codigo', 'invIndMunicion')->first()->nivel * ($mejoraIndustrias)));
            }
        }

        //calculo de niveles totales
        $constanteCreditos = Constantes::where('codigo', 'monedaPorNivel')->first()->valor;
        $numeroNiveles = 0;
        foreach ($construcciones as $construccion) {
            if ($construccion->codigo != "almMineral" and $construccion->codigo != "almCristal") {
                $numeroNiveles += $construccion->nivel;
            }
        }

        //Personal y creditos
        $recursos->personal = ($producciones[0]->personal / 3600 * $fechaCalculo) + $recursos->personal;
        $recursos->creditos = ((($numeroNiveles * 1000 * $constanteCreditos) / (24 * 3600)) * $fechaCalculo) + $recursos->creditos;

        //Comprobamos almacenes
        $contAlmacenes = 0;
        $recursos->mineral >= $almacenes[$contAlmacenes]->capacidad ? $recursos->mineral = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->cristal >= $almacenes[$contAlmacenes]->capacidad ? $recursos->cristal = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->gas >= $almacenes[$contAlmacenes]->capacidad ? $recursos->gas = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->plastico >= $almacenes[$contAlmacenes]->capacidad ? $recursos->plastico = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->ceramica >= $almacenes[$contAlmacenes]->capacidad ? $recursos->ceramica = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->liquido >= $almacenes[$contAlmacenes]->capacidad ? $recursos->liquido = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->micros >= $almacenes[$contAlmacenes]->capacidad ? $recursos->micros = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->fuel >= $almacenes[$contAlmacenes]->capacidad ? $recursos->fuel = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->ma >= $almacenes[$contAlmacenes]->capacidad ? $recursos->ma = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->municion >= $almacenes[$contAlmacenes]->capacidad ? $recursos->municion = $almacenes[$contAlmacenes]->capacidad : '';
        $contAlmacenes++;
        $recursos->personal;

        //Guardamos los cambios
        $recursos->save();
    }

    /**
     * Relacion de los planetas con los usuarios
     */
    public function planeta()
    {
        return $this->belongsTo(Planetas::class);
    }
}
