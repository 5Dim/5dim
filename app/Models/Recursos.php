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

    // public function planeta()
    // {
    //     return $this->belongsTo(Planetas::class);
    // }

    public static function recursosInicio($cantidad = 0)
    {
        if ($cantidad == 0) {
            $cantidad = Constantes::where('codigo', 'cantidadrecursosinicio')->first()->valor;
        }
        $recursos = new Recursos;
        $recursos->mineral = $cantidad;
        $recursos->cristal = $cantidad;
        $recursos->gas = 0;
        $recursos->plastico = 0;
        $recursos->ceramica = 0;
        $recursos->liquido = 0;
        $recursos->micros = 0;
        $recursos->fuel = 0;
        $recursos->ma = 0;
        $recursos->municion = 0;
        $recursos->personal = $cantidad / 2;
        $recursos->creditos = $cantidad / 10;
        $recursos->planetas_id = session()->get('planetas_id');
        $recursos->save();
        return $recursos;
    }

    public static function calcularRecursos($idPlaneta)
    {
        //Buscamos el planeta actual
        $planetaActual = Planetas::find($idPlaneta);
        //Definimos los objetos que vamos a necesitar
        $recursos = Recursos::where('planetas_id', $idPlaneta)->first();
        //$planeta = Planeta::where('id', $idPlaneta)->first();
        $construcciones = Construcciones::where('planetas_id', $idPlaneta)->get();
        $industrias = Industrias::where('planetas_id', $idPlaneta)->first();
        $almacenes = [];

        //Si no existen los recursos, los creamos
        if (empty($recursos)) {
            $recursos = Recursos::recursosInicio();
        }

        $investigaciones = Investigaciones::where('jugadores_id', session()->get('jugadores_id'))->get();

        //Calculamos producciones
        $produccion = Producciones::calcularProducciones($construcciones, $planetaActual);

        //Calculamos almacenes
        $almacenes = Almacenes::calcularAlmacenes($construcciones);

        //Calculamos recursos
        $fechaInicio = strtotime($recursos->updated_at);
        $fechaFin = time();

        //Calculamos el tiempo que ha producido
        $fechaCalculo = $fechaFin - $fechaInicio;

        //Calculamos lo producido

        //Calculamos los yacimientos y el terraformador
        $nivelTerraformador = $planetaActual->construcciones->where('codigo', 'terraformadorMinero')->first()->nivel;

        if (empty($planetaActual->cualidades)) {
            CualidadesPlanetas::agregarCualidades($planetaActual->id, Constantes::where('codigo', 'yacimientosIniciales')->first()->valor);
            $planetaActual = Planetas::find($idPlaneta);
        }

        //calculo de niveles totales
        $constanteCreditos = Constantes::where('codigo', 'monedaPorNivel')->first()->valor;
        $numeroNiveles = 0;
        foreach ($construcciones as $construccion) {
            $numeroNiveles += $construccion->nivel;
        }

        //Minas
        $recursos->mineral += ((($produccion->mineral * (1 + ($planetaActual->cualidades->mineral + $nivelTerraformador) / 100)) / 3600) * $fechaCalculo);
        $recursos->cristal += ((($produccion->cristal * (1 + ($planetaActual->cualidades->cristal + $nivelTerraformador) / 100)) / 3600) * $fechaCalculo);
        $recursos->gas += ((($produccion->gas * (1 + ($planetaActual->cualidades->gas + $nivelTerraformador) / 100)) / 3600) * $fechaCalculo);
        $recursos->plastico += ((($produccion->plastico * (1 + ($planetaActual->cualidades->plastico + $nivelTerraformador) / 100)) / 3600) * $fechaCalculo);
        $recursos->ceramica += ((($produccion->ceramica * (1 + ($planetaActual->cualidades->ceramica + $nivelTerraformador) / 100)) / 3600) * $fechaCalculo);

        //Industrias
        $liquido = ($produccion->liquido / 3600 * $fechaCalculo);
        $micros = ($produccion->micros / 3600 * $fechaCalculo);
        $fuel = ($produccion->fuel / 3600 * $fechaCalculo);
        $ma = ($produccion->ma / 3600 * $fechaCalculo);
        $municion = ($produccion->municion / 3600 * $fechaCalculo);

        //Calculamos industrias
        if (!empty($industrias)) {
            $mejoraIndustrias = Constantes::where('codigo', 'mejorainvIndustrias')->first()->valor;
            if ($industrias->liquido == 1) {
                $gastoFliquido = 0;
                $costo = Constantes::where('codigo', 'costoLiquido')->first()->valor;
                $gastoFliquido = $liquido * $costo;
                if ($gastoFliquido > $recursos->mineral) {
                    $gastoFliquido = $recursos->mineral;
                    $liquido = $gastoFliquido / $costo;
                }
                $recursos->mineral -= $gastoFliquido;
                $recursos->liquido += $liquido * (1 + ($investigaciones->where('codigo', 'invIndLiquido')->first()->nivel * ($mejoraIndustrias)));
            } elseif ($industrias->micros == 1) {
                $gastoFmicros = 0;
                $costo = Constantes::where('codigo', 'costoMicros')->first()->valor;
                $gastoFmicros = $micros * $costo;
                if ($gastoFmicros > $recursos->cristal) {
                    $gastoFmicros = $recursos->cristal;
                    $micros = $gastoFmicros / $costo;
                }
                $recursos->cristal -= $gastoFmicros;
                $recursos->micros += $micros * (1 + ($investigaciones->where('codigo', 'invIndMicros')->first()->nivel * ($mejoraIndustrias)));
            } elseif ($industrias->fuel == 1) {
                $gastoFfuel = 0;
                $costo = Constantes::where('codigo', 'costoFuel')->first()->valor;
                $gastoFfuel = $fuel *  $costo;
                if ($gastoFfuel > $recursos->gas) {
                    $gastoFfuel = $recursos->gas;
                    $fuel = $gastoFfuel / $costo;
                }
                $recursos->gas -= $gastoFfuel;
                $recursos->fuel += $fuel * (1 + ($investigaciones->where('codigo', 'invIndFuel')->first()->nivel * ($mejoraIndustrias)));
            } elseif ($industrias->ma == 1) {
                $gastoFma = 0;
                $costo = Constantes::where('codigo', 'costoMa')->first()->valor;
                $gastoFma = $ma *  $costo;
                if ($gastoFma > $recursos->plastico) {
                    $gastoFma = $recursos->plastico;
                    $ma = $gastoFma / $costo;
                }
                $recursos->plastico -= $gastoFma;
                $recursos->ma += $ma * (1 + ($investigaciones->where('codigo', 'invIndMa')->first()->nivel * ($mejoraIndustrias)));
            } elseif ($industrias->municion == 1) {
                $gastoFmunicion = 0;
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

        //Personal y creditos
        $recursos->personal = ($produccion->personal / 3600 * $fechaCalculo) + $recursos->personal;
        $recursos->creditos = ((($numeroNiveles * $constanteCreditos * 1000) / (24 * 3600)) * $fechaCalculo) + $recursos->creditos;

        // dd($almacenes);

        //Comprobamos almacenes
        $contAlmacenes = 0;
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

        //Guardamos los cambios
        $recursos->save();
    }


    public static function calcularRecoleccion($idPlaneta)
    {
    }

    public static function initRecursos($idPlaneta)
    {
        $recursos = new Recursos;
        $recursos->mineral = 0;
        $recursos->cristal = 0;
        $recursos->gas = 0;
        $recursos->plastico = 0;
        $recursos->ceramica = 0;
        $recursos->liquido = 0;
        $recursos->micros = 0;
        $recursos->fuel = 0;
        $recursos->ma = 0;
        $recursos->municion = 0;
        $recursos->personal = 0;
        $recursos->creditos = 0;
        $recursos->planetas_id = $idPlaneta;
        $recursos->save();
        return $recursos;
    }
}
