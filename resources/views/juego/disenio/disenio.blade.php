@extends('juego.layouts.recursosFrame') @section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @if (count($colaDisenios) > 0)
                <div class="row rounded cajita">
                    <div class="col-12">
                        <div id="cuadro1" class="table-responsive">
                            <table class="table table-borderless borderless table-sm text-center anchofijo"
                                style="margin-bottom: 15px !important">
                                <tr>
                                    <td class="text-warning">Disenio</td>
                                    <td class="text-warning">Accion</td>
                                    <td class="text-warning">Cantidad</td>
                                    <td class="text-warning">Tiempo</td>
                                    <td class="text-warning">Empeza a las</td>
                                    <td class="text-warning">Acaba a las</td>
                                    <td>&nbsp;</td>
                                </tr>
                                @for ($i = 0; $i < count($colaDisenios); $i++)
                                    <tr>
                                        <td class="text-light align-middle borderless">
                                            {{ $colaDisenios[$i]->nombre }}
                                        </td>
                                        <td
                                            class=" {{ $colaDisenios[$i]->accion == 'Construyendo' ? 'text-success' : 'text-danger' }} text-success align-middle borderless">
                                            {{ $colaDisenios[$i]->accion }}
                                        </td>
                                        <td class="text-light align-middle borderless">
                                            {{ $colaDisenios[$i]->cantidad }}
                                        </td>
                                        <td class="text-light align-middle borderless">
                                            {{ $colaDisenios[$i]->tiempo }}
                                        </td>
                                        <td class="text-light align-middle borderless">
                                            {{ $colaDisenios[$i]->created_at }}
                                        </td>
                                        <td id="fechaFin{{ $i }}" class="text-light align-middle borderless">
                                            {{ $colaDisenios[$i]->finished_at }}
                                        </td>
                                        <td class="text-light align-middle borderless">
                                            <button type="button" class="btn btn-outline-danger col-12 btn-sm"
                                                onclick="sendCancelarDisenio('{{ $colaDisenios[$i]->id }}')">
                                                <i class="fa fa-trash"></i> Cancelar
                                            </button>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link active" id="cazas-tab" data-bs-toggle="tab" href="#cazas" role="tab"
                        aria-controls="cazas" aria-selected="true">
                        Naves cazas
                    </a>
                    <a class="nav-item nav-link" id="ligeras-tab" data-bs-toggle="tab" href="#ligeras" role="tab"
                        aria-controls="ligeras" aria-selected="false">
                        Naves Ligeras
                    </a>
                    <a class="nav-item nav-link" id="medias-tab" data-bs-toggle="tab" href="#medias" role="tab"
                        aria-controls="medias" aria-selected="false">
                        Naves Medias
                    </a>
                    <a class="nav-item nav-link" id="pesadas-tab" data-bs-toggle="tab" href="#pesadas" role="tab"
                        aria-controls="pesadas" aria-selected="false">
                        Naves Pesadas
                    </a>
                    <a class="nav-item nav-link" id="estaciones-tab" data-bs-toggle="tab" href="#estaciones" role="tab"
                        aria-controls="estaciones" aria-selected="false">
                        Estaciones espaciales
                    </a>
                    <a class="nav-item nav-link" id="novas-tab" data-bs-toggle="tab" href="#novas" role="tab"
                        aria-controls="novas" aria-selected="false">
                        Novas
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="cazas" role="tabpanel" aria-labelledby="cazas-tab">
                    @foreach ($cazas as $caza)
                        @include('juego.disenio.cajitaDisenios', [
                            'disenio' => $caza,
                            'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="ligeras" role="tabpanel" aria-labelledby="ligeras-tab">
                    @foreach ($ligeras as $ligera)
                        @include('juego.disenio.cajitaDisenios', [
                            'disenio' => $ligera,
                            'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="medias" role="tabpanel" aria-labelledby="medias-tab">
                    @foreach ($medias as $media)
                        @include('juego.disenio.cajitaDisenios', [
                            'disenio' => $media,
                            'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pesadas" role="tabpanel" aria-labelledby="pesadas-tab">
                    @foreach ($pesadas as $pesada)
                        @include('juego.disenio.cajitaDisenios', [
                            'disenio' => $pesada,
                            'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="estaciones" role="tabpanel" aria-labelledby="estaciones-tab">
                    @foreach ($estaciones as $estacion)
                        @include('juego.disenio.cajitaDisenios', [
                            'disenio' => $disenio,
                            'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="novas" role="tabpanel" aria-labelledby="novas-tab">
                    @foreach ($novas as $nova)
                        @include('juego.disenio.cajitaDisenios', [
                            'disenio' => $nova,
                            'tab' => $tab,
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        var disenios = @json($disenios);
        var PConstantes = @json($PConstantes);

        function recalculaCostos(id) {

            if (Number.isInteger($("#disenio" + id).val() * 1)) {
                console.log(id)
                var cantidad = Math.round($("#disenio" + id).val());
                disenio = $.grep(disenios, function(obj) {
                    return obj.id == id;
                })[0];
                factor = cadenaProduccion(cantidad, 1);

                $("#mineral" + id).text(formatNumber(Math.round(factor * cantidad * disenio["costes"]["mineral"])))
                $("#cristal" + id).text(formatNumber(Math.round(factor * cantidad * disenio["costes"]["cristal"])))
                $("#gas" + id).text(formatNumber(Math.round(factor * cantidad * disenio["costes"]["gas"])))
                $("#plastico" + id).text(formatNumber(Math.round(factor * cantidad * disenio["costes"]["plastico"])))
                $("#ceramica" + id).text(formatNumber(Math.round(factor * cantidad * disenio["costes"]["ceramica"])))
                $("#liquido" + id).text(formatNumber(Math.round(factor * cantidad * disenio["costes"]["liquido"])))
                $("#micros" + id).text(formatNumber(Math.round(factor * cantidad * disenio["costes"]["micros"])))
                $("#personal" + id).text(formatNumber(Math.round(factor * cantidad * disenio["costes"]["personal"])))

            }
        }


        function cadenaProduccion(cantidad, tamanio) {

            ahorroXCantidad = $.grep(PConstantes, function(obj) {
                return obj.codigo == "ahorroXCantidad";
            })[0]['valor'];
            maximoAhorroXCantidad = $.grep(PConstantes, function(obj) {
                return obj.codigo == "maximoAhorroXCantidad";
            })[0]['valor'];

            var factorTamanio = 100;

            switch (tamanio) {
                case 0:
                case 8: //caza
                    factorTamanio = $.grep(PConstantes, function(obj) {
                        return obj.codigo == "AhorroXcazas";
                    })[0]['valor'] / 100;
                    break;
                case 1:
                case 9:
                    factorTamanio = $.grep(PConstantes, function(obj) {
                        return obj.codigo == "AhorroXligeras";
                    })[0]['valor'] / 100;
                    break;
                case 2:
                case 10:
                    factorTamanio = $.grep(PConstantes, function(obj) {
                        return obj.codigo == "AhorroXmedias";
                    })[0]['valor'] / 100;
                    break;
                case 3:
                case 11:
                    factorTamanio = $.grep(PConstantes, function(obj) {
                        return obj.codigo == "AhorroXpesadas";
                    })[0]['valor'] / 100;
                    break;
                case 4:
                case 5:
                    factorTamanio = $.grep(PConstantes, function(obj) {
                        return obj.codigo == "AhorroXestaciones";
                    })[0]['valor'] / 100;
                    break;
                case 6:
                    factorTamanio = $.grep(PConstantes, function(obj) {
                        return obj.codigo == "AhorroXdefensa";
                    })[0]['valor'] / 100;
                    break;

            }

            factor = 1 - (Math.pow(cantidad, 2) * 1 / (ahorroXCantidad * 100000)) / factorTamanio;
            if (factor < maximoAhorroXCantidad) {
                factor = maximoAhorroXCantidad;
            }
            if (factor > 1) {
                factor = 1;
            }
            if (cantidad == 1) {
                factor = 1;
            }

            return factor;

        }

    </script>
@endsection
