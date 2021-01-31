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
        $this->datos = new MejorasDisenios();
        // dd($this->mejoras);
        // Velocidades
        $this->datos->invPropQuimico = $this->mejoras->invPropQuimico * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * Constantes::where('codigo', 'mejorainvPropQuimico')->first()->valor));
        $this->datos->invPropNuk = $this->mejoras->invPropNuk * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropNuk')->first()->nivel * Constantes::where('codigo', 'mejorainvPropNuk')->first()->valor));
        $this->datos->invPropIon = $this->mejoras->invPropIon * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropIon')->first()->nivel * Constantes::where('codigo', 'mejorainvPropIon')->first()->valor));
        $this->datos->invPropPlasma = $this->mejoras->invPropPlasma * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * Constantes::where('codigo', 'mejorainvPropPlasma')->first()->valor));
        $this->datos->invPropMa = $this->mejoras->invPropMa * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropMa')->first()->nivel * Constantes::where('codigo', 'mejorainvPropMa')->first()->valor));

        $this->datos->velocidad = ($this->datos->invPropQuimico + $this->datos->invPropNuk + $this->datos->invPropIon + $this->datos->invPropPlasma + $this->datos->invPropMa) / $this->costes->masa;

        // Maniobra
        $this->datos->invManiobraQuimico = $this->mejoras->invManiobraQuimico * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * Constantes::where('codigo', 'mejorainvManiobraQuimico')->first()->valor));
        $this->datos->invManiobraNuk = $this->mejoras->invManiobraNuk * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropNuk')->first()->nivel * Constantes::where('codigo', 'mejorainvManiobraNuk')->first()->valor));
        $this->datos->invManiobraIon = $this->mejoras->invManiobraIon * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropIon')->first()->nivel * Constantes::where('codigo', 'mejorainvManiobraIon')->first()->valor));
        $this->datos->invManiobraPlasma = $this->mejoras->invManiobraPlasma * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * Constantes::where('codigo', 'mejorainvManiobraPlasma')->first()->valor));
        $this->datos->invManiobraMa = $this->mejoras->invManiobraMa * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPropMa')->first()->nivel * Constantes::where('codigo', 'mejorainvManiobraMa')->first()->valor));

        $this->datos->maniobra = ($this->datos->invManiobraQuimico + $this->datos->invManiobraNuk + $this->datos->invManiobraIon + $this->datos->invManiobraPlasma + $this->datos->invManiobraMa) / $this->costes->masa;

        // Blindajes
        $this->datos->invTitanio = $this->mejoras->invTitanio * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invTitanio')->first()->nivel * Constantes::where('codigo', 'mejorainvTitanio')->first()->valor));
        $this->datos->invReactivo = $this->mejoras->invReactivo * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invReactivo')->first()->nivel * Constantes::where('codigo', 'mejorainvReactivo')->first()->valor));
        $this->datos->invResinas = $this->mejoras->invResinas * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invResinas')->first()->nivel * Constantes::where('codigo', 'mejorainvResinas')->first()->valor));
        $this->datos->invPlacas = $this->mejoras->invPlacas * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invPlacas')->first()->nivel * Constantes::where('codigo', 'mejorainvPlacas')->first()->valor));
        $this->datos->invCarbonadio = $this->mejoras->invCarbonadio * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invCarbonadio')->first()->nivel * Constantes::where('codigo', 'mejorainvCarbonadio')->first()->valor));

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
        $this->datos->carga = $this->mejoras->carga * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invCarga')->first()->nivel * Constantes::where('codigo', 'mejorainvCarga')->first()->valor));
        $this->datos->cargaPequenia = $this->mejoras->cargaPequenia * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invHangar')->first()->nivel * Constantes::where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->cargaMediana = $this->mejoras->cargaMediana * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invHangar')->first()->nivel * Constantes::where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->cargaGrande = $this->mejoras->cargaGrande * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invHangar')->first()->nivel * Constantes::where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->cargaEnorme = $this->mejoras->cargaEnorme * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invHangar')->first()->nivel * Constantes::where('codigo', 'mejorainvHangar')->first()->valor));
        $this->datos->cargaMega = $this->mejoras->cargaMega * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invHangar')->first()->nivel * Constantes::where('codigo', 'mejorainvHangar')->first()->valor));
        // $this->datos->recoleccion = $this->mejoras->recoleccion * (1 + (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invRecoleccion')->first()->nivel * Constantes::where('codigo', 'mejorainvRecoleccion')->first()->valor));

        // Varios
        $this->datos->municion = $this->mejoras->municion * 1 - (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invIa')->first()->nivel * Constantes::where('codigo', 'mejorainvIa')->first()->valor);
        $this->datos->fuel = $this->mejoras->fuel * 1 - (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invIa')->first()->nivel * Constantes::where('codigo', 'mejorainvIa')->first()->valor);
        $this->datos->mantenimiento = $this->mejoras->mantenimiento * 1 - (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invIa')->first()->nivel * Constantes::where('codigo', 'mejorainvIa')->first()->valor);
        $this->datos->tiempo = $this->mejoras->tiempo * 1 - (Jugadores::find(session()->get('jugadores_id'))->investigaciones->where('codigo', 'invIa')->first()->nivel * Constantes::where('codigo', 'mejorainvIa')->first()->valor);


        // return $this->datos;
    }

    public function generarDatosDisenios()
    {

        // $disenios = [];
        // $costesDisenios = [];

        // $disenio = new Disenios();
        // $disenio->nombre = 'Recolector';
        // $disenio->posicion = 9;
        // $disenio->descripcion = "Podemos dejar esta nave en órbita de asteroides para recolectar y otra nave que traiga los recursos.";
        // $disenio->fuselajes_id = 69;
        // $disenio->codigo = "RECOLECTOR";
        // $disenio->skin = 1;
        // $disenio->jugadores_id = 1;
        // array_push($disenios, $disenio);

        // $disenio = new Disenios();
        // $disenio->nombre = 'Remolcador';
        // $disenio->posicion = 9;
        // $disenio->descripcion = "Esta nave está diseniada para remolcar estaciones o mover planetoides colonizados.";
        // $disenio->fuselajes_id = 70;
        // $disenio->codigo = "REMOLCADOR";
        // $disenio->skin = 1;
        // $disenio->jugadores_id = 1;
        // array_push($disenios, $disenio);



        // foreach ($disenios as $estedisenio) {
        //     $estedisenio->save();
        // }

        //return $result;
    }
}
