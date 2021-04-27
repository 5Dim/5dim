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
use App\Models\Jugadores;
use App\Models\Flotas;
use App\Models\MensajesIntervinientes;
use Illuminate\Support\Facades\Log;

class AstrometriaController extends Controller
{
    public function index()
    {
        $compact = $this->recursos();
        extract($compact);

        return view('juego.astrometria.astrometria', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',
            'mensajeNuevo',

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
            if (count($sistema) > 0) {
                foreach ($sistema as $planeta) {
                    if ($planeta->jugadores_id != null) {
                        $alianza = $planeta->jugadores->alianzas_id;
                        $idMiembros = [];
                        if ($planeta->jugadores->alianzas_id != null) {
                            $idMiembros = Alianzas::idMiembros($alianza);
                        }
                        if ($planeta->jugadores_id == session()->get('jugadores_id')) {
                            $propio = true;
                        }
                        foreach ($idMiembros as $id) {
                            if ($planeta->jugadores_id == $id) {
                                $aliado = true;
                            }
                        }
                        if ($planeta->jugadores_id > 0) {
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
        $seVe = Astrometria::sistemaEnRadares($numeroSistema);
        $sistema = new Planetas();
        $sistema->idioma = 0;
        $sistema->sistema = (int)$numeroSistema;
        $sistema->imgsol = '/astrometria/img/sistema/sol1.png';
        $sistema->imgfondo = '/astrometria/img/sistema/f1.png';
        $planetas = [];
        if ($seVe) { // Si se ve mandamos los datos reales
            for ($i = 1; $i < 10; $i++) {
                $planetaActual = Planetas::where([['estrella', $numeroSistema], ['orbita', $i]])->first();
                $orbita = new \stdClass();
                if (!empty($planetaActual)) {
                    if (empty($planetaActual->cualidades)) {
                        CualidadesPlanetas::agregarCualidades($planetaActual->id, 0);
                        $planetaActual->cualidades = CualidadesPlanetas::where('planetas_id', $planetaActual->id)->first();
                    }
                    $orbita->planeta = $i;
                    $orbita->nom_pla = !empty($planetaActual->nombre) ? $planetaActual->nombre : "";
                    $orbita->nom_jug = !empty($planetaActual->jugadores) && !empty($planetaActual->jugadores->nombre) ? $planetaActual->jugadores->nombre : "";
                    $orbita->alianza = !empty($planetaActual->jugadores) && !empty($planetaActual->jugadores->alianzas) && !empty($planetaActual->jugadores->alianzas->nombre) ? $planetaActual->jugadores->alianzas->nombre : "";
                    $orbita->img_planeta = !empty($planetaActual->imagen) ? "planeta" . $planetaActual->imagen . ".png" : "";
                    $orbita->mineral = !empty($planetaActual->cualidades->mineral) ? $planetaActual->cualidades->mineral : "";
                    $orbita->cristal = !empty($planetaActual->cualidades->cristal) ? $planetaActual->cualidades->cristal : "";
                    $orbita->gas = !empty($planetaActual->cualidades->gas) ? $planetaActual->cualidades->gas : "";
                    $orbita->plastico = !empty($planetaActual->cualidades->plastico) ? $planetaActual->cualidades->plastico : "";
                    $orbita->ceramica = !empty($planetaActual->cualidades->ceramica) ? $planetaActual->cualidades->ceramica : "";
                    $orbita->naves = 0;
                    $orbita->b_observar = ""; // Posibilidad de incluirlo dentro del mapa
                    $orbita->b_enviar = !empty($planetaActual->nombre) ? "/juego/flotas/" . $numeroSistema . "/" . $i . "/atacar" : "";
                    $orbita->b_verorbita = "/juego/flotas/" . $numeroSistema . "/" . $i . "/orbitar";
                } else {
                    $orbita = new \stdClass();
                    $orbita->planeta = $i;
                    $orbita->nom_pla = "";
                    $orbita->nom_jug = "";
                    $orbita->alianza = "";
                    $orbita->img_planeta = "";
                    $orbita->mineral = "";
                    $orbita->cristal = "";
                    $orbita->gas = "";
                    $orbita->plastico = "";
                    $orbita->ceramica = "";
                    $orbita->naves = 0;
                    $orbita->b_observar = "";
                    $orbita->b_enviar = "/juego/flotas/" . $numeroSistema . "/" . $i;
                    $orbita->b_verorbita = "/juego/flotas";
                }
                array_push($planetas, $orbita);
            }
        } else { // Si no se ve mandamos los datos ocultos
            for ($i = 1; $i < 10; $i++) {
                $planetaActual = Planetas::where([['estrella', $numeroSistema], ['orbita', $i]])->first();
                $orbita = new \stdClass();
                $orbita->planeta = $i;
                $orbita->nom_pla = "";
                $orbita->nom_jug = "";
                $orbita->alianza = "";
                if (empty($planetaActual)) {
                    $orbita->img_planeta = "";
                } else {
                    $orbita->img_planeta = "planeta0.png";
                }
                $orbita->mineral = "";
                $orbita->cristal = "";
                $orbita->gas = "";
                $orbita->plastico = "";
                $orbita->ceramica = "";
                $orbita->naves = 0;
                $orbita->b_observar = "";
                $orbita->b_enviar = "/juego/flotas/" . $numeroSistema . "/" . $i;
                $orbita->b_verorbita = "/juego/flotas";
                array_push($planetas, $orbita);
            }
        }
        $sistema->planetas = $planetas;

        return $sistema;
    }
}
