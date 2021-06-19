<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-sm table-dark table-borderless text-center align-middle " style="--bs-table-bg: transparent !important; margin-bottom: 0px !important">
                <tbody><tr>
                    <td rowspan="4" class=" text-warning align-middle" style="max-width: 230px; width: 230px;">
                        <img class="rounded" src="http://161.97.143.51/img/juego/skin0/edificios/indPersonal.jpg" width="120" height="120">
                    </td>
                    <td colspan="2" class="text-start align-middle">
                        <span class="text-success fw-bold fs-5">Academia</span>
                        <span class="text-light">nivel 19</span>
                        <span class="text-warning">

                        </span>
                    </td>
                    <td colspan="1" class="text-light text-end align-middle fw-bold">Termina&nbsp;</td>
                    <td colspan="1" class="text-success text-start align-middle" id="terminaindPersonal">Hoy a las 13:23</td>
                    <td colspan="1" class="text-light text-end align-middle fw-bold">Tarda&nbsp;</td>
                    <td colspan="1" class="text-success text-start align-middle" id="tiempoindPersonal">00:07:25</td>
                    <td colspan="1" class="text-success text-end" style="max-width: 200px; width: 200px;">
                        <div class="input-group input-group-sm">
                            <input id="personalindPersonal" type="number" class="personal1 form-control input" min="0" placeholder="personal" value="366940" onkeyup="calculaTiempo({&quot;mineral&quot;:321392.759262096,&quot;cristal&quot;:0,&quot;gas&quot;:0,&quot;plastico&quot;:173725.8158173492,&quot;ceramica&quot;:0,&quot;liquido&quot;:0,&quot;micros&quot;:0}, &quot;330.000&quot;, &quot;indPersonal&quot;)">
                            <span class="input-group-text bg-dark text-light" style="padding: 0px">
                                <button type="button" class="btn btn-dark btn-sm text-light" disabled="">
                                    Personal
                                </button>
                            </span>
                        </div>

                </td>
                </tr>
            <tr>
                <td class=" text-warning">
                    Mineral
                </td>
                <td class=" text-muted">
                    cristal
                </td>
                <td class=" text-muted">
                    Gas
                </td>
                <td class=" text-warning">
                    Plástico
                </td>
                <td class=" text-muted">
                    Cerámica
                </td>
                <td class=" text-muted">
                    Liquido
                </td>
                <td class=" text-muted">
                    Micros
                </td>
            </tr>
            <tr>
                                    <td class=" text-light">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Coste de este recurso para la construcción">321.393</span>
                        </td>
                                                    <td class=" text-light">
                        </td>
                                                <td class=" text-light">
                        </td>
                                                <td class=" text-light">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Coste de este recurso para la construcción">173.726</span>
                        </td>
                                                    <td class=" text-light">
                        </td>
                                                <td class=" text-light">
                        </td>
                                                <td class=" text-light">
                        </td>
                        </tr>
            <tr>
                                    <td class=" text-light">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Recursos restantes una vez demos la orden de construir">4.152.847</span>
                        </td>
                                                    <td class=" text-light">
                        </td>
                                                <td class=" text-light">
                        </td>
                                                <td class=" text-light">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Recursos restantes una vez demos la orden de construir">17.437</span>
                        </td>
                                                    <td class=" text-light">
                        </td>
                                                <td class=" text-light">
                        </td>
                                                <td class=" text-light">
                        </td>
                        </tr>
            </tbody></table>
            <table class="table table-sm table-borderless text-center anchofijo" style="margin-bottom: 5px !important;">
                <tbody><tr>
                    <td>
                                                <button type="button" class="btn btn-outline-danger col-12" onclick="sendReciclar('28', 'indPersonal')">
                                <i class="fa fa-trash"></i> Reciclar
                            </button>
                                        </td>
                    <td>
                        <button type="button" class="btn btn-outline-info col-12 " data-bs-toggle="modal" data-bs-target="#datosModal" onclick="mostrarDatosConstruccion('indPersonal')">
                            <i class="fa fa-info"></i> Información
                        </button>
                    </td>
                                    <td>
                                                                        <button type="button" class="btn btn-outline-success col-12" onclick="sendConstruir('28',
                            'indPersonal', 'mina-tab')">
                            <i class="fa fa-arrow-alt-circle-up "></i> Construir
                            </button>                                     </td>
                </tr>
            </tbody></table>
        </div>
    </div>
</div>
</div>



<script>


    // Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

</script>
