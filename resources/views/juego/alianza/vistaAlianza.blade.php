<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless table-sm anchofijo">
                <tr>
                    <th class="text-success text-center align-middle">
                        <img src="{{ $alianza->estandarte }}" alt="" width="60px" height="60px"><big>
                            [{{ $alianza->tag }}] {{ $alianza->nombre }}</big>
                    </th>
                </tr>
                <tr>
                    <td class="text-success text-center align-middle">
                        <img src="{{ $alianza->logo }}" alt="" width="400px" height="400px">
                    </td>
                </tr>
                <tr>
                    <th class="text-success text-center align-middle">
                        Portada
                    </th>
                </tr>
                <tr>
                    <td class="text-light">
                        {!! $alianza->portada !!}
                    </td>
                </tr>
                <tr>
                    <th class="text-success text-center align-middle">
                        Texto interno
                    </th>
                </tr>
                <tr>
                    <td class="text-light">
                        {!! $alianza->interno !!}
                    </td>
                </tr>
            </table>
            <div>
                <button type="button" class="btn btn-outline-danger col-12" onclick="location.href = '/juego/salirAlianza'">
                    <i class="fa fa-user-times"></i> Salir de la alianza
                </button>
                <button type="button" class="btn btn-outline-danger col-12" onclick="location.href = '/juego/disolverAlianza'">
                    <i class="fa fa-users-slash"></i> Disolver alianza
                </button>
            </div>
            <br>
        </div>
    </div>
</div>
