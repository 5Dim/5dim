<script type="text/x-handlebars-template" id="cajitaGruposExisten">

        <div class="row rounded cajita">
            <div class="col-12">
                <div id="grupoNaves{{id}}" class="table-responsive">
                    <table class="table table-sm table-borderless text-center anchofijo" style="margin-bottom: 5px !important;">
                        <tbody>
                            <tr>
                                <td class=" text-warning">Nombre</td>
                                <td class=" text-warning">Movimiento</td>
                                <td class=" text-warning">Objetivo de disparo</td>
                                <td class=" text-warning">Relación...</td>
                                <td class=" text-warning">...con el grupo</td>
                                <td class=" text-warning"></td>
                            </tr>
                            {{#each listaGruposNaves}}
                            {{#if visible}}
                                <tr>
                                    <td class="text-light">
                                        <input id="nombreGrupo" type="text" class="form-control input"
                                            placeholder="Nombre del grupo" value="{{nombre}}"/>
                                    </td>
                                    <td class="text-light">
                                        <div>
                                            <select name="actitud" id="actitud"
                                                class="select form-control">
                                                    {{#select actitud}}
                                                        <option value="Huida" >Huida</option>
                                                        <option value="MantenerDistancia">Mantener Distancia</option>
                                                        <option value="minimizarDanio">minimizar daños propios</option>
                                                        <option value="Hostil">Hostil</option>
                                                        <option value="Flanqueo">Flanqueo</option>
                                                    {{/select}}
                                            </select>
                                        </div>
                                    </td>
                                    <td class="text-light">
                                        <div>
                                            <select name="objetivo" id="objetivo"
                                                class="select form-control">
                                                    {{#select objetivo}}
                                                        <option value="MasHace">Al que mas daño me hace</option>
                                                        <option value="DanioHago">Al que mas daño hago yo</option>
                                                        <option value="MasDaniado">El mas dañado</option>
                                                    {{/select}}
                                            </select>
                                        </div>
                                    </td>
                                    <td class="text-light">
                                        <div>
                                            <select name="relacion" id="relacion"
                                                class="select form-control">
                                                    {{#select relacion}}
                                                        <option value="Ninguna" >Ninguna</option>
                                                        <option value="EscoltaCorta">Escolta corta</option>
                                                        <option value="EscoltaLarga">Escolta Larga</option>
                                                    {{/select}}
                                            </select>
                                        </div>
                                    </td>
                                    <td class="text-light">
                                        <div>
                                            <select name="objrelacion" id="objrelacion"
                                                class="select form-control">
                                                <option value="Ninguna" selected>Ninguna</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger col-12" onclick="BorrarGrupo({{id}})">
                                        <i class="fa fa-trash "></i> Borrar
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success col-12" onclick="ModificarGrupo({{id}})">
                                        <i class="fa fa-arrow-alt-circle-up "></i> Modificar
                                        </button>
                                    </td>
                                </tr>
                                {{/if}}
                            {{/each}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

</script>

