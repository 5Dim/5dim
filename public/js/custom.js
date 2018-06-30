var recursos, produccion, almacenes;

function calcularRecursos() {
    var counter = 0;
    //Pruebas
    //console.log(recursos);
    //console.log(produccion);
    //console.log(almacenes);
    produccion.gas = 654874;
    produccion.plastico = 6548740;
    produccion.ceramica = 65487400;

    //Calculos
    recursos.personal += produccion.personal / 3600 / 2;
    recursos.mineral += produccion.mineral / 3600 / 2;
    recursos.cristal += produccion.cristal / 3600 / 2;
    recursos.gas += produccion.gas / 3600 / 2;
    recursos.plastico += produccion.plastico / 3600 / 2;
    recursos.ceramica += produccion.ceramica / 3600 / 2;
    recursos.liquido += produccion.liquido / 3600 / 2;
    recursos.micros += produccion.micros / 3600 / 2;
    recursos.fuel += produccion.fuel / 3600 / 2;
    recursos.ma += produccion.ma / 3600 / 2;
    recursos.municion += produccion.municion / 3600 / 2;

    //Insertar
    $("#personal").text(Math.trunc(recursos.personal).toLocaleString('es'));
    $("#mineral").text(Math.trunc(recursos.mineral).toLocaleString('es'));
    $("#cristal").text(Math.trunc(recursos.cristal).toLocaleString('es'));

    //Comprobar almacenes
    if (recursos.gas >= almacenes[counter].capacidad) {
        $("#gas").addClass('text-danger');
        $("#gas").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else {
        $("#gas").text(Math.trunc(recursos.gas).toLocaleString('es'));
    }
    counter++;
    if (recursos.plastico >= almacenes[counter].capacidad) {
        $("#plastico").addClass('text-danger');
        $("#plastico").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else {
        $("#plastico").text(Math.trunc(recursos.plastico).toLocaleString('es'));
    }
    counter++;
    if (recursos.ceramica >= almacenes[counter].capacidad) {
        $("#ceramica").addClass('text-danger');
        $("#ceramica").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else {
        $("#ceramica").text(Math.trunc(recursos.ceramica).toLocaleString('es'));
    }
    counter++;
    if (recursos.liquido >= almacenes[counter].capacidad) {
        $("#liquido").addClass('text-danger');
        $("#liquido").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else {
        $("#liquido").text(Math.trunc(recursos.liquido).toLocaleString('es'));
    }
    counter++;
    if (recursos.micros >= almacenes[counter].capacidad) {
        $("#micros").addClass('text-danger');
        $("#micros").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else {
        $("#micros").text(Math.trunc(recursos.micros).toLocaleString('es'));
    }
    counter++;
    if (recursos.fuel >= almacenes[counter].capacidad) {
        $("#fuel").addClass('text-danger');
        $("#fuel").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else {
        $("#fuel").text(Math.trunc(recursos.fuel).toLocaleString('es'));
    }
    counter++;
    if (recursos.ma >= almacenes[counter].capacidad) {
        $("#ma").addClass('text-danger');
        $("#ma").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else {
        $("#ma").text(Math.trunc(recursos.ma).toLocaleString('es'));
    }
    counter++;
    if (recursos.municion >= almacenes[counter].capacidad) {
        $("#municion").addClass('text-danger');
        $("#municion").text(Math.trunc(almacenes[counter].capacidad).toLocaleString('es'));
    } else {
        $("#municion").text(Math.trunc(recursos.municion).toLocaleString('es'));
    }
}

function activarIntervalo(recEntrantes, redAlmacenes, proEntrante, intervalo) {
    recursos = recEntrantes;
    produccion = proEntrante;
    almacenes = redAlmacenes;
    setInterval(calcularRecursos, intervalo);
}