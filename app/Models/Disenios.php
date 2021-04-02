<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


class Disenios extends Model
{
    use HasFactory;

    public function jugadores()
    {
        return $this->belongsToMany(Jugadores::class);
    }

    public function danios()
    {
        return $this->hasMany(DaniosDisenios::class);
    }

    public function cualidades()
    {
        return $this->hasOne(CualidadesDisenios::class);
    }

    public function costes()
    {
        return $this->hasOne(CostesDisenios::class);
    }

    public function viewDanios()
    {
        return $this->hasMany(ViewDaniosDisenios::class);
    }

    public function cola()
    {
        return $this->hasMany(EnDisenios::class);
    }

    public function fuselajes()
    {
        return $this->belongsTo(Fuselajes::class);
    }

    public function estacionadas()
    {
        return $this->hasOne(DiseniosEnPlaneta::class);
    }

    public function creador()
    {
        return $this->belongsTo(Jugadores::class, 'jugadores_id');
    }

    public function mejoras()
    {
        return $this->hasOne(MejorasDisenios::class);
    }

    public static function calculaMejoras($disenios)
    {
        $investigaciones = Jugadores::find(session()->get('jugadores_id'))->investigaciones;
        $constantes = Constantes::where('tipo', 'investigacion')->get();
        // dd($investigaciones);
        $diseniosR=[];

        foreach ($disenios as $disenio) {
            $mejoras = $disenio->mejoras;
            $datos = new MejorasDisenios();
            // Velocidades
            $datos->invPropQuimico = $mejoras->invPropQuimico * (1 + ($investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * $constantes->where('codigo', 'mejorainvPropQuimico')->first()->valor));
            $datos->invPropNuk = $mejoras->invPropNuk * (1 + ($investigaciones->where('codigo', 'invPropNuk')->first()->nivel * $constantes->where('codigo', 'mejorainvPropNuk')->first()->valor));
            $datos->invPropIon = $mejoras->invPropIon * (1 + ($investigaciones->where('codigo', 'invPropIon')->first()->nivel * $constantes->where('codigo', 'mejorainvPropIon')->first()->valor));
            $datos->invPropPlasma = $mejoras->invPropPlasma * (1 + ($investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * $constantes->where('codigo', 'mejorainvPropPlasma')->first()->valor));
            $datos->invPropMa = $mejoras->invPropMa * (1 + ($investigaciones->where('codigo', 'invPropMa')->first()->nivel * $constantes->where('codigo', 'mejorainvPropMa')->first()->valor));

            $datos->velocidad =round( pow(($datos->invPropQuimico + $datos->invPropNuk + $datos->invPropIon + $datos->invPropPlasma + $datos->invPropMa), 1.33) / $mejoras->masa);

            // Maniobra
            $datos->invManiobraQuimico = $mejoras->invManiobraQuimico * (1 + ($investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraQuimico')->first()->valor));
            $datos->invManiobraNuk = $mejoras->invManiobraNuk * (1 + ($investigaciones->where('codigo', 'invPropNuk')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraNuk')->first()->valor));
            $datos->invManiobraIon = $mejoras->invManiobraIon * (1 + ($investigaciones->where('codigo', 'invPropIon')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraIon')->first()->valor));
            $datos->invManiobraPlasma = $mejoras->invManiobraPlasma * (1 + ($investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraPlasma')->first()->valor));
            $datos->invManiobraMa = $mejoras->invManiobraMa * (1 + ($investigaciones->where('codigo', 'invPropMa')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraMa')->first()->valor));

            $datos->maniobra =round( pow(($datos->invManiobraQuimico + $datos->invManiobraNuk + $datos->invManiobraIon + $datos->invManiobraPlasma + $datos->invManiobraMa), 1.33) / $mejoras->masa);

            // Blindajes
            $datos->invTitanio = $mejoras->invTitanio * (1 + ($investigaciones->where('codigo', 'invTitanio')->first()->nivel * $constantes->where('codigo', 'mejorainvTitanio')->first()->valor));
            $datos->invReactivo = $mejoras->invReactivo * (1 + ($investigaciones->where('codigo', 'invReactivo')->first()->nivel * $constantes->where('codigo', 'mejorainvReactivo')->first()->valor));
            $datos->invResinas = $mejoras->invResinas * (1 + ($investigaciones->where('codigo', 'invResinas')->first()->nivel * $constantes->where('codigo', 'mejorainvResinas')->first()->valor));
            $datos->invPlacas = $mejoras->invPlacas * (1 + ($investigaciones->where('codigo', 'invPlacas')->first()->nivel * $constantes->where('codigo', 'mejorainvPlacas')->first()->valor));
            $datos->invCarbonadio = $mejoras->invCarbonadio * (1 + ($investigaciones->where('codigo', 'invCarbonadio')->first()->nivel * $constantes->where('codigo', 'mejorainvCarbonadio')->first()->valor));

            // Total Defensa
            $datos->defensa =  $datos->invTitanio + $datos->invReactivo + $datos->invResinas + $datos->invPlacas + $datos->invCarbonadio;

            // Total ataque
            $datos->ataque = 0;
            if (!empty($disenio->viewDanios()->get())) {
                foreach ($disenio->viewDanios()->get() as $fila) {
                    $datos->ataque += $fila->total;
                }
            }

            // Carga
            $datos->carga = $mejoras->carga * (1 + ($investigaciones->where('codigo', 'invCarga')->first()->nivel * $constantes->where('codigo', 'mejorainvCarga')->first()->valor));
            $datos->cargaPequenia = $mejoras->cargaPequenia * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $datos->cargaMediana = $mejoras->cargaMediana * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $datos->cargaGrande = $mejoras->cargaGrande * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $datos->cargaEnorme = $mejoras->cargaEnorme * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $datos->cargaMega = $mejoras->cargaMega * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            //$datos->recoleccion = $mejoras->recoleccion * (1 + ($investigaciones->where('codigo', 'invRecoleccion')->first()->nivel * $constantes->where('codigo', 'mejorainvRecoleccion')->first()->valor));
            // extraccion

            // Varios
            $datos->municion = $mejoras->municion;
            $datos->fuel = $mejoras->fuel;
            $datos->mantenimiento = $mejoras->mantenimiento;
            $datos->tiempo = $mejoras->tiempo;

            $disenio['datos']=$datos;

            //Log::info($datos->cargaPequenia." y ".$disenio->datos->cargaPequenia." total ".$disenio);
            array_push($diseniosR, $disenio);
            //Log::info($disenio->datos->cargaPequenia."  = ".$mejoras->cargaPequenia." * (1 + ( ".$investigaciones->where('codigo', 'invHangar')->first()->nivel." * ".$constantes->where('codigo', 'mejorainvHangar')->first()->valor);
        }
        //Log::info($diseniosR[1]);
        return $diseniosR;
    }
}
