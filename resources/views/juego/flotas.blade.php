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
                                Velocidad
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
                        <tr>
                            <td class="anchofijo text-light align-middle">
                                Destructor 9.000
                            </td>
                            <td class="anchofijo text-light align-middle">
                                14.935.000
                            </td>
                            <td class="anchofijo text-light align-middle">
                                7.210.300
                            </td>
                            <td class="anchofijo text-light align-middle">
                                785.000
                            </td>
                            <td class="anchofijo text-light align-middle">
                                2
                            </td>
                            <td class="anchofijo text-light align-middle">
                                1
                            </td>
                            <td class="anchofijo text-light align-middle">
                                0
                            </td>
                            <td class="anchofijo text-light align-middle">
                                0
                            </td>
                            <td class="anchofijo text-light align-middle">
                                13.89
                            </td>
                            <td class="anchofijo text-light align-middle">
                                32
                            </td>
                            <td class="anchofijo text-light" style="max-width: 180px">
                                <div class="input-group mb-3 input-group-sm borderless">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">
                                            <button type="button" class="btn btn-dark btn-sm text-warning">
                                                0
                                            </button>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control input" value="0" aria-label=""
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">
                                            <button type="button" class="btn btn-dark btn-sm text-warning">
                                                M
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="anchofijo text-light" style="max-width: 180px">
                                <div class="input-group mb-3 input-group-sm borderless">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">
                                            <button type="button" class="btn btn-dark btn-sm text-warning">
                                                0
                                            </button>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control input" value="0" aria-label=""
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">
                                            <button type="button" class="btn btn-dark btn-sm text-warning">
                                                Max
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
                                Tipo
                            </th>
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
                                Velocidad
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
                            <td class="text-warning align-middle">
                                Naves
                            </td>
                            <td class="text-light align-middle">
                                1.570.000
                            </td>
                            <td class="text-light align-middle">
                                58.247
                            </td>
                            <td class="text-light align-middle">
                                35.248
                            </td>
                            <td class="text-light align-middle">
                                13.89
                            </td>
                            <td class="text-light align-middle">
                                29.870.000
                            </td>
                            <td class="text-light align-middle">
                                14.420.600
                            </td>
                            <td class="text-light align-middle">
                                29.870.000
                            </td>
                            <td class="text-light align-middle">
                                14.420.600
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
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Fuera de hangar
                            </th>
                            <td class="text-light align-middle">
                                2
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                En hangares
                            </th>
                            <td class="text-light align-middle">
                                0
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Capacidad hangares
                            </th>
                            <td class="text-light align-middle">
                                0
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                            <td class="text-light align-middle">
                                0
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 cajita-success rounded">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless borderless table-sm text-center anchofijo"
                        style="margin-top: 5px !important">
                        <tr>
                            <th colspan="7" class="text-success">
                                <big>
                                    Destino 1
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th rowspan="2" class="align-middle">
                                <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}"
                                    width="120" height="120">
                            </th>
                            <th class="text-warning align-middle">
                                Planetas
                            </th>
                            <th class="text-warning align-middle">
                                Sistema solar
                            </th>
                            <th class="text-warning align-middle">
                                Estrella
                            </th>
                            <th class="text-warning align-middle">
                                Velocidad actual
                            </th>
                            <th class="text-warning align-middle">
                                Porcentaje de velocidad
                            </th>
                            <th class="text-warning align-middle">
                                Orden
                            </th>
                        </tr>
                        <tr>
                            <td class="text-light">
                                <select name="listaPlanetas" id="listaPlanetas" class="form-control">
                                    <option value="none">Selecciona un planeta</option>
                                    <optgroup label="Propios">
                                        @foreach (Auth::user()->jugador->planetas as $planeta)
                                            <option value="{{ $planeta->id }}">
                                                {{ $planeta->estrella }}x{{ $planeta->orbita }}
                                                {{ $planeta->nombre }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </td>
                            <td class="text-light">
                                <input type="text" class="form-control input" placeholder="Numero de sistema">
                            </td>
                            <td class="text-light">
                                <input type="text" class="form-control input" placeholder="Numero de orbita">
                            </td>
                            <td class="text-light">
                                <select name="orden" id="orden" class="select form-control">
                                    <option value="" selected>-- Selecciona una orden --</option>
                                    <option value="transportar">Transportar</option>
                                    <option value="transferir">Transferir</option>
                                    <option value="bloquear">Bloquear</option>
                                    <option value="atacar">Atacar</option>
                                    <option value="recolectar">Recolectar</option>
                                </select>
                            </td>
                            <td class="text-light">
                                <div class="input-group mb-3 borderless"
                                    style="padding-left: 10px !important; padding-right: 5px !important">
                                    <input type="text" class="form-control input" value="100"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">%</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-light">
                                6.24
                            </td>
                        </tr>
                    </table>
                    <table class="table table-borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                        <tr>
                            <td class="anchofijo text-warning">
                                Recursos
                            </td>
                            <td class="anchofijo text-warning">
                                Personal
                            </td>
                            <td class="anchofijo text-warning">
                                Mineral
                            </td>
                            <td class="anchofijo text-warning">
                                cristal
                            </td>
                            <td class="anchofijo text-warning">
                                Gas
                            </td>
                            <td class="anchofijo text-warning">
                                Plástico
                            </td>
                            <td class="anchofijo text-warning">
                                Cerámica
                            </td>
                            <td class="anchofijo text-warning">
                                Liquido
                            </td>
                            <td class="anchofijo text-warning">
                                Micros
                            </td>
                            <td class="anchofijo text-warning">
                                Fuel
                            </td>
                            <td class="anchofijo text-warning">
                                M-A
                            </td>
                            <td class="anchofijo text-warning">
                                Munición
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo">
                                <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                                    Tienes
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo">
                                <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                                    Envias
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 cajita-success rounded">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless borderless table-sm text-center anchofijo"
                        style="margin-top: 5px !important">
                        <tr>
                            <th colspan="7" class="text-success">
                                <big>
                                    Destino 2
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th rowspan="2" class="align-middle">
                                <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}"
                                    width="120" height="120">
                            </th>
                            <th class="text-warning align-middle">
                                Planetas
                            </th>
                            <th class="text-warning align-middle">
                                Sistema solar
                            </th>
                            <th class="text-warning align-middle">
                                Estrella
                            </th>
                            <th class="text-warning align-middle">
                                Velocidad actual
                            </th>
                            <th class="text-warning align-middle">
                                Porcentaje de velocidad
                            </th>
                            <th class="text-warning align-middle">
                                Orden
                            </th>
                        </tr>
                        <tr>
                            <td class="text-light">
                                <select name="listaPlanetas" id="listaPlanetas2" class="select form-control">
                                    <optgroup label="Propios">
                                        @foreach (Auth::user()->jugador->planetas as $planeta)
                                            <option value="{{ $planeta->id }}">
                                                {{ $planeta->estrella }}x{{ $planeta->orbita }}
                                                {{ $planeta->nombre }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control input" placeholder="Numero de sistema">
                            </td>
                            <td>
                                <input type="text" class="form-control input" placeholder="Numero de orbita">
                            </td>
                            <td>
                                <select name="orden" id="orden" class="select form-control">
                                    <option value="" selected>-- Selecciona una orden --</option>
                                    <option value="transportar">Transportar</option>
                                    <option value="transferir">Transferir</option>
                                    <option value="bloquear">Bloquear</option>
                                    <option value="atacar">Atacar</option>
                                    <option value="recolectar">Recolectar</option>
                                </select>
                            </td>
                            <td>
                                <div class="input-group mb-3 borderless"
                                    style="padding-left: 10px !important; padding-right: 5px !important">
                                    <input type="text" class="form-control input" value="100"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">%</span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-light">
                                6.24
                            </td>
                        </tr>
                    </table>
                    <table class="table table-borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                        <tr>
                            <td class="anchofijo text-warning">
                                Recursos
                            </td>
                            <td class="anchofijo text-warning">
                                Personal
                            </td>
                            <td class="anchofijo text-warning">
                                Mineral
                            </td>
                            <td class="anchofijo text-warning">
                                cristal
                            </td>
                            <td class="anchofijo text-warning">
                                Gas
                            </td>
                            <td class="anchofijo text-warning">
                                Plástico
                            </td>
                            <td class="anchofijo text-warning">
                                Cerámica
                            </td>
                            <td class="anchofijo text-warning">
                                Liquido
                            </td>
                            <td class="anchofijo text-warning">
                                Micros
                            </td>
                            <td class="anchofijo text-warning">
                                Fuel
                            </td>
                            <td class="anchofijo text-warning">
                                M-A
                            </td>
                            <td class="anchofijo text-warning">
                                Munición
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo">
                                <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                                    Tienes
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <button type="button" class="btn btn-dark col-12 btn-sm">
                                    125.248
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo">
                                <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                                    Envias
                                </button>
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                            <td class="anchofijo text-light">
                                <input type="text" class="form-control input form-control-sm" value="0" min="0"
                                    max="125248">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#listaPlanetas').select2({
                placeholder: "Nombre del planeta",
                width: '100%',
                language: "es"
            });
            $('#listaPlanetas2').select2({
                placeholder: "Nombre del planeta",
                width: '100%',
                language: "es"
            });
        });

    </script>

@endsection
