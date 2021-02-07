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
                @include('juego.flotas.destino', [ 'destino' => 'destino1', 'numero' => '1'])
                @include('juego.flotas.destino', [ 'destino' => 'destino2', 'numero' => '2'])
                @include('juego.flotas.destino', [ 'destino' => 'destino3', 'numero' => '3'])
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
