<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Constantes;
use App\Models\Almacenes;
use App\Models\Producciones;
use App\Models\Variables;
use App\Models\CostesConstrucciones;
use App\Models\Dependencias;
use App\Models\Fuselajes;
use App\Models\Armas;
use App\Models\CostesArmas;
use App\Models\Tiendas;
use App\Models\Disenios;
use App\Models\CostesDisenios;
use App\Models\MejorasDisenios;

class DatosMaestrosController extends Controller
{
    public function index()
    {   // http://localhost/admin/DatosMaestros
        $datosM = new DatosMaestrosController();
        $datosM->DatosMaestros();

        return redirect('/juego/construccion');
    }


    public function DatosMaestros()
    {
        $constante = new Constantes();
        $constantes = $constante->generarDatosConstantes();

        $variable = new Variables();
        $variables = $variable->generarDatosVariables();

        $almacen = new Almacenes();
        $almacenes = $almacen->generarDatosAlmacenes();

        $produccion = new Producciones();
        $producciones = $produccion->generarDatosProducciones(); //esta en seed

        // $construccion = new CostesBasicosConstruccion();
        // $construcciones = $construccion->generarDatosCostesBasicosConstruccion();

        // $investigacion = new CostesBasicosInvestigacion();
        // $investigaciones = $investigacion->generarDatosCostesBasicosInvestigacion();

        $dependencia = new Dependencias();
        $dependencias = $dependencia->generarDatosDependencias();

        $fuselaje = new Fuselajes();
        $fuselajes = $fuselaje->generarDatosFuselajes();

        $arma = new Armas();
        $armas = $arma->generarDatosArmas();

        $costesArmas = new CostesArmas();
        $costesArmas = $costesArmas->generarDatosCostesArmas();

        $tiendas = new Tiendas();
        $tiendas = $tiendas->generarDatosTiendas();

        // $disenios=new Disenios();
        // $disenios=$disenios->generarDatosDisenios();

        $costesDisenios=new CostesDisenios();
        $costesDisenios=$costesDisenios->generarDatosCostesDisenios();

        $mejorasDisenios = new MejorasDisenios();
        $mejorasDisenios = $mejorasDisenios->generarDatosMejorasDisenios();
    }
}
