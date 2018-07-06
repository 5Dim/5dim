var recursos, produccion, almacenes;

function calcularRecursos() {
    var counter = 0;
    //Pruebas
    //console.log(recursos);
    //console.log(produccion);
    //console.log(almacenes);
    //produccion.gas = -654874;
    //produccion.plastico = 6548740;
    //produccion.ceramica = 65487400;

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

    //Insertar
    $("#personal").text(Math.trunc(recursos.personal).toLocaleString('es'));
    $("#mineral").text(Math.trunc(recursos.mineral).toLocaleString('es'));
    $("#cristal").text(Math.trunc(recursos.cristal).toLocaleString('es'));

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