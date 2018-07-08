<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;

class ConstruccionController extends Controller
{
    //Acceso a construcciones
    public function index()
    {
        //$planeta = session()->get('planetas_id');
        $planeta = 1; //hardcode para pruebas
        $recursos = Recursos::calcularRecursos($planeta);
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
        $construcciones = Construcciones::where('planetas_id', $planeta)->get();
        if (empty($construcciones[0]->codigo)) {
            $construccion = new Construcciones();
            $construcciones = $construccion->nuevaColonia($planeta);
            foreach ($construcciones as $construccion) {
                $construccion->save();
            }
        }
        $colaConstruccion = EnConstrucciones::whereBetween('construcciones_id', [$construcciones[0]->id, $construcciones[30]->id])->get();
        return view('juego.construccion', compact('recursos', 'almacenes', 'producciones', 'i', 'construcciones', 'colaConstruccion'));
    }

    //Acceso a subir nivel de construccion
    public function subirNivel ($idEdificio = 1)
    {

        return redirect('/juego/construccion');
    }
}