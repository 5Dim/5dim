// Variables para el calculo de recursos
var recursos, produccion, almacenes, invProduccion;
var timers = [];

// Popover
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl);
});
// var popover = new bootstrap.Popover(document.querySelector(".popover-dismiss"), {
//     trigger: "focus",
// });

// Tooltip
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Select2
$.fn.select2.defaults.set("theme", "bootstrap4");

function sendConstruir(id, codigo, modal) {
    var personal = $("#personal" + codigo).val();
    if (personal == "") {
        personal = 0;
    }
    window.location.href = "/juego/construccion/construir/" + id + "/" + personal + "/" + modal;
}

function sendReciclar(id, codigo) {
    var personal = $("#personal" + codigo).val();
    window.location.href = "/juego/construccion/reciclar/" + id + "/" + personal;
}

function sendCancelar(id) {
    window.location.href = "/juego/construccion/cancelar/" + id;
}

function sendIndustria(industria) {
    window.location.href = "/juego/construccion/industria/" + industria;
}

function sendInvestigar(id, codigo, tab) {
    var personal = $("#personal" + codigo).val();
    window.location.href = "/juego/investigacion/construir/" + id + "/" + personal + "/" + tab;
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

function sendRenombrarColonia() {
    let nombre = $("#nombreColonia").val();
    window.location.href = "/juego/renombrarPlaneta/" + nombre;
}

function sendMoverColonia() {
    let sistema = $("#localizacion").val();
    window.location.href = "/juego/moverPlaneta/" + sistema;
}

function sendCederColonia() {
    let idJugador = $("#listaJugadores").val();
    window.location.href = "/juego/cederColonia/" + idJugador;
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
        $("#gas").text(Math.trunc(almacenes[counter].capacidad).toLocaleString("es"));
    } else if (recursos.gas <= 0) {
        $("#gas").addClass("text-info");
        $("#gas").text(0);
    } else {
        $("#gas").text(Math.trunc(recursos.gas).toLocaleString("es"));
    }
    counter++;
    if (recursos.plastico >= almacenes[counter].capacidad) {
        $("#plastico").addClass("text-danger");
        $("#plastico").text(Math.trunc(almacenes[counter].capacidad).toLocaleString("es"));
    } else if (recursos.plastico <= 0) {
        $("#plastico").addClass("text-info");
        $("#plastico").text(0);
    } else {
        $("#plastico").text(Math.trunc(recursos.plastico).toLocaleString("es"));
    }
    counter++;
    if (recursos.ceramica >= almacenes[counter].capacidad) {
        $("#ceramica").addClass("text-danger");
        $("#ceramica").text(Math.trunc(almacenes[counter].capacidad).toLocaleString("es"));
    } else if (recursos.ceramica <= 0) {
        $("#ceramica").addClass("text-info");
        $("#ceramica").text(0);
    } else {
        $("#ceramica").text(Math.trunc(recursos.ceramica).toLocaleString("es"));
    }
    counter++;
    if (recursos.liquido >= almacenes[counter].capacidad) {
        $("#liquido").addClass("text-danger");
        $("#liquido").text(Math.trunc(almacenes[counter].capacidad).toLocaleString("es"));
    } else if (recursos.liquido <= 0) {
        $("#liquido").addClass("text-info");
        $("#liquido").text(0);
    } else {
        $("#liquido").text(Math.trunc(recursos.liquido).toLocaleString("es"));
    }
    counter++;
    if (recursos.micros >= almacenes[counter].capacidad) {
        $("#micros").addClass("text-danger");
        $("#micros").text(Math.trunc(almacenes[counter].capacidad).toLocaleString("es"));
    } else if (recursos.micros <= 0) {
        $("#micros").addClass("text-info");
        $("#micros").text(0);
    } else {
        $("#micros").text(Math.trunc(recursos.micros).toLocaleString("es"));
    }
    counter++;
    if (recursos.fuel >= almacenes[counter].capacidad) {
        $("#fuel").addClass("text-danger");
        $("#fuel").text(Math.trunc(almacenes[counter].capacidad).toLocaleString("es"));
    } else if (recursos.fuel <= 0) {
        $("#fuel").addClass("text-info");
        $("#fuel").text(0);
    } else {
        $("#fuel").text(Math.trunc(recursos.fuel).toLocaleString("es"));
    }
    counter++;
    if (recursos.ma >= almacenes[counter].capacidad) {
        $("#ma").addClass("text-danger");
        $("#ma").text(Math.trunc(almacenes[counter].capacidad).toLocaleString("es"));
    } else if (recursos.ma <= 0) {
        $("#ma").addClass("text-info");
        $("#ma").text(0);
    } else {
        $("#ma").text(Math.trunc(recursos.ma).toLocaleString("es"));
    }
    counter++;
    if (recursos.municion >= almacenes[counter].capacidad) {
        $("#municion").addClass("text-danger");
        $("#municion").text(Math.trunc(almacenes[counter].capacidad).toLocaleString("es"));
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
        result = precioTotal * velocidadConst / personal;
        if (result < 1) {
            result = 0;
        }

        let mucho = "text-danger";
        let medio = "text-warning";
        let poco = "text-success";
        if (result > 3600 * 100) {
            $("#tiempo" + codigo).removeClass(poco);
            $("#tiempo" + codigo).removeClass(medio);
            $("#tiempo" + codigo).addClass(mucho);
            $("#termina" + codigo).removeClass(poco);
            $("#termina" + codigo).removeClass(medio);
            $("#termina" + codigo).addClass(mucho);
        } else if (result > 3600 * 15) {
            $("#tiempo" + codigo).removeClass(poco);
            $("#tiempo" + codigo).addClass(medio);
            $("#tiempo" + codigo).removeClass(mucho);
            $("#termina" + codigo).removeClass(poco);
            $("#termina" + codigo).addClass(medio);
            $("#termina" + codigo).removeClass(mucho);
        } else {
            $("#tiempo" + codigo).addClass(poco);
            $("#tiempo" + codigo).removeClass(medio);
            $("#tiempo" + codigo).removeClass(mucho);
            $("#termina" + codigo).addClass(poco);
            $("#termina" + codigo).removeClass(medio);
            $("#termina" + codigo).removeClass(mucho);
        }
        timeDura(result, "tiempo" + codigo);
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

function calculaTiempoInvestigacion(costes, velocidadInvest, dnd, nivel, nivelLaboratorio) {
    var precioTotal = calculaCosteTotal(costes);
    premiun = 0;
    personal = $("#personal" + dnd).val();
    horaImprimible = "";
    nivel++;
    velocidadInvest *= 100;
    if (personal > 0 && nivelLaboratorio > 0) {
        result = velocidadInvest * nivel * (precioTotal / (personal * nivelLaboratorio));
        if (result < 1) {
            result = 0;
        }
        let mucho = "text-danger";
        let medio = "text-warning";
        let poco = "text-success";
        if (result > 3600 * 100) {
            $("#tiempo" + dnd).removeClass(poco);
            $("#tiempo" + dnd).removeClass(medio);
            $("#tiempo" + dnd).addClass(mucho);
            $("#termina" + dnd).removeClass(poco);
            $("#termina" + dnd).removeClass(medio);
            $("#termina" + dnd).addClass(mucho);
        } else if (result > 3600 * 15) {
            $("#tiempo" + dnd).removeClass(poco);
            $("#tiempo" + dnd).addClass(medio);
            $("#tiempo" + dnd).removeClass(mucho);
            $("#termina" + dnd).removeClass(poco);
            $("#termina" + dnd).addClass(medio);
            $("#termina" + dnd).removeClass(mucho);
        } else {
            $("#tiempo" + dnd).addClass(poco);
            $("#tiempo" + dnd).removeClass(medio);
            $("#tiempo" + dnd).removeClass(mucho);
            $("#termina" + dnd).addClass(poco);
            $("#termina" + dnd).removeClass(medio);
            $("#termina" + dnd).removeClass(mucho);
        }
        timeDura(result, "tiempo" + dnd);
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
        resultg = "Mañana a las " + hora + ":" + minuto;
    }

    $("#" + dndv).html(resultg);
}

function timeDura(result, dndv) {
    /// da tiempo en formato y lo imprime en dnv

    if (result < 1) {
        result = 0;
    }

    horaImprimible = formatHMS(result);

    $("#" + dndv).html(horaImprimible);
}

function formatHMS(secs) {
    var sec_num = parseInt(secs, 10);
    var hours = Math.floor(sec_num / 3600);
    var minutes = Math.floor(sec_num / 60) % 60;
    var seconds = sec_num % 60;

    return [hours, minutes, seconds].map(v => (v < 10 ? "0" + v : v)).join(":");
}

function difTiempos(start, end, formateado = true) {
    start = start.replaceAll("-", ":");
    start = start.replaceAll(" ", ":");
    start = start.split(":");
    end = end.replaceAll("-", ":");
    end = end.replaceAll(" ", ":");
    end = end.split(":");
    var startDate = new Date(start[0], start[1], start[2], start[3], start[4], start[5]);
    var endDate = new Date(end[0], end[1], end[2], end[3], end[4], end[5]);
    var diff = Math.abs((endDate.getTime() - startDate.getTime()) / 1000);
    if (formateado) {
        return formatHMS(diff);
    } else {
        return diff;
    }
}

function mostrarDatosConstruccion(codigo) {
    $.ajax({
        method: "GET",
        url: "/juego/construccion/datos/" + codigo,
        success: function(data) {
            $("#datosContenido").html(data.descripcionConstruccion);
            $("#ModalTitulo").html(data.nombreConstruccion);
        },
    });
}

function mostrarDatosInvestigacion(codigo) {
    $.ajax({
        method: "GET",
        url: "/juego/investigacion/datos/" + codigo,
        success: function(data) {
            $("#datosContenido").html(data.descripcionInvestigacion);
            $("#ModalTitulo").html(data.nombreInvestigacion);
        },
    });
}

function mostrarDatosFuselaje(codigo) {
    $.ajax({
        method: "GET",
        url: "/juego/fuselajes/datos/" + codigo,
        success: function(data) {
            $("#datosContenido").html(data.descripcionInvestigacion);
            $("#ModalTitulo").html(data.nombreInvestigacion);
        },
    });
}

function changeSkin(id) {
    /// cambia la skin de las naves en fuselajes

    eval("imagen=imagen" + id + ";");
    sumask = 1 + 1 * imagen.dataset.skin;

    if (sumask > 2) {
        sumask = 1;
    }
    imagen.dataset.skin = sumask;
    img = "background: url('/img/fotos naves/skin" + sumask + "/nave" + id + ".png') no-repeat center !important;";
    // $('#imagen' + id).attr("src", img);
    $("#tablaArmas").prop("style", img);
}

function formatNumber(num, prefix) {
    if (num == "nada") {
        //si queremos que el retorno sea nada
        return "";
    }
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

function recalculaCostos(id, coste) {
    var cantidad = Math.round($("#disenio" + id).val());
    disenio = $.grep(disenios, function(obj) {
        return obj.id == id;
    })[0];
    factor = 1; // factor por cantidad producida

    // Recursos
    $("#mineral" + id).text(formatNumber(Math.round(factor * cantidad * coste.mineral)));
    $("#cristal" + id).text(formatNumber(Math.round(factor * cantidad * coste.cristal)));
    $("#gas" + id).text(formatNumber(Math.round(factor * cantidad * coste.gas)));
    $("#plastico" + id).text(formatNumber(Math.round(factor * cantidad * coste.plastico)));
    $("#ceramica" + id).text(formatNumber(Math.round(factor * cantidad * coste.ceramica)));
    $("#liquido" + id).text(formatNumber(Math.round(factor * cantidad * coste.liquido)));
    $("#micros" + id).text(formatNumber(Math.round(factor * cantidad * coste.micros)));
    $("#personal" + id).text(formatNumber(Math.round(factor * cantidad * coste.personal)));
    let tengoRecursos = "text-light";
    let noTengoRecursos = "text-danger";
    let error = false;

    // Restantres
    $("#restantemineral" + id).text(formatNumber(Math.round(recursos.mineral - factor * cantidad * coste.mineral)));
    if (recursos.mineral - factor * cantidad * coste.mineral < 0) {
        $("#restantemineral" + id).removeClass(tengoRecursos);
        $("#restantemineral" + id).addClass(noTengoRecursos);
        error = true;
    } else {
        $("#restantemineral" + id).removeClass(noTengoRecursos);
        $("#restantemineral" + id).addClass(tengoRecursos);
    }
    $("#restantecristal" + id).text(formatNumber(Math.round(recursos.cristal - factor * cantidad * coste.cristal)));
    if (recursos.cristal - factor * cantidad * coste.cristal < 0) {
        $("#restantecristal" + id).removeClass(tengoRecursos);
        $("#restantecristal" + id).addClass(noTengoRecursos);
        error = true;
    } else {
        $("#restantecristal" + id).removeClass(noTengoRecursos);
        $("#restantecristal" + id).addClass(tengoRecursos);
    }
    $("#restantegas" + id).text(formatNumber(Math.round(recursos.gas - factor * cantidad * coste.gas)));
    if (recursos.gas - factor * cantidad * coste.gas < 0) {
        $("#restantegas" + id).removeClass(tengoRecursos);
        $("#restantegas" + id).addClass(noTengoRecursos);
        error = true;
    } else {
        $("#restantegas" + id).removeClass(noTengoRecursos);
        $("#restantegas" + id).addClass(tengoRecursos);
    }
    $("#restanteplastico" + id).text(formatNumber(Math.round(recursos.plastico - factor * cantidad * coste.plastico)));
    if (recursos.plastico - factor * cantidad * coste.plastico < 0) {
        $("#restanteplastico" + id).removeClass(tengoRecursos);
        $("#restanteplastico" + id).addClass(noTengoRecursos);
        error = true;
    } else {
        $("#restanteplastico" + id).removeClass(noTengoRecursos);
        $("#restanteplastico" + id).addClass(tengoRecursos);
    }
    $("#restanteceramica" + id).text(formatNumber(Math.round(recursos.ceramica - factor * cantidad * coste.ceramica)));
    if (recursos.ceramica - factor * cantidad * coste.ceramica < 0) {
        $("#restanteceramica" + id).removeClass(tengoRecursos);
        $("#restanteceramica" + id).addClass(noTengoRecursos);
        error = true;
    } else {
        $("#restanteceramica" + id).removeClass(noTengoRecursos);
        $("#restanteceramica" + id).addClass(tengoRecursos);
    }
    $("#restanteliquido" + id).text(formatNumber(Math.round(recursos.liquido - factor * cantidad * coste.liquido)));
    if (recursos.liquido - factor * cantidad * coste.liquido < 0) {
        $("#restanteliquido" + id).removeClass(tengoRecursos);
        $("#restanteliquido" + id).addClass(noTengoRecursos);
        error = true;
    } else {
        $("#restanteliquido" + id).removeClass(noTengoRecursos);
        $("#restanteliquido" + id).addClass(tengoRecursos);
    }
    $("#restantemicros" + id).text(formatNumber(Math.round(recursos.micros - factor * cantidad * coste.micros)));
    if (recursos.micros - factor * cantidad * coste.micros < 0) {
        $("#restantemicros" + id).removeClass(tengoRecursos);
        $("#restantemicros" + id).addClass(noTengoRecursos);
        error = true;
    } else {
        $("#restantemicros" + id).removeClass(noTengoRecursos);
        $("#restantemicros" + id).addClass(tengoRecursos);
    }
    $("#restantepersonal" + id).text(formatNumber(Math.round(recursos.personal - factor * cantidad * coste.personal)));
    if (recursos.personal - factor * cantidad * coste.personal < 0) {
        $("#restantepersonal" + id).removeClass(tengoRecursos);
        $("#restantepersonal" + id).addClass(noTengoRecursos);
        error = true;
    } else {
        $("#restantepersonal" + id).removeClass(noTengoRecursos);
        $("#restantepersonal" + id).addClass(tengoRecursos);
    }
    if (error) {
        $("#disenioConstruir" + id).attr("disabled", "disabled");
    } else {
        $("#disenioConstruir" + id).removeAttr("disabled");
    }
    tiempoBase = $.grep(mejoras, function(valorBase) {
        return valorBase.id == id;
    })[0]["tiempo"];
    timeDura(Math.round(tiempoBase * factor * cantidad / (1 + constanteVelocidad * nivelHangar / 100)), "tiempo" + id);
}

function cuentaAtras(id, tiempos) {
    for (let i = 0; i < tiempos.length; i++) {
        timers[i] = new easytimer.Timer({
            precision: "seconds",
            countdown: true,
            startValues: { seconds: tiempos[i] },
        });

        timers[i].start();

        $("#" + id[i]).html(timers[i].getTimeValues().toString(["days", "hours", "minutes", "seconds"]));
        timers[i].addEventListener("secondsUpdated", function() {
            $("#" + id[i]).html(timers[i].getTimeValues().toString(["days", "hours", "minutes", "seconds"]));
        });

        timers[i].addEventListener("targetAchieved", function() {
            location.reload();
        });
    }
}

function calculaMaximo(costes, id) {
    var minimo = Math.min(
        recursos.mineral / costes.mineral,
        recursos.cristal / costes.cristal,
        recursos.gas / costes.gas,
        recursos.plastico / costes.plastico,
        recursos.ceramica / costes.ceramica,
        recursos.liquido / costes.liquido,
        recursos.micros / costes.micros,
        recursos.personal / costes.personal,
    );
    minimo = Math.floor(minimo);
    $("#disenio" + id).val(minimo);
    recalculaCostos(id, costes);
}

function resetCantidad(costes, id) {
    $("#disenio" + id).val(1);
    recalculaCostos(id, costes);
}

function calcularDisenios(disenios, mejoras, investigaciones, constantes) {
    var rdiseno = [];
    var resultado = [rdiseno];

    disenios.forEach(diseno => {
        resultado.push(CalculoDisenio(diseno));
    });
    MostrarResultadoDisenio(resultado);
    //console.log(resultado);
}

function CalculoDisenio(diseno) {
    masa = diseno.mejoras.masa;
    var rdiseno = [];
    // Velocidades

    EinvPropQuimico = resultadoRealDiseno(diseno, "invPropQuimico");
    EinvPropNuk = resultadoRealDiseno(diseno, "invPropNuk");
    EinvPropIon = resultadoRealDiseno(diseno, "invPropIon");
    EinvPropPlasma = resultadoRealDiseno(diseno, "invPropPlasma");
    EinvPropMa = resultadoRealDiseno(diseno, "invPropMa");

    rdiseno.velocidad = Math.round(Math.pow(EinvPropQuimico + EinvPropNuk + EinvPropIon + EinvPropPlasma + EinvPropMa, 1.33) / masa, 0);

    /// maniobra
    invest = "invManiobraQuimico";
    investr = "invPropQuimico";
    minves = "mejora" + invest;
    EinvManiobraQuimico =
        diseno.mejoras[invest] *
        (1 +
            $.grep(investigaciones, function(nivelInv) {
                return nivelInv.codigo == investr;
            })[0]["nivel"] *
                $.grep(constantes, function(nivelConst) {
                    return nivelConst.codigo == minves;
                })[0]["valor"]);

    invest = "invManiobraNuk";
    investr = "invPropQuimico";
    minves = "mejora" + invest;
    EinvManiobraNuk =
        diseno.mejoras[invest] *
        (1 +
            $.grep(investigaciones, function(nivelInv) {
                return nivelInv.codigo == investr;
            })[0]["nivel"] *
                $.grep(constantes, function(nivelConst) {
                    return nivelConst.codigo == minves;
                })[0]["valor"]);

    invest = "invManiobraIon";
    investr = "invPropQuimico";
    minves = "mejora" + invest;
    EinvManiobraIon =
        diseno.mejoras[invest] *
        (1 +
            $.grep(investigaciones, function(nivelInv) {
                return nivelInv.codigo == investr;
            })[0]["nivel"] *
                $.grep(constantes, function(nivelConst) {
                    return nivelConst.codigo == minves;
                })[0]["valor"]);

    invest = "invManiobraPlasma";
    investr = "invPropQuimico";
    minves = "mejora" + invest;
    EinvManiobraPlasma =
        diseno.mejoras[invest] *
        (1 +
            $.grep(investigaciones, function(nivelInv) {
                return nivelInv.codigo == investr;
            })[0]["nivel"] *
                $.grep(constantes, function(nivelConst) {
                    return nivelConst.codigo == minves;
                })[0]["valor"]);

    invest = "invManiobraMa";
    investr = "invPropQuimico";
    minves = "mejora" + invest;
    EinvManiobraMa =
        diseno.mejoras[invest] *
        (1 +
            $.grep(investigaciones, function(nivelInv) {
                return nivelInv.codigo == investr;
            })[0]["nivel"] *
                $.grep(constantes, function(nivelConst) {
                    return nivelConst.codigo == minves;
                })[0]["valor"]);

    rdiseno.maniobra = Math.round(Math.pow(EinvManiobraQuimico + EinvManiobraNuk + EinvManiobraIon + EinvManiobraPlasma + EinvManiobraMa, 1.33) / masa, 0);

    // Blindajes
    EinvTitanio = resultadoRealDiseno(diseno, "invTitanio");
    EinvReactivo = resultadoRealDiseno(diseno, "invReactivo");
    EinvResinas = resultadoRealDiseno(diseno, "invResinas");
    EinvPlacas = resultadoRealDiseno(diseno, "invPlacas");
    EinvCarbonadio = resultadoRealDiseno(diseno, "invCarbonadio");

    rdiseno.defensa = EinvTitanio + EinvReactivo + EinvResinas + EinvPlacas + EinvCarbonadio;

    //Carga
    invest = "invHangar";
    minves = "mejora" + invest;
    baseHangar =
        1 +
        $.grep(investigaciones, function(nivelInv) {
            return nivelInv.codigo == invest;
        })[0]["nivel"] *
            $.grep(constantes, function(nivelConst) {
                return nivelConst.codigo == minves;
            })[0]["valor"];

    rdiseno.cargaPequenia = Math.round(diseno.mejoras["cargaPequenia"] * baseHangar);
    rdiseno.cargaMediana = Math.round(diseno.mejoras["cargaMediana"] * baseHangar);
    rdiseno.cargaGrande = Math.round(diseno.mejoras["cargaGrande"] * baseHangar);
    rdiseno.cargaEnorme = Math.round(diseno.mejoras["cargaEnorme"] * baseHangar);

    rdiseno.carga = resultadoRealDiseno(diseno, "invCarga", "carga");

    rdiseno.recoleccion = resultadoRealDisenoSinInvest(diseno, "invRecoleccion", "recolector");
    rdiseno.extraccion = resultadoRealDisenoSinInvest(diseno, "invRecoleccion", "extractor");

    // Varios
    rdiseno.municion = diseno.mejoras["municion"];
    rdiseno.fuel = diseno.mejoras["fuel"];
    rdiseno.mantenimiento = diseno.mejoras["mantenimiento"];
    rdiseno.tiempo = diseno.mejoras["tiempo"];

    var matrizataque = $.grep(ViewDaniosDisenios, function(disen) {
        return disen.disenios_id == diseno.id;
    });
    var ataqueTotal = 0;

    matrizataque.forEach(fila => {
        ataqueTotal += 1 * fila.total;
    });
    rdiseno.ataque = Math.round(ataqueTotal);
    rdiseno.iddisenio = diseno.id;

    return rdiseno;
}

function resultadoRealDiseno(diseno, invest, invstobj = invest) {
    minves = "mejora" + invest;
    return Math.round(
        diseno.mejoras[invstobj] *
            (1 +
                $.grep(investigaciones, function(nivelInv) {
                    return nivelInv.codigo == invest;
                })[0]["nivel"] *
                    $.grep(constantes, function(nivelConst) {
                        return nivelConst.codigo == minves;
                    })[0]["valor"]),
    );
}

function resultadoRealDisenoSinInvest(diseno, invest, invstobj = invest) {
    return Math.round(diseno.mejoras[invstobj]);
}

valNaves = [];
tamaniosArray = ["cargaPequenia", "cargaMediana", "cargaGrande", "cargaEnorme", "cargaMega"];
tamaniosNaveAcarga = { caza: "cargaPequenia", ligera: "cargaMediana", media: "cargaGrande", pesada: "cargaEnorme", estacion: "cargaMega" };
recursosArray = ["personal", "mineral", "cristal", "gas", "plastico", "ceramica", "liquido", "micros", "fuel", "ma", "municion", "creditos"];

function MostrarResultadoDisenio(diseno) {
    var result = CalculoDisenio(diseno);

    $("#carga" + diseno.id).text(formatNumber(Math.round(result.carga)));
    $("#recoleccion" + diseno.id).text(formatNumber(Math.round(result.recoleccion)));
    $("#extraccion" + diseno.id).text(formatNumber(Math.round(result.extraccion)));
    $("#hangarCazas" + diseno.id).text(formatNumber(result.cargaPequenia));
    $("#hangarLigeras" + diseno.id).text(formatNumber(result.cargaMediana));
    $("#hangarMedias" + diseno.id).text(formatNumber(result.cargaGrande));
    $("#hangarPesadas" + diseno.id).text(formatNumber(result.cargaEnorme));
    $("#mantenimiento" + diseno.id).text(formatNumber(Math.round(result.mantenimiento)));
    $("#municion" + diseno.id).text(formatNumber(Math.round(result.municion)));
    $("#fuel" + diseno.id).text(formatNumber(Math.round(result.fuel)));
    $("#velocidad" + diseno.id).text(formatNumber(Math.round(result.velocidad)));
    $("#maniobra" + diseno.id).text(formatNumber(Math.round(result.maniobra)));
    $("#ataque" + diseno.id).text(formatNumber(Math.round(result.ataque)));
    $("#defensa" + diseno.id).text(formatNumber(Math.round(result.defensa)));

    valNaves.push(result);
}

//funciones de distancias

function CoordenadasBySistema(nsistema) {
    anchoUniverso = $.grep(constantesU, function(busca) {
        return busca.codigo == "anchouniverso";
    })[0].valor;
    luzdemallauniverso = $.grep(constantesU, function(busca) {
        return busca.codigo == "luzdemallauniverso";
    })[0].valor;

    var cy = Math.floor(nsistema / anchoUniverso) * 10;
    var cx = (nsistema - Math.floor(nsistema / anchoUniverso) * anchoUniverso) * luzdemallauniverso;
    return { x: cx, y: cy };
}

function DistanciaUniverso(origen, destino) {
    var coordOrigen = { x: 0, y: 0 };
    var coordDestino = { x: 0, y: 0 };
    var factordistancia = 1;
    var dist = undefined;

    if (origen.estrella != "0" && destino.estrella != "0" && origen.orbita != "0" && destino.orbita != "0") {
        if (origen.estrella == destino.estrella && origen.orbita == destino.orbita) {
            //orbitar
            factordistancia = $.grep(constantesU, function(busca) {
                return busca.codigo == "distanciaorbita";
            })[0].valor;
            coordDestino.x = 0.5;
        } else if (origen.estrella == destino.estrella) {
            //mismo sistema
            factordistancia = $.grep(constantesU, function(busca) {
                return busca.codigo == "distanciaentreplanetas";
            })[0].valor;
            coordOrigen.x = origen.orbita;
            coordDestino.x = destino.orbita;
        } else {
            //entre sistemas
            factordistancia = $.grep(constantesU, function(busca) {
                return busca.codigo == "distanciaentresistemas";
            })[0].valor;
            coordOrigen = CoordenadasBySistema(origen.estrella);
            coordDestino = CoordenadasBySistema(destino.estrella);
        }
        dist = factordistancia * Math.pow((coordDestino.x - coordOrigen.x) * (coordDestino.x - coordOrigen.x) + (coordDestino.y - coordOrigen.y) * (coordDestino.y - coordOrigen.y), 1 / 2);
    }
    return Math.round(dist * 100) / 100;
}

function GastoFuel(distancia, fuelbase, porcentVel) {
    fueldistancia = $.grep(constantesU, function(busca) {
        return busca.codigo == "fuelpordistancia";
    })[0].valor;
    fuelfactorreduccionpordistancia = $.grep(constantesU, function(busca) {
        return busca.codigo == "fuelfactorreduccionpordistancia";
    })[0].valor;
    return Math.round(fueldistancia * distancia * fuelbase * Math.pow(porcentVel, fuelfactorreduccionpordistancia));
}

function TiempoLLegada(distancia, velocidad) {
    factortiempoviaje = $.grep(constantesU, function(busca) {
        return busca.codigo == "factortiempoviaje";
    })[0].valor;

    return (tiempo = Math.round(distancia / velocidad * factortiempoviaje)); //en segundos
}

function EsconderPorClase(clase) {
    document.querySelectorAll("." + clase).forEach(function(el) {
        el.style.display = "none";
    });
}

function EsconderPorId(id) {
    document.querySelectorAll("#" + id).forEach(function(el) {
        el.style.display = "none";
    });
}

function MostrarPorId(id) {
    document.querySelectorAll("#" + id).forEach(function(el) {
        el.style.display = "";
    });
}

function responderMensaje(emisor) {
    $("#listaJugadores").val(emisor);
    $("#listaJugadores").trigger("change");
    $("#asunto").val("Respuesta");
    mostrarTab("nuevo-tab");
}

function borrarMensaje(mensajeId, jugadorId, tab) {
    window.location.href = "http://" + window.location.hostname + "/juego/mensajes/borrar/" + mensajeId + "/" + jugadorId + "/" + tab;
}

function tabsConstruccion(tab) {
    window.history.pushState(null, null, "http://" + window.location.hostname + "/juego/construccion/" + tab);
}

function tabsDisenio(tab) {
    window.history.pushState(null, null, "http://" + window.location.hostname + "/juego/disenio/" + tab);
}

function tabsFlotas(tab) {
    window.history.pushState(null, null, "http://" + window.location.hostname + "/juego/flotas/" + tab);
}

function tabsFuselajes(tab) {
    window.history.pushState(null, null, "http://" + window.location.hostname + "/juego/fuselajes/" + tab);
}

function tabsInvestigacion(tab) {
    window.history.pushState(null, null, "http://" + window.location.hostname + "/juego/investigacion/" + tab);
}

function tabsMensajes(tab) {
    window.history.pushState(null, null, "http://" + window.location.hostname + "/juego/mensajes/" + tab);
}

function tabsPlanetas(tab) {
    window.history.pushState(null, null, "http://" + window.location.hostname + "/juego/planeta/" + tab);
}
