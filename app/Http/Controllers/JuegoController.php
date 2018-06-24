<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Recursos;

class JuegoController extends Controller{


    public function index()
    {
        
        $recurso=new Recursos();

        $resultado=$recurso->actualizaR();
    
        return view('juego.recursosFrame', compact('resultado'));
    }
}
