@extends('juego.layouts.recursosFrame')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <h3 class="text-light text-center">Ingresas <span class="text-success">17.000</span> creditos, tienes unos
            gastos de <span class="text-danger">16.000</span>, tu balance es <span class="text-success">1.000</span>
            creditos diarios</h3>
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
                            Previsto para maniana
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
                            Disenio
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
@endsection
