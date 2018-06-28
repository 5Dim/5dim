<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Recursos;
use App\Almacenes;

class JuegoController extends Controller
{
    public function index()
    {
        $recursos = Recursos::calcularRecursos(1);
        $almacenes = Almacenes;
        return view('juego.recursosFrame', compact('recursos', 'almacenes'));
    }
}
