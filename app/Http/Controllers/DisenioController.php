<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Recursos;
use App\Models\Almacenes;
use App\Models\Planetas;
use App\Models\Industrias;
use App\Models\Constantes;
use App\Models\Dependencias;
use App\Models\Producciones;
use App\Models\Construcciones;
use App\Models\EnConstrucciones;
use App\Models\EnInvestigaciones;
use App\Models\CostesConstrucciones;
use App\Models\Investigaciones;
use Auth;
use App\Models\Fuselajes;
use App\Models\Armas;
use App\Models\CostesArmas;
use App\Models\CostesFuselajes;
use App\Models\Jugadores;
use App\Models\Disenios;
use App\Models\DaniosDisenios;
use App\Models\CostesDisenios;
use App\Models\CualidadesDisenios;
use App\Models\MejorasDisenios;
use App\Models\EnDisenios;

class DisenioController extends Controller
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
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $construcciones = Construcciones::construcciones($planetaActual);
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

        $investigaciones = Investigaciones::investigaciones($planetaActual);
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel; //Nivel de imperio, se usa para calcular los puntos de imperio (PI)
        $nivelEnsamblajeFuselajes = Investigaciones::sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel); //Calcular nivel de puntos de ensamlaje (PE)
        // Fin obligatorio por recursos

        EnDisenios::terminarColaDisenios();
        $colaDisenios = EnDisenios::where('planetas_id', session()->get('planetas_id'))->get();
        $PConstantes = Constantes::where('tipo', 'produccion')->get();

        //Devolvemos todos los disenios
        $disenios = $jugadorActual->disenios;

        return view('juego.disenio.disenio', compact(
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
            'disenios',
            'colaDisenios',
            'PConstantes'
        ));
    }
    public function diseniar($idFuselaje)
    {
        //Inicio recursos
        if (empty(session()->get('planetas_id'))) {
            return redirect('/planeta');
        }
        if (empty(session()->get('jugadores_id'))) {
            return redirect('/jugador');
        }
        $constantesCheck = Constantes::find(1);
        if (empty($constantesCheck)) {
            return redirect('/admin/DatosMaestros');
        }
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        if ($planetaActual->jugadores->id != $jugadorActual->id and $planetaActual->jugadores->id != $jugadorAlianza->id) {
            return redirect('/planeta');
        }
        $planetasJugador = Planetas::where('jugadores_id', $jugadorActual->id)->get();
        $jugadorAlianza = new Jugadores();
        $jugadorAlianza->id = 0;
        $planetasAlianza = null;
        if (!empty($jugadorActual->alianzas)) {
            $jugadorAlianza = Jugadores::where('nombre', $jugadorActual->alianzas->nombre)->first();
            $planetasAlianza = Planetas::where('jugadores_id', $jugadorAlianza->id)->get();
        }
        EnConstrucciones::terminarColaConstrucciones();
        $construcciones = Construcciones::construcciones($planetaActual);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $producciones = Producciones::calcularProducciones($construcciones, $planetaActual);
        $capacidadAlmacenes = Almacenes::calcularAlmacenes($construcciones);
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $personal = 0;
        $colaConstruccion = EnConstrucciones::colaConstrucciones($planetaActual);
        $colaInvestigacion = EnInvestigaciones::colaInvestigaciones($planetaActual);
        foreach ($colaConstruccion as $cola) {
            $personal += $cola->personal;
        }
        foreach ($colaInvestigacion as $cola) {
            if ($cola->planetas->id == session()->get('planetas_id')) {
                $personal += $cola->personal;
            }
        }
        $tipoPlaneta = $planetaActual->tipo;
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel;
        $nivelEnsamblajeFuselajes = $investigacion->sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel);
        $factoresIndustrias = [];
        $mejoraIndustrias = Constantes::where('codigo', 'mejorainvIndustrias')->first()->valor;
        $factorLiquido = (1 + ($investigaciones->where('codigo', 'invIndLiquido')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorLiquido);
        $factorMicros = (1 + ($investigaciones->where('codigo', 'invIndMicros')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMicros);
        $factorFuel = (1 + ($investigaciones->where('codigo', 'invIndFuel')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorFuel);
        $factorMa = (1 + ($investigaciones->where('codigo', 'invIndMa')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMa);
        $factorMunicion = (1 + ($investigaciones->where('codigo', 'invIndMunicion')->first()->nivel * ($mejoraIndustrias)));
        array_push($factoresIndustrias, $factorMunicion);
        //Fin recursos

        $disenio = Fuselajes::find($idFuselaje);

        $armas = Armas::all();

        $constantesI = Constantes::where('tipo', 'investigacion')->get();
        $costesArmas = CostesArmas::all();

        $arrayAlcance = [
            'armasLigera' => 0,
            'armasMedia' => 0,
            'armasPesada' => 0,
            'armasInsertada' => 0,
            'armasMisil' => 0,
            'armasBomba' => 0
        ];

        $arrayDispersion = [
            'armasLigera' => 0,
            'armasMedia' => 0,
            'armasPesada' => 0,
            'armasInsertada' => 0,
            'armasMisil' => 0,
            'armasBomba' => 0
        ];

        $arrayEnergiaArmas = [
            'armasLigera' => 20,
            'armasMedia' => 40,
            'armasPesada' => 60,
            'armasInsertada' => 70,
            'armasMisil' => 80,
            'armasBomba' => 100
        ];

        $motor = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($motor, 0);
        }
        $blindaje = [];
        for ($n = 0; $n < 14; $n++) {
            array_push($blindaje, 0);
        }
        $mejora = [];
        for ($n = 0; $n < 20; $n++) {
            array_push($mejora, 0);
        }
        $cargaPequenia = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaPequenia, 0);
        }
        $cargaMediana = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaMediana, 0);
        }
        $cargaGrande = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaGrande, 0);
        }
        $cargaEnorme = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaEnorme, 0);
        }
        $cargaMega = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaMega, 0);
        }

        $armasLigera = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasLigera, 0);
        }
        $armasMedia = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasMedia, 0);
        }
        $armasPesada = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasPesada, 0);
        }
        $armasInsertada = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasInsertada, 0);
        }
        $armasMisil = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasMisil, 0);
        }
        $armasBomba = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasBomba, 0);
        }

        $arrayObjetos = [
            'motor' => $motor,
            'blindaje' => $blindaje,
            'mejora' => $mejora,
            'cargaPequenia' => $cargaPequenia,
            'cargaMediana' => $cargaMediana,
            'cargaGrande' => $cargaGrande,
            'cargaEnorme' => $cargaEnorme,
            'cargaMega' => $cargaMega,
            'armasLigera' => $armasLigera,
            'armasMedia' => $armasMedia,
            'armasPesada' => $armasPesada,
            'armasInsertada' => $armasInsertada,
            'armasMisil' => $armasMisil,
            'armasBomba' => $armasBomba
        ];

        $esteDisenio = [
            'nombre' => '',
            'skin' => 1,
            'posicion' => 9
        ];


        return view('juego.diseniar.diseniar', compact(
            'recursos',
            'capacidadAlmacenes',
            'producciones',
            'personal',
            'tipoPlaneta',
            'planetaActual',
            'disenio',
            'nivelImperio',
            'nivelEnsamblajeFuselajes',
            // 'nivelEnsamblajeDefensas',
            // 'nivelEnsamblajeTropas',
            'investigaciones',
            'armas',
            'constantesI',
            'costesArmas',
            'factoresIndustrias',
            'planetasJugador',
            'planetasAlianza',
            'arrayAlcance',
            'arrayDispersion',
            'arrayEnergiaArmas',
            'arrayObjetos',
            'esteDisenio'
        ));
    }

    public function borrarDisenio($idDisenio)
    {
        $jugadorActual = Jugadores::find(session()->get('jugadores_id'));
        $jugadorActual->disenios()->detach($idDisenio);

        return redirect('/juego/disenio');
    }


    public function editarDisenio($idDisenio)
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
        Recursos::calcularRecursos($planetaActual->id);
        $recursos = Recursos::where('planetas_id', $planetaActual->id)->first();
        $construcciones = Construcciones::construcciones($planetaActual);
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

        $investigaciones = Investigaciones::investigaciones($planetaActual);
        $nivelImperio = $investigaciones->where('codigo', 'invImperio')->first()->nivel; //Nivel de imperio, se usa para calcular los puntos de imperio (PI)
        $nivelEnsamblajeFuselajes = Investigaciones::sumatorio($investigaciones->where('codigo', 'invEnsamblajeFuselajes')->first()->nivel); //Calcular nivel de puntos de ensamlaje (PE)
        // Fin obligatorio por recursos

        $esteDisenio = Disenios::where('id', $idDisenio)->first();
        $idFuselaje = $esteDisenio->fuselajes_id;
        $disenio = Fuselajes::find($idFuselaje);
        $armas = Armas::all();
        $constantesI = Constantes::where('tipo', 'investigacion')->get();
        $costesArmas = CostesArmas::all();

        // valores de objetos
        $listaObjetos = CualidadesDisenios::where('disenios_id', $idDisenio)->get();


        $arrayAlcance = [
            'armasLigera' => $listaObjetos->where('codigo', 1020)->first() == null ? 0 : $listaObjetos->where('codigo', 1020)->first()->cantidad,
            'armasMedia' => $listaObjetos->where('codigo', 1021)->first() == null ? 0 : $listaObjetos->where('codigo', 1021)->first()->cantidad,
            'armasPesada' => $listaObjetos->where('codigo', 1022)->first() == null ? 0 : $listaObjetos->where('codigo', 1022)->first()->cantidad,
            'armasInsertada' => $listaObjetos->where('codigo', 1023)->first() == null ? 0 : $listaObjetos->where('codigo', 1023)->first()->cantidad,
            'armasMisil' => $listaObjetos->where('codigo', 1024)->first() == null ? 0 : $listaObjetos->where('codigo', 1024)->first()->cantidad,
            'armasBomba' => $listaObjetos->where('codigo', 1025)->first() == null ? 0 : $listaObjetos->where('codigo', 1025)->first()->cantidad
        ];

        $arrayDispersion = [
            'armasLigera' => $listaObjetos->where('codigo', 1010)->first() == null ? 0 : $listaObjetos->where('codigo', 1010)->first()->cantidad,
            'armasMedia' => $listaObjetos->where('codigo', 1011)->first() == null ? 0 : $listaObjetos->where('codigo', 1011)->first()->cantidad,
            'armasPesada' => $listaObjetos->where('codigo', 1012)->first() == null ? 0 : $listaObjetos->where('codigo', 1012)->first()->cantidad,
            'armasInsertada' => $listaObjetos->where('codigo', 1013)->first() == null ? 0 : $listaObjetos->where('codigo', 1013)->first()->cantidad,
            'armasMisil' => $listaObjetos->where('codigo', 1014)->first() == null ? 0 : $listaObjetos->where('codigo', 1014)->first()->cantidad,
            'armasBomba' => $listaObjetos->where('codigo', 1015)->first() == null ? 0 : $listaObjetos->where('codigo', 1015)->first()->cantidad
        ];

        $arrayEnergiaArmas = [
            'armasLigera' => $listaObjetos->where('codigo', 1000)->first() == null ? 0 : $listaObjetos->where('codigo', 1000)->first()->cantidad,
            'armasMedia' => $listaObjetos->where('codigo', 1001)->first() == null ? 0 : $listaObjetos->where('codigo', 1001)->first()->cantidad,
            'armasPesada' => $listaObjetos->where('codigo', 1002)->first() == null ? 0 : $listaObjetos->where('codigo', 1002)->first()->cantidad,
            'armasInsertada' => $listaObjetos->where('codigo', 1003)->first() == null ? 0 : $listaObjetos->where('codigo', 1003)->first()->cantidad,
            'armasMisil' => $listaObjetos->where('codigo', 1004)->first() == null ? 0 : $listaObjetos->where('codigo', 1004)->first()->cantidad,
            'armasBomba' => $listaObjetos->where('codigo', 1005)->first() == null ? 0 : $listaObjetos->where('codigo', 1005)->first()->cantidad
        ];


        $motor = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($motor, 0);
        }
        $blindaje = [];
        for ($n = 0; $n < 14; $n++) {
            array_push($blindaje, 0);
        }
        $mejora = [];
        for ($n = 0; $n < 20; $n++) {
            array_push($mejora, 0);
        }
        $cargaPequenia = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaPequenia, 0);
        }
        $cargaMediana = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaMediana, 0);
        }
        $cargaGrande = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaGrande, 0);
        }
        $cargaEnorme = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaEnorme, 0);
        }
        $cargaMega = [];
        for ($n = 0; $n < 10; $n++) {
            array_push($cargaMega, 0);
        }

        $armasLigera = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasLigera, 0);
        }
        $armasMedia = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasMedia, 0);
        }
        $armasPesada = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasPesada, 0);
        }
        $armasInsertada = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasInsertada, 0);
        }
        $armasMisil = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasMisil, 0);
        }
        $armasBomba = [];
        for ($n = 0; $n < 6; $n++) {
            array_push($armasBomba, 0);
        }


        foreach ($listaObjetos->where('codigo', '<', 1000) as $valor) {
            for ($x = 0; $x < $valor->cantidad; $x++) {
                $categoria = $valor->categoria;
                array_unshift($$categoria, $valor->codigo);
            }
        }


        $arrayObjetos = [
            'motor' => $motor,
            'blindaje' => $blindaje,
            'mejora' => $mejora,
            'cargaPequenia' => $cargaPequenia,
            'cargaMediana' => $cargaMediana,
            'cargaGrande' => $cargaGrande,
            'cargaEnorme' => $cargaEnorme,
            'cargaMega' => $cargaMega,
            'armasLigera' => $armasLigera,
            'armasMedia' => $armasMedia,
            'armasPesada' => $armasPesada,
            'armasInsertada' => $armasInsertada,
            'armasMisil' => $armasMisil,
            'armasBomba' => $armasBomba
        ];


        return view('juego.diseniar.diseniar', compact(
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

            // Diseño
            'arrayAlcance',
            'arrayDispersion',
            'arrayEnergiaArmas',
            'arrayObjetos',
            'esteDisenio',
        ));
    }


    public function crearDisenio($id = false)
    {  //////////////////////////////////////***************** */

        $armasTengo = ($_POST['armas']);
        $energiaArmas = ($_POST['energiaArmas']);
        $armasAlcance = ($_POST['armasAlcance']);
        $armasDispersion = ($_POST['armasDispersion']);
        $datosBasicos = ($_POST['datosBasicos']);

        $idFuselaje = $datosBasicos['id'];
        //  $jugadorActual = Jugadores::where('id', 1)->first(); $planetaActual = Planetas::where('id', 143)->first(); $investigaciones=$jugadorActual->investigaciones;

        $jugadorActual = Jugadores::where('id', session()->get('jugadores_id'))->first();
        $planetaActual = Planetas::where('id', session()->get('planetas_id'))->first();
        $investigacion = new Investigaciones();
        $investigaciones = $investigacion->investigaciones($planetaActual);
        $disenio = Fuselajes::find($idFuselaje);
        $constantesI = Constantes::where('tipo', 'investigacion')->get();
        $costesArmas = CostesArmas::all();
        $armas = Armas::all();

        function celdasMaximas($a, $b)
        { //saco la cantidad de celdas justas
            while (((int)($b / $a) - ($b / $a)) != 0) {
                --$a;
            }
            return $a;
        }



        function sumaCostosMejoras($destinoCosto, $cte, $esteCosto, $sobrecosto)
        {
            $destinoCosto['mineral'] += ($esteCosto['mineral'] / 100) * $cte * $sobrecosto['mineral'];
            $destinoCosto['cristal'] += ($esteCosto['cristal'] / 100) * $cte * $sobrecosto['cristal'];
            $destinoCosto['gas'] += ($esteCosto['gas'] / 100) * $cte * $sobrecosto['gas'];
            $destinoCosto['plastico'] += ($esteCosto['plastico'] / 100) * $cte * $sobrecosto['plastico'];
            $destinoCosto['ceramica'] += ($esteCosto['ceramica'] / 100) * $cte * $sobrecosto['ceramica'];
            $destinoCosto['liquido'] += ($esteCosto['liquido'] / 100) * $cte * $sobrecosto['liquido'];
            $destinoCosto['micros'] += ($esteCosto['micros'] / 100) * $cte * $sobrecosto['micros'];
            $destinoCosto['personal'] += ($esteCosto['personal'] / 100) * $cte * $sobrecosto['personal'];
            $destinoCosto['masa'] += ($esteCosto['masa'] / 100) * $cte * $sobrecosto['masa'];

            return $destinoCosto;
        }

        function sumaCualidadesMejoras($destinoCosto, $cte, $esteCosto, $sobrecosto)
        {
            $destinoCosto['fuel'] += ($esteCosto['fuel'] / 100) * $cte * $sobrecosto['fuel'];
            $destinoCosto['municion'] += ($esteCosto['municion'] / 100) * $cte * $sobrecosto['municion'];
            $destinoCosto['masa'] += ($esteCosto['masa'] / 100) * $cte * $sobrecosto['masa'];
            $destinoCosto['energia'] += ($esteCosto['energia'] / 100) * $cte * $sobrecosto['energia'];
            $destinoCosto['tiempo'] += ($esteCosto['tiempo'] / 100) * $cte * $sobrecosto['tiempo'];
            $destinoCosto['mantenimiento'] += ($esteCosto['mantenimiento'] / 100) * $cte * $sobrecosto['mantenimiento'];
            $destinoCosto['defensa'] += ($esteCosto['defensa'] / 100) * $cte * $sobrecosto['defensa'];
            $destinoCosto['ataque'] += ($esteCosto['ataque'] / 100) * $cte * $sobrecosto['ataque'];
            $destinoCosto['velocidad'] += ($esteCosto['velocidad'] / 100) * $cte * $sobrecosto['velocidad'];
            $destinoCosto['carga'] += ($esteCosto['carga'] / 100) * $cte * $sobrecosto['carga'];
            $destinoCosto['cargaPequenia'] += ($esteCosto['cargaPequenia'] / 100) * $cte * $sobrecosto['cargaPequenia'];
            $destinoCosto['cargaMediana'] += ($esteCosto['cargaMediana'] / 100) * $cte * $sobrecosto['cargaMediana'];
            $destinoCosto['cargaGrande'] += ($esteCosto['cargaGrande'] / 100) * $cte * $sobrecosto['cargaGrande'];
            $destinoCosto['cargaEnorme'] += ($esteCosto['cargaEnorme'] / 100) * $cte * $sobrecosto['cargaEnorme'];
            $destinoCosto['cargaMega'] += ($esteCosto['cargaMega'] / 100) * $cte * $sobrecosto['cargaMega'];

            return $destinoCosto;
        }



        function sumaCostos($destinoCosto, $cte, $esteCosto)
        {
            $destinoCosto['mineral'] += $esteCosto['mineral'] * $cte;
            $destinoCosto['cristal'] += $esteCosto['cristal'] * $cte;
            $destinoCosto['gas'] += $esteCosto['gas'] * $cte;
            $destinoCosto['plastico'] += $esteCosto['plastico'] * $cte;
            $destinoCosto['ceramica'] += $esteCosto['ceramica'] * $cte;
            $destinoCosto['liquido'] += $esteCosto['liquido'] * $cte;
            $destinoCosto['micros'] += $esteCosto['micros'] * $cte;
            $destinoCosto['personal'] += $esteCosto['personal'] * $cte;
            $destinoCosto['masa'] += $esteCosto['masa'] * $cte;

            if ($destinoCosto['mineral'] < 0) {
                $destinoCosto['mineral'] = $disenio->costes->mineral;
            };
            if ($destinoCosto['cristal'] < 0) {
                $destinoCosto['cristal'] = $disenio->costes->cristal;
            };
            if ($destinoCosto['gas'] < 0) {
                $destinoCosto['gas'] = $disenio->costes->gas;
            };
            if ($destinoCosto['plastico'] < 0) {
                $destinoCosto['plastico'] = $disenio->costes->plastico;
            };
            if ($destinoCosto['ceramica'] < 0) {
                $destinoCosto['ceramica'] = $disenio->costes->ceramica;
            };
            if ($destinoCosto['liquido'] < 0) {
                $destinoCosto['liquido'] = $disenio->costes->liquido;
            };
            if ($destinoCosto['micros'] < 0) {
                $destinoCosto['micros'] = $disenio->costes->micros;
            };
            if ($destinoCosto['personal'] < 0) {
                $destinoCosto['personal'] = $disenio->costes->personal;
            };
            if ($destinoCosto['masa'] < 0) {
                $destinoCosto['masa'] = $disenio->costes->masa;
            };

            return $destinoCosto;
        }

        function sumaCualidades($destinoCualidad, $cte, $esteCualidad)
        {
            $destinoCualidad['fuel'] += $esteCualidad['fuel'] * $cte;
            $destinoCualidad['municion'] += $esteCualidad['municion'] * $cte;
            $destinoCualidad['masa'] += $esteCualidad['masa'] * $cte;
            $destinoCualidad['energia'] += $esteCualidad['energia'] * $cte;
            $destinoCualidad['tiempo'] += $esteCualidad['tiempo'] * $cte;
            $destinoCualidad['mantenimiento'] += $esteCualidad['mantenimiento'] * $cte;
            $destinoCualidad['defensa'] += $esteCualidad['defensa'] * $cte;
            $destinoCualidad['ataque'] += $esteCualidad['ataque'] * $cte;
            $destinoCualidad['velocidad'] += $esteCualidad['velocidad'] * $cte;
            $destinoCualidad['carga'] += $esteCualidad['carga'] * $cte;
            $destinoCualidad['cargaPequenia'] += $esteCualidad['cargaPequenia'] * $cte;
            $destinoCualidad['cargaMediana'] += $esteCualidad['cargaMediana'] * $cte;
            $destinoCualidad['cargaGrande'] += $esteCualidad['cargaGrande'] * $cte;
            $destinoCualidad['cargaEnorme'] += $esteCualidad['cargaEnorme'] * $cte;
            $destinoCualidad['cargaMega'] += $esteCualidad['cargaMega'] * $cte;

            return $destinoCualidad;
        }


        $filasCarga = 10;


        $arrayArmasTengo = [
            'cantidadCLigeras' => 0,
            'cantidadCMedias' => 0,
            'cantidadCPesadas' => 0,
            'cantidadCInsertadas' => 0,
            'cantidadCMisiles' => 0,
            'cantidadCBombas' => 0
        ];

        $cualidades = [
            'fuel' => 0,
            'municion' => 0,
            'masa' => 0,
            'energia' => 0,
            'tiempo' => 0,
            'mantenimiento' => 0,
            'ataque' => 0,
            'defensa' => 0,
            'velocidad' => 0,
            'carga' => 0,
            'cargaPequenia' => 0,
            'cargaMediana' => 0,
            'cargaGrande' => 0,
            'cargaEnorme' => 0,
            'cargaMega' => 0,
        ];


        $costesDisenio = [
            'mineral' => $disenio->costes->mineral,
            'cristal' => $disenio->costes->cristal,
            'gas' => $disenio->costes->gas,
            'plastico' => $disenio->costes->plastico,
            'ceramica' => $disenio->costes->ceramica,
            'liquido' => $disenio->costes->liquido,
            'micros' => $disenio->costes->micros,
            'personal' => $disenio->costes->personal,
            'masa' => $disenio->cualidades->masa,
        ];

        $velocidad = [
            'invPropQuimico' => 0,
            'invPropNuk' => 0,
            'invPropIon' => 0,
            'invPropPlasma' => 0,
            'invPropMa' => 0,
            'invPropHMA' => 0,
        ];

        $cantiFocos = [0, 0, 0, 0, 0]; //cada fila
        $danoFocos = [1, 1, 1, 1, 1]; //cada fila
        $empujeT = 0;
        $ctrlPunteria = 0;
        $ariete = 0;


        /// cantidades de cada elemento

        $cantidadMotores = $disenio->cualidades->motores;
        $multiplicadorMotores = 1;
        if ($cantidadMotores > 6) {
            $cantidadMotores = celdasMaximas(6, $cantidadMotores);
            $multiplicadorMotores = ($disenio->cualidades->motores / $cantidadMotores);
        }

        $cantidadblindajes = $disenio->cualidades->blindajes;
        $multiplicadorblindajes = 1;
        if ($cantidadblindajes > 14) {
            $cantidadblindajes = celdasMaximas(14, $cantidadblindajes);
            $multiplicadorblindajes = ($disenio->cualidades->blindajes / $cantidadblindajes);
        }

        $cantidadMejoras = $disenio->cualidades->mejoras;
        $multiplicadormejoras = 1;

        $porcent = 1;
        $cantidadCLigeras = $disenio->cualidades->armasLigeras;
        $multiplicadorCLigeras = 1;
        if ($cantidadCLigeras > 0) {
            $arrayArmasTengo['cantidadCLigeras'] = 1;
        }
        if ($cantidadCLigeras > 6) {
            $cantidadCLigeras = celdasMaximas(6, $cantidadCLigeras);
            $multiplicadorCLigeras = ($disenio->cualidades->armasLigeras / $cantidadCLigeras);
        }

        $cantidadCMedias = $disenio->cualidades->armasMedias;
        $multiplicadorCMedias = 1;
        if ($cantidadCMedias > 0) {
            $arrayArmasTengo['cantidadCMedias'] = 1;
        }
        if ($cantidadCMedias > 6) {
            $cantidadCMedias = celdasMaximas(6, $cantidadCMedias);
            $multiplicadorCMedias = ceil($disenio->cualidades->armasMedias / $cantidadCMedias);
        }

        $cantidadCPesadas = $disenio->cualidades->armasPesadas;
        $multiplicadorCPesadas = 1;
        if ($cantidadCPesadas > 0) {
            $arrayArmasTengo['cantidadCPesadas'] = 1;
        }
        if ($cantidadCPesadas > 6) {
            $cantidadCPesadas = celdasMaximas(6, $cantidadCPesadas);
            $multiplicadorCPesadas = ($disenio->cualidades->armasPesadas / $cantidadCPesadas);
        }

        $cantidadCInsertadas = $disenio->cualidades->armasInsertadas;
        $multiplicadorCInsertadas = 1;
        if ($cantidadCInsertadas > 0) {
            $arrayArmasTengo['cantidadCInsertadas'] = 1;
        }
        if ($cantidadCInsertadas > 6) {
            $cantidadCInsertadas = celdasMaximas(6, $cantidadCInsertadas);
            $multiplicadorCInsertadas = ($disenio->cualidades->armasInsertadas / $cantidadCInsertadas);
        }

        $cantidadCMisiles = $disenio->cualidades->armasMisiles;
        $multiplicadorCMisiles = 1;
        if ($cantidadCMisiles > 0) {
            $arrayArmasTengo['cantidadCMisiles'] = 1;
        }
        if ($cantidadCMisiles > 6) {
            $cantidadCMisiles = celdasMaximas(6, $cantidadCMisiles);
            $multiplicadorCMisiles = ($disenio->cualidades->armasMisiles / $cantidadCMisiles);
        }

        $cantidadCBombas = $disenio->cualidades->armasBombas;
        $multiplicadorCBombas = 1;
        if ($cantidadCBombas > 0) {
            $arrayArmasTengo['cantidadCBombas'] = 1;
        }
        if ($cantidadCBombas > 6) {
            $cantidadCBombas = celdasMaximas(6, $cantidadCBombas);
            $multiplicadorCBombas = ($disenio->cualidades->armasBombas / $cantidadCBombas);
        }


        $cantidadCargaPequenia = $disenio->cualidades->cargaPequenia;
        $multiplicadorCargaPequenia = 1;
        if ($cantidadCargaPequenia > $filasCarga) {
            $cantidadCargaPequenia = celdasMaximas($filasCarga, $cantidadCargaPequenia);
            $multiplicadorCargaPequenia = ($disenio->cualidades->cargaPequenia / $cantidadCargaPequenia);
        }

        $cantidadCargaMedia = $disenio->cualidades->cargaMedia;
        $multiplicadorCargaMedia = 1;
        if ($cantidadCargaMedia > $filasCarga) {
            $cantidadCargaMedia = celdasMaximas($filasCarga, $cantidadCargaMedia);
            $multiplicadorCargaMedia = ceil($disenio->cualidades->cargaMedia / $cantidadCargaMedia);
        }

        $cantidadCargaGrande = $disenio->cualidades->cargaGrande;
        $multiplicadorCargaGrande = 1;
        if ($cantidadCargaGrande > $filasCarga) {
            $cantidadCargaGrande = celdasMaximas($filasCarga, $cantidadCargaGrande);
            $multiplicadorCargaGrande = ($disenio->cualidades->cargaGrande / $cantidadCargaGrande);
        }

        $cantidadCargaEnorme = $disenio->cualidades->cargaEnorme;
        $multiplicadorCargaEnorme = 1;
        if ($cantidadCargaEnorme > $filasCarga) {
            $cantidadCargaEnorme = celdasMaximas($filasCarga, $cantidadCargaEnorme);
            $multiplicadorCargaEnorme = ($disenio->cualidades->cargaEnorme / $cantidadCargaEnorme);
        }

        $cantidadCargaMega = $disenio->cualidades->cargaMega;
        $multiplicadorCargaMega = 1;
        if ($cantidadCargaMega > $filasCarga) {
            $cantidadCargaMega = celdasMaximas($filasCarga, $cantidadCargaMega);
            $multiplicadorCargaMega = ($disenio->cualidades->cargaMega / $cantidadCargaMega);
        }

        $multiplicadorArmas = [
            'armasLigera' => $multiplicadorCLigeras,
            'armasMedia' => $multiplicadorCMedias,
            'armasPesada' => $multiplicadorCPesadas,
            'armasInsertada' => $multiplicadorCInsertadas,
            'armasMisil' => $multiplicadorCMisiles,
            'armasBomba' => $multiplicadorCBombas
        ];

        $tiposArmas = [
            'armasLigera',
            'armasMedia',
            'armasPesada',
            'armasInsertada',
            'armasMisil',
            'armasBomba'
        ];

        $correcto = true; // comprobando ranuras
        $razonCorrecto = ""; //que salio mal

        if ($cantidadMotores > 0) {
            if (count($armasTengo['motor']) != $cantidadMotores) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de motores " . count($armasTengo['motor']) . " != " . $cantidadMotores;
            };
        }
        if ($cantidadblindajes > 0) {
            if (count($armasTengo['blindaje']) != $cantidadblindajes) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de blindaje " . count($armasTengo['blindaje']) . " != " . $cantidadblindajes;
            };
        }
        if ($cantidadMejoras > 0) {
            if (count($armasTengo['mejora']) != $cantidadMejoras) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de mejora " . count($armasTengo['mejora']) . " != " . $cantidadMejoras;
            };
        }

        if ($cantidadCargaPequenia > 0) {
            if (count($armasTengo['cargaPequenia']) != $cantidadCargaPequenia) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de cargaPequenia " . count($armasTengo['cargaPequenia']) . " != " . $cantidadCargaPequenia;
            };
        }

        if ($cantidadCargaMedia > 0) {
            if (count($armasTengo['cargaMediana']) != $cantidadCargaMedia) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de cargaMediana " . count($armasTengo['cargaMediana']) . " != " . $cantidadCargaMedia;
            };
        }

        if ($cantidadCargaGrande > 0) {
            if (count($armasTengo['cargaGrande']) != $cantidadCargaGrande) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de cargaGrande " . count($armasTengo['cargaGrande']) . " != " . $cantidadCargaGrande;
            };
        }

        if ($cantidadCargaEnorme > 0) {
            if (count($armasTengo['cargaEnorme']) != $cantidadCargaEnorme) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de cargaEnorme " . count($armasTengo['cargaEnorme']) . " != " . $cantidadCargaEnorme;
            };
        }

        if ($cantidadCargaMega > 0) {
            if (count($armasTengo['cargaMega']) != $cantidadCargaMega) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de cargaMega " . count($armasTengo['cargaMega']) . " != " . $cantidadCargaMega;
            };
        }

        if ($cantidadCLigeras > 0) {
            if (count($armasTengo[$tiposArmas[0]]) != $cantidadCLigeras) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de armasLigera " . count($armasTengo['armasLigera']) . " != " . $cantidadCLigeras;
            };
        } else {
            $armasTengo[$tiposArmas[0]] = [0];
        }
        if ($cantidadCMedias > 0) {
            if (count($armasTengo[$tiposArmas[1]]) != $cantidadCMedias) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de armasMedia " . count($armasTengo['armasMedia']) . " != " . $cantidadCMedias;
            };
        } else {
            $armasTengo[$tiposArmas[1]] = [0];
        }
        if ($cantidadCPesadas > 0) {
            if (count($armasTengo[$tiposArmas[2]]) != $cantidadCPesadas) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de armasPesada " . count($armasTengo['armasPesada']) . " != " . $cantidadCPesadas;
            };
        } else {
            $armasTengo[$tiposArmas[2]] = [0];
        }
        if ($cantidadCInsertadas > 0) {
            if (count($armasTengo[$tiposArmas[3]]) != $cantidadCInsertadas) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de armasInsertada " . count($armasTengo['armasInsertada']) . " != " . $cantidadCInsertadas;
            };
        } else {
            $armasTengo[$tiposArmas[3]] = [0];
        }
        if ($cantidadCMisiles > 0) {
            if (count($armasTengo[$tiposArmas[4]]) != $cantidadCMisiles) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de armasMisil " . count($armasTengo['armasMisil']) . " != " . $cantidadCMisiles;
            };
        } else {
            $armasTengo[$tiposArmas[4]] = [0];
        }
        if ($cantidadCBombas > 0) {
            if (count($armasTengo[$tiposArmas[5]]) != $cantidadCBombas) {
                $correcto = false;
                $razonCorrecto = "<br>cantidad de armasBomba " . count($armasTengo['armasBomba']) . " != " . $cantidadCBombas;
            };
        } else {
            $armasTengo[$tiposArmas[5]] = [0];
        }

        $cualidadesFuselaje = $disenio->cualidades;

        $costesMisMotores = array("mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0);
        $costesMisMejoras = array("mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0);
        $costesMisCargas = array("mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0);
        $costesMisArmas = array("mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0);
        $costesMisBlindajes = array("mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0);

        // comprobando que tengo el fuselaje
        if (empty($jugadorActual->fuselajes->where('id', $idFuselaje)->first())) {
            $correcto = false;
            $razonCorrecto = "<br>No tienes ese fuselaje";
        };

        /// comprobando sliders
        //energia
        $porcentT = 0;
        foreach ($energiaArmas as $valor) {
            $porcentT += $valor;
        }
        if ($porcentT > 1) {
            $correcto = false;
        };

        //alcance
        foreach ($armasAlcance as $valor) {
            if ($valor < -7) {
                $correcto = false;
            };
            if ($valor > 7) {
                $correcto = false;
            };
        }
        foreach ($armasDispersion as $valor) {
            if ($valor < -7) {
                $correcto = false;
            };
            if ($valor > 7) {
                $correcto = false;
            };
        }

        //$empujeT=0;


        $prueba = "";

        if ($correcto) {

            // aniado energia
            $elemento = 'motor';
            $genera = 'energia';
            $misCostes = $costesMisMotores;
            $multiplicador = $multiplicadorMotores;
            foreach ($armasTengo[$elemento] as $e) {
                if ($e > 0 and $correcto > 0) {

                    //$obj=array_search($e,$armas);
                    $obj = $armas->where('codigo', $e)->first();
                    $factorFuselaje = $disenio->cualidades->$genera;
                    $costesVacio = ["mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0,];

                    //comprobando tengo la tecno necesaria
                    $clase = $obj['clase'];
                    $miNivelTecno = $investigaciones->where('codigo', $clase)->first()->nivel;
                    if ($obj['niveltec'] > $miNivelTecno) {
                        $correcto = false;
                        $razonCorrecto += "<br>Tecnologia demasiado baja: " + $clase + " ";
                    };

                    // sumo costes
                    $costeobj = $costesArmas->where('armas_codigo', $e)->first();
                    $misCostes = sumaCostos($misCostes, $multiplicador, $costeobj); // sumo recursos basicos
                    // sumo cualidades
                    $costesVacio[$genera] = $costeobj[$genera] * 1 * $factorFuselaje; //lo q mejora por esos niveles
                    $costesVacio['tiempo'] = $costeobj['tiempo'] * $factorFuselaje;
                    $costesVacio['mantenimiento'] = $costeobj['mantenimiento'] * $factorFuselaje;
                    $costesVacio['fuel'] = $costeobj['fuel'] * $factorFuselaje;
                    $misCostes = sumaCualidades($misCostes, $multiplicador, $costesVacio);
                    $empujeT += $costeobj['velocidad'] * $multiplicador * $cualidadesFuselaje['velocidad']; //realmente no vale para calcular velocidadya

                    $velocidad[$clase] += $costeobj['velocidad'] * $multiplicador * $cualidadesFuselaje['velocidad'];
                    $costesMisMotores = $misCostes;
                }
            }
            // sin motores ya ni mires mas
            if ($empujeT < 1) {
                $correcto = false;
                $razonCorrecto += "<br>No hay motores";
            }

            // aniado blindaje
            $elemento = 'blindaje';
            $genera = 'defensa';
            $misCostes = $costesMisBlindajes;
            $multiplicador = $multiplicadorblindajes;
            foreach ($armasTengo[$elemento] as $e) {
                if ($e > 0 and $correcto > 0) {

                    //$obj=array_search($e,$armas);
                    $obj = $armas->where('codigo', $e)->first();
                    $factorFuselaje = $disenio->cualidades->$genera;
                    $costesVacio = ["mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0,];

                    //comprobando tengo la tecno necesaria
                    $clase = $obj['clase'];
                    $miNivelTecno = $investigaciones->where('codigo', $clase)->first()->nivel;
                    if ($obj['niveltec'] > $miNivelTecno) {
                        $correcto = false;
                        $razonCorrecto += "<br>Tecnologia demasiado baja: " + $clase + " ";
                    };

                    // sumo costes
                    $costeobj = $costesArmas->where('armas_codigo', $e)->first();
                    $misCostes = sumaCostos($misCostes, $multiplicador, $costeobj); // sumo recursos basicos
                    // sumo cualidades
                    $costesVacio[$genera] = $costeobj[$genera] * 1 * $factorFuselaje; //lo q mejora por esos niveles
                    $costesVacio['tiempo'] = $costeobj['tiempo'] * $factorFuselaje;
                    $costesVacio['mantenimiento'] = $costeobj['mantenimiento'] * $factorFuselaje;
                    $costesVacio['energia'] = $costeobj['energia'] * $factorFuselaje;
                    $misCostes = sumaCualidades($misCostes, $multiplicador, $costesVacio);
                    $costesMisBlindajes = $misCostes;
                }
            }

            //// bucle de cargas
            for ($x = 1; $x < 6; $x++) {
                $genera = 'carga';
                $misCostes = $costesMisCargas;
                $cantidad = 0;
                switch ($x) {
                    case 1:
                        $elemento = 'cargaPequenia';
                        $multiplicador = $multiplicadorCargaPequenia;
                        $factorFuselaje = 1;
                        $cantidad = $cantidadCargaPequenia;
                        break;
                    case 2:
                        $elemento = 'cargaMediana';
                        $multiplicador = $multiplicadorCargaMedia;
                        $factorFuselaje = 1;
                        $cantidad = $cantidadCargaMedia;
                        break;
                    case 3:
                        $elemento = 'cargaGrande';
                        $multiplicador = $multiplicadorCargaGrande;
                        $factorFuselaje = 1;
                        $cantidad = $cantidadCargaGrande;
                        break;
                    case 4:
                        $elemento = 'cargaEnorme';
                        $multiplicador = $multiplicadorCargaEnorme;
                        $factorFuselaje = 1;
                        $cantidad = $cantidadCargaEnorme;
                        break;
                    case 5:
                        $elemento = 'cargaMega';
                        $multiplicador = $multiplicadorCargaMega;
                        $factorFuselaje = 1;
                        $cantidad = $cantidadCargaMega;
                        break;
                    default:
                        $multiplicador = 0;
                }
                $genera2 = $elemento;

                if ($cantidad > 0) {
                    foreach ($armasTengo[$elemento] as $e) {
                        if ($e > 0 and $correcto > 0) {

                            //$obj=array_search($e,$armas);
                            $obj = $armas->where('codigo', $e)->first();
                            //$factorFuselaje=$disenio->cualidades->$genera;
                            $costesVacio = ["mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0,];

                            //comprobando tengo la tecno necesaria
                            $clase = $obj['clase'];
                            $miNivelTecno = $investigaciones->where('codigo', $clase)->first()->nivel;
                            if ($obj['niveltec'] > $miNivelTecno) {
                                $correcto = false;
                                $razonCorrecto += "<br>Tecnologia demasiado baja: " + $clase + " ";
                            };

                            // sumo costes
                            $costeobj = $costesArmas->where('armas_codigo', $e)->first();
                            $misCostes = sumaCostos($misCostes, $multiplicador, $costeobj); // sumo recursos basicos
                            // sumo cualidades
                            $costesVacio[$genera] = $costeobj[$genera] * 1 * $factorFuselaje; //lo q mejora por esos niveles
                            $costesVacio['tiempo'] = $costeobj['tiempo'] * $factorFuselaje;
                            $costesVacio['mantenimiento'] = $costeobj['mantenimiento'] * $factorFuselaje;
                            $costesVacio['energia'] = $costeobj['energia'] * $factorFuselaje;
                            if ($genera2 != "") {
                                $costesVacio[$genera2] = $costeobj[$genera2];
                            } //hangares
                            $misCostes = sumaCualidades($misCostes, $multiplicador, $costesVacio);
                            $costesMisCargas = $misCostes;
                            //$prueba=$costeobj['energia']." ?".$factorFuselaje." ?";
                        }
                    }
                }
            }




            ///// mejoras
            $elemento = 'mejora';
            $genera = 'ia';
            $multiplicador = 1;
            $misCostes = $costesMisMejoras;
            foreach ($armasTengo[$elemento] as $e) {
                $costesVacio = ['mineral' => 0, 'cristal' => 0, 'gas' => 0, 'plastico' => 0, 'ceramica' => 0, 'liquido' => 0, 'micros' => 0, 'personal' => 0, 'fuel' => 0, 'ma' => 0, 'municion' => 0, 'masa' => 0, 'energia' => 0, 'tiempo' => 0, 'mantenimiento' => 0, 'defensa' => 0, 'ataque' => 0, 'velocidad' => 0, 'carga' => 0, 'cargaPequenia' => 0, 'cargaMediana' => 0, 'cargaGrande' => 0, 'cargaEnorme' => 0, 'cargaMega' => 0];
                $sobreCostes = ['mineral' => 0, 'cristal' => 0, 'gas' => 0, 'plastico' => 0, 'ceramica' => 0, 'liquido' => 0, 'micros' => 0, 'personal' => 0, 'fuel' => 0, 'ma' => 0, 'municion' => 0, 'masa' => 0, 'energia' => 0, 'tiempo' => 0, 'mantenimiento' => 0, 'defensa' => 0, 'ataque' => 0, 'velocidad' => 0, 'carga' => 0, 'cargaPequenia' => 0, 'cargaMediana' => 0, 'cargaGrande' => 0, 'cargaEnorme' => 0, 'cargaMega' => 0];

                $hazlo = 0;
                if ($e > 0) {
                    $obj = $armas->where('codigo', $e)->first();

                    switch ($obj['codigo']) {

                        case 72: //escudos
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisBlindajes);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisBlindajes);
                            break;
                        case 75: //salvas
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisArmas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisArmas);
                            break;
                        case 77: //standart
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisMotores);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisBlindajes);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisArmas);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisCargas);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisMejoras);

                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisMotores);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisBlindajes);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisArmas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisCargas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisMejoras);
                            break;
                        case 74:
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisArmas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisArmas);
                            break;
                        case 76: //aleaciones
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisMotores);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisBlindajes);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisArmas);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisCargas);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisMejoras);

                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisMotores);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisBlindajes);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisArmas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisCargas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisMejoras);
                            break;
                        case 70: //compactador
                        case 78: //plegado
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisCargas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisCargas);
                            break;
                        case 73: //prop maniobra
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisMotores);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisMotores);
                            break;
                        case 74: //nanos
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisMotores);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisBlindajes);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisArmas);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisCargas);
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisMejoras);

                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisMotores);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisBlindajes);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisArmas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisCargas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisMejoras);
                            break;
                        case 73: //prop maniobra
                            $hazlo++;
                            $cte = 1;
                            $sobreCostes = sumaCostos($sobreCostes, $cte, $costesMisCargas);
                            $sobreCostes = sumaCualidades($sobreCostes, $cte, $costesMisCargas);
                            break;
                        case 71: //ctrol punteria
                            $ctrlPunteria++;
                            break;
                        case 79: //ariete
                            $ariete++;
                            break;
                        case 80:    // foco-caza
                            $cantiFocos[0] += 1;
                            break;
                        case 81:    // foco-ligera
                            $cantiFocos[1] += 1;
                            break;
                        case 82:    //foco-media
                            $cantiFocos[2] += 1;
                            break;
                        case 83:    // foco pesada
                            $cantiFocos[3] += 1;
                            break;
                        case 84:    // foco bombas
                            $cantiFocos[4] += 1;
                            break;
                            //$hazlo++;
                            //$cte=1;
                            //  sumaCostos($sobreCostes,$cte,costesMisArmas);
                            // sumaCualidades($sobreCostes,$cte,costesMisArmas);
                            break;
                    }

                    if ($hazlo > 0) {

                        $costeobj = $costesArmas->where('armas_codigo', $e)->first();

                        // sumaCostos($misCostes,$multiplicador,costeobj);// sumo recursos basicos
                        $cte = 1; //lo que varia por nivel de tecno
                        $factorFuselaje = 1;     // el factor que varia para cada fuselaje
                        $costesVacio[$genera] = $costeobj[$genera] * $cte * $factorFuselaje; //lo q mejora por esos niveles
                        // costesVacio['tiempo']=costeobj[genera]*factorFuselaje;
                        // costesVacio['mantenimiento']=costeobj[genera]*factorFuselaje;
                        //sumaCualidades($misCostes,$multiplicador,costesVacio);
                        $costesDisenio = sumaCostosMejoras($costesDisenio, $multiplicador, $costeobj, $sobreCostes);
                        $cualidades = sumaCualidadesMejoras($cualidades, $multiplicador, $costeobj, $sobreCostes);
                    }
                }
            };

            $cteAriete = 1;
            $costoFocoA = 1; //coste acumulado foco

            if ($cantidadCLigeras + $cantidadCMedias + $cantidadCPesadas + $cantidadCInsertadas + $cantidadCMisiles + $cantidadCBombas > 0) {
                //// armas ///////

                $energiaT = $costesMisMotores['energia'] + $costesMisBlindajes['energia'] + $costesMisCargas['energia'] + $cualidades['energia']; // energia para armas total
                $misCostes = $costesMisArmas;
                //$armasTengoT=count($armasTengo[$tiposArmas[0]])+count($armasTengo[$tiposArmas[1]])+$armasTengo[$tiposArmas[2]]+$armasTengo[$tiposArmas[3]]+$armasTengo[$tiposArmas[4]]+$armasTengo[$tiposArmas[5]];



                // posicion del danio segun el arma

                $danoPosicion = [
                    'armasLigera' => [0, 1],
                    'armasMedia' => [1, 2],
                    'armasPesada' => [2, 3],
                    'armasInsertada' => [3, 4],
                    'armasMisil' => [3, 5],
                    'armasBomba' => [4, 2]
                ];

                $listaTecnos = [
                    "invEnergia",
                    "invPlasma",
                    "invBalistica",
                    "invMa"
                ];

                $danoinvEnergia = [[0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0]];
                $danoinvPlasma = [[0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0]];
                $danoinvBalistica = [[0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0]];
                $danoinvMa = [[0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0]];

                $danoTotal = [
                    'invEnergia' => $danoinvEnergia,
                    'invPlasma' => $danoinvPlasma,
                    'invBalistica' => $danoinvBalistica,
                    'invMa' => $danoinvMa
                ];

                $cteFoco = 1;
                $costoFoco = 1;
                $energiaUsada = 0;
                $costoFocoA = 1;
                foreach ($tiposArmas as $elemento) {

                    $hayalgo = 1;
                    $cteFoco = 1;
                    $costoFoco = 1;

                    // focos
                    if ($cantiFocos[$danoPosicion[$elemento][0]] > 0) {
                        $e2 = $danoPosicion[$elemento][0] + 80;
                        $costeobj2 = $costesArmas->where('armas_codigo', $e2)->first();
                        $cuantos2 = $cantiFocos[$danoPosicion[$elemento][0]];
                        $cteFoco = $cuantos2; //lo que varia por nivel de tecno
                        $costoFoco = (1 + ($costeobj2['mineral'] / 100)) * $cuantos2; // es el que se usa para todos
                        $danoFocos[$danoPosicion[$elemento][0]] = $costoFoco;
                        $costoFocoA += $costoFoco; //acumulado
                    }
                }
                $prueba = $costoFocoA;


                foreach ($tiposArmas as $elemento) {

                    $energiaArm = 0;
                    $danioarmasArm = 0;
                    foreach ($armasTengo[$elemento] as $e) {
                        if ($e > 0) {
                            $costeobj = $costesArmas->where('armas_codigo', $e)->first();
                            $energiaArm += $costeobj['energia'];
                        }
                    }

                    if ($energiaArm != 0) {
                        $energiaXarma = 1 / $energiaArm;
                    } else {
                        $energiaXarma = 0;
                    }

                    $costesVacio = ["mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0,];
                    //$elemento='blindaje';
                    //$genera='defensa';
                    $misCostes = $costesMisArmas;
                    $multiplicador = $multiplicadorblindajes;


                    foreach ($armasTengo[$elemento] as $e) {

                        if ($e > 0 and $correcto > 0) {

                            $hayalgo = 1;

                            $costoPunteria = 1;
                            $ctePunteria = 1;
                            if ($ctrlPunteria > 0) {
                                $e2 = 71;
                                $costeobj2 = $costesArmas->where('armas_codigo', $e2)->first();
                                $cuantos2 = $ctrlPunteria;
                                $ctePunteria = ($cuantos2); //lo que varia por nivel de tecno
                                $costoPunteria = (1 + ($costeobj2['mineral'] / 100)) * $cuantos2;
                            }
                            $costoAriete = 1;
                            // cteAriete=1;
                            if ($ariete > 0) {
                                $e2 = 71;
                                $costeobj2 = $costesArmas->where('armas_codigo', $e2)->first();
                                $cuantos2 = $ariete;
                                $cteAriete = ($cuantos2); //lo que varia por nivel de tecno
                                $costoAriete = (1 + ($costeobj2['mineral'] / 100)) * $cuantos2;
                            }


                            //$obj=array_search($e,$armas);
                            $obj = $armas->where('codigo', $e)->first();
                            $factorFuselaje = $disenio->cualidades->$genera;
                            $costesVacio = ["mineral" => 0, "cristal" => 0, "gas" => 0, "plastico" => 0, "ceramica" => 0, "liquido" => 0, "micros" => 0, "personal" => 0, "fuel" => 0, "ma" => 0, "municion" => 0, "masa" => 0, "energia" => 0, "tiempo" => 0, "mantenimiento" => 0, "defensa" => 0, "ataque" => 0, "velocidad" => 0, "carga" => 0, "cargaPequenia" => 0, "cargaMediana" => 0, "cargaGrande" => 0, "cargaEnorme" => 0, "cargaMega" => 0,];

                            //comprobando tengo la tecno necesaria
                            $clase = $obj['clase'];
                            $miNivelTecno = $investigaciones->where('codigo', $clase)->first()->nivel;
                            if ($obj['niveltec'] > $miNivelTecno) {
                                $correcto = false;
                                $razonCorrecto += "<br>Tecnologia demasiado baja: " + $clase + " ";
                            };
                            $variacionAlcance = 1;
                            $variacionDispersion = 1;

                            $cantidadArmas = $multiplicadorArmas[$elemento];
                            $estedano = $energiaArmas[$elemento] * $energiaT * $energiaXarma / $costeobj['energia'] * $cantidadArmas;
                            //$prueba .=$costesMisMotores['energia']." ".$costesMisBlindajes['energia']." ".$costesMisCargas['energia']." ".$cualidades['energia'];;
                            //$prueba.=" <br> ".$energiaArmas[$elemento]." ".$energiaT." ".$energiaXarma." / ".$costeobj['energia'];
                            //$prueba.=" <br> ".$estedano;
                            $cte = 1; //la tecno
                            $creceExpo = 1 + (($estedano / $costeobj['ataque']) * 2000);
                            $danioarmasArm += round($cteFoco * ($cte * $estedano * 100000 / $creceExpo), 0); // la tecno influye solo en el valor final del danio
                            $multiplicador = $estedano * 10 * $creceExpo;
                            $alcance = $danoPosicion[$elemento][1] + 1 * $armasAlcance[$elemento];
                            if ($alcance > 7) {
                                $alcance = 7;
                            };
                            if ($alcance < 0) {
                                $alcance = 0;
                            };
                            $variacionAlcance = pow(2.5, (1 * $armasAlcance[$elemento]));
                            $variacionDispersion = pow(1.5, (1 * $armasDispersion[$elemento]));

                            // sumo costes
                            $costeobj = $costesArmas->where('armas_codigo', $e)->first();
                            $misCostes = sumaCostos($misCostes, $multiplicador * $variacionAlcance * $variacionDispersion * $costoFocoA * $costoPunteria * $costoAriete, $costeobj); // sumo recursos basicos
                            // sumo cualidades
                            $costesVacio[$genera] = $costeobj[$genera] * 1 * $factorFuselaje; //lo q mejora por esos niveles
                            $costesVacio['tiempo'] = $costeobj['tiempo'] * $factorFuselaje;
                            $costesVacio['mantenimiento'] = $costeobj['mantenimiento'] * $factorFuselaje;
                            $costesVacio['energia'] = $costeobj['energia'] * $factorFuselaje;
                            $misCostes = sumaCualidades($misCostes, $multiplicador, $costesVacio);
                            $costesMisArmas = $misCostes;

                            $danoTotal[$obj['clase']][$danoPosicion[$elemento][0]][$alcance] = $danioarmasArm;
                        }
                    }
                }


                //suma de todos los costes:
                $cte = 1;
                $costesDisenio = sumaCostos($costesDisenio, $cte, $costesMisMotores);
                $costesDisenio = sumaCostos($costesDisenio, $cte, $costesMisBlindajes);
                $costesDisenio = sumaCostos($costesDisenio, $cte, $costesMisArmas);
                $costesDisenio = sumaCostos($costesDisenio, $cte, $costesMisCargas);
                $costesDisenio = sumaCostos($costesDisenio, $cte, $costesMisMejoras);

                $cualidades = sumaCualidades($cualidades, $cte, $costesMisMotores);
                $cualidades = sumaCualidades($cualidades, $cte, $costesMisBlindajes);
                $cualidades = sumaCualidades($cualidades, $cte, $costesMisArmas);
                $cualidades = sumaCualidades($cualidades, $cte, $costesMisCargas);
                $cualidades = sumaCualidades($cualidades, $cte, $costesMisMejoras);

                // quitando decimales

                $costesDisenio['mineral'] = round($costesDisenio['mineral'], 0);
                $costesDisenio['cristal'] = round($costesDisenio['cristal'], 0);
                $costesDisenio['gas'] = round($costesDisenio['gas'], 0);
                $costesDisenio['plastico'] = round($costesDisenio['plastico'], 0);
                $costesDisenio['ceramica'] = round($costesDisenio['ceramica'], 0);
                $costesDisenio['liquido'] = round($costesDisenio['liquido'], 0);
                $costesDisenio['micros'] = round($costesDisenio['micros'], 0);
                $costesDisenio['personal'] = round($costesDisenio['personal'], 0);

                /// velocidad

                $pesoInicial = .0005 * $disenio->cualidades->masa * ($disenio->costes->mineral * 50 + $disenio->costes->cristal * 260 + $disenio->costes->gas * 1000 + $disenio->costes->plastico * 4000 + $disenio->costes->ceramica * 600 + $disenio->costes->liquido * 500 + $disenio->costes->micros * 2000 + $disenio->costes->personal * 500);

                $pesoTotal = ($cualidades['masa'] + $pesoInicial);
                $cualidades['velocidad'] = min($empujeT / $pesoTotal, $cualidadesFuselaje['velocidadMax'], 19.99);
                $cualidades['velocidad'] = (round($cualidades['velocidad'] * 100, 0)) / 100;



                //guardando disenio

                $disenioS = new Disenios();
                $disenioS->nombre = $datosBasicos['nombre'];



                $position = $datosBasicos['posicion'];
                if ($position = "") {
                    $disenioS->posicion = 1;
                } else {
                    if ((int)($position) < 1) {
                        $position = 1;
                    }
                    if ((int)($position) > 9) {
                        $position = 9;
                    }
                    $disenioS->posicion = $position;
                }

                $disenioS->fuselajes_id = $idFuselaje;
                $disenioS->codigo = $disenio->codigo;
                $disenioS->skin = $datosBasicos['skin'];
                $disenioS->jugadores_id = $jugadorActual->id;
                $disenioS->save();
                $jugadorActual->disenios()->attach($disenioS->id);


                $disenioId = $disenioS->id;

                /// guardando costes
                $costesDisenioS = new CostesDisenios();
                $costesDisenioS->mineral = $costesDisenio['mineral'];
                $costesDisenioS->cristal = $costesDisenio['cristal'];
                $costesDisenioS->gas = $costesDisenio['gas'];
                $costesDisenioS->plastico = $costesDisenio['plastico'];
                $costesDisenioS->ceramica = $costesDisenio['ceramica'];
                $costesDisenioS->liquido = $costesDisenio['liquido'];
                $costesDisenioS->micros = $costesDisenio['micros'];
                $costesDisenioS->personal = $costesDisenio['personal'];
                $costesDisenioS->masa = $pesoTotal;
                $costesDisenioS->energia = $costesMisMotores['energia'];
                $costesDisenioS->disenios_id = $disenioId;
                $costesDisenioS->save();

                $mejorasDisenios = new MejorasDisenios();
                $mejorasDisenios->invPropQuimico = $velocidad['invPropQuimico'];
                $mejorasDisenios->invPropNuk = $velocidad['invPropNuk'];
                $mejorasDisenios->invPropIon = $velocidad['invPropIon'];
                $mejorasDisenios->invPropPlasma = $velocidad['invPropPlasma'];
                $mejorasDisenios->invPropMa = $velocidad['invPropMa'];
                $mejorasDisenios->invPropHMA = $velocidad['invPropHMA'];
                $mejorasDisenios->fuel = $cualidades['fuel'];
                $mejorasDisenios->municion = $cualidades['municion'];
                $mejorasDisenios->defensa = $cualidades['defensa'];
                $mejorasDisenios->mantenimiento = $cualidades['mantenimiento'];
                $mejorasDisenios->tiempo = $cualidades['tiempo'];
                $mejorasDisenios->carga = $cualidades['carga'];
                $mejorasDisenios->cargaPequenia = $cualidades['cargaPequenia'];
                $mejorasDisenios->cargaMediana = $cualidades['cargaMediana'];
                $mejorasDisenios->cargaGrande = $cualidades['cargaGrande'];
                $mejorasDisenios->cargaEnorme = $cualidades['cargaEnorme'];
                $mejorasDisenios->cargaMega = $cualidades['cargaMega'];
                $mejorasDisenios->disenios_id = $disenioId;
                $mejorasDisenios->save();



                //function dibujaDano($armasDispersion ){


                $sumaataque = 0;
                $arrayDispersion = [
                    (1 * $armasDispersion['armasLigera']) + 1,
                    (1 * $armasDispersion['armasMedia']) + 1,
                    (1 * $armasDispersion['armasPesada']) + 1,
                    (1 * $armasDispersion['armasInsertada']) + 1,
                    (1 * $armasDispersion['armasMisil']) + 1,
                    (1 * $armasDispersion['armasBomba']) + 1
                ];

                foreach ($listaTecnos as $tecno) {
                    $danoTotalV = [[0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0], [0, 0, 0, 0, 0, 0, 0, 0]];
                    for ($F = 0; $F < 5; $F++) {
                        $dispersion = .2 * $arrayDispersion[$F];
                        for ($C = 7; $C > -1; $C--) {
                            $valueAqui = $danoTotal[$tecno][$F][$C];
                            if ($valueAqui > 0) {
                                $danoTotalV[$F][$C] += round($valueAqui, 0);
                                for ($c = $C - 1; $c > -1; $c--) { //atras
                                    $aAriete = 1;
                                    if ($c == 0 && $ariete > 0) {
                                        $aAriete = $ariete * $cteAriete;
                                    }
                                    $danoTotalV[$F][$c] += round($aAriete * $valueAqui * (1 + ($dispersion * ($C - $c))), 0);
                                    $danoInf = $aAriete * $valueAqui * (1 + ($dispersion * ($C - $c))) / 1.25;
                                    for ($f = $F + 1; $f < 4; $f++) { //atras abajo
                                        $danoTotalV[$f][$c] += round($danoInf, 0);
                                    }
                                    for ($f = $F - 1; $f > -1; $f--) { //atras arriba
                                        $danoTotalV[$f][$c] += round($danoInf * .01 * $f, 0);
                                    }
                                }
                                for ($f = $F + 1; $f < 4; $f++) { // abajo
                                    $danoTotalV[$f][$C] += round($valueAqui / 1.25, 0);
                                }
                                for ($f = $F - 1; $f > -1; $f--) { // arriba
                                    $danoTotalV[$f][$C] += round($valueAqui * .01 * $f, 0);
                                }
                            }
                            if ($danoTotalV[$F][$C] < 1) {
                                $danoTotalV[$F][$C] = 0;
                            }
                            //$prueba.=$valueAqui." ";
                        }
                        // $prueba =$danoTotalV;

                    }

                    // guardando el danio
                    for ($F = 0; $F < 5; $F++) {

                        if ($danoTotalV[$F][0] > 0) {
                            $filaDanio = new DaniosDisenios();
                            $n = 0;
                            foreach ($danoTotalV[$F] as $danio) {
                                $distancia = "distancia" . $n;
                                $filaDanio->{$distancia} = $danio;
                                $n++;
                            }
                            $filaDanio->investigacion = $tecno;
                            $filaDanio->fila = $F;
                            $filaDanio->disenios_id = $disenioId;
                            $filaDanio->save();
                        }
                    }
                }


                /// guardando elementos
                /*

        $armasTengo = ($_POST['armas']);
        $energiaArmas = ($_POST['energiaArmas']);
        $armasAlcance = ($_POST['armasAlcance']);
        $armasDispersion = ($_POST['armasDispersion']);
        */

                $armasCualidades = [];
                for ($x = 0; $x < 200; $x++) {
                    array_push($armasCualidades, 0);
                }

                foreach ($armasTengo as $elemento) {
                    //$prueba=$elemento;
                    foreach ($elemento as $e) {
                        if ($e > 0) {
                            $armasCualidades[$e]++;
                        }
                    }
                }

                for ($x = 0; $x < 200; $x++) {
                    if ($armasCualidades[$x] > 0) {
                        $filaCualidades = new CualidadesDisenios();
                        $filaCualidades->codigo = $x;
                        $filaCualidades->cantidad = $armasCualidades[$x];
                        $filaCualidades->disenios_id = $disenioId;
                        $obj = $armas->where('codigo', $x)->first();
                        $filaCualidades->categoria = $obj->ranura;
                        $filaCualidades->save();
                    }
                }

                $x = 999;
                foreach ($energiaArmas as $elemento) {
                    $x++;
                    $filaCualidades = new CualidadesDisenios();
                    $filaCualidades->codigo = $x;
                    $filaCualidades->cantidad = $elemento * 100;
                    $filaCualidades->disenios_id = $disenioId;
                    $filaCualidades->categoria = "energia";
                    $filaCualidades->save();
                }
                $x = 1009;
                foreach ($armasAlcance as $elemento) {
                    $x++;
                    if ($elemento != 0) {
                        $filaCualidades = new CualidadesDisenios();
                        $filaCualidades->codigo = $x;
                        $filaCualidades->cantidad = $elemento;
                        $filaCualidades->disenios_id = $disenioId;
                        $filaCualidades->categoria = "armasAlcance";
                        $filaCualidades->save();
                    }
                }
                $x = 1019;
                foreach ($armasDispersion as $elemento) {
                    $x++;
                    if ($elemento != 0) {
                        $filaCualidades = new CualidadesDisenios();
                        $filaCualidades->codigo = $x;
                        $filaCualidades->cantidad = $elemento;
                        $filaCualidades->disenios_id = $disenioId;
                        $filaCualidades->categoria = "armasDispersion";
                        $filaCualidades->save();
                    }
                }

                //$prueba=$armasCualidades;
                //$prueba=$armasTengo;

                //use App\DaniosDisenios;
                //use App\CostesDisenios;
                //use App\CualidadesDisenios;




            }
        }



        //$prueba = $danoTotal['invMa'];
        return compact('razonCorrecto', 'prueba');
    }
}
