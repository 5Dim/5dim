<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
        foreach ($disenios as $disenio) {
            $mejoras = $disenio->mejoras;
            $disenio->datos = new MejorasDisenios();
            // $invPropQuimico = $investigaciones->where('codigo', 'invPropQuimico')->first()->nivel;
            // Velocidades
            $disenio->datos->invPropQuimico = $mejoras->invPropQuimico * (1 + ($investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * $constantes->where('codigo', 'mejorainvPropQuimico')->first()->valor));
            $disenio->datos->invPropNuk = $mejoras->invPropNuk * (1 + ($investigaciones->where('codigo', 'invPropNuk')->first()->nivel * $constantes->where('codigo', 'mejorainvPropNuk')->first()->valor));
            $disenio->datos->invPropIon = $mejoras->invPropIon * (1 + ($investigaciones->where('codigo', 'invPropIon')->first()->nivel * $constantes->where('codigo', 'mejorainvPropIon')->first()->valor));
            $disenio->datos->invPropPlasma = $mejoras->invPropPlasma * (1 + ($investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * $constantes->where('codigo', 'mejorainvPropPlasma')->first()->valor));
            $disenio->datos->invPropMa = $mejoras->invPropMa * (1 + ($investigaciones->where('codigo', 'invPropMa')->first()->nivel * $constantes->where('codigo', 'mejorainvPropMa')->first()->valor));

            $disenio->datos->velocidad = pow(($disenio->datos->invPropQuimico + $disenio->datos->invPropNuk + $disenio->datos->invPropIon + $disenio->datos->invPropPlasma + $disenio->datos->invPropMa), 1.33) / $mejoras->masa;

            // Maniobra
            $disenio->datos->invManiobraQuimico = $mejoras->invManiobraQuimico * (1 + ($investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraQuimico')->first()->valor));
            $disenio->datos->invManiobraNuk = $mejoras->invManiobraNuk * (1 + ($investigaciones->where('codigo', 'invPropNuk')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraNuk')->first()->valor));
            $disenio->datos->invManiobraIon = $mejoras->invManiobraIon * (1 + ($investigaciones->where('codigo', 'invPropIon')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraIon')->first()->valor));
            $disenio->datos->invManiobraPlasma = $mejoras->invManiobraPlasma * (1 + ($investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraPlasma')->first()->valor));
            $disenio->datos->invManiobraMa = $mejoras->invManiobraMa * (1 + ($investigaciones->where('codigo', 'invPropMa')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraMa')->first()->valor));

            $disenio->datos->maniobra = pow(($disenio->datos->invManiobraQuimico + $disenio->datos->invManiobraNuk + $disenio->datos->invManiobraIon + $disenio->datos->invManiobraPlasma + $disenio->datos->invManiobraMa), 1.33) / $mejoras->masa;

            // Blindajes
            $disenio->datos->invTitanio = $mejoras->invTitanio * (1 + ($investigaciones->where('codigo', 'invTitanio')->first()->nivel * $constantes->where('codigo', 'mejorainvTitanio')->first()->valor));
            $disenio->datos->invReactivo = $mejoras->invReactivo * (1 + ($investigaciones->where('codigo', 'invReactivo')->first()->nivel * $constantes->where('codigo', 'mejorainvReactivo')->first()->valor));
            $disenio->datos->invResinas = $mejoras->invResinas * (1 + ($investigaciones->where('codigo', 'invResinas')->first()->nivel * $constantes->where('codigo', 'mejorainvResinas')->first()->valor));
            $disenio->datos->invPlacas = $mejoras->invPlacas * (1 + ($investigaciones->where('codigo', 'invPlacas')->first()->nivel * $constantes->where('codigo', 'mejorainvPlacas')->first()->valor));
            $disenio->datos->invCarbonadio = $mejoras->invCarbonadio * (1 + ($investigaciones->where('codigo', 'invCarbonadio')->first()->nivel * $constantes->where('codigo', 'mejorainvCarbonadio')->first()->valor));

            // Total Defensa
            $disenio->datos->defensa =  $disenio->datos->invTitanio + $disenio->datos->invReactivo + $disenio->datos->invResinas + $disenio->datos->invPlacas + $disenio->datos->invCarbonadio;

            // Total ataque
            $disenio->datos->ataque = 0;
            if (!empty($disenio->viewDanios()->get())) {
                foreach ($disenio->viewDanios()->get() as $fila) {
                    $disenio->datos->ataque += $fila->total;
                }
            }

            // Carga
            $disenio->datos->carga = $mejoras->carga * (1 + ($investigaciones->where('codigo', 'invCarga')->first()->nivel * $constantes->where('codigo', 'mejorainvCarga')->first()->valor));
            $disenio->datos->cargaPequenia = $mejoras->cargaPequenia * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $disenio->datos->cargaMediana = $mejoras->cargaMediana * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $disenio->datos->cargaGrande = $mejoras->cargaGrande * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $disenio->datos->cargaEnorme = $mejoras->cargaEnorme * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $disenio->datos->cargaMega = $mejoras->cargaMega * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
            $disenio->datos->recoleccion = $mejoras->recoleccion * (1 + ($investigaciones->where('codigo', 'invRecoleccion')->first()->nivel * $constantes->where('codigo', 'mejorainvRecoleccion')->first()->valor));

            // Varios
            $disenio->datos->municion = $mejoras->municion;
            $disenio->datos->fuel = $mejoras->fuel;
            $disenio->datos->mantenimiento = $mejoras->mantenimiento;
            $disenio->datos->tiempo = $mejoras->tiempo;
        }
    }
}
