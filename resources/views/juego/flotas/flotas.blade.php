@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-12 cajita-info rounded">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless table-sm text-center" style="margin-top: 5px !important">
                        <tr>
                            <th colspan="15" class="anchofijo text-success">
                                <big>
                                    Naves
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="anchofijo text-warning align-middle">
                                Nombre del disenio
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Ataque
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Defensa
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Carga
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H. cazas
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H. ligeras
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H. medias
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H. pesadas
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Vel. Impulso
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Hypervelocidad
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Cantidad
                            </th>
                            <th class="anchofijo text-warning align-middle" style="max-width: 180px">
                                <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                                    En la flota
                                </button>
                            </th>
                            <th class="anchofijo text-warning align-middle" style="max-width: 180px">
                                <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                                    En hangar
                                </button>
                            </th>
                        </tr>
                        @foreach ($navesEstacionadas as $nave)
                            <tr>
                                <td name="nombre{{ $nave->id }}" id="nombre{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="ataque{{ $nave->id }}" id="ataque{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="defensa{{ $nave->id }}" id="defensa{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="carga{{ $nave->id }}" id="carga{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarCazas{{ $nave->id }}" id="hangarCazas{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarLigeras{{ $nave->id }}" id="hangarLigeras{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarMedias{{ $nave->id }}" id="hangarMedias{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarPesadas{{ $nave->id }}" id="hangarPesadas{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="maniobra{{ $nave->id }}" id="maniobra{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="velocidad{{ $nave->id }}" id="velocidad{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="cantidad{{ $nave->id }}" id="cantidad{{ $nave->id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td id="selectaflota{{ $nave->id }}" class="anchofijo text-light"
                                    style="max-width: 180px">
                                    <div class="input-group mb-3 input-group-sm borderless">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                                    onclick="NaveAflota({{ $nave->id }},0)">
                                                    0
                                                </button>
                                            </span>
                                        </div>
                                        <input id="enflota{{ $nave->id }}" type="text" class="form-control input"
                                            value="0" aria-label="" onKeyUp="NaveAflota({{ $nave->id }},'x')"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                                    onclick="NaveAflota({{ $nave->id }},'m')">
                                                    M
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td id="selectahangar{{ $nave->id }}" class="anchofijo text-light"
                                    style="max-width: 180px">
                                    <div class="input-group mb-3 input-group-sm borderless">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                                    onclick="NaveAhangar({{ $nave->id }},0)">
                                                    0
                                                </button>
                                            </span>
                                        </div>
                                        <input id="enhangar{{ $nave->id }}" type="text" class="form-control input"
                                            value="0" aria-label="" onKeyUp="NaveAhangar({{ $nave->id }},'x')"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                                    onclick="NaveAhangar({{ $nave->id }},'m')">
                                                    M
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table table-borderless borderless table-sm text-center anchofijo"
                        style="margin-top: 5px !important">
                        <tr>
                            <th colspan="9" class="text-success">
                                <big>
                                    Resumen de naves
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Capacidad de carga total
                            </th>
                            <th class="text-warning align-middle">
                                Municion
                            </th>
                            <th class="text-warning align-middle">
                                Fuel
                            </th>
                            <th class="text-warning align-middle">
                                Vel. Impulso
                            </th>
                            <th class="text-warning align-middle">
                                Hypervelocidad
                            </th>
                            <th class="text-warning align-middle">
                                Ataque real
                            </th>
                            <th class="text-warning align-middle">
                                Defensa Real
                            </th>
                            <th class="text-warning align-middle">
                                Ataque visible
                            </th>
                            <th class="text-warning align-middle">
                                Defensa visible
                            </th>
                        </tr>
                        <tr>
                            <td id="totalcarga" class="text-light align-middle">
                            </td>
                            <td id="totalmunicion" class="text-light align-middle">
                            </td>
                            <td id="totalfuel" class="text-light align-middle">
                            </td>
                            <td id="totalvelocidad" class="text-light align-middle">
                            </td>
                            <td id="totalmaniobra" class="text-light align-middle">
                            </td>
                            <td id="totalataqueR" class="text-light align-middle">
                            </td>
                            <td id="totaldefensaR" class="text-light align-middle">
                            </td>
                            <td id="totalataqueV" class="text-light align-middle">
                            </td>
                            <td id="totaldefensaV" class="text-light align-middle">
                            </td>
                        </tr>
                    </table>
                    <table class="table table-borderless borderless table-sm text-center"
                        style="margin-top: 5px !important">
                        <tr>
                            <th colspan="6" class="text-success">
                                <big>
                                    Estado de los hangares <i class="fa fa-arrow-alt-circle-down"></i>
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Tipos
                            </th>
                            <th class="text-warning align-middle">
                                Cazas
                            </th>
                            <th class="text-warning align-middle">
                                Ligeras
                            </th>
                            <th class="text-warning align-middle">
                                Medias
                            </th>
                            <th class="text-warning align-middle">
                                Pesadas
                            </th>
                            <th class="text-warning align-middle">
                                Estaciones
                            </th>
                        </tr>
                        <tr>
                            <th id="fueraH" class="text-warning align-middle">
                                Fuera de hangar
                            </th>
                            <td id="fueraHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th id="dentroH" class="text-warning align-middle">
                                En hangares
                            </th>
                            <td id="dentroHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th id="capacidadH" class="text-warning align-middle">
                                Capacidad hangares
                            </th>
                            <td id="capacidadHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 cajita-info rounded">
                <button id="botonEnviar" type="button" class="btn btn-success col-12">
                    Enviar flota
                </button>
            </div>
            @include('juego.flotas.destino', [ 'destino' => 'destino0', 'numero' => '0'])
            @include('juego.flotas.destino', [ 'destino' => 'destino1', 'numero' => '1'])
            @include('juego.flotas.destino', [ 'destino' => 'destino2', 'numero' => '2'])
            @include('juego.flotas.destino', [ 'destino' => 'destino3', 'numero' => '3'])
        </div>
    </div>

    <script>
        let constantes = @json($constantes);
        let navesEstacionadas = @json($navesEstacionadas);
        let diseniosJugador = @json($diseniosJugador);
        let investigaciones = @json($investigaciones);
        let constantesU = @json($constantesU);
        let ViewDaniosDisenios = @json($ViewDaniosDisenios);
        let origenImagenes="{{ asset('img/juego/skin0/')}}";


        recursosDest = [];  //recursos que hay en cada destino (el 0 es el origen)
        recursosDest[0] = @json($recursos);

        cargaDest =[]; //cargado para cada destino

        destinos = [];
        destinos[0] = [];
        destinos[0]['sistema'] = '1234';
        destinos[0]['planeta'] = '5';
        destinos[1] = [];
        destinos[1]['sistema'] = '-1';
        destinos[1]['planeta'] = '-1';
        destinos[2] = [];
        destinos[2]['sistema'] = '-1';
        destinos[2]['planeta'] = '-1';
        destinos[3] = [];
        destinos[3]['sistema'] = '-1';
        destinos[3]['planeta'] = '-1';


        prioridades = [];
        //prioridades por defecto
        var n=0;
        recursosArray.forEach(res => {
            n++;
            prioridades[res]=n;
        });



    </script>

    <!-- Personalizado -->
    <script src="{{ asset('js/flotas.js') }}"></script>
@endsection
