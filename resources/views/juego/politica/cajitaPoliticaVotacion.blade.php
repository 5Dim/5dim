<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-sm table-dark table-borderless text-center align-middle anchofijo"
                style="--bs-table-bg: transparent !important; margin-bottom: 0px !important">
                <tr class="text-success">
                    <th>
                        Nombre
                    </th>
                    <th>
                        Descripción
                    </th>
                    <th>
                        Estado
                    </th>
                    <th>
                        Acción
                    </th>
                    <th>

                    </th>
                </tr>
                <tr>
                    <td>
                        {{ __($politica->codigo) }}
                    </td>
                    <td>
                        {{ __($politica->codigo . 'Desc') }}
                    </td>
                    <td>
                        {{ $politica->estado }}
                    </td>
                    <td>
                        {{ $politica->accion }}
                    </td>
                    <td>
                        @if ($politica->propuesta)
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="far fa-thumbs-up"></i> Ya votada
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-success col-12"
                                onclick="sendVotar('{{ $politica->codigo }}')">
                                <i class="far fa-thumbs-up"></i> Votar
                            </button>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
