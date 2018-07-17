var recursos, produccion, almacenes;

function calcularRecursos() {
    //Pruebas
    //console.log(recursos);
    //console.log(produccion);
    //console.log(almacenes);
    //produccion.gas = -654874;
    //produccion.plastico = 6548740;
    //produccion.ceramica = 65487400;
    var counter = 0;

    //Calculos
    recursos.personal += produccion[0].personal / 3600 / 4;
    recursos.mineral += produccion[1].mineral / 3600 / 4;
    recursos.cristal += produccion[2].cristal / 3600 / 4;
    recursos.gas += produccion[3].gas / 3600 / 4;
    recursos.plastico += produccion[4].plastico / 3600 / 4;
    recursos.ceramica += produccion[5].ceramica / 3600 / 4;
    recursos.liquido += produccion[6].liquido / 3600 / 4;
    recursos.micros += produccion[7].micros / 3600 / 4;
    recursos.fuel += produccion[8].fuel / 3600 / 4;
    recursos.ma += produccion[9].ma / 3600 / 4;
    recursos.municion += produccion[10].municion / 3600 / 4;

    //Insertar
    $("#personal").text(Math.trunc(recursos.personal).toLocaleString('es'));
    $("#mineral").text(Math.trunc(recursos.mineral).toLocaleString('es'));
    $("#cristal").text(Math.trunc(recursos.cristal).toLocaleString('es'));
    counter++;
    counter++;

    //Comprobar almacenes
    if (recursos.gas >= almacenes[counter].capacidad) {
        $("#gas").addClass('text-danger');
        $("#gas").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else if (recursos.gas <= 0) {
        $("#gas").addClass('text-info');
        $("#gas").text(0);
    } else {
        $("#gas").text(Math.trunc(recursos.gas).toLocaleString('es'));
    }
    counter++;
    if (recursos.plastico >= almacenes[counter].capacidad) {
        $("#plastico").addClass('text-danger');
        $("#plastico").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else if (recursos.plastico <= 0) {
        $("#plastico").addClass('text-info');
        $("#plastico").text(0);
    } else {
        $("#plastico").text(Math.trunc(recursos.plastico).toLocaleString('es'));
    }
    counter++;
    if (recursos.ceramica >= almacenes[counter].capacidad) {
        $("#ceramica").addClass('text-danger');
        $("#ceramica").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else if (recursos.ceramica <= 0) {
        $("#ceramica").addClass('text-info');
        $("#ceramica").text(0);
    } else {
        $("#ceramica").text(Math.trunc(recursos.ceramica).toLocaleString('es'));
    }
    counter++;
    if (recursos.liquido >= almacenes[counter].capacidad) {
        $("#liquido").addClass('text-danger');
        $("#liquido").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else if (recursos.liquido <= 0) {
        $("#liquido").addClass('text-info');
        $("#liquido").text(0);
    } else {
        $("#liquido").text(Math.trunc(recursos.liquido).toLocaleString('es'));
    }
    counter++;
    if (recursos.micros >= almacenes[counter].capacidad) {
        $("#micros").addClass('text-danger');
        $("#micros").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else if (recursos.micros <= 0) {
        $("#micros").addClass('text-info');
        $("#micros").text(0);
    } else {
        $("#micros").text(Math.trunc(recursos.micros).toLocaleString('es'));
    }
    counter++;
    if (recursos.fuel >= almacenes[counter].capacidad) {
        $("#fuel").addClass('text-danger');
        $("#fuel").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else if (recursos.fuel <= 0) {
        $("#fuel").addClass('text-info');
        $("#fuel").text(0);
    } else {
        $("#fuel").text(Math.trunc(recursos.fuel).toLocaleString('es'));
    }
    counter++;
    if (recursos.ma >= almacenes[counter].capacidad) {
        $("#ma").addClass('text-danger');
        $("#ma").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else if (recursos.ma <= 0) {
        $("#ma").addClass('text-info');
        $("#ma").text(0);
    } else {
        $("#ma").text(Math.trunc(recursos.ma).toLocaleString('es'));
    }
    counter++;
    if (recursos.municion >= almacenes[counter].capacidad) {
        $("#municion").addClass('text-danger');
        $("#municion").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else if (recursos.municion <= 0) {
        $("#municion").addClass('text-info');
        $("#municion").text(0);
    } else {
        $("#municion").text(Math.trunc(recursos.municion).toLocaleString('es'));
    }
}

function activarIntervalo(recEntrantes, almEntrante, proEntrante, intervalo) {
    recursos = recEntrantes;
    produccion = proEntrante;
    almacenes = almEntrante;
    setInterval(calcularRecursos, intervalo);
}

function calculaTiempo(preciototal, velocidadConst, dnd) {
    premiun = 0;
    personal = $('#personal' + dnd).val();
    horaImprimible = "";
    if (personal > 1) {
        result = ((preciototal * velocidadConst) / personal);
        result = result - premiun * 5 * 60;
        if (result < 1) {
            result = 0;
        };
        lhora = Math.floor((result / 3600));
        lminuto = Math.floor((result - (lhora * 3600)) / 60);
        lsegundo = Math.floor(result - (lhora * 3600 + lminuto * 60));

        horaImprimible = "Tiempo: " + lhora + "h " + lminuto + "m " + lsegundo + "s";

        $("#tiempo" + dnd).html(horaImprimible);
        timeg(result, "termina" + dnd);

    } else {
        $("#tiempo" + dnd).html(horaImprimible);
    }
}


function calculaTiempoInvestigacion(preciototal, velocidadConst, dnd, nivel, nivelLaboratorio) {
    premiun = 0;
    personal = $('#personal' + dnd).val();
    horaImprimible = "";
    if (personal > 1 && nivelLaboratorio > 0) {
        result = (velocidadConst * 1000 * (nivel + 1) * ((preciototal) / (personal * nivelLaboratorio)));
        result = result - premiun * 5 * 60;
        if (result < 1) {
            result = 0;
        };
        lhora = Math.floor((result / 3600));
        lminuto = Math.floor((result - (lhora * 3600)) / 60);
        lsegundo = Math.floor(result - (lhora * 3600 + lminuto * 60));

        horaImprimible = "Tiempo: " + lhora + "h " + lminuto + "m " + lsegundo + "s";

        $("#tiempo" + dnd).html(horaImprimible);
        timeg(result, "termina" + dnd);

    } else {
        $("#tiempo" + dnd).html(horaImprimible);
    }
}




function timeg(yqmas, dndv) { /// da tiempo final desde ahora añadiendole yqmas y lo pone en hastacuando'+dndv

    var d = new Date()
    var diftime = yqmas; // hora españa UTC +3600

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
    };

    resultg = "Día " + day + " a las " + hora + ":" + minuto;

    if (diadehoy == day && yqmas < 24 * 3600) {
        resultg = "Hoy a las " + hora + ":" + minuto;
    };
    if (diadehoy == day - 1 && yqmas < 48 * 3600) {
        resultg = "Mañana a las " + hora + ":" + minuto;
    };

    $('#' + dndv).html(resultg);
}

function sendConstruir(id, codigo, modal) {
    var personal = $('#personal' + codigo).val();
    window.location.href = "http://localhost/juego/construccion/construir/" + id + "/" + personal + "/" + modal;
}

function sendReciclar(id, codigo) {
    var personal = $('#personal' + codigo).val();
    window.location.href = "http://localhost/juego/construccion/reciclar/" + id + "/" + personal;
}

function sendCancelar(id) {
    window.location.href = "http://localhost/juego/construccion/cancelar/" + id;
}

function sendIndustria(industria) {
    window.location.href = "http://localhost/juego/construccion/industria/" + industria;
}

function sendInvestigar(id, codigo) {
    var personal = $('#personal' + codigo).val();
    window.location.href = "http://localhost/juego/investigacion/construir/" + id + "/" + personal;
}

function mostrarDatosConstruccion(codigo) {
    $.ajax({
        method: "GET",
        url: "http://localhost/juego/construccion/datos/" + codigo,
        // data: { name: "John", location: "Boston" }
        success: function (data) {
            $("#datosContenido").html(data.descripcionConstruccion)
            $("#ModalTitulo").html(data.nombreConstruccion)

        }
    })

}