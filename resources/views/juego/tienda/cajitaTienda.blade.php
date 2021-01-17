<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <th colspan="5" class="text-success">
                        <big>
                            {{ $articulo->codigo }}
                        </big>
                    </th>
                </tr>
                <tr>
                    <td class="align-middle">
                        <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="120"
                            height="120">
                    </td>
                    <td colspan="4" class="text-light align-middle">
                        {{ $articulo->codigo }}
                    </td>
                </tr>
            </table>
        </div>
        </table>
        <table class="table table-sm table-borderless text-center anchofijo">
            <tr>
                <td>
                    <button type="button" class="btn btn-outline-primary col-12 btn-sm">
                        <i class="fa fa-trash"></i> Reciclar
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary col-12 btn-sm">
                        <i class="fa fa-trash"></i> Reciclar
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary col-12 btn-sm">
                        <i class="fa fa-trash"></i> Reciclar
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-success col-12 btn-sm">
                        <i class="fa fa-shopping-cart"></i> Adquirir por {{ $articulo->coste }}
                    </button>
                </td>
            </tr>
        </table>
    </div>
</div>
