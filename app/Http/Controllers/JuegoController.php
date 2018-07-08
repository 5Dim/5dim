<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Recursos;
use App\Almacenes;
use App\Producciones;
use App\Construcciones;

class JuegoController extends Controller
{
    public function index()
    {
        $recursos = Recursos::calcularRecursos(1);
        $almacenes = [];
        $start = 2;
        $end = $start + 9;
        for ($nivel = $start; $nivel < $end; $nivel++) {
            if ($nivel == ($start + 3)) {
                $almacen = Almacenes::where('nivel', $nivel)->first();
                $almacen->capacidad = 'Almacen';
            } else {
                $almacen = Almacenes::where('nivel', $nivel)->first();
            }
            array_push($almacenes, $almacen);
        };
        $producciones = Producciones::where('nivel', '50')->first();
        $i = 0;
        return view('juego.recursosFrame', compact('recursos', 'almacenes', 'producciones', 'i'));
    }
}