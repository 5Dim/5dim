<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Almacenes;
use \App\Producciones;

class DatosMaestrosController extends Controller
{


    public function index(){   ///http://localhost/admin/DatosMaestros


        $almacen=new Almacenes();
        $almacenes=$almacen->generarDatosAlmacenes();

        $produccion=new Producciones();
        $producciones=$produccion->generarDatosProducciones();
    
    }


    

}
