<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Recursos;
use App\Almacenes;
use App\Producciones;
use App\Construcciones;
use App\EnConstrucciones;
use App\CostesConstrucciones;

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
            //$construccion->nuevaColonia($planeta);
        }
        $colaConstruccion = EnConstrucciones::whereBetween('construcciones_id', [1, 31])->get();
        return view('juego.construccion', compact('recursos', 'almacenes', 'producciones', 'i', 'construcciones', 'colaConstruccion'));
    }

    //Acceso a subir nivel de construccion
    public function subirNivel ($idEdificio = 1)
    {
        //Recuperar construccion
        $edificio = Construcciones::where('id', $idEdificio)->first();

        //Rellenar variables
        $nivel = !empty($edificio->enConstrucciones) ?
        $edificio->enConstrucciones[count($edificio->enConstrucciones) - 1]->nivel : $edificio->nivel;
        $nivel++;
        $codigo = $edificio->codigo;
        $idConstruccion = $edificio->id;

        //Fecha prueba
        $fechaFin = time() + 3600;

        //Generamos la cola
        $construyendo = new EnConstrucciones();
        $construyendo->personal = 15000000;
        $construyendo->construcciones_id = $idConstruccion;
        $construyendo->nivel = $nivel;
        $construyendo->accion = "Construyendo";
        $construyendo->finished_at = date('Y/m/d H:i:s', $fechaFin);
        $construyendo->save();

        //Generamos el coste del edificio
        $costeConstrucciones = new CostesConstrucciones();
        $coste = $costeConstrucciones->generarDatosCostesConstruccion($nivel, $codigo, $idConstruccion);
        $coste->save();

        return redirect('/juego/construccion');
    }
}