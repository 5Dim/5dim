<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-sm table-dark table-borderless text-center align-middle"
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
                        {{ __('constantes.' . $politica->codigo) }}
                    </td>
                    <td>
                        {{ __('constantes.' . $politica->codigo . 'Desc') }}
                    </td>
                    <td>
                        {{ $politica->estado }}
                    </td>
                    <td>
                        @if ($politica->propuesta || Auth::user()->jugador->propuestas == 0)
                            <select name="orden" id="accion{{ $politica->codigo }}" class="select form-control"
                                disabled>
                                <option value="" selected>Sin acción</option>
                                <option value="Aumentar" {{ $politica->accion == 'Aumentar' ? 'selected' : '' }}>
                                    Aumentar
                                </option>
                                <option value="Disminuir" {{ $politica->accion == 'Disminuir' ? 'selected' : '' }}>
                                    Disminuir
                                </option>
                            </select>
                        @else
                            <select name="orden" id="accion{{ $politica->codigo }}" class="select form-control">
                                <option value="" selected>Sin acción</option>
                                <option value="Aumentar">Aumentar</option>
                                <option value="Disminuir">Disminuir</option>
                            </select>
                        @endif
                    </td>
                    <td style="width: 250px;">
                        @if ($politica->propuesta)
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="far fa-thumbs-up"></i> Ya propuesta
                            </button>
                        @elseif (Auth::user()->jugador->propuestas == 0)
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="far fa-thumbs-up"></i> No puedes proponer más politicas
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-success col-12"
                                onclick="sendProponer('{{ $politica->codigo }}')">
                                <i class="far fa-thumbs-up"></i> Proponer
                            </button>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
