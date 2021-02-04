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

    public function calculaMejoras()
    {
        $investigaciones = Jugadores::find(session()->get('jugadores_id'))->investigaciones;
        $constantes = Constantes::where('tipo', 'investigacion')->get();
        $mejoras = $this->mejoras;
        $this->datos = new MejorasDisenios();
        // Velocidades
        $this->datos->invPropQuimico = $mejoras->invPropQuimico * (1 + ($investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * $constantes->where('codigo', 'mejorainvPropQuimico')->first()->valor));
        $this->datos->invPropNuk = $mejoras->invPropNuk * (1 + ($investigaciones->where('codigo', 'invPropNuk')->first()->nivel * $constantes->where('codigo', 'mejorainvPropNuk')->first()->valor));
        $this->datos->invPropIon = $mejoras->invPropIon * (1 + ($investigaciones->where('codigo', 'invPropIon')->first()->nivel * $constantes->where('codigo', 'mejorainvPropIon')->first()->valor));
        $this->datos->invPropPlasma = $mejoras->invPropPlasma * (1 + ($investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * $constantes->where('codigo', 'mejorainvPropPlasma')->first()->valor));
        $this->datos->invPropMa = $mejoras->invPropMa * (1 + ($investigaciones->where('codigo', 'invPropMa')->first()->nivel * $constantes->where('codigo', 'mejorainvPropMa')->first()->valor));

        $this->datos->velocidad =pow(($this->datos->invPropQuimico + $this->datos->invPropNuk + $this->datos->invPropIon + $this->datos->invPropPlasma + $this->datos->invPropMa),1.33) / $mejoras->masa;

        // Maniobra
        $this->datos->invManiobraQuimico = $mejoras->invManiobraQuimico * (1 + ($investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraQuimico')->first()->valor));
        $this->datos->invManiobraNuk = $mejoras->invManiobraNuk * (1 + ($investigaciones->where('codigo', 'invPropNuk')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraNuk')->first()->valor));
        $this->datos->invManiobraIon = $mejoras->invManiobraIon * (1 + ($investigaciones->where('codigo', 'invPropIon')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraIon')->first()->valor));
        $this->datos->invManiobraPlasma = $mejoras->invManiobraPlasma * (1 + ($investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraPlasma')->first()->valor));
        $this->datos->invManiobraMa = $mejoras->invManiobraMa * (1 + ($investigaciones->where('codigo', 'invPropMa')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraMa')->first()->valor));

        $this->datos->maniobra = pow(($this->datos->invManiobraQuimico + $this->datos->invManiobraNuk + $this->datos->invManiobraIon + $this->datos->invManiobraPlasma + $this->datos->invManiobraMa),1.33) / $mejoras->masa;

        // Blindajes
        $this->datos->invTitanio = $mejoras->invTitanio * (1 + ($investigaciones->where('codigo', 'invTitanio')->first()->nivel * $constantes->where('codigo', 'mejorainvTitanio')->first()->valor));
        $this->datos->invReactivo = $mejoras->invReactivo * (1 + ($investigaciones->where('codigo', 'invReactivo')->first()->nivel * $constantes->where('codigo', 'mejorainvReactivo')->first()->valor));
        $this->datos->invResinas = $mejoras->invResinas * (1 + ($investigaciones->where('codigo', 'invResinas')->first()->nivel * $constantes->where('codigo', 'mejorainvResinas')->first()->valor));
        $this->datos->invPlacas = $mejoras->invPlacas * (1 + ($investigaciones->where('codigo', 'invPlacas')->first()->nivel * $constantes->where('codigo', 'mejorainvPlacas')->first()->valor));
        $this->datos->invCarbonadio = $mejoras->invCarbonadio * (1 + ($investigaciones->where('codigo', 'invCarbonadio')->first()->nivel * $constantes->where('codigo', 'mejorainvCarbonadio')->first()->valor));

        // Total Defensa
        $this->datos->defensa =  $this->datos->invTitanio + $this->datos->invReactivo + $this->datos->invResinas + $this->datos->invPlacas + $this->datos->invCarbonadio;

        // Total ataque
        $this->datos->ataque = 0;
        if (!empty($this->viewDanios()->get())) {
            foreach ($this->viewDanios()->get() as $fila) {
                $this->datos->ataque += $fila->total;
            }
        }

        // Carga
        $this->datos->carga = $mejoras->carga * (1 + ($investigaciones->where('codigo', 'invCarga')->first()->nivel * $constantes->where('codigo', 'mejorainvCarga')->first()->valor));
        $this->datos->cargaPequenia = $mejoras->cargaPequenia * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->cargaMediana = $mejoras->cargaMediana * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->cargaGrande = $mejoras->cargaGrande * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->cargaEnorme = $mejoras->cargaEnorme * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->cargaMega = $mejoras->cargaMega * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->recoleccion = $mejoras->recoleccion * (1 + ($investigaciones->where('codigo', 'invRecoleccion')->first()->nivel * $constantes->where('codigo', 'mejorainvRecoleccion')->first()->valor));

        // Varios
        $this->datos->municion = $mejoras->municion;
        $this->datos->fuel = $mejoras->fuel;
        $this->datos->mantenimiento = $mejoras->mantenimiento;
        $this->datos->tiempo = $mejoras->tiempo;
    }
}
