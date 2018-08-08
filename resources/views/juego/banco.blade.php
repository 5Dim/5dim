@extends('juego.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-12 rounded cajita">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless table-sm text-center anchofijo text-light" style="margin-top: 5px !important">
                        <tr>
                            <th colspan="3">
                                Ingresas <span class="text-success">17.000</span> creditos, tienes unos gastos de <span class="text-danger">16.000</span>, tu balance es <span class="text-success">1.000</span> creditos diarios
                            </th>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Cantidad
                            </th>
                            <th class="text-warning align-middle">
                                Enviar a
                            </th>
                        </tr>
                        <tr>
                            <td class="text-light align-middle">
                                <div class="input-group mb-3 input-group-sm borderless">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">
                                            <button type="button" class="btn btn-dark btn-sm text-warning">
                                                0
                                            </button>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control input" value="0" aria-label="" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">
                                            <button type="button" class="btn btn-dark btn-sm text-warning">
                                                M
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-light align-middle">
                                <input id="listaJugadores" type="text" class="form-control input">
                            </td>
                            <td class="text-light align-middle">
                                <button type="button" class="btn btn-outline-success btn-block btn-sm">
                                    <i class="fa fa-coins"></i> Transferir
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 rounded cajita">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                        <tr>
                            <th colspan="4" class="anchofijo text-success">
                                <big>
                                    Resumen de gastos
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="anchofijo text-warning align-middle">
                                Tipo fuselajes
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Gasto
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Cuantia
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Total
                            </th>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">
                                Tropas
                            </td>
                            <td class="anchofijo text-light align-middle">
                                10.000
                            </td>
                            <td class="anchofijo text-light align-middle">
                                100%
                            </td>
                            <td class="anchofijo text-light align-middle">
                                10.000
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">
                                Defensas
                            </td>
                            <td class="anchofijo text-light align-middle">
                                10.000
                            </td>
                            <td class="anchofijo text-light align-middle">
                                100%
                            </td>
                            <td class="anchofijo text-light align-middle">
                                10.000
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">
                                Naves
                            </td>
                            <td class="anchofijo text-light align-middle">
                                10.000
                            </td>
                            <td class="anchofijo text-light align-middle">
                                100%
                            </td>
                            <td class="anchofijo text-light align-middle">
                                10.000
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">
                                Gastos por bloqueo
                            </td>
                            <td class="anchofijo text-light align-middle">
                                0
                            </td>
                            <td class="anchofijo text-light align-middle">
                                100%
                            </td>
                            <td class="anchofijo text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">

                            </td>
                            <td class="anchofijo text-light align-middle">

                            </td>
                            <td class="anchofijo text-warning align-middle">
                                Subtotal
                            </td>
                            <td class="anchofijo text-light align-middle">
                                30.000
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">
                                Puntos de imperio libres: <span class="text-success">10</span>
                            </td>
                            <td class="anchofijo text-success align-middle">
                                10%
                            </td>
                            <td class="anchofijo text-warning align-middle">
                                Variacion
                            </td>
                            <td class="anchofijo text-light align-middle">
                                3.000
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">

                            </td>
                            <td class="anchofijo text-light align-middle">

                            </td>
                            <td class="anchofijo text-warning align-middle">
                                Total
                            </td>
                            <td class="anchofijo text-light align-middle">
                                27.000
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">

                            </td>
                            <td class="anchofijo text-light align-middle">

                            </td>
                            <td class="anchofijo text-warning align-middle">
                                Actualmente tienes
                            </td>
                            <td class="anchofijo text-light align-middle">
                                30.000
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">

                            </td>
                            <td class="anchofijo text-light align-middle">

                            </td>
                            <td class="anchofijo text-warning align-middle">
                                Previsto para mañana
                            </td>
                            <td class="anchofijo text-light align-middle">
                                3.000
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning align-middle">

                            </td>
                            <td class="anchofijo text-light align-middle">

                            </td>
                            <td class="anchofijo text-warning align-middle">
                                Tienes autonomia para
                            </td>
                            <td class="anchofijo text-light align-middle">
                                <span class="text-danger">1</span> dia/s
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 rounded cajita">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                        <tr>
                            <th colspan="5" class="anchofijo text-success">
                                <big>
                                    Detalles de gastos
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="anchofijo text-warning align-middle">
                                Diseño
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Ubicacion
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Cantidad
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Gasto por dia
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Total
                            </th>
                        </tr>
                        <tr>
                            <td class="anchofijo text-light align-middle">
                                Destructor 9.000
                            </td>
                            <td class="anchofijo text-light align-middle">
                                7235x1 Tralará
                            </td>
                            <td class="anchofijo text-light align-middle">
                                1
                            </td>
                            <td class="anchofijo text-light align-middle">
                                1.784
                            </td>
                            <td class="anchofijo text-light align-middle">
                                1.784
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-light align-middle">
                                Destructor 9.000
                            </td>
                            <td class="anchofijo text-light align-middle">
                                admin8ART
                            </td>
                            <td class="anchofijo text-light align-middle">
                                1
                            </td>
                            <td class="anchofijo text-light align-middle">
                                1.784
                            </td>
                            <td class="anchofijo text-light align-middle">
                                1.784
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#listaJugadores').select2({
                theme: "bootstrap",
                width: '100%',
                closeOnSelect: false,
                allowClear: true,
                placeholder: "Nombre del jugador",
                data: [
                    { id: 1, text: "Ford"     },
                    { id: 2, text: "Dodge"    },
                    { id: 3, text: "Mercedes" },
                    { id: 4, text: "Jaguar"   }
                ],
                language: "es"
            });
        });
    </script>
@endsection