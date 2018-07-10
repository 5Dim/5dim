<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Constantes;
use \App\Almacenes;
use \App\Producciones;
use \App\Variables;
use \App\CostesConstrucciones;
use \App\Dependencias;

class DatosMaestrosController extends Controller
{
    public function index(){   ///http://localhost/admin/DatosMaestros

        $datosM=new DatosMaestrosController();
        $datosM->DatosMaestros();

    }


    public function DatosMaestros(){
        $constante=new Constantes();
        $constantes=$constante->generarDatosConstantes();

        $variable=new Variables();
        $variables=$variable->generarDatosVariables();


        $almacen=new Almacenes();
        $almacenes=$almacen->generarDatosAlmacenes();

        $produccion=new Producciones();
        $producciones=$produccion->generarDatosProducciones();

        $dependencia=new Dependencias();
        $dependencias=$dependencia->generarDatosDependencias();

       // $produccion=new costes_construcciones();
       // $costesConstruccion=$produccion->generarDatosCostesConstruccion();

    }
}