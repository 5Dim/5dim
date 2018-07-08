<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Producciones;
use App\Planetas;

class AstrometriaController extends Controller
{

    public function index ()
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

    public function generarUniverso ()
    {
        $universo = [];
        $planetas = Planetas::select('estrella', 'jugadores_id')->orderBy('jugadores_id', 'desc')->distinct()->get(['estrella']);
        foreach ($planetas as $planeta) {
            if ($planeta->jugadores_id > 1) {
                $planetita = new Planetas();
                $planetita->habitado = 1;
                $planetita->estrella = $planeta->estrella;
                array_push($universo, $planetita);
            } else {
                $planetita = new Planetas();
                $planetita->habitado = 0;
                $planetita->estrella = $planeta->estrella;
                array_push($universo, $planetita);
            }
        }
        $planetoide = new Planetas();
        $planetoide->idioma = 0;
        $planetoide->global = Planetas::max('estrella');
        $planetoide->ancho = 500;
        $planetoide->fondo = "img/fondo.png";
        $planetoide->sistemas = $universo;
        return $planetoide;
    }
}