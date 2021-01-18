<?php

namespace App\Models;

use App\Models\Constantes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CostesInvestigaciones extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function investigaciones()
    {
        return $this->belongsTo(Investigaciones::class);
    }

    public function modificarCostes($costeAntiguo, $costeNuevo)
    {
        $costeAntiguo->mineral = $costeNuevo->mineral;
        $costeAntiguo->cristal = $costeNuevo->cristal;
        $costeAntiguo->gas = $costeNuevo->gas;
        $costeAntiguo->plastico = $costeNuevo->plastico;
        $costeAntiguo->ceramica = $costeNuevo->ceramica;
        $costeAntiguo->liquido = $costeNuevo->liquido;
        $costeAntiguo->micros = $costeNuevo->micros;
        $costeAntiguo->fuel = $costeNuevo->fuel;
        $costeAntiguo->ma = $costeNuevo->ma;
        $costeAntiguo->municion = $costeNuevo->municion;
        return $costeAntiguo;
    }

    public function generaCostesInvestigaciones($investigaciones)
    {
        // $investigaciones = Investigaciones::where('jugadores_id', 1)->get();

        $IConstantes = Constantes::where('tipo', 'investigacion')->get();

        $investCorrector = $IConstantes->where('codigo', 'investCorrector')->first()->valor;
        $Ifactor = $IConstantes->where('codigo', 'Ifactor')->first()->valor;
        $costoInvestArmas = $IConstantes->where('codigo', 'costoInvestArmas')->first()->valor;
        $costoInvestMotores = $IConstantes->where('codigo', 'costoInvestMotores')->first()->valor;
        $costoInvestIndustrias = $IConstantes->where('codigo', 'costoInvestIndustrias')->first()->valor;
        $costoInvestImperio = $IConstantes->where('codigo', 'costoInvestImperio')->first()->valor;
        $costoInvestDisenio = $IConstantes->where('codigo', 'costoInvestDisenio')->first()->valor;

        $costesInvestigacion = [];

        $nivelesMaximos = DB::table('investigaciones')->select("codigo", DB::raw('max(nivel) as nivel'))->groupBy('codigo')->get();
        //dd($investigaciones);
        $test = new Investigaciones();

        if ($investigaciones === $test) {
            $noArray = $investigaciones;
            $investigaciones = [];
            array_push($investigaciones, $noArray);
        }

        //dd($investigaciones);

        foreach ($investigaciones as $investigacion) {
            $costesi = new CostesInvestigaciones();
            //dd(isset($investigacion->nivel));

            if (isset($investigacion->nivel)) {
                $nivel = $investigacion->nivel + 1;
                $codigo = $investigacion->codigo;

                //dd($investigacion->nivel);

                // rebaja por niveles maximos
                $nivelBajoElQueRebajar = 5;
                $porcentRebajaXNivel = .1;

                switch ($codigo) {
                    case "invEnergia":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestArmas;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 3000, 6000, 0, 0, 0, 0, 0, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invPlasma":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestArmas;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, .2, $nivel];
                        $costosIniciales = [$codigo, 1000, 0, 6000, 0, 10000, 0, 0, 0, 0, 3000];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invBalistica":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestArmas;
                        $r1cce = [$codigo, 1.5, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 1000, 0, 0, 2000, 0, 0, 0, 0, 0, 1000];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invMa":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestArmas;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 0, 0, 10000, 0, 8000, 500, 500, 0, 15000, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invCarga":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestDisenio;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 15000, 0, 0, 0, 0, 0, 0, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invBlindaje":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestDisenio;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 1000, 0, 0, 0, 12000, 0, 0, 0, 0, 1200];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invIa":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestDisenio;
                        $r1cce = [$codigo, 2, 1.9, 2, 2, 2, 2, 2.5, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 0, 1000, 0, 0, 0, 1000, 10000, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invImperio":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestImperio;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 0, 0, 0, 0, 0, 0, 25000, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invObservacion":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestImperio;
                        $r1cce = [$codigo, 1.5, 2, 2, 2, 2, 2, 1.5, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 2000, 0, 0, 0, 0, 0, 20000, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invEnsamblajeNaves":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestDisenio;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 4000, 0, 0, 1000, 0, 0, 6000, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invEnsamblajeTropas":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestDisenio;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 4000, 0, 0, 1000, 0, 0, 6000, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invEnsamblajeDefensas":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestDisenio;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 4000, 0, 0, 1000, 0, 0, 6000, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invPropQuimico":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestMotores;
                        $r1cce = [$codigo, 1, 1, 1, 1, 1, 1, 1, 1.1, 1, 1, $nivel];
                        $costosIniciales = [$codigo, 200, 2000, 400, 500, 0, 500, 0, 1400, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invPropNuk":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestMotores;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2.1, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 0, 0, 4000, 0, 0, 1500, 0, 800, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invPropIon":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestMotores;
                        $r1cce = [$codigo, 2, 2.2, 1.5, 2.3, 1.1, 1.2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 0, 8000, 0, 650, 4000, 0, 0, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invPropPlasma":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestMotores;
                        $r1cce = [$codigo, 1.8, 2, 2.2, 2, 1.005, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 100000, 0, 8000, 0, 0, 0, 4000, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invPropMa":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestMotores;
                        $r1cce = [$codigo, 2, 2, .5, 2, 1.9, .5, 2.3, 2, 2.2, 2, $nivel];
                        $costosIniciales = [$codigo, 300000, 200000, 0, 0, 100000, 0, 8000, 6000, 9000, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invPropHMA":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestMotores;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 0, 0, 0, 0, 0, 0, 40000, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;


                    case "invIndLiquido":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestIndustrias;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 3000, 6000, 0, 0, 0, 0, 0, 0, 0, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invIndMicros":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestIndustrias;
                        $r1cce = [$codigo, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, $nivel];
                        $costosIniciales = [$codigo, 0, 0, 40000, 0, 0, 0, 0, 0, 15000, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invIndFuel":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestIndustrias;
                        $r1cce = [$codigo, 2, 2, 2, 1.6, 2, 2, 2, 2, 1.5, 2, $nivel];
                        $costosIniciales = [$codigo, 0, 0, 0, 2500, 0, 0, 0, 0, 6000, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invIndMa":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestIndustrias;
                        $r1cce = [$codigo, 1.4, 1.3, 1, 2, .5, 2.1, 1.2, 2, 1.8, 2, $nivel];
                        $costosIniciales = [$codigo, 20000, 40000, 10000, 10000, 10000, 5000, 0, 0, 150000, 0];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;

                    case "invIndMunicion":
                        // maximos
                        $factorRebajaXMaximo = 1;
                        $UmbralNivelRebaja = $nivelesMaximos->where('codigo', $investigacion->codigo)->first()->nivel - $nivelBajoElQueRebajar;
                        if ($UmbralNivelRebaja > $nivel) { //hay rebaja
                            $factorRebajaXMaximo = max(1 - (($UmbralNivelRebaja - $nivel) * $porcentRebajaXNivel), 0);
                        }
                        $costoIT = $costoInvestIndustrias;
                        $r1cce = [$codigo, .8, 2, 2, .3, 2, 2, 2, 2, 2, .2, $nivel];
                        $costosIniciales = [$codigo, 3000, 0, 0, 5000, 0, 0, 0, 0, 15000, 10000];
                        $coste = $costesi->calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT);
                        break;
                }

                array_push($costesInvestigacion, $coste);
            }
        }

        return $costesInvestigacion;
    }

    function calculos($factorRebajaXMaximo, $r1cce, $investCorrector, $costosIniciales, $Ifactor, $costoIT)
    {


        $coste = new CostesInvestigaciones();
        //$coste->codigo=$r1cce[0];
        $n = 1;
        $nivel = $r1cce[11];
        $coste->mineral = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->cristal = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->gas =    (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->plastico = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->ceramica = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->liquido = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->micros = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->fuel = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->ma = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;
        $coste->municion = (int)((pow($nivel, ($r1cce[$n] * $Ifactor * $costoIT))) * $costosIniciales[$n]) * $investCorrector * $factorRebajaXMaximo;
        $n++;


        return ($coste);
    }
}
