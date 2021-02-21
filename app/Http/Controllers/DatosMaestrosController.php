<?php

namespace App\Http\Controllers;

use App\Models\Constantes;
use App\Models\Almacenes;
use App\Models\Producciones;
use App\Models\Dependencias;
use App\Models\Fuselajes;
use App\Models\Armas;
use App\Models\CostesArmas;
use App\Models\Tiendas;
use App\Models\CostesDisenios;
use App\Models\Planetas;

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
        Constantes::generarDatosConstantes();
        Almacenes::generarDatosAlmacenes();
        Producciones::generarDatosProducciones();
        Dependencias::generarDatosDependencias();
        Fuselajes::generarDatosFuselajes();
        Armas::generarDatosArmas();
        CostesArmas::generarDatosCostesArmas();
        Tiendas::generarDatosTiendas();
        // CostesDisenios::generarDatosCostesDisenios();

        // $construccion = new CostesBasicosConstruccion();
        // $construcciones = $construccion->generarDatosCostesBasicosConstruccion();

        // $investigacion = new CostesBasicosInvestigacion();
        // $investigaciones = $investigacion->generarDatosCostesBasicosInvestigacion();

        // $disenios=new Disenios();
        // $disenios=$disenios->generarDatosDisenios();

        // $mejorasDisenios = new MejorasDisenios();
        // $mejorasDisenios = $mejorasDisenios->generarDatosMejorasDisenios();

        $planetas = Planetas::all();
        foreach ($planetas as $planeta) {
            Planetas::coordenadasBySistema($planeta);
        }
    }
}
