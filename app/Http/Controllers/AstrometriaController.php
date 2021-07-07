<?php

namespace App\Http\Controllers;

use App\Models\Alianzas;
use App\Http\Controllers\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\Investigaciones;
use App\Models\Astrometria;
use App\Models\CualidadesPlanetas;
use App\Models\EnOrbita;
use App\Models\Jugadores;
use App\Models\Flotas;
use App\Models\MensajesIntervinientes;
use Illuminate\Support\Facades\Log;

class AstrometriaController extends Controller
{
    public function index()
    {
        extract($this->recursos());

        return view('juego.astrometria.astrometria', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'mensajeNuevo',
            'consImperio',

            'planetaActual',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            'investigaciones',
        ));
    }

    public function generarUniverso() // http://homestead.test/juego/astrometria/ajax/universo
    {
        $universo = [];
        $estrellas = Planetas::select('estrella')->orderBy('estrella', 'asc')->distinct()->get(['estrella']);
        for ($i = 0; $i < count($estrellas); $i++) {
            //Variables de control
            $propio = false;
            $aliado = false;
            $ocupado = false;

            // Planetas del sistema
            $sistema = Planetas::where('estrella', $estrellas[$i]->estrella)->get();
            $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
            if (count($sistema) > 0) {
                foreach ($sistema as $planeta) {
                    if (!empty($planeta->jugadores)) {
                        if ($planeta->jugadores_id == session()->get('jugadores_id')) {
                            $propio = true;
                        } elseif ($planeta->jugadores->alianzas_id == $jugadorActual->alianzas_id) {
                            $aliado = true;
                        } elseif ($planeta->jugadores_id > 0) {
                            $ocupado = true;
                        }
                    }
                }
                $planetita = new \stdClass();
                $planetita->estrella = $estrellas[$i]->estrella;
                if ($propio) {
                    $planetita->habitado = 2;
                } elseif ($aliado) {
                    $planetita->habitado = 3;
                } elseif ($ocupado) {
                    $planetita->habitado = 1;
                } else {
                    $planetita->habitado = 0;
                }
                array_push($universo, $planetita);
            }
        }
        $planetoide = new Planetas();
        $planetoide->idioma = 0;
        $planetoide->global = Planetas::max('estrella');
        $planetoide->ancho = 100;
        $planetoide->fondo = "img/fondo.png";
        $planetoide->inicio = Planetas::where('id', session()->get('planetas_id'))->first()->estrella;
        $planetoide->sistemas = $universo;
        return $planetoide;
    }

    public function generarRadares() // http://homestead.test/juego/astrometria/ajax/radares
    {
        $radares = Astrometria::radares();

        return compact('radares');
    }

    public function generarInfluencias() // http://homestead.test/juego/astrometria/ajax/influencia
    {
        $miInfluencia = Astrometria::miInfluencia();
        $influencia = Astrometria::influenciaGeneral();
        return compact('miInfluencia', 'influencia');
    }

    public function generarFlotas() // http://homestead.test/juego/astrometria/ajax/flotas
    {
        $flotas = [];
        $flotas = Astrometria::flotasVisibles();
        return $flotas;
    }

    public function sistema($numeroSistema) // http://homestead.test/juego/astrometria/ajax/sistema/123
    {
        return Astrometria::sistema($numeroSistema);
    }
}
