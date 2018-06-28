<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Almacenes;

class DatosMaestrosController extends Controller
{


    public function index(){
        $almacen=new Almacenes();
        $mialmacen=$almacen->generarDatosAlmacenes();

        $mialmacen->save();
    }


    

}
