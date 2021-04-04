valFlotaT = [];

fueraH = [];
dentroH = [];
capacidadH = [];
tablaHangares = [];
tablaHangares.fueraH = fueraH;
tablaHangares.dentroH = dentroH;
tablaHangares.capacidadH = capacidadH;

puedoCargarRecurso=[];

fuelDestT = 0; //fuel total a todos los destinos


RecursosInicio();
CargarFlotaEditada();
CargarValoresPlaneta();


for (dest = 1; dest < destinos.length; dest++) {
    CargaActual(dest);
    VaciarPrioridades(dest);
}
Avisos();


function CargarFlotaEditada(){


    EsconderPorId("listaPrioridades0");
    if (flota.id==undefined){
        nombreorigen="Origen " + destinos[0]["estrella"] + "x" + destinos[0]["orbita"];

    } else {
        nombreorigen="Carga actual en la flota";
        puedoCargarRecurso[0]=false;
        EsconderPorId("envias0");
    }

    $(".ocultarenorigen" + 0).text("");
    CrearOrigen(nombreorigen);
}

function CrearOrigen(nombreorigen) {
    $("#titulo0").text(nombreorigen);

}

// carga de valores
function CargarValoresPlaneta() {
    navesEstacionadas.forEach(nave => {
        var diseno = $.grep(diseniosJugador, function(valorBase) {
            return valorBase.id == nave.disenios_id;
        })[0];
        MostrarResultadoDisenio(diseno);

        var este = valNaves.length - 1;
        valNaves[este].nombre = diseno.nombre;
        valNaves[este].enflota = nave.enFlota ? nave.enFlota : 0;
        valNaves[este].enhangar = nave.enHangar ? nave.enHangar : 0;
        valNaves[este].tamanio = diseno.tamanio;
        if(valNaves[este].enflota+valNaves[este].enhangar>0){
            valNaves[este].cantidad=0;
        } else {
            valNaves[este].cantidad=nave.cantidad;
        }
        valNaves[este].cantidadT = valNaves[este].cantidad +valNaves[este].enflota+valNaves[este].enhangar;; //es constante

        //ayuda visual esconde los 0
        $("#nombre" + diseno.id).text(diseno.nombre);
        if (valNaves[este]['carga']==0){
            $("#carga"+nave.disenios_id).removeClass("text-light").addClass("text-secondary");
        }
        if (valNaves[este]['cargaPequenia']==0){
            $("#hangarCazas"+nave.disenios_id).removeClass("text-light").addClass("text-secondary");
        }
        if (valNaves[este]['cargaMediana']==0){
            $("#hangarLigeras"+nave.disenios_id).removeClass("text-light").addClass("text-secondary");
        }
        if (valNaves[este]['cargaGrande']==0){
            $("#hangarMedias"+nave.disenios_id).removeClass("text-light").addClass("text-secondary");
        }
        if (valNaves[este]['cargaEnorme']==0){
            $("#hangarPesadas"+nave.disenios_id).removeClass("text-light").addClass("text-secondary");
        }
        if (valNaves[este]['maniobra']==0){
            $("#maniobra"+nave.disenios_id).removeClass("text-light").addClass("text-secondary");
        }
        if (valNaves[este]['velocidad']==0){
            $("#velocidad"+nave.disenios_id).removeClass("text-light").addClass("text-secondary");
        }


    });

    RecalculoTotal();
}

function RecursosInicio() {
    var dest;
    for (dest = 0; dest < destinos.length; dest++) {
        puedoCargarRecurso[dest]=true;
        if (recursosDest[dest] != undefined) {
            MostrarRecursos(dest);
        }else {
            recursosDest[dest]=[];
        }

        if (cargaDest[dest] == undefined) {
            cargaDest[dest] = [];
            recursosArray.forEach(res => {
                cargaDest[dest][res] = 0;
            });
            cargaDest[dest].total = 0;
        } else {
            recursosArray.forEach(res => {
                cargaDest[dest].total +=cargaDest[dest][res];
            });
        }
        destinos[dest].mision = $("#ordenDest" + dest).val();
    }
    destinos[0].mision = "transportar";
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
    valFlotaT.extraccion = 0;
    valFlotaT.recoleccion = 0;
    valFlotaT.atotal = 0;

    ///CALCULO
    // naves
    navesEstacionadas.forEach(nave => {
        var valnave = $.grep(valNaves, function(valor) {
            return valor.iddisenio == nave.disenios_id;
        })[0];

        cantidad = valnave.cantidad;
        aflota = valnave.enflota;
        ahangar = valnave.enhangar;
        atotal = aflota + ahangar;

        var estacionada = $.grep(navesEstacionadas, function(valor) {
            return valor.disenios_id == nave.disenios_id;
        })[0];

        estacionada.enflota = aflota;
        estacionada.enhangar = ahangar;

        valFlotaT.extraccion += valnave.extraccion * atotal;
        valFlotaT.recoleccion += valnave.recoleccion * atotal;

        if (atotal > 0) {
            valFlotaT.carga += valnave.carga * atotal;
            valFlotaT.municion += valnave.municion * atotal;
            valFlotaT.fuel += valnave.fuel * aflota;
            if (aflota > 0) {
                valFlotaT.velocidad = Math.min(valnave.velocidad, valFlotaT.velocidad);
                valFlotaT.maniobra = Math.min(valnave.maniobra, valFlotaT.maniobra);
            }
            valFlotaT.ataqueR += valnave.ataque * atotal;
            valFlotaT.defensaR += valnave.defensa * atotal;
            valFlotaT.ataqueV += valnave.ataque * aflota;
            valFlotaT.defensaV += valnave.defensa * aflota;

            //hangares

            tamaniosArray.forEach(tamaniod => {
                tablaHangares.capacidadH[tamaniod] += atotal * valnave[tamaniod];
            });

            var tcarga = tamaniosNaveAcarga[valnave.tamanio];
            tablaHangares.dentroH[tcarga] += ahangar;
            tablaHangares.fueraH[tcarga] += aflota;
        }
        tablaHangares.capacidadH.cargaMega = 0; //siempre

        valFlotaT.atotal += atotal;
        // pimtado esta nave

        $("#cantidad" + nave.disenios_id).text(formatNumber(cantidad));
        $("#enflota" + nave.disenios_id).val(aflota);
        $("#enhangar" + nave.disenios_id).val(ahangar);
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
    $("#totalextraccionV").text(formatNumber(valFlotaT.extraccion));
    $("#totalrecoleccionV").text(formatNumber(valFlotaT.recoleccion));

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

function Avisos() {  //////////////////////////////  VALIDACION


    var errorHangares = false;
    errores = "";
    var sePuedeEnviar = true;

    if (valFlotaT.atotal < 1) {
        sePuedeEnviar = false;
        errores += " Ninguna nave seleccionada";
    }

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
            var valnave = $.grep(valNaves, function(valor) {
                return valor.iddisenio == nave.disenios_id;
            })[0];

            var tcarga = tamaniosNaveAcarga[valnave.tamanio];

            if (valnave.enhangar > 0 && tablaHangares.dentroH[tcarga] > 0) {
                $("#selectahangar" + nave.disenios_id).addClass("bg-danger");
            } else {
                $("#selectahangar" + nave.disenios_id).removeClass("bg-danger");
            }
        });
    } else {
        $("#capacidadH")
            .removeClass("text-danger")
            .addClass("text-warning");
        navesEstacionadas.forEach(nave => {
            $("#selectahangar" + nave.disenios_id).removeClass("bg-danger");
        });
    }

    ///exceso de carga

    CargaActual(0);
    var excesocarga = false;
    var dest;
    for (dest = 0; dest < destinos.length; dest++) {
        if (destinos[dest].estrella.toString.length !== 0 ){

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
                if (cargaDest[dest] != undefined && recursosDest[dest] != undefined && cargaDest[dest][res] > Math.round(recursosDest[dest][res])) {
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
    }

    if (excesocarga) {
        $("#totalcarga").addClass("bg-danger");
        sePuedeEnviar = false;
        errores += " Capacidad de carga insuficiente";
    } else {
        $("#totalcarga").removeClass("bg-danger");
    }

    //falta fuel

    var faltaFuel = false;

    if (recursosDest[0] != undefined) {
        if (recursosDest[0]["fuel"] - cargaDest[0]["fuel"] < fuelDestT) {
            faltaFuel = true;
        }
    }

    //las misiones son viables
    // añadir que no se puede transferir a una flota (solo atacar)
    for (dest = 1; dest < destinos.length; dest++) {
        var destAnt = dest - 1;
        var destPost = dest + 1;

        var orden = $("#ordenDest" + dest).val();
        destinos[dest].mision = orden;

        var hayErrorMision = false;

        if (orden != "") {
            var img = origenImagenes + "/flotas/" + orden + ".jpg";

            var ordenAnt = $("#ordenDest" + destAnt).val();
            var ordenPost = $("#ordenDest" + destPost).val();
            // no se puede llegar
            if (ordenAnt == "" || ordenAnt == "transferir" || ordenAnt == "recolectar" || ordenAnt == "orbitar" || ordenAnt == "extraer") {
                errores += " No se alcanzará destino " + dest;
                hayErrorMision = true;
            }

            // soy la ultima y debe ser de cierre
            if (ordenPost != undefined) {
                if ((ordenPost.length < 1 && orden != "transferir" && orden != "recolectar" && orden != "orbitar") || ordenAnt == "extraer") {
                    errores += " la misión del último destino no es transferir, orbitar,extraer o recolectar";
                    hayErrorMision = true;
                }
            }
            if (destinos.length == destPost) {
                if ((orden != "transferir" && orden != "recolectar" && orden != "orbitar") || ordenAnt == "extraer") {
                    errores += " la misión del último destino no es transferir, orbitar,extraer o recolectar";
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
        } else if  (dest==1 && orden == ""){
            errores += " ,sin misión";
            hayErrorMision = true;
        }
        else {
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

        if (faltaFuel) {
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

    if (faltaFuel) {
        errores += " Fuel insuficiente en origen";
    }

    //falta velocidad

    /// se puede enviar o no
    $("#botonEnviar").text("Enviar Flota");
    if (!sePuedeEnviar) {
        $("#botonEnviar").text(errores);
        $("#botonEnviar")
            .addClass("btn-danger")
            .removeClass("btn-success");

        $("#consumofuel1")
            .addClass("txt-danger")
            .removeClass("txt-warning");

        $("#botonEnviar").prop("disabled", true);
    } else {
        $("#botonEnviar")
            .removeClass("btn-danger")
            .addClass("btn-success");

        $("#consumofuel1")
            .removeClass("txt-danger")
            .addClass("txt-warning");
        $("#botonEnviar").prop("disabled", false);
    }


}

function NaveAflota(iddisenio, canti = 0) {
    var valnave = $.grep(valNaves, function(valor) {
        return valor.iddisenio == iddisenio;
    })[0];

    if (canti == "x") {
        valnave.enflota = 1 * $("#enflota" + iddisenio).val();
    } else if (canti == "m") {
        valnave.enflota = valnave.cantidad + valnave.enflota;
    } else {
        valnave.enflota = canti;
    }

    if (valnave.enhangar + valnave.enflota > valnave.cantidadT) {
        valnave.enflota = valnave.cantidadT - valnave.enhangar;
    }
    valnave.cantidad = valnave.cantidadT - valnave.enflota - valnave.enhangar;
    RecalculoTotal();
}

function NaveAhangar(iddisenio, canti = 0) {
    var valnave = $.grep(valNaves, function(valor) {
        return valor.iddisenio == iddisenio;
    })[0];

    if (canti == "x") {
        valnave.enhangar = 1 * $("#enhangar" + iddisenio).val();
    } else if (canti == "m") {
        valnave.enhangar = valnave.cantidad + valnave.enhangar;
    } else {
        valnave.enhangar = canti;
    }

    if (valnave.enhangar + valnave.enflota > valnave.cantidadT) {
        valnave.enhangar = valnave.cantidadT - valnave.enflota;
    }
    valnave.cantidad = valnave.cantidadT - valnave.enflota - valnave.enhangar;
    RecalculoTotal();
}

function Calculoespacitiempo() {
    if (valFlotaT.fuel > 0) {
        var dest;
        fuelDestT = 0;
        for (dest = 1; dest < destinos.length; dest++) {
            //$("#municion" + dest).val(valFlotaT.municion);
            destAnt = dest - 1;

            destinos[dest].estrella = $("#sistemaDest" + dest).val();
            destinos[dest].orbita = $("#planetaDest" + dest).val();

            var distancia = DistanciaUniverso(destinos[destAnt], destinos[dest]);
            if (isNaN(distancia) || destinos[dest].estrella == "") {
                NoSeMueve(dest);
            } else {
                var porcentVel = $("#porcentVDest" + dest).val() / 100;
                var fuelDest = GastoFuel(distancia, valFlotaT.fuel,porcentVel);
                destinos[dest].porcentVel = porcentVel * 100;

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
            fuelDestT += fuelDest;
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
    if(puedoCargarRecurso[dest]){
        var recur = Math.round(recursosDest[dest][res] - cargaDest[dest][res]);

        CargaActual(dest);
        hueco = Math.max(0, valFlotaT.carga - cargaDest[dest].total);
        if (recur < hueco) {
            acargar = recur;
        } else {
            acargar = hueco + cargaDest[dest][res];
        }
        $("#" + res + dest).val(formatNumber(acargar));
        var resto = Math.max(0, recur - acargar);
        $("#boton" + res + dest).text(formatNumber(resto));
        CargaActual(dest);//al final recapitula
        $("#botonenvias" + dest).text(formatNumber(cargaDest[dest].total));
    }
}

function TraerRecursos(sistema, planeta, dest) {

    if (sistema!="none"){
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

        var resto = 0;
        if (recursosDest[dest] != undefined) {
            var resto = Math.round(recursosDest[dest][res] - recur);
        }

        $("#boton" + res + dest).text(formatNumber(resto));
    });
    cargaDest[dest].total = cargatotal;
    //Avisos(); da error recursivo al llamarlo desde avisos
}

function ModificandoRecurso(dest, res) {
    var result = $("#" + res + dest)
        .val()
        .replace(/\./g, "");
    if ($.isNumeric(result)) {
        $("#" + res + dest).val(1 * result);
        CargaActual(dest);
    } else {
        $("#" + res + dest).val(0);
    }
    Avisos();
}

$(".prioridad").keyup(function() {
    var prioridadvalue = 1 * $("#" + this.id).val();

    if (!$.isNumeric(prioridadvalue)) {
        $("#" + this.id).val(0);
        return;
    }

    if (prioridadvalue > 15) {
        $("#" + this.id).val(15);
    }
    if (prioridadvalue < 0) {
        $("#" + this.id).val(0);
    }
});

function VaciarPrioridades(dest) {
    recursosArray.forEach(res => {
        $("#prioridad" + res + dest).val(prioridades[dest][res]);
    });
}

function NaveGeneralAFlota(canti){
    if (canti>0){
        navesEstacionadas.forEach(nave => {
            NaveAflota(nave.disenios_id,'m');
        });
    } else {
        navesEstacionadas.forEach(nave => {
            NaveAflota(nave.disenios_id,0);
        });
    }
}

function NaveGeneralAHangar(canti){
    if (canti>0){
        navesEstacionadas.forEach(nave => {
            NaveAhangar(nave.disenios_id,'m');
        });
    } else {
        navesEstacionadas.forEach(nave => {
            NaveAhangar(nave.disenios_id,0);
        });
    }
}

function enviarFlota() {
    if (errores.length > 0) {
        alert(errores);
    } else {
        flota.nombre= $("#nombreFlota").val();

        $.ajax({
            type: "post",
            dataType: "json",
            url: "/juego/flotas/enviarFlota",
            //contentType: 'application/json; charset=utf-8',
            data: { navesEstacionadas: navesEstacionadas, destinos: destinos,cargaDest: cargaDest,prioridades: prioridades,flota: flota },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            beforeSend: function() {
                $("#botonEnviar").prop("disabled", true);
                var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando....';
                $("#botonEnviar").html(spinner);
            },
            success: function(response) {
                $("#botonEnviar").text("Enviar Flota");
                $("#botonEnviar").prop("disabled", false);
                if (response.errores==""){
                    alert("Flota enviada");
                } else {
                    alert(response.errores);
                }

            },
            error: function(xhr, textStatus, thrownError) {
                $("#botonEnviar").text("Enviar Flota");
                $("#botonEnviar").prop("disabled", false);
                console.log("status", xhr.status);
                console.log("error", thrownError);
                //alert(data.errores);
            },
        });
    }
}

function formSuccess() {
    $("#msgSubmit").removeClass("hidden");
}




/////////////////////////////////////******************* FLOTAS EN VUELO ********************************** //////////////////////////////////



function verFlotasEnVuelo() {

    $.ajax({
        type: "GET",
        //dataType: "json",
        url: "/juego/flotas/verFlotasEnVuelo",
        //contentType: 'application/json; charset=utf-8',
        //data: { },
        //headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),  },
        beforeSend: function() {

        },
        success: function(data) {
            //alert(data);
            RellenarFlotasEnVUelo(data);
        },
        error: function(xhr, textStatus, thrownError) {
            console.log("status", xhr.status);
            console.log("error", thrownError);
            //alert(data.errores);
        },
    });

}

function RellenarFlotasEnVUelo(data){

    $("#tablaFlotasPropias").empty();
    //$("#tablaFlotasPropias").append("coco");

    var flotas= data["flotas"];

    var fila=0;
    flotas.forEach(flota => {

        if (flota!=null){
        fila++;
        progreso=Math.round(((flota['tvuelo']-flota['trestante'])/flota['tvuelo'])*100,0);
        ataque=formatNumber(1*flota['ataque']);
        defensa=formatNumber(1*flota['defensa']);
        trestante=formatHMS(1*flota['trestante']);
        tregreso=formatHMS(1*flota['tregreso']);
        //recursosCarga=flota['recursos']

        if (flota['tipo']=="propia"){

                var tablaFlotasPropias = `

                <table class="table table-borderless  col-12 rounded cajita  table-sm text-center anchofijo"
                    style="margin-top: 5px !important">
                    <tr class="col-12 text-primary" data-bs-toggle="collapse" data-bs-target="#info`+fila+`" aria-expanded="false"
                        aria-controls="info`+fila+`">
                        <div id="cuadro`+fila+`" class="">
                            <th colspan="2" class="text-success text-center borderless align-middle">
                                <big>`+flota['origen']+`<big>
                            </th>
                            <th colspan="2" class="text-success text-center borderless align-middle">
                                <big>`+flota['nombre']+`<big>
                            </th>
                            <th colspan="4" class="text-success text-center borderless align-middle">
                                <div class="progress-bar bg-success" role="progressbar" style="width: `+progreso+`%;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">`+progreso+`%</div>
                            </th>
                            <th colspan="2" class="text-success text-center borderless align-middle">
                                <big>`+flota['mision']+`<big>
                            </th>
                            <th colspan="3" class="text-success text-center borderless align-middle">
                                <big>`+flota['destino']+`<big>
                            </th>
                        </div>
                    </tr>
                    <tr id="info`+fila+`" class="accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        <td colspan="3" class="text-warning">tiempo restante: </td>
                        <td colspan="3" class="text-warning">tiempo regreso:</td>
                        <td colspan="3" class="text-warning">ataque:</td>
                        <td colspan="3" class="text-warning">defensa</td>
                    </tr>
                    <tr id="info`+fila+`" class=" accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        <td colspan="3" class="text-light">`+trestante+`</td>
                        <td colspan="3" class="text-light">`+tregreso+`</td>
                        <td colspan="3" class="text-light">`+ataque+`</td>
                        <td colspan="3" class="text-light">`+defensa+`</td>
                    </tr>
                    <tr id="info`+fila+`" class=" accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                    <td class="anchofijo text-warning">
                        Personal
                    </td>
                    <td class="anchofijo text-warning">
                        Mineral
                    </td>
                    <td class="anchofijo text-warning">
                        cristal
                    </td>
                    <td class="anchofijo text-warning">
                        Gas
                    </td>
                    <td class="anchofijo text-warning">
                        Plástico
                    </td>
                    <td class="anchofijo text-warning">
                        Cerámica
                    </td>
                    <td class="anchofijo text-warning">
                        Liquido
                    </td>
                    <td class="anchofijo text-warning">
                        Micros
                    </td>
                    <td class="anchofijo text-warning">
                        Fuel
                    </td>
                    <td class="anchofijo text-warning">
                        M-A
                    </td>
                    <td class="anchofijo text-warning">
                        Munición
                    </td>
                    <td class="anchofijo text-warning">
                        Creditos
                    </td>
                </tr>
                    <tr id="info`+fila+`" name="cargadest0`+fila+`" class=" accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['personal'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['mineral'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['cristal'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['gas'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['plastico'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['ceramica'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['liquido'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['micros'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['fuel'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['ma'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['municion'])+`
                        </td>
                        <td class="text-light">
                        `+formatNumber(1*flota['recursos']['creditos'])+`
                        </td>
                </tr>
                    <tr id="info`+fila+`" class="accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        <td colspan="4">
                            <a type="button" class="btn btn-outline-danger col-12 text-danger"
                                href="{{ url('juego/disenio/borrarDisenio/x') }}">
                                <i class="fa fa-times "></i> Regresar
                            </a>
                        </td>
                        <td colspan="5">
                            <a class="btn btn-outline-primary col-12 text-primary" type="button"
                            href="`+linkFlota+`/-1/-1/`+flota['numeroflota']+`">
                            Editar
                            </a>
                        </td>
                        <td colspan="4">
                        <a type="button" class="btn btn-outline-success col-12 text-success"
                            href="{{ url('juego/disenio/borrarDisenio/x') }}">
                            <i class="fa fa-eye "></i> Ver
                        </a>
                        </td>
                    </tr>

                </table>

                `;
                $("#tablaFlotasPropias").append(tablaFlotasPropias);
            }
        }

    });



}


