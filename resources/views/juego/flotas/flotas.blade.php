@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-12 cajita-info rounded">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless table-sm text-center" style="margin-top: 5px !important">
                        <tr>
                            <th colspan="15" class="anchofijo text-success">
                                <big>
                                    Naves
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="anchofijo text-warning align-middle">
                                Nombre del disenio
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Ataque
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Defensa
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Carga
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H. cazas
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H. ligeras
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H. medias
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H. pesadas
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Vel. Impulso
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Hypervelocidad
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Cantidad
                            </th>
                            <th class="anchofijo text-warning align-middle" style="max-width: 180px">
                                <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                                    En la flota
                                </button>
                            </th>
                            <th class="anchofijo text-warning align-middle" style="max-width: 180px">
                                <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                                    En hangar
                                </button>
                            </th>
                        </tr>
                        @foreach($navesEstacionadas as $nave)
                            <tr>
                                <td name="nombre{{$nave->id}}" id="nombre{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="ataque{{$nave->id}}" id="ataque{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="defensa{{$nave->id}}" id="defensa{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="carga{{$nave->id}}" id="carga{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarCazas{{$nave->id}}" id="hangarCazas{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarLigeras{{$nave->id}}" id="hangarLigeras{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarMedias{{$nave->id}}" id="hangarMedias{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarPesadas{{$nave->id}}" id="hangarPesadas{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="maniobra{{$nave->id}}" id="maniobra{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="velocidad{{$nave->id}}" id="velocidad{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td name="cantidad{{$nave->id}}" id="cantidad{{$nave->id}}" class="anchofijo text-light align-middle">
                                </td>
                                <td id="selectaflota{{$nave->id}}"  class="anchofijo text-light" style="max-width: 180px">
                                    <div class="input-group mb-3 input-group-sm borderless">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning" onclick="NaveAflota({{$nave->id}},0)">
                                                    0
                                                </button>
                                            </span>
                                        </div>
                                        <input id="enflota{{$nave->id}}"  type="text" class="form-control input" value="0" aria-label="" onKeyUp="NaveAflota({{$nave->id}},'x')"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"  onclick="NaveAflota({{$nave->id}},'m')">
                                                    M
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td id="selectahangar{{$nave->id}}"  class="anchofijo text-light" style="max-width: 180px">
                                    <div class="input-group mb-3 input-group-sm borderless">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"  onclick="NaveAhangar({{$nave->id}},0)">
                                                    0
                                                </button>
                                            </span>
                                        </div>
                                        <input id="enhangar{{$nave->id}}"  type="text" class="form-control input" value="0" aria-label="" onKeyUp="NaveAhangar({{$nave->id}},'x')"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning" onclick="NaveAhangar({{$nave->id}},'m')">
                                                    M
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table table-borderless borderless table-sm text-center anchofijo"
                        style="margin-top: 5px !important">
                        <tr>
                            <th colspan="9" class="text-success">
                                <big>
                                    Resumen de naves
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Capacidad de carga total
                            </th>
                            <th class="text-warning align-middle">
                                Municion
                            </th>
                            <th class="text-warning align-middle">
                                Fuel
                            </th>
                            <th class="text-warning align-middle">
                                Vel. Impulso
                            </th>
                            <th class="text-warning align-middle">
                                Hypervelocidad
                            </th>
                            <th class="text-warning align-middle">
                                Ataque real
                            </th>
                            <th class="text-warning align-middle">
                                Defensa Real
                            </th>
                            <th class="text-warning align-middle">
                                Ataque visible
                            </th>
                            <th class="text-warning align-middle">
                                Defensa visible
                            </th>
                        </tr>
                        <tr>
                            <td id="totalcarga" class="text-light align-middle">
                            </td>
                            <td id="totalmunicion" class="text-light align-middle">
                            </td>
                            <td id="totalfuel" class="text-light align-middle">
                            </td>
                            <td id="totalvelocidad" class="text-light align-middle">
                            </td>
                            <td id="totalmaniobra" class="text-light align-middle">
                            </td>
                            <td id="totalataqueR" class="text-light align-middle">
                            </td>
                            <td id="totaldefensaR" class="text-light align-middle">
                            </td>
                            <td id="totalataqueV" class="text-light align-middle">
                            </td>
                            <td id="totaldefensaV" class="text-light align-middle">
                            </td>
                        </tr>
                    </table>
                    <table class="table table-borderless borderless table-sm text-center"
                        style="margin-top: 5px !important">
                        <tr>
                            <th colspan="6" class="text-success">
                                <big>
                                    Estado de los hangares <i class="fa fa-arrow-alt-circle-down"></i>
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Tipos
                            </th>
                            <th class="text-warning align-middle">
                                Cazas
                            </th>
                            <th class="text-warning align-middle">
                                Ligeras
                            </th>
                            <th class="text-warning align-middle">
                                Medias
                            </th>
                            <th class="text-warning align-middle">
                                Pesadas
                            </th>
                            <th class="text-warning align-middle">
                                Estaciones
                            </th>
                        </tr>
                        <tr>
                            <th id="fueraH" class="text-warning align-middle">
                                Fuera de hangar
                            </th>
                            <td id="fueraHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th id="dentroH" class="text-warning align-middle">
                                En hangares
                            </th>
                            <td id="dentroHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th id="capacidadH" class="text-warning align-middle">
                                Capacidad hangares
                            </th>
                            <td id="capacidadHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                    </table>
                </div>
                @include('juego.flotas.destino', [ 'destino' => 'destino1', 'numero' => '1'])
                @include('juego.flotas.destino', [ 'destino' => 'destino2', 'numero' => '2'])
                @include('juego.flotas.destino', [ 'destino' => 'destino3', 'numero' => '3'])
            </div>
        </div>
    </div>

    <script>
        let constantes = @json($constantes);
        let navesEstacionadas = @json($navesEstacionadas);
        let diseniosJugador = @json($diseniosJugador);
        let investigaciones = @json($investigaciones);
        let constantesU = @json($constantesU);
        let ViewDaniosDisenios = @json($ViewDaniosDisenios);


        destinos =[];
        destinos[0] = []; destinos[0]['sistema']='1234';destinos[0]['planeta']='5';
        destinos[1] = []; destinos[1]['sistema']='0';destinos[1]['planeta']='0';
        destinos[2] = []; destinos[2]['sistema']='0';destinos[2]['planeta']='0';
        destinos[3] = []; destinos[3]['sistema']='0';destinos[3]['planeta']='0';

        valFlotaT = [];

            fueraH =[];
            dentroH =[];
            capacidadH =[];
        tablaHangares = [];
        tablaHangares.fueraH=fueraH;
        tablaHangares.dentroH=dentroH;
        tablaHangares.capacidadH=capacidadH;



        CargarValoresPlaneta();


        // carga de valores
        function CargarValoresPlaneta(){

            navesEstacionadas.forEach(nave => {
                var diseno=$.grep(diseniosJugador, function (valorBase) {return valorBase.id == nave.id;})[0];
                MostrarResultadoDisenio(diseno);
                valNaves[nave.id].nombre=diseno.nombre;
                valNaves[nave.id].cantidad=nave.cantidad;
                valNaves[nave.id].cantidadT=nave.cantidad; //es constante
                valNaves[nave.id].enflota=0;
                valNaves[nave.id].enhangar=0;
                valNaves[nave.id].tamanio=diseno.tamanio;

                $("#nombre" + nave.id).text(diseno.nombre);
            });

            RecalculoTotal();
        }

        function RecalculoTotal(){

            //reinicio valores
            valFlotaT.carga=0;
            valFlotaT.municion=0;
            valFlotaT.fuel=0;
            valFlotaT.velocidad=1000;
            valFlotaT.maniobra=1000;
            valFlotaT.ataqueR=0;
            valFlotaT.defensaR=0;
            valFlotaT.ataqueV=0;
            valFlotaT.defensaV=0;
            tamaniosArray.forEach(tamanio => {
                    tablaHangares.capacidadH[tamanio]=0;
                    tablaHangares.fueraH[tamanio]=0;
                    tablaHangares.dentroH[tamanio]=0;
                });

            ///CALCULO
            // naves
            navesEstacionadas.forEach(nave => {
                cantidad=valNaves[nave.id].cantidad;
                aflota=valNaves[nave.id].enflota;
                ahangar=valNaves[nave.id].enhangar;
                atotal=aflota+ahangar;

                if (atotal>0){

                    valFlotaT.carga+=valNaves[nave.id].carga * atotal;
                    valFlotaT.municion+=valNaves[nave.id].municion * atotal;
                    valFlotaT.fuel+=valNaves[nave.id].fuel * aflota;
                    if (aflota>0){
                        valFlotaT.velocidad=Math.min(valNaves[nave.id].velocidad , valFlotaT.velocidad);
                        valFlotaT.maniobra=Math.min(valNaves[nave.id].maniobra,valFlotaT.maniobra);
                    }
                    valFlotaT.ataqueR+=valNaves[nave.id].ataque * atotal;
                    valFlotaT.defensaR+=valNaves[nave.id].defensa * atotal;
                    valFlotaT.ataqueV+=valNaves[nave.id].ataque * aflota;
                    valFlotaT.defensaV+=valNaves[nave.id].defensa * aflota;

                    //hangares

                    tamaniosArray.forEach(tamaniod => {
                       tablaHangares.capacidadH[tamaniod]+=atotal * valNaves[nave.id][tamaniod];
                    });

                    var tcarga=tamaniosNaveAcarga[valNaves[nave.id].tamanio];
                    tablaHangares.dentroH[tcarga]+=ahangar;
                    tablaHangares.fueraH[tcarga]+=aflota;
                }
                tablaHangares.capacidadH.cargaMega=0; //siempre

                    // pimtado esta nave

                    $("#cantidad" + nave.id).text(formatNumber(cantidad));
                    $("#enflota" + nave.id).val(aflota);
                    $("#enhangar" + nave.id).val(ahangar);

            });

            if(valFlotaT.velocidad>999){
                valFlotaT.velocidad=0;
            }
            if(valFlotaT.maniobra>999){
                valFlotaT.maniobra=0;
            }


            //impresion

            $("#totalcarga").text(formatNumber(valFlotaT.carga));
            $("#totalmunicion").text(formatNumber(valFlotaT.municion));
            $("#totalfuel").text(formatNumber(valFlotaT.fuel));
            $("#totalvelocidad").text(formatNumber(valFlotaT.velocidad));
            $("#totalmaniobra").text(formatNumber(valFlotaT.maniobra));
            $("#totalataqueR").text(formatNumber(valFlotaT.ataqueR));
            $("#totaldefensaR").text(formatNumber(valFlotaT.defensaR));
            $("#totalataqueV").text(formatNumber(valFlotaT.ataqueV));
            $("#totaldefensaV").text(formatNumber(valFlotaT.defensaV));


            //pintando tabla hangares

            tamaniosArray.forEach(tamanio => {
                $("#capacidadH" + tamanio).text(formatNumber(tablaHangares.capacidadH[tamanio]));
                $("#dentroH" + tamanio).text(formatNumber(tablaHangares.dentroH[tamanio]));
                $("#fueraH" + tamanio).text(formatNumber(tablaHangares.fueraH[tamanio]));
            });

            if (valFlotaT.velocidad>0 || valFlotaT.maniobra>0 ){
                var idd;
                for(idd=0; idd<destinos.length-1;idd++){
                    Calculoespacitiempo(idd);
                };
            }


            Avisos();
        }

        var  errores="";
        function Avisos(){
            var errorHangares=false;
            errores="";

            tamaniosArray.forEach(tamanio => {
                if (tablaHangares.dentroH[tamanio] > tablaHangares.capacidadH[tamanio]){
                    errorHangares=true;
                    $("#capacidadH"+ tamanio).addClass('text-danger').removeClass('text-light');
                } else {
                    $("#capacidadH"+ tamanio).removeClass('text-danger').addClass('text-light');
                }
            });

            if (errorHangares){
                errores+=" Capacidad de hangar insuficiente";
                $("#capacidadH").addClass('text-danger').removeClass('text-warning');

                //pintando caja ahangar por nave
                navesEstacionadas.forEach(nave => {
                    var tcarga=tamaniosNaveAcarga[valNaves[nave.id].tamanio];
                    if (valNaves[nave.id].enhangar>0 &&  tablaHangares.dentroH[tcarga]>0){
                        $("#selectahangar"+ nave.id).addClass('bg-danger');
                    } else {
                        $("#selectahangar"+ nave.id).removeClass('bg-danger');
                    }
                });
            } else {
                $("#capacidadH").removeClass('text-danger').addClass('text-warning');
                navesEstacionadas.forEach(nave => {
                    $("#selectahangar"+ nave.id).removeClass('bg-danger');
                });
            }

        }


        function NaveAflota(id,canti=0){
            if (canti=='x'){
                valNaves[id].enflota=1*$("#enflota" + id).val();
            } else if (canti=='m') {
                valNaves[id].enflota=valNaves[id].cantidad;
            } else {
                valNaves[id].enflota=canti;
            }

            if (valNaves[id].enhangar+valNaves[id].enflota > valNaves[id].cantidadT) {
                valNaves[id].enflota=valNaves[id].cantidadT-valNaves[id].enhangar;
            }
            valNaves[id].cantidad=valNaves[id].cantidadT-valNaves[id].enflota-valNaves[id].enhangar;
            RecalculoTotal();
        }

        function NaveAhangar(id,canti=0){
            if (canti=='x'){
                valNaves[id].enhangar=1*$("#enhangar" + id).val();
            } else if (canti=='m') {
                valNaves[id].enhangar=valNaves[id].cantidad;
            } else {
                valNaves[id].enhangar=canti;
            }

            if (valNaves[id].enhangar+valNaves[id].enflota > valNaves[id].cantidadT) {
                valNaves[id].enhangar=valNaves[id].cantidadT-valNaves[id].enflota;
            }
            valNaves[id].cantidad=valNaves[id].cantidadT-valNaves[id].enflota-valNaves[id].enhangar;
            RecalculoTotal();
        }


        function Calculoespacitiempo(dest){


            var distancia= DistanciaUniverso(destinos[dest-1],destinos[dest]);
            var fuelDest=GastoFuel(distancia, valFlotaT.fuel);
            var tiempoDest=TiempoLLegada(distancia, valFlotaT.velocidad);

            $("#velocidadDest"+dest).text(formatNumber(valFlotaT.velocidad));
            $("#fuelDest"+dest).text(formatNumber(fuelDest));
            $("#tiempoDest"+dest).text(formatTimestamp(tiempoDest));

        }

    </script>
@endsection
