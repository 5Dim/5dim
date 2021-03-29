<?php

namespace App\Http\Controllers;

use App\Models\Alianzas;
use Illuminate\Routing\Controller;
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
use Illuminate\Support\Facades\Log;

class AstrometriaController extends Controller
{
    public function index()
    {
        // Planeta, jugador y alianza
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();
        $planetasAlianza = null;
        if (session()->has('alianza_id') != "nulo") {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }

        //Recursos
        $investigaciones = Investigaciones::investigaciones($planetaActual);
        $construcciones = Construcciones::construcciones($planetaActual);
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $produccion = Producciones::calcularProducciones($construcciones, $planetaActual);
        $capacidadAlmacenes = Almacenes::calcularAlmacenes($construcciones);

        // Personal ocupado
        $personalOcupado = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personalOcupado += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personalOcupado += $cola->personal;
            }
        }

        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel; //Nivel de imperio, se usa para calcular los puntos de imperio (PI)
        $nivelEnsamblajeFuselajes = Investigaciones::sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel); //Calcular nivel de puntos de ensamlaje (PE)
        // Fin obligatorio por recursos

        return view('juego.astrometria.astrometria', compact(
            // Recursos
            'recursos',
            'personalOcupado',
            'capacidadAlmacenes',
            'produccion',
            'planetasJugador',
            'planetasAlianza',

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
        $planetoide->ancho = 400;
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
        /*
        for ($n = 0; $n < 30; $n++) {
            $flota = new \stdClass();
            $flota->numeroflota = random_int(1, 100000);
            $flota->nick = random_int(1, 100) . "-" . random_int(1, 10000);
            $flota->ataque = random_int(1, 1000000);
            $flota->defensa = random_int(1, 1000000);
            $flota->origen = random_int(1, 100000) . "x" . random_int(1, 9);
            $flota->destino = random_int(1, 100000) . "x" . random_int(1, 9);
            $flota->angulo = random_int(1, 400); //para cuando no se sabe la linea
            $flota->color = random_int(1, 5); //
            $flota->fecha = random_int(0, 23) . "h " . random_int(0, 59) . "m " . random_int(0, 59) . "s";

            $flota->coordix = random_int(1, 10000);
            $flota->coordiy = random_int(1, 10000);

            $flota->coordfx = random_int(1, 10000);
            $flota->coordfy = random_int(1, 10000);

            $flota->coordx = round(((($flota->coordix - $flota->coordfx) / random_int(1, 100)) + $flota->coordix), 2);
            $flota->coordy = round((($flota->coordiy - $flota->coordfy) / random_int(1, 100)) + $flota->coordiy, 2);

            $flota->abreen = "ppal";


            array_push($flotas, $flota);
            return compact('flotas');
        }
        */

        $flotas=Astrometria::flotasVisibles();
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
                    $orbita->img_planeta = !empty($planetaActual->imagen) ? $planetaActual->imagen : "";
                    $orbita->mineral = !empty($planetaActual->cualidades->mineral) ? $planetaActual->cualidades->mineral : "";
                    $orbita->cristal = !empty($planetaActual->cualidades->cristal) ? $planetaActual->cualidades->cristal : "";
                    $orbita->gas = !empty($planetaActual->cualidades->gas) ? $planetaActual->cualidades->gas : "";
                    $orbita->plastico = !empty($planetaActual->cualidades->plastico) ? $planetaActual->cualidades->plastico : "";
                    $orbita->ceramica = !empty($planetaActual->cualidades->ceramica) ? $planetaActual->cualidades->ceramica : "";
                    $orbita->b_observar = !empty($planetaActual->nombre) ? "/juego/flotas/" . $numeroSistema . "/" . $i . "/atacar" : ""; // Posibilidad de incluirlo dentro del mapa
                    $orbita->b_atacar = !empty($planetaActual->nombre) ? "/juego/flotas/" . $numeroSistema . "/" . $i . "/atacar" : "";
                    $orbita->b_colonizar = empty($planetaActual->jugadores_id) && $planetaActual->tipo == "planeta" ? "/juego/flotas/" . $numeroSistema . "/" . $i . "/colonizar" : "";
                    $orbita->b_recolectar = $planetaActual->tipo == "asteroide" ? "/juego/flotas/" . $numeroSistema . "/" . $i . "/recolectar" : "";
                    $orbita->b_extraer = $planetaActual->tipo == "planeta" && empty($planetaActual->jugadores_id) ? "/juego/flotas/" . $numeroSistema . "/" . $i . "/extraer" : "";
                    $orbita->b_orbitar = "/juego/flotas/" . $numeroSistema . "/" . $i . "/orbitar";
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
                    $orbita->b_observar = "";
                    $orbita->b_atacar = "";
                    $orbita->b_colonizar = "/juego/flotas/" . $numeroSistema . "/" . $i . "/colonizar";
                    $orbita->b_recolectar = "";
                    $orbita->b_extraer = "/juego/flotas/" . $numeroSistema . "/" . $i . "/extraer";
                    $orbita->b_orbitar = "/juego/flotas/" . $numeroSistema . "/" . $i . "/orbitar";
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
                $orbita->img_planeta = "";
                $orbita->mineral = "";
                $orbita->cristal = "";
                $orbita->gas = "";
                $orbita->plastico = "";
                $orbita->ceramica = "";
                $orbita->b_observar = "";
                $orbita->b_atacar = "";
                $orbita->b_colonizar = "";
                $orbita->b_recolectar = "";
                $orbita->b_extraer = "";
                $orbita->b_orbitar = "/juego/flotas/" . $numeroSistema . "/" . $i . "/orbitar";
                array_push($planetas, $orbita);
            }
        }
        $sistema->planetas = $planetas;

        return $sistema;
    }
}
