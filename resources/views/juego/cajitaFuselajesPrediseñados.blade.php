<div class="row rounded cajita">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                    <tr>
                        <td colspan="5" class="text-success text-center borderless align-middle">
                            <big>Modelo: {{ $fuselaje->codigo }}<big>
                        </td>
                        <td colspan="5" class="text-success text-center borderless align-middle">
                            <big>Propiedad de {{ $fuselaje->categoria }}<big>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless">
                            <img class="rounded" src="{{ asset('img/fotos naves/skin1/naveMT' . $fuselaje->id . '.jpg') }}" width="180" height="119">
                        </td>
                        <td  rowspan="4" colspan="9" class="anchofijo text-warning borderless">
                            <textarea name="" id="" cols="245" rows="4" class="text-light">Lorem ipsum dolor sit amet, vivamus iaculis ligula nec enim et elit, ultricies nibh volutpat interdum erat id porttitor. Ligula at eget, ante varius nullam adipisci proin pellentesque porttitor, enim vitae. Neque in dolores ultricies consectetuer mi, nibh purus maecenas elementum suspendisse, luctus vel consequat ac erat vestibulum, turpis nulla platea hac sit, magna rutrum fringilla. Augue quis scelerisque eros orci curae, leo penatibus vestibulum, mauris enim sit ipsum, pellentesque ultrices ipsum vestibulum vestibulum viverra, luctus ex vehicula orci euismod. Sed massa lobortis, ut sed, consectetuer dictum urna vestibulum. Sociis et ut. Urna eu quos, enim tellus ut pede dolor sociosqu, laoreet sem vel eu. Fringilla risus urna amet fusce viverra, ac et risus sed, aliquet amet purus magna sed blandit bibendum.</textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12 borderless">
            <div id="cuadro1" class="table-responsive-sm ">
                <table class="table table-sm table-borderless text-center anchofijo">
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal">
                                <i class="fa fa-info-circle"></i> Datos
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-block btn-sm" >
                                <i class="fa fa-arrow-alt-circle-up "></i> Desbloquear
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>