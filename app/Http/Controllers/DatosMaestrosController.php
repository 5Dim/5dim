<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Almacen;

class DatosMaestrosController extends Controller
{


    public function index(){
        $almacen=new Almacen();
        $mialmacen=$almacen->generarDatosAlmacenes();

        $mialmacen->save();
    }


    

}
