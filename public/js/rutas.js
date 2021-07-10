$(document).ready(function() {
    $('#listaRutas').select2({
        placeholder: "Nombre de la ruta",
        width: '100%',
        language: "es"
    });

    $('#listaRutas').change(function() {
        traerRuta();
    });

    cargarListaRutas();

});

function cargarListaRutas(){
    $.ajax({
        type: "post",
        dataType: "json",
        url: "/juego/flotas/rutas/cargarListaRutas",
        //contentType: 'application/json; charset=utf-8',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        success: function(data) {

            var sel = $("#listaRutas");
            sel.empty();
            sel.append('<option value="-1">Selecciona una ruta</option>');
            for (var i=0; i<data.length; i++) {
            sel.append('<option value="' + data[i].id + '">' + data[i].nombre + '</option>');
            }
        },
        error: function(xhr, textStatus, thrownError) {
            console.log("status", xhr.status);
            console.log("error", thrownError);
        },
    });
}


function nombrarRuta(){
    botonsi=`<button id="botonCrearRuta" type="button" class="btn btn-success  col-12"  onclick="guardarRuta()">Guardar Ruta</button>`;
    nombreruta=`<td class="anchofijo text-light">
        <input id="nombreruranueva" type="text"
        class="form-control input form-control-sm" value="" min="0"
        max="125">
    </td>`;


    $("#datosContenido").html("Pon un nombre a la ruta <br><br> "+nombreruta+botonsi);
    $("#ModalTitulo").html("Crear ruta");
    var modal = new bootstrap.Modal(document.getElementById('datosModal'));
    modal.show();
}

function guardarRuta(){
    nombreruta=$("#nombreruranueva").val();
    if (nombreruta.length<1){
        errores="¡ La ruta debe tener un nombre !";
    } else {//no me importan el resto de errores de validacion
        errores="";
    }


    if (errores.length > 0) {
        $("#ModalTitulo").html(errores);
    } else {
        $('.btn-close').click();
        flota.nombre = nombreruta;
        for (dest = 1; dest < destinos.length; dest++) {
            recursosArray.forEach(res => {
                prioridades[dest][res] = $("#prioridad" + res + dest).val();
            });
    }
        //var modal = new bootstrap.Modal(document.getElementById('datosModal'))

        $.ajax({
            type: "post",
            dataType: "json",
            url: "/juego/flotas/rutas/guardarRuta",
            //contentType: 'application/json; charset=utf-8',
            data: { navesEstacionadas: navesEstacionadas, destinos: destinos, cargaDest: cargaDest, prioridades: prioridades, flota: flota },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            beforeSend: function() {
                $("#botonCrearRuta").prop("disabled", true);
                var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando....';
                $("#botonCrearRuta").html(spinner);
            },
            success: function(response) {
                modal.show();
                $("#botonCrearRuta").text(EnviarFlotaTxt);
                $("#botonCrearRuta").prop("disabled", false);
                if (response.errores == "") {
                    $("#ModalTitulo").html("Flota enviada");
                    $("#datosContenido").html("La ruta " + $("#nombreFlota").val() + " se ha guardado");
                    cargarListaRutas();
                } else {
                    //alert(response.errores);
                    $("#ModalTitulo").html("ruta no guardada");
                    $("#datosContenido").html(response.errores);
                }
            },
            error: function(xhr, textStatus, thrownError) {
                modal.show();
                $("#botonCrearRuta").text(EnviarFlotaTxt);
                $("#botonCrearRuta").prop("disabled", false);
                console.log("status", xhr.status);
                console.log("error", thrownError);
                $("#ModalTitulo").html("ruta no guardada");
            $("#datosContenido").html(new Date() + " " + thrownError);
                //alert(data.errores);
            },
        });

    }


}

function traerRuta(){
    id=$('#listaRutas').val();

    if (id != "none" || id>-1) {
        $.ajax({
            type: "post",
            dataType: "json",
            url: "/juego/flotas/rutas/traerRuta/"+ id,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function(data) {
                dest=0;
                data.destinos.forEach(destino=>{
                    recursosArray.forEach(res => {
                        $("#"+res + dest).val(1  * destino.recursos[res]);
                        $("#prioridad" + res + dest).val(1 * destino.prioridades[res]);
                    });
                    $("#sistemaDest" + dest).val(destino.estrella);
                    $("#planetaDest" + dest).val(destino.orbita);
                    $("#porcentVDest" + dest).val(destino.porcentVel);
                    $("#ordenDest" + dest).val(destino.mision).change();

                    dest++;
                })

                data.disenios.forEach(disenio=>{
                    NaveAflota(disenio.disenios_id,1*disenio.enFlota);
                    NaveAhangar(disenio.disenios_id,1*disenio.enHangar);
                });

                $("#nombreFlota").val("Ruta "+data.nombre);

                Avisos();
                Calculoespacitiempo();
            },
            error: function(xhr, textStatus, thrownError) {
                console.log("status", xhr.status);
                console.log("error", thrownError);
                //$("#botontienes"+ dest).text("Tienes");
                recursosArray.forEach(res => {
                    recursosEnDest[dest][res] = 0;
                });
                recursosDest[dest].total = 0;
                MostrarRecursos(dest);
            },
        });
    } else {

    }

}

function borrarRuta(){
    id=$('#listaRutas').val();

    $.ajax({
        type: "post",
        dataType: "json",
        url: "/juego/flotas/rutas/borrarRuta/"+ id,
        //contentType: 'application/json; charset=utf-8',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function() {
            $("#botonBorrarRuta").prop("disabled", true);
            var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Borrando....';
            $("#botonBorrarRuta").html(spinner);
        },
        success: function(response) {
            $("#botonBorrarRuta").text("Borrar Ruta Seleccionada");
            $("#botonBorrarRuta").prop("disabled", false);
            if (response) {
                cargarListaRutas();
            }
        },
        error: function(xhr, textStatus, thrownError) {
            console.log("status", xhr.status);
            console.log("error", thrownError);
        },
    });

}
