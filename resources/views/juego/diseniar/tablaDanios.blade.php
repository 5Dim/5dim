@php
$arrayNaves=['Cazas','Ligeras','Medias','Pesadas','Estaciones'];

@endphp

<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <th colspan="9" class="text-success text-center borderless align-middle">
                        Danios por distancia
                    </th>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Tipo de nave
                    </td>
                    <td class="anchofijo text-warning borderless">
                        0
                    </td>
                    <td class="anchofijo text-warning borderless">
                        1
                    </td>
                    <td class="anchofijo text-warning borderless">
                        2
                    </td>
                    <td class="anchofijo text-warning borderless">
                        3
                    </td>
                    <td class="anchofijo text-warning borderless">
                        4
                    </td>
                    <td class="anchofijo text-warning borderless">
                        5
                    </td>
                    <td class="anchofijo text-warning borderless">
                        6
                    </td>
                    <td class="anchofijo text-warning borderless">
                        7
                    </td>
                </tr>
                @for($n=0;$n<5;$n++) <tr>
                    <td class="anchofijo text-warning borderless">
                        {{$arrayNaves[$n]}}
                    </td>
                    @for($m=0;$m<8;$m++) <td id="{{$n}}{{$m}}" class="anchofijo text-light borderless">
                        0
                        </td>
                    @endfor
                    </tr>
                @endfor
            </table>
        </div>
    </div>
    <div class="col-12 borderless">
        <div id="cuadro1" class="table-responsive ">
            <table class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <td class="anchofijo text-secondary borderless">
                        Danio total a cazas: <span id="filaDT0">0</span>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        Danio total a ligeras: <span id="filaDT1">0</span>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        Danio total a medias: <span id="filaDT2">0</span>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        Danio total a pesadas/estaciones: <span id="filaDT3">0</span>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        Danio total a defensas: <span id="filaDT4">0</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
