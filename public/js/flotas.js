valFlotaT = [];

fueraH = [];
dentroH = [];
capacidadH = [];
tablaHangares = [];
tablaHangares.fueraH = fueraH;
tablaHangares.dentroH = dentroH;
tablaHangares.capacidadH = capacidadH;

CargarValoresPlaneta();

// carga de valores
function CargarValoresPlaneta() {
    navesEstacionadas.forEach((nave) => {
        var diseno = $.grep(diseniosJugador, function (valorBase) {
            return valorBase.id == nave.id;
        })[0];
        MostrarResultadoDisenio(diseno);
        valNaves[nave.id].nombre = diseno.nombre;
        valNaves[nave.id].cantidad = nave.cantidad;
        valNaves[nave.id].cantidadT = nave.cantidad; //es constante
        valNaves[nave.id].enflota = 0;
        valNaves[nave.id].enhangar = 0;
        valNaves[nave.id].tamanio = diseno.tamanio;

        $("#nombre" + nave.id).text(diseno.nombre);
    });

    RecalculoTotal();
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
    tamaniosArray.forEach((tamanio) => {
        tablaHangares.capacidadH[tamanio] = 0;
        tablaHangares.fueraH[tamanio] = 0;
        tablaHangares.dentroH[tamanio] = 0;
    });

    ///CALCULO
    // naves
    navesEstacionadas.forEach((nave) => {
        cantidad = valNaves[nave.id].cantidad;
        aflota = valNaves[nave.id].enflota;
        ahangar = valNaves[nave.id].enhangar;
        atotal = aflota + ahangar;

        if (atotal > 0) {
            valFlotaT.carga += valNaves[nave.id].carga * atotal;
            valFlotaT.municion += valNaves[nave.id].municion * atotal;
            valFlotaT.fuel += valNaves[nave.id].fuel * aflota;
            if (aflota > 0) {
                valFlotaT.velocidad = Math.min(
                    valNaves[nave.id].velocidad,
                    valFlotaT.velocidad
                );
                valFlotaT.maniobra = Math.min(
                    valNaves[nave.id].maniobra,
                    valFlotaT.maniobra
                );
            }
            valFlotaT.ataqueR += valNaves[nave.id].ataque * atotal;
            valFlotaT.defensaR += valNaves[nave.id].defensa * atotal;
            valFlotaT.ataqueV += valNaves[nave.id].ataque * aflota;
            valFlotaT.defensaV += valNaves[nave.id].defensa * aflota;

            //hangares

            tamaniosArray.forEach((tamaniod) => {
                tablaHangares.capacidadH[tamaniod] +=
                    atotal * valNaves[nave.id][tamaniod];
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

    tamaniosArray.forEach((tamanio) => {
        $("#capacidadH" + tamanio).text(
            formatNumber(tablaHangares.capacidadH[tamanio])
        );
        $("#dentroH" + tamanio).text(
            formatNumber(tablaHangares.dentroH[tamanio])
        );
        $("#fueraH" + tamanio).text(
            formatNumber(tablaHangares.fueraH[tamanio])
        );
    });

    var idd;
    for (idd = 1; idd < destinos.length; idd++) {
        Calculoespacitiempo(idd);
    }

    Avisos();
}

var errores = "";

function Avisos() {
    var errorHangares = false;
    errores = "";

    tamaniosArray.forEach((tamanio) => {
        if (
            tablaHangares.dentroH[tamanio] > tablaHangares.capacidadH[tamanio]
        ) {
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
        $("#capacidadH").addClass("text-danger").removeClass("text-warning");

        //pintando caja ahangar por nave
        navesEstacionadas.forEach((nave) => {
            var tcarga = tamaniosNaveAcarga[valNaves[nave.id].tamanio];
            if (
                valNaves[nave.id].enhangar > 0 &&
                tablaHangares.dentroH[tcarga] > 0
            ) {
                $("#selectahangar" + nave.id).addClass("bg-danger");
            } else {
                $("#selectahangar" + nave.id).removeClass("bg-danger");
            }
        });
    } else {
        $("#capacidadH").removeClass("text-danger").addClass("text-warning");
        navesEstacionadas.forEach((nave) => {
            $("#selectahangar" + nave.id).removeClass("bg-danger");
        });
    }
}

function NaveAflota(id, canti = 0) {
    if (canti == "x") {
        valNaves[id].enflota = 1 * $("#enflota" + id).val();
    } else if (canti == "m") {
        valNaves[id].enflota = valNaves[id].cantidad;
    } else {
        valNaves[id].enflota = canti;
    }

    if (valNaves[id].enhangar + valNaves[id].enflota > valNaves[id].cantidadT) {
        valNaves[id].enflota = valNaves[id].cantidadT - valNaves[id].enhangar;
    }
    valNaves[id].cantidad =
        valNaves[id].cantidadT - valNaves[id].enflota - valNaves[id].enhangar;
    RecalculoTotal();
}

function NaveAhangar(id, canti = 0) {
    if (canti == "x") {
        valNaves[id].enhangar = 1 * $("#enhangar" + id).val();
    } else if (canti == "m") {
        valNaves[id].enhangar = valNaves[id].cantidad;
    } else {
        valNaves[id].enhangar = canti;
    }

    if (valNaves[id].enhangar + valNaves[id].enflota > valNaves[id].cantidadT) {
        valNaves[id].enhangar = valNaves[id].cantidadT - valNaves[id].enflota;
    }
    valNaves[id].cantidad =
        valNaves[id].cantidadT - valNaves[id].enflota - valNaves[id].enhangar;
    RecalculoTotal();
}

function Calculoespacitiempo(dest) {
    if (valFlotaT.fuel > 0) {
        destAnt = dest - 1;

        if (dest > 1) {
            destinos[destAnt].sistema = $("#sistemaDest" + destAnt).val();
            destinos[destAnt].planeta = $("#planetaDest" + destAnt).val();
        }

        destinos[dest].sistema = $("#sistemaDest" + dest).val();
        destinos[dest].planeta = $("#planetaDest" + dest).val();

        var distancia = DistanciaUniverso(destinos[destAnt], destinos[dest]);
        if (isNaN(distancia)) {
            NoSeMueve(dest);
        } else {
            var porcentVel = $("#porcentVDest" + dest).val() / 100;
            var fuelDest = GastoFuel(distancia, valFlotaT.fuel);

            if (distancia < 10) {
                $("#tipovelocidad" + dest).text("Vel. Impulso");
                $("#velocidadDest" + dest).text(
                    formatNumber(Math.round(valFlotaT.maniobra * porcentVel))
                );
                if (valFlotaT.maniobra < 1) {
                    NoSeMueve(dest);
                } else {
                    var tiempoDest = TiempoLLegada(
                        distancia,
                        valFlotaT.maniobra * porcentVel
                    );
                    SiSeMueve(dest, fuelDest, tiempoDest);
                }
            } else {
                $("#tipovelocidad" + dest).text("Hypervelocidad");
                $("#velocidadDest" + dest).text(
                    formatNumber(Math.round(valFlotaT.velocidad * porcentVel))
                );
                if (valFlotaT.velocidad < 1) {
                    NoSeMueve(dest);
                } else {
                    var tiempoDest = TiempoLLegada(
                        distancia,
                        valFlotaT.velocidad * porcentVel
                    );
                    SiSeMueve(dest, fuelDest, tiempoDest);
                }
            }
        }
    } else {
        NoSeMueve(dest);
    }
}

function NoSeMueve(dest) {
    $("#fuelDest" + dest).text("-");
    $("#tiempoDest" + dest).text("-");
}

function SiSeMueve(dest, fuelDest, tiempoDest) {
    $("#fuelDest" + dest).text(formatNumber(fuelDest));
    $("#tiempoDest" + dest).text(formatTimestamp(tiempoDest));
}
