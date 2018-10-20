<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Constantes;
use App\Almacenes;
use App\Producciones;
use App\Variables;
use App\CostesConstrucciones;
use App\Dependencias;
use App\Fuselajes;
use App\Armas;
use App\CostesArmas;
use App\Tiendas;
use App\Diseños;
use App\CostesDiseños;
use App\MejorasDiseños;
use App\CostesBasicosConstruccion;
use App\CostesBasicosInvestigacion;

class DatosMaestrosController extends Controller
{
    public function index(){   ///http://localhost/admin/DatosMaestros
        $datosM=new DatosMaestrosController();
        $datosM->DatosMaestros();

        return redirect('/jugador');
    }


    public function DatosMaestros(){
        $constante=new Constantes();
        $constantes=$constante->generarDatosConstantes();

        $variable=new Variables();
        $variables=$variable->generarDatosVariables();


        $almacen=new Almacenes();
        $almacenes=$almacen->generarDatosAlmacenes();

       // $produccion=new Producciones();
       // $producciones=$produccion->generarDatosProducciones(); //esta en seed

        //$construccion=new CostesBasicosConstruccion();
        //$construcciones=$construccion->generarDatosCostesBasicosConstruccion();

        //$investigacion=new CostesBasicosInvestigacion();
        //$investigaciones=$investigacion->generarDatosCostesBasicosInvestigacion();

        $dependencia=new Dependencias();
        $dependencias=$dependencia->generarDatosDependencias();

        $fuselaje=new Fuselajes();
        $fuselajes=$fuselaje->generarDatosFuselajes();

        $arma=new Armas();
        $armas=$arma->generarDatosArmas();

        $costesArmas=new CostesArmas();
        $costesArmas=$costesArmas->generarDatosCostesArmas();

        $tiendas=new Tiendas();
        $tiendas=$tiendas->generarDatosTiendas();

        $diseños=new Diseños();
        $diseños=$diseños->generarDatosDiseños();

        $costesDiseños=new CostesDiseños();
        $costesDiseños=$costesDiseños->generarDatosCostesDiseños();

        $mejorasDiseños=new MejorasDiseños();
        $mejorasDiseños=$mejorasDiseños->generarDatosMejorasDiseños();
    }
}