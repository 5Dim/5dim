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

    public function creador()
    {
        return $this->belongsTo(Jugadores::class, 'jugadores_id');
    }

    public function mejoras()
    {
        return $this->hasOne(MejorasDisenios::class);
    }

    public function enFlota()
    {
        return $this->hasMany(DiseniosEnFlota::class);
    }


    public static function calculaMejoras($disenios)
    {
        $investigaciones = Jugadores::find(session()->get('jugadores_id'))->investigaciones;
        $constantes = Constantes::where('tipo', 'investigacion')->get();
        $diseniosR = [];

        foreach ($disenios as $disenio) {
            $mejoras = $disenio->mejoras;
            $datos = new MejorasDisenios();
            // Velocidades
            if ($mejoras->invPropQuimico > 0) {
                $datos->invPropQuimico = $mejoras->invPropQuimico * (1 + ($investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * $constantes->where('codigo', 'mejorainvPropQuimico')->first()->valor));
            } else {
                $datos->invPropQuimico = 0;
            }

            if ($mejoras->invPropNuk > 0) {
                $datos->invPropNuk = $mejoras->invPropNuk * (1 + ($investigaciones->where('codigo', 'invPropNuk')->first()->nivel * $constantes->where('codigo', 'mejorainvPropNuk')->first()->valor));
            } else {
                $datos->invPropNuk = 0;
            }
            if ($mejoras->invPropIon > 0) {
                $datos->invPropIon = $mejoras->invPropIon * (1 + ($investigaciones->where('codigo', 'invPropIon')->first()->nivel * $constantes->where('codigo', 'mejorainvPropIon')->first()->valor));
            } else {
                $datos->invPropIon = 0;
            }
            if ($mejoras->invPropPlasma > 0) {
                $datos->invPropPlasma = $mejoras->invPropPlasma * (1 + ($investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * $constantes->where('codigo', 'mejorainvPropPlasma')->first()->valor));
            } else {
                $datos->invPropPlasma = 0;
            }
            if ($mejoras->invPropMa > 0) {
                $datos->invPropMa = $mejoras->invPropMa * (1 + ($investigaciones->where('codigo', 'invPropMa')->first()->nivel * $constantes->where('codigo', 'mejorainvPropMa')->first()->valor));
            } else {
                $datos->invPropMa = 0;
            }

            $datos->velocidad = round(pow(($datos->invPropQuimico + $datos->invPropNuk + $datos->invPropIon + $datos->invPropPlasma + $datos->invPropMa), 1.33) / $mejoras->masa);

            // Maniobra
            if ($mejoras->invManiobraQuimico > 0) {
                $datos->invManiobraQuimico = $mejoras->invManiobraQuimico * (1 + ($investigaciones->where('codigo', 'invPropQuimico')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraQuimico')->first()->valor));
            } else {
                $datos->invManiobraQuimico = 0;
            }
            if ($mejoras->invManiobraNuk > 0) {
                $datos->invManiobraNuk = $mejoras->invManiobraNuk * (1 + ($investigaciones->where('codigo', 'invPropNuk')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraNuk')->first()->valor));
            } else {
                $datos->invManiobraNuk = 0;
            }
            if ($mejoras->invManiobraIon > 0) {
                $datos->invManiobraIon = $mejoras->invManiobraIon * (1 + ($investigaciones->where('codigo', 'invPropIon')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraIon')->first()->valor));
            } else {
                $datos->invManiobraIon = 0;
            }
            if ($mejoras->invManiobraPlasma > 0) {
                $datos->invManiobraPlasma = $mejoras->invManiobraPlasma * (1 + ($investigaciones->where('codigo', 'invPropPlasma')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraPlasma')->first()->valor));
            } else {
                $datos->invManiobraPlasma = 0;
            }
            if ($mejoras->invManiobraMa > 0) {
                $datos->invManiobraMa = $mejoras->invManiobraMa * (1 + ($investigaciones->where('codigo', 'invPropMa')->first()->nivel * $constantes->where('codigo', 'mejorainvManiobraMa')->first()->valor));
            } else {
                $datos->invManiobraMa = 0;
            }

            $datos->maniobra = round(pow(($datos->invManiobraQuimico + $datos->invManiobraNuk + $datos->invManiobraIon + $datos->invManiobraPlasma + $datos->invManiobraMa), 1.33) / $mejoras->masa);

            // Blindajes
            if ($mejoras->invTitanio > 0) {
                $datos->invTitanio = $mejoras->invTitanio * (1 + ($investigaciones->where('codigo', 'invTitanio')->first()->nivel * $constantes->where('codigo', 'mejorainvTitanio')->first()->valor));
            } else {
                $datos->invTitanio = 0;
            }
            if ($mejoras->invReactivo > 0) {
                $datos->invReactivo = $mejoras->invReactivo * (1 + ($investigaciones->where('codigo', 'invReactivo')->first()->nivel * $constantes->where('codigo', 'mejorainvReactivo')->first()->valor));
            } else {
                $datos->invReactivo = 0;
            }
            if ($mejoras->invResinas > 0) {
                $datos->invResinas = $mejoras->invResinas * (1 + ($investigaciones->where('codigo', 'invResinas')->first()->nivel * $constantes->where('codigo', 'mejorainvResinas')->first()->valor));
            } else {
                $datos->invResinas = 0;
            }
            if ($mejoras->invPlacas > 0) {
                $datos->invPlacas = $mejoras->invPlacas * (1 + ($investigaciones->where('codigo', 'invPlacas')->first()->nivel * $constantes->where('codigo', 'mejorainvPlacas')->first()->valor));
            } else {
                $datos->invPlacas = 0;
            }
            if ($mejoras->invCarbonadio > 0) {
                $datos->invCarbonadio = $mejoras->invCarbonadio * (1 + ($investigaciones->where('codigo', 'invCarbonadio')->first()->nivel * $constantes->where('codigo', 'mejorainvCarbonadio')->first()->valor));
            } else {
                $datos->invCarbonadio = 0;
            }

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
            if ($mejoras->carga > 0) {
                $datos->carga = floor($mejoras->carga * (1 + ($investigaciones->where('codigo', 'invCarga')->first()->nivel * $constantes->where('codigo', 'mejorainvCarga')->first()->valor)));
            } else {
                $datos->carga = 0;
            }
            if ($mejoras->cargaPequenia > 0) {
                $datos->cargaPequenia = floor($mejoras->cargaPequenia * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor)));
            } else {
                $datos->cargaPequenia = 0;
            }
            if ($mejoras->cargaMediana > 0) {
                $datos->cargaMediana = floor($mejoras->cargaMediana * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor)));
            } else {
                $datos->cargaMediana = 0;
            }
            if ($mejoras->cargaGrande > 0) {
                $datos->cargaGrande = floor($mejoras->cargaGrande * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor)));
            } else {
                $datos->cargaGrande = 0;
            }
            if ($mejoras->cargaEnorme > 0) {
                $datos->cargaEnorme = floor($mejoras->cargaEnorme * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor)));
            } else {
                $datos->cargaEnorme = 0;
            }
            if ($mejoras->cargaMega > 0) {
                $datos->cargaMega = floor($mejoras->cargaMega * (1 + ($investigaciones->where('codigo', 'invHangar')->first()->nivel * $constantes->where('codigo', 'mejorainvHangar')->first()->valor)));
            } else {
                $datos->cargaMega = 0;
            }

            // $datos->recoleccion = $mejoras->recoleccion * (1 + ($investigaciones->where('codigo', 'invRecoleccion')->first()->nivel * $constantes->where('codigo', 'mejorainvRecoleccion')->first()->valor));
            // $datos->extraccion = $mejoras->extraccion * (1 + ($investigaciones->where('codigo', 'invRecoleccion')->first()->nivel * $constantes->where('codigo', 'mejorainvRecoleccion')->first()->valor));

            // Varios
            $datos->municion = $mejoras->municion;
            $datos->fuel = $mejoras->fuel;
            $datos->mantenimiento = $mejoras->mantenimiento;
            $datos->tiempo = $mejoras->tiempo;

            $disenio['datos'] = $datos;

            array_push($diseniosR, $disenio);
        }
        return $diseniosR;
    }

    public static function cargaTotal($diseniosEnFlota)
    {
        $investigacion = Investigaciones::where('codigo', 'invCarga')->first()->nivel;
        $constante = Constantes::where('codigo', 'mejorainvCarga')->first()->valor;
        $mejorasT = 0;

        //Log::info("diseniosx ".$disenios);

        foreach ($diseniosEnFlota as $disenioEnFlota) {
            $cantidad = $disenioEnFlota->enFlota + $disenioEnFlota->enHangar;
            $mejoras = $disenioEnFlota->disenios->mejoras;
            if ($mejoras->carga > 0) {
                $mejorasT += ($mejoras->carga * $cantidad);
            }
        }
        return $mejorasT * (1 + ($investigacion * $constante));
    }

    public static function recoleccionTotal($diseniosFlota)
    {
        $mejorasT = 0;

        foreach ($diseniosFlota as $disenio) {
            $mejoras = $disenio->disenios->mejoras;
            $multiplicador = $disenio->enFlota + $disenio->enHangar;
            if ($mejoras->recolector > 0) {
                $mejorasT +=  $mejoras->recolector * $multiplicador;
            }
        }
        return $mejorasT;
    }

    public static function extraccionTotal($disenios)
    {

        $mejorasT = 0;

        foreach ($disenios as $disenio) {
            $mejoras = $disenio->disenios->mejoras;
            $multiplicador = $disenio->enFlota + $disenio->enHangar;
            if ($mejoras->extractor > 0) {
                $mejorasT +=  $mejoras->extractor * $multiplicador;
            }
        }
        return $mejorasT;
    }

    public static function cargaTotalRecursos($recursosFlota) //cantidad de carga que llevo
    {
        $cargaT = 0;

        $recursosArray = array("personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos");
        foreach ($recursosArray as $recurso) {
            $cargaT += $recursosFlota[$recurso];
        }

        return $cargaT;
    }
}
