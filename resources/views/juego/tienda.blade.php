@extends('juego.recursosFrame')

@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <h2 class="text-success text-center">
            Tienda Quinta Dimension
        </h1>
        <h5 class="text-light text-center">
            Comprar Novas ayuda al mantenimiento del server y a que podamos seguir desarrollando 5Dim
        </h1>
        <br />
        <nav>
            <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                <a class="nav-item nav-link active" id="tienda-tab" data-toggle="tab" href="#tienda" role="tab" aria-controls="tienda" aria-selected="true">
                    Tienda
                </a>
                <a class="nav-item nav-link" id="cazas-tab" data-toggle="tab" href="#cazas" role="tab" aria-controls="cazas" aria-selected="false">
                    Compra novas
                </a>
                <a class="nav-item nav-link" id="ligeras-tab" data-toggle="tab" href="#ligeras" role="tab" aria-controls="ligeras" aria-selected="false">
                    Canjea tu codigo
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="tienda" role="tabpanel" aria-labelledby="tienda-tab">
                <div class="col-12 cajita">
                    <div id="cuadro1" class="table-responsive">
                        <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                            <tr>
                                <th colspan="5" class="text-success">
                                    <big>
                                        Modo premium
                                    </big>
                                </th>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="120" height="120">
                                </td>
                                <td colspan="4" class="text-light align-middle">
                                    Nave mixta de apoyo que puede ser usada también en escaramuzas gracias a su buena velocidad y capacidad de carga, ideal para merodear por territorios enemigos
                                    <br>
                                    Éste fuselaje está recomendado para jugadores que llevan al menos 1 mes de juego. No disponible para alianzas.
                                </td>
                            </tr>
                                </table>
                            </div>
                        </table>
                        <table class="table table-sm table-borderless text-center anchofijo">
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm">
                                        <i class="fa fa-trash"></i> Reciclar
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm">
                                        <i class="fa fa-trash"></i> Reciclar
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary btn-block btn-sm">
                                        <i class="fa fa-trash"></i> Reciclar
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-outline-success btn-block btn-sm">
                                        <i class="fa fa-shopping-cart"></i> Adquirir
                                    </button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection