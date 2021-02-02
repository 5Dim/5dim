// Variables para el calculo de recursos
var recursos, produccion, almacenes, invProduccion;

// Popover
var popoverTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="popover"]')
);
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
});

// Tooltip
var tooltipTriggerList = [].slice.call(
    document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Select2
$.fn.select2.defaults.set("theme", "bootstrap4");

function sendConstruir(id, codigo, modal) {
    var personal = $("#personal" + codigo).val();
    window.location.href =
        "/juego/construccion/construir/" + id + "/" + personal + "/" + modal;
}

function sendReciclar(id, codigo) {
    var personal = $("#personal" + codigo).val();
    window.location.href =
        "/juego/construccion/reciclar/" + id + "/" + personal;
}

function sendCancelar(id) {
    window.location.href = "/juego/construccion/cancelar/" + id;
}

function sendIndustria(industria) {
    window.location.href = "/juego/construccion/industria/" + industria;
}

function sendInvestigar(id, codigo, tab) {
    var personal = $("#personal" + codigo).val();
    window.location.href =
        "/juego/investigacion/construir/" + id + "/" + personal + "/" + tab;
}

function sendCancelarInvestigacion(id) {
    window.location.href = "/juego/investigacion/cancelar/" + id;
}

function sendDesbloquear(id, tab) {
    window.location.href = "/juego/fuselajes/desbloquear/" + id + "/" + tab;
}

function sendDiseniar(id) {
    window.location.href = "/juego/disenio/diseniar/" + id;
}

function construirDisenio(id) {
    var cantidad = $("#disenio" + id).val();
    window.location.href = "/juego/fabricar/construir/" + id + "/" + cantidad;
}

function reciclarDisenio(id) {
    var cantidad = $("#disenio" + id).val();
    window.location.href = "/juego/fabricar/reciclar/" + id + "/" + cantidad;
}

function sendCancelarDisenio(id) {
    window.location.href = "/juego/fabricar/cancelar/" + id;
}

function formatTimestamp(timestamp) {
    if (timestamp > 0) {
        lhora = Math.floor(timestamp / 3600);
        lminuto = Math.floor((timestamp - lhora * 3600) / 60);
        lsegundo = Math.floor(timestamp - (lhora * 3600 + lminuto * 60));

        horaImprimible = lhora + ":" + lminuto + ":" + lsegundo + "";
    }
    return horaImprimible;
}

function calcularRecursos() {
    //Parse float
    recursos.personal = parseFloat(recursos.personal);
    recursos.mineral = parseFloat(recursos.mineral);
    recursos.cristal = parseFloat(recursos.cristal);
    recursos.gas = parseFloat(recursos.gas);
    recursos.plastico = parseFloat(recursos.plastico);
    recursos.ceramica = parseFloat(recursos.ceramica);
    recursos.liquido = parseFloat(recursos.liquido);
    recursos.micros = parseFloat(recursos.micros);
    recursos.fuel = parseFloat(recursos.fuel);
    recursos.ma = parseFloat(recursos.ma);
    recursos.municion = parseFloat(recursos.municion);
    //Calculos
    recursos.personal += produccion.personal / 3600 / 4;
    recursos.mineral += produccion.mineral / 3600 / 4;
    recursos.cristal += produccion.cristal / 3600 / 4;
    recursos.gas += produccion.gas / 3600 / 4;
    recursos.plastico += produccion.plastico / 3600 / 4;
    recursos.ceramica += produccion.ceramica / 3600 / 4;
    recursos.liquido += produccion.liquido / 3600 / 4;
    recursos.micros += produccion.micros / 3600 / 4;
    recursos.fuel += produccion.fuel / 3600 / 4;
    recursos.ma += produccion.ma / 3600 / 4;
    recursos.municion += produccion.municion / 3600 / 4;
    recursos.creditos += produccion.creditos / 24 / 3600 / 4;

    //Insertar
    $("#personal").text(Math.trunc(recursos.personal).toLocaleString("es"));
    $("#mineral").text(Math.trunc(recursos.mineral).toLocaleString("es"));
    $("#cristal").text(Math.trunc(recursos.cristal).toLocaleString("es"));
    $("#creditos").text(Math.trunc(recursos.creditos).toLocaleString("es"));

    //Comprobar almacenes
    var counter = 0;
    if (recursos.gas >= almacenes[counter].capacidad) {
        $("#gas").addClass("text-danger");
        $("#gas").text(
            Math.trunc(almacenes[counter].capacidad).toLocaleString("es")
        );
    } else if (recursos.gas <= 0) {
        $("#gas").addClass("text-info");
        $("#gas").text(0);
    } else {
        $("#gas").text(Math.trunc(recursos.gas).toLocaleString("es"));
    }
    counter++;
    if (recursos.plastico >= almacenes[counter].capacidad) {
        $("#plastico").addClass("text-danger");
        $("#plastico").text(
            Math.trunc(almacenes[counter].capacidad).toLocaleString("es")
        );
    } else if (recursos.plastico <= 0) {
        $("#plastico").addClass("text-info");
        $("#plastico").text(0);
    } else {
        $("#plastico").text(Math.trunc(recursos.plastico).toLocaleString("es"));
    }
    counter++;
    if (recursos.ceramica >= almacenes[counter].capacidad) {
        $("#ceramica").addClass("text-danger");
        $("#ceramica").text(
            Math.trunc(almacenes[counter].capacidad).toLocaleString("es")
        );
    } else if (recursos.ceramica <= 0) {
        $("#ceramica").addClass("text-info");
        $("#ceramica").text(0);
    } else {
        $("#ceramica").text(Math.trunc(recursos.ceramica).toLocaleString("es"));
    }
    counter++;
    if (recursos.liquido >= almacenes[counter].capacidad) {
        $("#liquido").addClass("text-danger");
        $("#liquido").text(
            Math.trunc(almacenes[counter].capacidad).toLocaleString("es")
        );
    } else if (recursos.liquido <= 0) {
        $("#liquido").addClass("text-info");
        $("#liquido").text(0);
    } else {
        $("#liquido").text(Math.trunc(recursos.liquido).toLocaleString("es"));
    }
    counter++;
    if (recursos.micros >= almacenes[counter].capacidad) {
        $("#micros").addClass("text-danger");
        $("#micros").text(
            Math.trunc(almacenes[counter].capacidad).toLocaleString("es")
        );
    } else if (recursos.micros <= 0) {
        $("#micros").addClass("text-info");
        $("#micros").text(0);
    } else {
        $("#micros").text(Math.trunc(recursos.micros).toLocaleString("es"));
    }
    counter++;
    if (recursos.fuel >= almacenes[counter].capacidad) {
        $("#fuel").addClass("text-danger");
        $("#fuel").text(
            Math.trunc(almacenes[counter].capacidad).toLocaleString("es")
        );
    } else if (recursos.fuel <= 0) {
        $("#fuel").addClass("text-info");
        $("#fuel").text(0);
    } else {
        $("#fuel").text(Math.trunc(recursos.fuel).toLocaleString("es"));
    }
    counter++;
    if (recursos.ma >= almacenes[counter].capacidad) {
        $("#ma").addClass("text-danger");
        $("#ma").text(
            Math.trunc(almacenes[counter].capacidad).toLocaleString("es")
        );
    } else if (recursos.ma <= 0) {
        $("#ma").addClass("text-info");
        $("#ma").text(0);
    } else {
        $("#ma").text(Math.trunc(recursos.ma).toLocaleString("es"));
    }
    counter++;
    if (recursos.municion >= almacenes[counter].capacidad) {
        $("#municion").addClass("text-danger");
        $("#municion").text(
            Math.trunc(almacenes[counter].capacidad).toLocaleString("es")
        );
    } else if (recursos.municion <= 0) {
        $("#municion").addClass("text-info");
        $("#municion").text(0);
    } else {
        $("#municion").text(Math.trunc(recursos.municion).toLocaleString("es"));
    }
}

function activarIntervalo(recEntrantes, almEntrante, proEntrante, intervalo) {
    recursos = recEntrantes;
    produccion = proEntrante;
    almacenes = almEntrante;
    setInterval(calcularRecursos, intervalo);
}

function calculaCosteTotal(costes) {
    var total = 0;
    total += costes.mineral;
    total += costes.cristal;
    total += costes.gas;
    total += costes.plastico;
    total += costes.ceramica;
    total += costes.liquido;
    total += costes.micros;
    total += costes.fuel || 0;
    total += costes.ma || 0;
    total += costes.municion || 0;
    // total += 12;
    return total;
}

function calculaTiempo(costes, velocidadConst, codigo) {
    var precioTotal = calculaCosteTotal(costes);
    premiun = 0;
    personal = $("#personal" + codigo).val();
    horaImprimible = "";
    if (personal > 1) {
        result = (precioTotal * velocidadConst) / personal;
        result = result - premiun * 5 * 60;
        if (result < 1) {
            result = 0;
        }
        lhora = Math.floor(result / 3600);
        lminuto = Math.floor((result - lhora * 3600) / 60);
        lsegundo = Math.floor(result - (lhora * 3600 + lminuto * 60));

        horaImprimible =
            "Tiempo: " + lhora + "h " + lminuto + "m " + lsegundo + "s";

        $("#tiempo" + codigo).html(horaImprimible);
        timeg(result, "termina" + codigo);
    } else {
        $("#tiempo" + codigo).html(horaImprimible);
    }
}

function mostrarTab(tab) {
    if (!!tab) {
        var tabSelected = document.querySelector("#" + tab);
        var tab = new bootstrap.Tab(tabSelected);

        tab.show();
    }
}

function calculaTiempoInvestigacion(
    costes,
    velocidadInvest,
    dnd,
    nivel,
    nivelLaboratorio
) {
    var precioTotal = calculaCosteTotal(costes);
    premiun = 0;
    personal = $("#personal" + dnd).val();
    horaImprimible = "";
    nivel++;
    velocidadInvest *= 100;
    if (personal > 0 && nivelLaboratorio > 0) {
        result =
            velocidadInvest *
            nivel *
            (precioTotal / (personal * nivelLaboratorio));
        // result = result - premiun * 5 * 60;
        if (result < 1) {
            result = 0;
        }
        lhora = Math.floor(result / 3600);
        lminuto = Math.floor((result - lhora * 3600) / 60);
        lsegundo = Math.floor(result - (lhora * 3600 + lminuto * 60));

        horaImprimible =
            "Tiempo: " + lhora + "h " + lminuto + "m " + lsegundo + "s";
        $("#tiempo" + dnd).html(horaImprimible);
        timeg(result, "termina" + dnd);
    } else {
        $("#tiempo" + dnd).html(horaImprimible);
    }
}

function timeg(yqmas, dndv) {
    /// da tiempo final desde ahora aniadiendole yqmas y lo pone en hastacuando'+dndv

    var d = new Date();
    var diftime = yqmas; // hora espania UTC +3600

    days = diftime / (3600 * 24);

    milisegundos = parseInt(24 * 60 * 60 * 1000);
    fecha = new Date();
    day = fecha.getDate();
    // el mes es devuelto entre 0 y 11
    month = fecha.getMonth() + 1;
    year = fecha.getFullYear();
    diadehoy = day;

    //Obtenemos los milisegundos desde media noche del 1/1/1970
    tiempot = fecha.getTime();
    //Calculamos los milisegundos sobre la fecha que hay que sumar o restar...
    milisegundos = parseInt(days * 24 * 60 * 60 * 1000);
    //Modificamos la fecha actual
    total = fecha.setTime(tiempot + milisegundos);
    day = fecha.getDate();
    //month=fecha.getMonth()+1;
    //year=fecha.getFullYear();
    hora = fecha.getHours();
    minuto = fecha.getMinutes();

    if (minuto < 10) {
        minuto = "0" + minuto;
    }

    resultg = "Día " + day + " a las " + hora + ":" + minuto;

    if (diadehoy == day && yqmas < 24 * 3600) {
        resultg = "Hoy a las " + hora + ":" + minuto;
    }
    if (diadehoy == day - 1 && yqmas < 48 * 3600) {
        resultg = "Maniana a las " + hora + ":" + minuto;
    }

    $("#" + dndv).html(resultg);
}

function timeDura(result, dndv) {
    /// da tiempo en formato y lo imprime en dnv

    if (result < 1) {
        result = 0;
    }
    lhora = Math.floor(result / 3600);
    lminuto = Math.floor((result - lhora * 3600) / 60);
    lsegundo = Math.floor(result - (lhora * 3600 + lminuto * 60));

    horaImprimible = lhora + "h " + lminuto + "m " + lsegundo + "s";

    $("#" + dndv).html(horaImprimible);
}

function mostrarDatosConstruccion(codigo) {
    $.ajax({
        method: "GET",
        url: "/juego/construccion/datos/" + codigo,
        success: function (data) {
            $("#datosContenido").html(data.descripcionConstruccion);
            $("#ModalTitulo").html(data.nombreConstruccion);
        },
    });
}

function mostrarDatosInvestigacion(codigo) {
    $.ajax({
        method: "GET",
        url: "/juego/investigacion/datos/" + codigo,
        success: function (data) {
            $("#datosContenido").html(data.descripcionInvestigacion);
            $("#ModalTitulo").html(data.nombreInvestigacion);
        },
    });
}

function mostrarDatosFuselaje(codigo) {
    $.ajax({
        method: "GET",
        url: "/juego/fuselajes/datos/" + codigo,
        success: function (data) {
            $("#datosContenido").html(data.descripcionInvestigacion);
            $("#ModalTitulo").html(data.nombreInvestigacion);
        },
    });
}

function changeSkin(id) {
    /// cambia la skin de las naves en fuselajes

    eval("imagen=imagen" + id + ";");
    sumask = 1 + 1 * imagen.dataset.skin;

    if (sumask > 4) {
        sumask = 1;
    }
    imagen.dataset.skin = sumask;
    img =
        "background: url('/img/fotos naves/skin" +
        sumask +
        "/nave" +
        id +
        ".jpg') no-repeat center !important;";
    // $('#imagen' + id).attr("src", img);
    $("#tablaArmas").prop("style", img);
}

function formatNumber(num, prefix) {
    prefix = prefix || "";
    num += "";
    var splitStr = num.split(".");
    var splitLeft = splitStr[0];
    var splitRight = splitStr.length > 1 ? "." + splitStr[1] : "";
    var regx = /(\d+)(\d{3})/;
    while (regx.test(splitLeft)) {
        splitLeft = splitLeft.replace(regx, "$1" + "." + "$2");
    }
    return prefix + splitLeft + splitRight;
}

function recalculaCostos(id) {
    if (Number.isInteger($("#disenio" + id).val() * 1)) {
        console.log(id);
        var cantidad = Math.round($("#disenio" + id).val());
        disenio = $.grep(disenios, function (obj) {
            return obj.id == id;
        })[0];
        factor = cadenaProduccion(cantidad, 1);

        $("#mineral" + id).text(
            formatNumber(
                Math.round(factor * cantidad * disenio["costes"]["mineral"])
            )
        );
        $("#cristal" + id).text(
            formatNumber(
                Math.round(factor * cantidad * disenio["costes"]["cristal"])
            )
        );
        $("#gas" + id).text(
            formatNumber(
                Math.round(factor * cantidad * disenio["costes"]["gas"])
            )
        );
        $("#plastico" + id).text(
            formatNumber(
                Math.round(factor * cantidad * disenio["costes"]["plastico"])
            )
        );
        $("#ceramica" + id).text(
            formatNumber(
                Math.round(factor * cantidad * disenio["costes"]["ceramica"])
            )
        );
        $("#liquido" + id).text(
            formatNumber(
                Math.round(factor * cantidad * disenio["costes"]["liquido"])
            )
        );
        $("#micros" + id).text(
            formatNumber(
                Math.round(factor * cantidad * disenio["costes"]["micros"])
            )
        );
        $("#personal" + id).text(
            formatNumber(
                Math.round(factor * cantidad * disenio["costes"]["personal"])
            )
        );
    }
}

function cadenaProduccion(cantidad, tamanio) {
    ahorroXCantidad = $.grep(PConstantes, function (obj) {
        return obj.codigo == "ahorroXCantidad";
    })[0]["valor"];
    maximoAhorroXCantidad = $.grep(PConstantes, function (obj) {
        return obj.codigo == "maximoAhorroXCantidad";
    })[0]["valor"];

    var factorTamanio = 100;

    switch (tamanio) {
        case 0:
        case 8: //caza
            factorTamanio =
                $.grep(PConstantes, function (obj) {
                    return obj.codigo == "AhorroXcazas";
                })[0]["valor"] / 100;
            break;
        case 1:
        case 9:
            factorTamanio =
                $.grep(PConstantes, function (obj) {
                    return obj.codigo == "AhorroXligeras";
                })[0]["valor"] / 100;
            break;
        case 2:
        case 10:
            factorTamanio =
                $.grep(PConstantes, function (obj) {
                    return obj.codigo == "AhorroXmedias";
                })[0]["valor"] / 100;
            break;
        case 3:
        case 11:
            factorTamanio =
                $.grep(PConstantes, function (obj) {
                    return obj.codigo == "AhorroXpesadas";
                })[0]["valor"] / 100;
            break;
        case 4:
        case 5:
            factorTamanio =
                $.grep(PConstantes, function (obj) {
                    return obj.codigo == "AhorroXestaciones";
                })[0]["valor"] / 100;
            break;
        case 6:
            factorTamanio =
                $.grep(PConstantes, function (obj) {
                    return obj.codigo == "AhorroXdefensa";
                })[0]["valor"] / 100;
            break;
    }

    factor =
        1 -
        (Math.pow(cantidad, 2) * 1) /
            (ahorroXCantidad * 100000) /
            factorTamanio;
    if (factor < maximoAhorroXCantidad) {
        factor = maximoAhorroXCantidad;
    }
    if (factor > 1) {
        factor = 1;
    }
    if (cantidad == 1) {
        factor = 1;
    }

    return factor;
}
