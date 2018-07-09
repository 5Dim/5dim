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
use App\Constantes;

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
            $construccion->nuevaColonia($planeta);
            $construcciones = Construcciones::where('planetas_id', $planeta)->get();
        }
        $colaConstruccion = EnConstrucciones::whereBetween('construcciones_id', [1, 31])->get();
        $velocidadConst=Constantes::where('codigo','velocidadConst')->first();

        return view('juego.construccion', compact('recursos', 'almacenes', 'producciones', 'i', 'construcciones', 'colaConstruccion','velocidadConst'));
    }

    //Acceso a subir nivel de construccion
    public function subirNivel ($idEdificio = 1)
    {
        //Recuperar construccion
        $edificio = Construcciones::where('id', $idEdificio)->first();
        $nivelCola = EnConstrucciones::where('construcciones_id', $idEdificio)->max('nivel');

        //Rellenar variables
        $nivel = empty($nivelCola) ? $edificio->nivel + 1 : $nivelCola + 1;
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
        $costeAntiguo = CostesConstrucciones::where('construcciones_id', $edificio->id)->first();
        $coste = $costeConstrucciones->generarDatosCostesConstruccion($nivel, $codigo, $idConstruccion);
        $costeAntiguo = $coste->modificarCostes($costeAntiguo, $coste);
        $costeAntiguo->save();
        //$edificio->coste = $costeAntiguo;
        //$edificio->coste->save();

        return redirect('/juego/construccion');
    }
}