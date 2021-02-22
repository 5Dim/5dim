valFlotaT = [];


fueraH = [];
dentroH = [];
capacidadH = [];
tablaHangares = [];
tablaHangares.fueraH = fueraH;
tablaHangares.dentroH = dentroH;
tablaHangares.capacidadH = capacidadH;

fuelDestT=0; //fuel total a todos los destinos

RecursosInicio();
CargarValoresPlaneta();
CrearOrigen(0);

for (dest = 1; dest < destinos.length; dest++) {
    CargaActual(dest);
}
Avisos();

function CrearOrigen(dest) {
    $("#titulo0").text("Origen " + destinos[dest]["sistema"] + "x" + destinos[dest]["planeta"]);
    $(".ocultarenorigen" + dest).text("");
}

// carga de valores
function CargarValoresPlaneta() {
    navesEstacionadas.forEach(nave => {
        var diseno = $.grep(diseniosJugador, function(valorBase) {
            return valorBase.id == nave.id;
        })[0];
        MostrarResultadoDisenio(diseno);
        valNaves[nave.id].nombre = diseno.nombre;
        valNaves[nave.id].cantidad = nave.cantidad;
        valNaves[nave.id].cantidadT = nave.cantidad; //es constante
        valNaves[nave.id].enflota = 0;
        valNaves[nave.id].enhangar = 0;
        valNaves[nave.id].tamanio = diseno.tamanio;
        valNaves[nave.id].iddisenio=nave.id;

        $("#nombre" + nave.id).text(diseno.nombre);
    });

    RecalculoTotal();
}

function RecursosInicio() {
    var dest;
    for (dest = 0; dest < destinos.length; dest++) {

        if (recursosDest[dest] != undefined) {
            MostrarRecursos(dest);
        }

        if (cargaDest[dest] == undefined) {
            cargaDest[dest] = [];
            recursosArray.forEach(res => {
                cargaDest[dest][res] = 0;
            });
            cargaDest[dest].total = 0;
        }
    }
}

function RecalculoTotal() {
    //reinicio valores
    valFlotaT.carga = 0;
    valFlotaT.municion = 0;
    valFlotaT.fuel = 0;
    valFlotaT.velocidad = 1000;
    valFlotaT.maniobra = 1000;
    valFlotaT.ataqueR = 0;
    valFlotaT.defensaR = 0;
    valFlotaT.ataqueV = 0;
    valFlotaT.defensaV = 0;
    tamaniosArray.forEach(tamanio => {
        tablaHangares.capacidadH[tamanio] = 0;
        tablaHangares.fueraH[tamanio] = 0;
        tablaHangares.dentroH[tamanio] = 0;
    });

    ///CALCULO
    // naves
    navesEstacionadas.forEach(nave => {
        cantidad = valNaves[nave.id].cantidad;
        aflota = valNaves[nave.id].enflota;
        ahangar = valNaves[nave.id].enhangar;
        atotal = aflota + ahangar;

        if (atotal > 0) {
            valFlotaT.carga += valNaves[nave.id].carga * atotal;
            valFlotaT.municion += valNaves[nave.id].municion * atotal;
            valFlotaT.fuel += valNaves[nave.id].fuel * aflota;
            if (aflota > 0) {
                valFlotaT.velocidad = Math.min(valNaves[nave.id].velocidad, valFlotaT.velocidad);
                valFlotaT.maniobra = Math.min(valNaves[nave.id].maniobra, valFlotaT.maniobra);
            }
            valFlotaT.ataqueR += valNaves[nave.id].ataque * atotal;
            valFlotaT.defensaR += valNaves[nave.id].defensa * atotal;
            valFlotaT.ataqueV += valNaves[nave.id].ataque * aflota;
            valFlotaT.defensaV += valNaves[nave.id].defensa * aflota;

            //hangares

            tamaniosArray.forEach(tamaniod => {
                tablaHangares.capacidadH[tamaniod] += atotal * valNaves[nave.id][tamaniod];
            });

            var tcarga = tamaniosNaveAcarga[valNaves[nave.id].tamanio];
            tablaHangares.dentroH[tcarga] += ahangar;
            tablaHangares.fueraH[tcarga] += aflota;
        }
        tablaHangares.capacidadH.cargaMega = 0; //siempre

        // pimtado esta nave

        $("#cantidad" + nave.id).text(formatNumber(cantidad));
        $("#enflota" + nave.id).val(aflota);
        $("#enhangar" + nave.id).val(ahangar);
    });

    if (valFlotaT.velocidad > 999) {
        valFlotaT.velocidad = 0;
    }
    if (valFlotaT.maniobra > 999) {
        valFlotaT.maniobra = 0;
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
    Calculoespacitiempo();
    Avisos();
}

var errores = "";

function Avisos() {
    var errorHangares = false;
    errores = "";
    var sePuedeEnviar = true;

    tamaniosArray.forEach(tamanio => {
        if (tablaHangares.dentroH[tamanio] > tablaHangares.capacidadH[tamanio]) {
            errorHangares = true;
            $("#capacidadH" + tamanio)
                .addClass("text-danger")
                .removeClass("text-light");
        } else {
            $("#capacidadH" + tamanio)
                .removeClass("text-danger")
                .addClass("text-light");
        }
    });

    if (errorHangares) {
        errores += " Capacidad de hangar insuficiente";
        sePuedeEnviar = false;
        $("#capacidadH")
            .addClass("text-danger")
            .removeClass("text-warning");

        //pintando caja ahangar por nave
        navesEstacionadas.forEach(nave => {
            var tcarga = tamaniosNaveAcarga[valNaves[nave.id].tamanio];
            if (valNaves[nave.id].enhangar > 0 && tablaHangares.dentroH[tcarga] > 0) {
                $("#selectahangar" + nave.id).addClass("bg-danger");
            } else {
                $("#selectahangar" + nave.id).removeClass("bg-danger");
            }
        });
    } else {
        $("#capacidadH")
            .removeClass("text-danger")
            .addClass("text-warning");
        navesEstacionadas.forEach(nave => {
            $("#selectahangar" + nave.id).removeClass("bg-danger");
        });
    }

    ///exceso de carga

    var excesocarga = false;
    var dest;
    for (dest = 0; dest < destinos.length; dest++) {
        if (cargaDest[dest] != undefined && cargaDest[dest].total > valFlotaT.carga) {
            excesocarga = true;
            $("#botonenvias" + dest).addClass("bg-danger");
        } else {
            $("#botonenvias" + dest).removeClass("bg-danger");
        }

        if (cargaDest[dest] != undefined && cargaDest[dest].total > 0) {
            $("#botonenvias" + dest).text(formatNumber(cargaDest[dest].total));
        } else {
            $("#botonenvias" + dest).text("Enviar");
        }

        recursosArray.forEach(res => {
            //$("#boton" + res + dest).text(formatNumber(resto));
            //recur = 1 * recur.replace(/\./g, "");

            if (
                cargaDest[dest] != undefined &&
                recursosDest[dest] != undefined &&
                cargaDest[dest][res] > Math.round(recursosDest[dest][res])

            ) {
                $("#boton" + res + dest)
                    .removeClass("btn-dark")
                    .addClass("btn-danger");
            } else {
                $("#boton" + res + dest)
                    .addClass("btn-dark")
                    .removeClass("btn-danger");
            }

        });
    }

    if (excesocarga) {
        $("#totalcarga").addClass("bg-danger");
        sePuedeEnviar = false;
        errores += " Capacidad de carga insuficiente";
    } else {
        $("#totalcarga").removeClass("bg-danger");
    }

    var cantidadRealDestinos = 0;


    //falta fuel

    var faltaFuel=false;

    if (recursosDest[0]!=undefined){
        if (recursosDest[0]['fuel']-cargaDest[0]['fuel']<fuelDestT){
            faltaFuel=true;
        }
    }


    //las misiones son viables
    for (dest = 1; dest < destinos.length; dest++) {
        var destAnt = dest - 1;
        var destPost = dest + 1;

        var orden = $("#ordenDest" + dest).val();
        destinos[dest].mision=orden;

        var hayErrorMision = false;

        if (orden != "") {
            var img = origenImagenes + "/flotas/" + orden + ".jpg";
            cantidadRealDestinos++;

            var ordenAnt = $("#ordenDest" + destAnt).val();
            var ordenPost = $("#ordenDest" + destPost).val();
            // no se puede llegar
            if (ordenAnt == "" || ordenAnt == "transferir" || ordenAnt == "recolectar" || ordenAnt == "orbitar") {
                errores += " No se alcanzará destino " + dest;
                hayErrorMision = true;
            }

            // soy la ultima y debe ser de cierre
            if (ordenPost != undefined) {
                if (ordenPost.length < 1 && orden != "transferir" && orden != "recolectar" && orden != "orbitar") {
                    errores += " la misión del último destino no es transferir, orbitar o recolectar";
                    hayErrorMision = true;
                }
            }
            if (destinos.length == destPost) {
                if (orden != "transferir" && orden != "recolectar" && orden != "orbitar") {
                    errores += " la misión del último destino no es transferir, orbitar o recolectar";
                    hayErrorMision = true;
                }
            }

            if (orden == "atacar" && !hayErrorMision) {
                $("#cajitaDestino" + dest)
                    .removeClass("cajita-success")
                    .addClass("cajita-light");
            } else {
                $("#cajitaDestino" + dest)
                    .addClass("cajita-success")
                    .removeClass("cajita-light");
            }
        } else {
            var img = origenImagenes + "/flotas/nada.jpg";
        }

        $("#imagen" + dest).attr("src", img);

        if (hayErrorMision) {
            sePuedeEnviar = false;
            $("#cajitaDestino" + dest)
                .removeClass("cajita-success")
                .addClass("cajita-danger");
        } else {
            $("#cajitaDestino" + dest)
                .addClass("cajita-success")
                .removeClass("cajita-danger");
        }


        if (faltaFuel){
            $("#fuelDest" + dest)
            .addClass("text-danger")
            .removeClass("text-light");
            sePuedeEnviar = false;
        } else {
        $("#fuelDest" + dest)
            .removeClass("text-danger")
            .addClass("text-light");
        }
    }

    if (faltaFuel){
        errores += " Fuel insuficiente en origen";}

    //falta velcidad

    /// se puede enviar o no
    $("#botonEnviar").text("Enviar Flota");
    if (!sePuedeEnviar) {
        $("#botonEnviar").text(errores);
        $("#botonEnviar")
            .addClass("bg-danger")
            .removeClass("btn-success");

            $("#consumofuel1")
            .addClass("bg-danger")
            .removeClass("btn-warning");


        $("#botonEnviar").prop("disabled", true);
    } else {

        $("#botonEnviar")
            .removeClass("bg-danger")
            .addClass("btn-success");

            $("#consumofuel1")
            .removeClass("bg-danger")
            .addClass("btn-warning");
        $("#botonEnviar").prop("disabled", false);

    }


}

function NaveAflota(id, canti = 0) {
    if (canti == "x") {
        valNaves[id].enflota = 1 * $("#enflota" + id).val();
    } else if (canti == "m") {
        valNaves[id].enflota = valNaves[id].cantidad + valNaves[id].enflota;
    } else {
        valNaves[id].enflota = canti;
    }

    if (valNaves[id].enhangar + valNaves[id].enflota > valNaves[id].cantidadT) {
        valNaves[id].enflota = valNaves[id].cantidadT - valNaves[id].enhangar;
    }
    valNaves[id].cantidad = valNaves[id].cantidadT - valNaves[id].enflota - valNaves[id].enhangar;
    RecalculoTotal();
}

function NaveAhangar(id, canti = 0) {
    if (canti == "x") {
        valNaves[id].enhangar = 1 * $("#enhangar" + id).val();
    } else if (canti == "m") {
        valNaves[id].enhangar = valNaves[id].cantidad + valNaves[id].enhangar;
    } else {
        valNaves[id].enhangar = canti;
    }

    if (valNaves[id].enhangar + valNaves[id].enflota > valNaves[id].cantidadT) {
        valNaves[id].enhangar = valNaves[id].cantidadT - valNaves[id].enflota;
    }
    valNaves[id].cantidad = valNaves[id].cantidadT - valNaves[id].enflota - valNaves[id].enhangar;
    RecalculoTotal();
}


function Calculoespacitiempo() {
    if (valFlotaT.fuel > 0) {
        var dest;
        fuelDestT=0;
        for (dest = 1; dest < destinos.length; dest++) {
            //$("#municion" + dest).val(valFlotaT.municion);
            destAnt = dest - 1;

            destinos[dest].sistema = $("#sistemaDest" + dest).val();
            destinos[dest].planeta = $("#planetaDest" + dest).val();

            var distancia = DistanciaUniverso(destinos[destAnt], destinos[dest]);
            if (isNaN(distancia) || destinos[dest].sistema == "") {
                NoSeMueve(dest);
            } else {
                var porcentVel = $("#porcentVDest" + dest).val() / 100;
                var fuelDest = GastoFuel(distancia, valFlotaT.fuel);
                destinos[dest].porcentVel=porcentVel;

                if (distancia < 10) {
                    $("#tipovelocidad" + dest).text("Vel. Impulso");
                    $("#velocidadDest" + dest).text(formatNumber(Math.round(valFlotaT.maniobra * porcentVel)));
                    if (valFlotaT.maniobra < 1) {
                        NoSeMueve(dest);
                    } else {
                        var tiempoDest = TiempoLLegada(distancia, valFlotaT.maniobra * porcentVel);
                        SiSeMueve(dest, fuelDest, tiempoDest);
                    }
                } else {
                    $("#tipovelocidad" + dest).text("Hypervelocidad");
                    $("#velocidadDest" + dest).text(formatNumber(Math.round(valFlotaT.velocidad * porcentVel)));
                    if (valFlotaT.velocidad < 1) {
                        NoSeMueve(dest);
                    } else {
                        var tiempoDest = TiempoLLegada(distancia, valFlotaT.velocidad * porcentVel);
                        SiSeMueve(dest, fuelDest, tiempoDest);
                    }
                }
            }
            fuelDestT+=fuelDest;
        }

        for (dest = 1; dest < destinos.length; dest++) {
            CargaActual(dest);
        }
    } else {
        NoSeMueve(dest);
    }
    CargarMunicion();
}

function NoSeMueve(dest) {
    //si la flota se no mueve coloca -
    $("#fuelDest" + dest).text("-");
    $("#tiempoDest" + dest).text("-");
}

function SiSeMueve(dest, fuelDest, tiempoDest) {
    //si la flota se mueve coloca valores
    $("#fuelDest" + dest).text(formatNumber(fuelDest));
    $("#tiempoDest" + dest).text(formatTimestamp(tiempoDest));
}

function SelectorDestinos(dest) {
    // el selector coloca sistema y planeta
    input = $("#listaPlanetas" + dest)
        .val()
        .split("x");
    $("#sistemaDest" + dest).val(input[0]);
    $("#planetaDest" + dest).val(input[1]);
    TraerRecursos(input[0], input[1], dest);
}

function MostrarRecursos(dest) {
    recursosArray.forEach(res => {
        $("#boton" + res + dest).text(formatNumber(Math.round(1 * recursosDest[dest][res])));
    });
}

function CargarRecurso(dest, res) {
    var acargar = 0;
    var hueco = 0;
    var recur =Math.round(recursosDest[dest][res]-cargaDest[dest][res]); //$("#boton" + res + dest).text();

    CargaActual(dest);
    hueco = Math.max(0, valFlotaT.carga - cargaDest[dest].total);
    if (recur < hueco) {
        acargar = recur;
    } else {
        acargar = hueco + cargaDest[dest][res];
    }
    $("#" + res + dest).val(formatNumber(acargar));
    var resto=Math.max(0,recur-acargar);
    $("#boton" + res + dest).text(formatNumber(resto));
}

function TraerRecursos(sistema, planeta, dest) {
    $.ajax({
        method: "GET",
        url: "/juego/flotas/traerRecursos/" + sistema + "/" + planeta,
        success: function(data) {
            recursosDest[dest] = data.recursos;
            MostrarRecursos(dest);
        },
        error: function(xhr, textStatus, thrownError) {
            console.log("status", xhr.status);
            console.log("error", thrownError);
            //$("#botontienes"+ dest).text("Tienes");
            recursosArray.forEach(res => {
                recursosDest[dest][res] = 0;
            });
            recursosDest[dest].total = 0;
            MostrarRecursos(dest);
        },
    });
}

function TodoDeOrigen(dest) {
    recursosArray.forEach(res => {
        CargarRecurso(dest, res);
    });
}

function Vaciar(dest) {
    recursosArray.forEach(res => {
        $("#" + res + dest).val(0);
        cargaDest[dest][res] = 0;
        cargaDest[dest].total = 0;
    });
    CargaActual(dest);
    Avisos();
}

function CargarMunicion() {
    res = "municion";
    for (dest = 0; dest < destinos.length; dest++) {
        var muniTotal = valFlotaT[res]; //+1* recur.replace(/\./g,'');
        $("#" + res + dest).val(formatNumber(muniTotal));

    }
}

function CargaActual(dest) {
    cargatotal = 0;
    recursosArray.forEach(res => {
        var recur = $("#" + res + dest).val();
        if (recur != "NaN") {
            recur = 1 * recur.replace(/\./g, "");
        } else {
            recur = 0;
            $("#" + res + dest).val(0);
        }
        cargatotal += recur;
        cargaDest[dest][res] = recur;

        var resto=0;
        if (recursosDest[dest]!=undefined){
            var resto=Math.round(recursosDest[dest][res]-recur);
        }

        $("#boton" + res + dest).text(formatNumber(resto));
    });
    cargaDest[dest].total = cargatotal;
    Avisos();
}

function ModificandoRecurso(dest, res) {
    var result = $("#" + res + dest).val().replace(/\./g, "");
    if ($.isNumeric(result)) {
        $("#" + res + dest).val(1 * result);
        CargaActual(dest);
    } else {
        $("#" + res + dest).val(0);
    }
    Avisos();
}

$('.prioridad').keyup(function() {
    var prioridadvalue=1* $("#" + this.id).val();

    if(!$.isNumeric(prioridadvalue)){
        $("#" + this.id).val(0);
        return;
    }

    if (prioridadvalue>15){
        $("#" + this.id).val(15);
    }
    if (prioridadvalue<0){
        $("#" + this.id).val(0);
    }
});

function VaciarPrioridades (dest) {
    recursosArray.forEach(res => {
        $("#prioridad" + res + dest).val(prioridades[res]);
    });
}



function enviarFlota() {

    if (errores.length>0){
        alert(errores)
    } else {

        datosBasicos={
            "nombre":$("#nombreFlota").val(),
        }

        var valoresNaves=[];
        valNaves.forEach(nave => {
            valoresNaves.push(nave);
        });

        var Ovalnaves= Object.assign({}, valoresNaves);
        var Odestinos= Object.assign({}, destinos);
        var OcargaDest= Object.assign({}, cargaDest);
        var Oprioridades= Object.assign({}, prioridades);




        $.ajax({
            type: 'post',
            dataType: 'json',
            url: "/juego/flotas/enviarFlota",
            //contentType: 'application/json; charset=utf-8',
            data: {"valnaves": navesEstacionadas},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                console.log('bloqueo botones');
            },
            success: function(response) {

            },
            error: function(xhr, textStatus, thrownError) {
                console.log("status", xhr.status);
                console.log("error", thrownError);

            },
        });
    }
    }

function formSuccess(){
    $( "#msgSubmit" ).removeClass( "hidden" );
}

