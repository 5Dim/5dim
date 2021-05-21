valFlotaT = [];

fueraH = [];
dentroH = [];
capacidadH = [];
tablaHangares = [];
tablaHangares.fueraH = fueraH;
tablaHangares.dentroH = dentroH;
tablaHangares.capacidadH = capacidadH;

puedoCargarRecurso = [];
deboCargarMunicion = true;
deboAlertasF = true;
deboEsconderDestinosVacios = true;
botonenviarAnulado = false;
enviarEnOrbita = false;
EnviarFlotaTxt = "Enviar Flota";
///   mostrarTab("enviar-tab")
// poner boton pasar flota, boton  traspasar flota

fuelDestT = 0; //fuel total a todos los destinos

RecursosInicio();
CargarFlotaEditada();
CargarValoresPlaneta();

for (dest = 1; dest < destinos.length; dest++) {
    CargaActual(dest);
    VaciarPrioridades(dest);
}
Avisos();

function CargarFlotaEditada() {
    if (flota.id == undefined) {
        //planeta
        nombreorigen = "Origen " + destinos[0]["estrella"] + "x" + destinos[0]["orbita"];
        EsconderPorId("listaPrioridades0");
        $("#botonModificar").attr("disabled", true);
        recursosDest[0]["personal"] -= personalOcupado;
    } else {
        //flota
        // mostrarTab("enviar-tab")
        enviarEnOrbita = true;
        if (destinos[0]["tipoflota"] == undefined) {
            EsconderPorId("listaPrioridades0");
        }

        nombreorigen = "Carga actual en la flota";
        puedoCargarRecurso[0] = false;
        EsconderPorId("envias0");
        EsconderPorId("porcentsimbol");
        EnviarFlotaTxt = "Editar para Enviar Flota";

        if (flota.tipoflota == "envuelo") {
            botonenviarAnulado = true;
            $(".distribuidorNaves").prop("disabled", true);
        }

        $("#nombreFlota").val(flota.nombre);
        deboCargarMunicion = false;
        deboAlertasF = false;

        dest = 0;
        destinos.forEach(destino => {
            cargaT = 0;
            $("#sistemaDest" + dest).val(destino.estrella);
            $("#planetaDest" + dest).val(destino.orbita);
            destino.misionSEG = destino.mision; //se guarda
            $("#porcentVDest" + dest).val(Math.round(destino.porcentVel));

            recursosArray.forEach(res => {
                if (dest == 0) {
                    recursosDest[dest][res] = flota["recursos_en_flota"][res];
                }
                $("#" + res + dest).val(formatNumber(cargaDest[dest][res]));
                cargaT += cargaDest[dest][res];

                $("#prioridad" + res + dest).val(formatNumber(prioridades[dest][res]));
            });

            cargaDest[dest].total = cargaT;

            if (destino.visitado > 0) {
                puedoCargarRecurso[dest] = false;
                $(".enviarRecursos" + dest).attr("disabled", true);
                $(".prioridadRecursos" + dest).attr("disabled", true);
                hacecuanto = difTiempos(destino.fin, horaServer);
                $("#titulo" + dest).text("Destino " + dest + " alcanzado hace " + hacecuanto);
            } else {
                if (dest > 0 && destino.fin != undefined) {
                    hacecuanto = difTiempos(horaServer, destino.fin);
                    $("#titulo" + dest).text("Destino " + dest + " alcanzado en " + hacecuanto);
                }
            }

            dest += 1;
        });

        MostrarRecursos(0);

        if (deboEsconderDestinosVacios) {
            for (n = dest; n < cantidadDestinos + 1; n++) {
                EsconderPorId("cajitaDestino" + n);
            }
        }

        $(".ediciondestino").attr("disabled", true);
    }

    $(".ocultarenorigen" + 0).text("");
    CrearOrigen(nombreorigen);
}

function MostrarDestinos() {
    for (n = 1; n < cantidadDestinos + 1; n++) {
        MostrarPorId("cajitaDestino" + n);
    }
    $(".ediciondestino").attr("disabled", false);
    MostrarPorId("envias0");
    EsconderPorId("listaPrioridades0");
    $("#botonModificar").prop("disabled", true);
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
        if (valNaves[este].enflota + valNaves[este].enhangar > 0) {
            valNaves[este].cantidad = 0;
        } else {
            valNaves[este].cantidad = nave.cantidad;
        }
        valNaves[este].cantidadT = 1 * valNaves[este].cantidad + 1 * valNaves[este].enflota + 1 * valNaves[este].enhangar; //es constante

        //ayuda visual esconde los 0
        $("#nombre" + diseno.id).text(diseno.nombre);
        if (valNaves[este]["carga"] == 0) {
            $("#carga" + nave.disenios_id)
                .removeClass("text-light")
                .addClass("text-secondary");
        }
        if (valNaves[este]["cargaPequenia"] == 0) {
            $("#hangarCazas" + nave.disenios_id)
                .removeClass("text-light")
                .addClass("text-secondary");
        }
        if (valNaves[este]["cargaMediana"] == 0) {
            $("#hangarLigeras" + nave.disenios_id)
                .removeClass("text-light")
                .addClass("text-secondary");
        }
        if (valNaves[este]["cargaGrande"] == 0) {
            $("#hangarMedias" + nave.disenios_id)
                .removeClass("text-light")
                .addClass("text-secondary");
        }
        if (valNaves[este]["cargaEnorme"] == 0) {
            $("#hangarPesadas" + nave.disenios_id)
                .removeClass("text-light")
                .addClass("text-secondary");
        }
        if (valNaves[este]["maniobra"] == 0) {
            $("#maniobra" + nave.disenios_id)
                .removeClass("text-light")
                .addClass("text-secondary");
        }
        if (valNaves[este]["velocidad"] == 0) {
            $("#velocidad" + nave.disenios_id)
                .removeClass("text-light")
                .addClass("text-secondary");
        }
    });

    RecalculoTotal();
}

function RecursosInicio() {
    var dest;
    for (dest = 0; dest < destinos.length; dest++) {
        puedoCargarRecurso[dest] = true;
        if (recursosDest[dest] != undefined) {
            MostrarRecursos(dest);
        } else {
            recursosDest[dest] = [];
        }

        if (cargaDest[dest] == undefined) {
            cargaDest[dest] = [];
            recursosArray.forEach(res => {
                cargaDest[dest][res] = 0;
            });
            cargaDest[dest].total = 0;
        } else {
            recursosArray.forEach(res => {
                cargaDest[dest].total += cargaDest[dest][res];
            });
        }
        //destinos[dest].mision = $("#ordenDest" + dest).val();
    }
    //console.log(destinos[0]);
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

        cantidad = 1 * valnave.cantidad;
        aflota = 1 * valnave.enflota;
        ahangar = 1 * valnave.enhangar;
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

function Avisos() {
    //////////////////////////////  VALIDACION

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
        if (destinos[dest].estrella.length !== 0) {
            destAnt = dest - 1;
            //las cargas de un destino van al otro
            if (dest > 0) {
                recursosArray.forEach(res => {
                    if (recursosDest[dest][res] == undefined) {
                        recursosDest[dest][res] = 0;
                    }

                    recursosDest[dest][res] = recursosEnDest[dest][res] + cargaDest[destAnt][res];
                    $("#boton" + res + dest).text(formatNumber(Math.round(1 * recursosDest[dest][res])));
                });
            }

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

            if (deboAlertasF) {
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
    if (deboAlertasF) {
        if (recursosDest[0] != undefined) {
            if (recursosDest[0]["fuel"] - cargaDest[0]["fuel"] < fuelDestT) {
                faltaFuel = true;
            }
        }
    }

    //las misiones son viables
    // añadir que no se puede Transferir a una flota (solo Atacar)
    for (dest = 1; dest < destinos.length; dest++) {
        var destAnt = dest - 1;
        var destPost = dest + 1;

        var orden = $("#ordenDest" + dest).val();
        destinos[dest].mision = orden;

        var hayErrorMision = false;

        var img = origenImagenes + "/flotas/nada.jpg";
        if (orden != "") {
            var img = origenImagenes + "/flotas/" + orden + ".jpg";
        }
        if (recursosDest[dest]["estrella"] == destinos[dest]["estrella"] && recursosDest[dest]["orbita"] == destinos[dest]["orbita"]) {
            if (recursosDest[dest]["imagen"] != undefined) {
                img = recursosDest[dest]["imagen"];
            }
        } else {
            recursosArray.forEach(res => {
                recursosEnDest[dest][res] = 0;
            });
        }
        if (orden != "") {
            var ordenAnt = $("#ordenDest" + destAnt).val();
            var ordenPost = $("#ordenDest" + destPost).val();
            // no se puede llegar
            if (ordenAnt == "" || ordenAnt == "Transferir" || ordenAnt == "Recolectar" || ordenAnt == "Orbitar" || ordenAnt == "Extraer") {
                errores += " No se alcanzará destino " + dest;
                hayErrorMision = true;
            }

            soyUltimoDestino = false;
            // soy la ultima y debe ser de cierre
            if (!!destPost && !!!ordenPost) {
                if (!!!ordenPost && orden != "Transferir" && orden != "Recolectar" && orden != "Orbitar" && orden == "Extraer") {
                    errores += " la misión del último destino no es Transferir, Orbitar, Extraer o Recolectar";
                    hayErrorMision = true;
                }
            }
            if (!!!ordenPost && !!orden) {
                if (orden != "Transferir" && orden != "Recolectar" && orden != "Orbitar") {
                    errores += " la misión del último destino no es Transferir, Orbitar, Extraer o Recolectar";
                    hayErrorMision = true;
                }
            }

            if (orden == "Transferir" || orden == "Recolectar" || orden == "Orbitar" || orden == "Extraer") {
                soyUltimoDestino = true;
            }

            if (orden == "Atacar" && !hayErrorMision) {
                $("#cajitaDestino" + dest)
                    .removeClass("cajita-success")
                    .addClass("cajita-light");
            } else {
                $("#cajitaDestino" + dest)
                    .addClass("cajita-success")
                    .removeClass("cajita-light");
            }

            if (soyUltimoDestino) {
                $(".enviarRecursos" + dest).attr("disabled", true);
                if (orden != "Recolectar" && orden != "Extraer" && orden != "Orbitar") {
                    $(".prioridadRecursos" + dest).attr("disabled", true);
                } else {
                    $(".prioridadRecursos" + dest).attr("disabled", false);
                }
            } else {
                $(".enviarRecursos" + dest).attr("disabled", false);
                $(".prioridadRecursos" + dest).attr("disabled", false);
            }
        } else if (dest == 1 && orden == "") {
            errores += " ,sin misión";
            hayErrorMision = true;
        } else {
            var img = origenImagenes + "/flotas/nada.jpg";
        }

        $("#imagenDestino" + dest).attr("src", img);

        if (deboAlertasF) {
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
    }

    if (faltaFuel) {
        errores += " Fuel insuficiente en origen";
    }

    //falta velocidad

    /// se puede enviar o no
    if (!botonenviarAnulado) {
        $("#botonEnviar").text(EnviarFlotaTxt);
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
    } else {
        $("#botonEnviar").prop("disabled", true);
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

            /*
            if (recursosDest[dest]["estrella"] == destinos[dest]["estrella"] && recursosDest[dest]["orbita"] == destinos[dest]["orbita"]){

            } else {
                if(recursosEnDest==undefined){
                    recursosEnDest=JSON.parse(JSON.stringify(cargaDestVacia));
                }
                //recursosEnDest[dest]=JSON.parse(JSON.stringify(cargaDestVacia[dest]));
            }
            */

            if (recursosEnDest[dest] == undefined) {
                recursosEnDest[dest] = JSON.parse(JSON.stringify(cargaDestVacia[dest]));
            }
            if (recursosEnDest[destAnt] == undefined) {
                recursosEnDest[destAnt] = JSON.parse(JSON.stringify(cargaDestVacia[destAnt]));
            }

            recursosDest[dest]["estrella"] = destinos[dest].estrella;
            recursosDest[dest]["orbita"] = destinos[dest].orbita;

            origenCalculo = [];
            origenCalculo.estrella = destinos[destAnt].estrella;
            origenCalculo.orbita = destinos[destAnt].orbita;
            destinoCalculo = [];
            destinoCalculo.estrella = destinos[dest].estrella;
            destinoCalculo.orbita = destinos[dest].orbita;

            if (recursosEnDest[destAnt]["estrella"] != undefined) {
                origenCalculo.estrella = recursosEnDest[destAnt]["estrella"];
                if (destinos[destAnt].orbita == 0) {
                    origenCalculo.orbita = recursosEnDest[destAnt]["orbita"];
                }
            }

            if (recursosEnDest[dest]["estrella"] != undefined) {
                destinoCalculo.estrella = recursosEnDest[dest]["estrella"];
                if (destinos[dest].orbita == 0) {
                    destinoCalculo.orbita = recursosEnDest[dest]["orbita"];
                }
            } else {
                recursosEnDest[dest] = JSON.parse(JSON.stringify(cargaDestVacia[dest]));
            }

            var distancia = DistanciaUniverso(origenCalculo, destinoCalculo);

            if (isNaN(distancia) || destinos[dest].estrella == "") {
                NoSeMueve(dest);
            } else {
                var porcentVel = $("#porcentVDest" + dest).val() / 100;
                var fuelDest = GastoFuel(distancia, valFlotaT.fuel, porcentVel);
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
    Avisos();
}

function NoSeMueve(dest) {
    //si la flota se no mueve coloca -
    $("#fuelDest" + dest).text("-");
    $("#tiempoDest" + dest).text("-");
}

function SiSeMueve(dest, fuelDest, tiempoDest) {
    //si la flota se mueve coloca valores
    $("#fuelDest" + dest).text(formatNumber(fuelDest));
    $("#tiempoDest" + dest).text(formatHMS(tiempoDest));
}

function SelectorDestinos(dest) {
    // el selector coloca sistema y planeta
    if ($("#listaPlanetas" + dest).val() != null) {
        input = $("#listaPlanetas" + dest)
            .val()
            .split("x");
        $("#sistemaDest" + dest).val(input[0]);
        $("#planetaDest" + dest).val(input[1]);
        TraerRecursos(input[0], input[1], dest);
    }
}

function MostrarRecursos(dest) {
    recursosArray.forEach(res => {
        $("#boton" + res + dest).text(formatNumber(Math.round(1 * recursosDest[dest][res])));
    });
}

function CargarRecurso(dest, res) {
    var acargar = 0;
    var hueco = 0;
    if (puedoCargarRecurso[dest]) {
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
        CargaActual(dest); //al final recapitula
        $("#botonenvias" + dest).text(formatNumber(cargaDest[dest].total));
    }
}

function TraerRecursos(sistema, planeta, dest) {
    if (sistema != "none") {
        $.ajax({
            method: "GET",
            url: "/juego/flotas/traerRecursos/" + sistema + "/" + planeta,
            success: function(data) {
                if (recursosEnDest[dest] == undefined || data.recursos == undefined) {
                    recursosEnDest[dest] = JSON.parse(JSON.stringify(cargaDestVacia[dest]));
                }
                recursosArray.forEach(res => {
                    recursosEnDest[dest][res] = 1 * data.recursos[res];
                });
                recursosDest[dest]["imagen"] = data.recursos["imagen"];
                $("#imagenDestino" + dest).attr("src", data.recursos["imagen"]);
                recursosDest[dest]["estrella"] = sistema;
                recursosDest[dest]["orbita"] = planeta;
                destinos[dest]["estrella"] = sistema;
                destinos[dest]["orbita"] = planeta;
                recursosEnDest[dest]["estrella"] = data.recursos["estrella"];
                recursosEnDest[dest]["orbita"] = data.recursos["orbita"];

                MostrarRecursos(dest);
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
        recursosArray.forEach(res => {
            recursosDest[dest][res] = 0;
        });
        recursosDest[dest].total = 0;
        MostrarRecursos(dest);
        Avisos();
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
    if (deboCargarMunicion) {
        res = "municion";
        for (dest = 0; dest < destinos.length; dest++) {
            var muniTotal = valFlotaT[res]; //+1* recur.replace(/\./g,'');
            $("#" + res + dest).val(formatNumber(muniTotal));
        }
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
        if (recursosDest[dest] != undefined && recursosDest[dest][res] != undefined) {
            var resto = Math.round(recursosDest[dest][res] - recur);
        }
        if (puedoCargarRecurso[dest]) {
            $("#boton" + res + dest).text(formatNumber(resto));
        }
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

function NaveGeneralAFlota(canti) {
    if (canti > 0) {
        navesEstacionadas.forEach(nave => {
            NaveAflota(nave.disenios_id, "m");
        });
    } else {
        navesEstacionadas.forEach(nave => {
            NaveAflota(nave.disenios_id, 0);
        });
    }
}

function NaveGeneralAHangar(canti) {
    if (canti > 0) {
        navesEstacionadas.forEach(nave => {
            NaveAhangar(nave.disenios_id, "m");
        });
    } else {
        navesEstacionadas.forEach(nave => {
            NaveAhangar(nave.disenios_id, 0);
        });
    }
}

function AddValoresVacios() {
    //for (n = 1; n < cantidadDestinos + 1; n++) {
    cargaDest = JSON.parse(JSON.stringify(cargaDestVacia));
    prioridades = prioridadesVacia;
    destinos = destinosVacia;
}

function enviarFlota() {
    if (enviarEnOrbita) {
        if (destinos[0]["estrella"] != undefined) {
            flota["estrella"] = destinos[0]["estrella"];
            flota["orbita"] = destinos[0]["orbita"];
        }
        MostrarDestinos();
        EnviarFlotaTxt = "Enviar Flota";
        $("#botonEnviar").text(EnviarFlotaTxt);
        AddValoresVacios();
        RecursosInicio();
        destinos[0]["estrella"] = flota["estrella"];
        destinos[0]["orbita"] = flota["orbita"];
        enviarEnOrbita = false;
        return;
    }

    if (errores.length > 0) {
        alert(errores);
    } else {
        flota.nombre = $("#nombreFlota").val();
        for (dest = 1; dest < destinos.length; dest++) {
            recursosArray.forEach(res => {
                prioridades[dest][res] = $("#prioridad" + res + dest).val();
            });
        }

        $.ajax({
            type: "post",
            dataType: "json",
            url: "/juego/flotas/enviarFlota",
            //contentType: 'application/json; charset=utf-8',
            data: { navesEstacionadas: navesEstacionadas, destinos: destinos, cargaDest: cargaDest, prioridades: prioridades, flota: flota },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            beforeSend: function() {
                $("#botonEnviar").prop("disabled", true);
                var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando....';
                $("#botonEnviar").html(spinner);
            },
            success: function(response) {
                $("#botonEnviar").text(EnviarFlotaTxt);
                $("#botonEnviar").prop("disabled", false);
                if (response.errores == "") {
                    alert("Flota enviada");
                } else {
                    alert(response.errores);
                }
            },
            error: function(xhr, textStatus, thrownError) {
                $("#botonEnviar").text(EnviarFlotaTxt);
                $("#botonEnviar").prop("disabled", false);
                console.log("status", xhr.status);
                console.log("error", thrownError);
                //alert(data.errores);
            },
        });
    }
}

function modificarFlota() {
    flota.nombre = $("#nombreFlota").val();
    for (dest = 0; dest < destinos.length; dest++) {
        recursosArray.forEach(res => {
            prioridades[dest][res] = $("#prioridad" + res + dest).val();
        });
    }

    $.ajax({
        type: "post",
        dataType: "json",
        url: "/juego/flotas/modificarFlota",
        //contentType: 'application/json; charset=utf-8',
        data: { navesEstacionadas: navesEstacionadas, destinos: destinos, cargaDest: cargaDest, prioridades: prioridades, flota: flota },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function() {
            $("#botonModificar").prop("disabled", true);
            var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Modificando....';
            $("#botonModificar").html(spinner);
        },
        success: function(response) {
            $("#botonModificar").text("Modificar Flota");
            $("#botonModificar").prop("disabled", false);
            if (response.errores == "") {
                alert("Flota modificada");
            } else {
                alert(response.errores);
            }
        },
        error: function(xhr, textStatus, thrownError) {
            $("#botonModificar").text("Modificar Flota");
            $("#botonModificar").prop("disabled", false);
            console.log("status", xhr.status);
            console.log("error", thrownError);
            //alert(data.errores);
        },
    });
}

function formSuccess() {
    $("#msgSubmit").removeClass("hidden");
}

function RecursosSiDestino(dest) {
    estrella = $("#sistemaDest" + dest).val();
    orbita = $("#planetaDest" + dest).val();
    destinoF = estrella + "x" + orbita;
    if (dest > 0 && destinoF.length > 4) {
        $("#listaPlanetas" + dest)
            .val(destinoF)
            .change();
        if (destinos[dest] != undefined) {
            $("#ordenDest" + dest)
                .val(destinos[dest].misionSEG)
                .change();
        }
    }
}

/////////////////////////////////////******************* FLOTAS EN VUELO ********************************** //////////////////////////////////

var fechaAhoraMilisec = Date.now();
primeraActualizacionEnVuelo = true;
primeraActualizacionEnRecoleccion = true;
primeraActualizacionEnOrbita = true;

function verFlotasEnVuelo() {
    haceCuantoActualice = Date.now() - fechaAhoraMilisec;

    if (primeraActualizacionEnVuelo || haceCuantoActualice > 10000) {
        primeraActualizacionEnVuelo = false;
        $.ajax({
            type: "GET",
            // dataType: "json",
            url: "/juego/flotas/ajax/verFlotasEnVuelo",
            // contentType: 'application/json; charset=utf-8',
            //data: { },
            //headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),  },
            beforeSend: function() {},
            success: function(data) {
                //alert(data);
                RellenarFlotasEnVuelo(data, "tablaFlotas");
            },
            error: function(xhr, textStatus, thrownError) {
                console.log("status", xhr.status);
                console.log("error", thrownError);
                //alert(data.errores);
            },
        });
    }
}

function verFlotasEnRecoleccion() {
    haceCuantoActualice = Date.now() - fechaAhoraMilisec;

    if (primeraActualizacionEnRecoleccion || haceCuantoActualice > 30000) {
        primeraActualizacionEnRecoleccion = false;
        $.ajax({
            type: "GET",
            // dataType: "json",
            url: "/juego/flotas/ajax/verFlotasEnRecoleccion",
            // contentType: 'application/json; charset=utf-8',
            beforeSend: function() {},
            success: function(data) {
                //alert(data);
                RellenarFlotasEnVuelo(data, "tablaRecoleccion");
            },
            error: function(xhr, textStatus, thrownError) {
                console.log("status", xhr.status);
                console.log("error", thrownError);
                //alert(data.errores);
            },
        });
    }
}

function verFlotasEnOrbita() {
    haceCuantoActualice = Date.now() - fechaAhoraMilisec;

    if (primeraActualizacionEnOrbita || haceCuantoActualice > 30000) {
        primeraActualizacionEnOrbita = false;
        $.ajax({
            type: "GET",
            // dataType: "json",
            url: "/juego/flotas/ajax/verFlotasEnOrbita",
            // contentType: 'application/json; charset=utf-8',
            beforeSend: function() {},
            success: function(data) {
                //alert(data);
                RellenarFlotasEnVuelo(data, "tablaOrbitando");
            },
            error: function(xhr, textStatus, thrownError) {
                console.log("status", xhr.status);
                console.log("error", thrownError);
                //alert(data.errores);
            },
        });
    }
}


function RellenarFlotasEnVuelo(data,prefix){

    $("#"+prefix+"Propias").empty();
    $("#"+prefix+"Aliadas").empty();
    $("#"+prefix+"Extrangeras").empty();

    var flotas= data["flotas"];
    console.log(flotas);

    var fila=0;
    flotas.forEach(flota => {

        if (flota!=null){

            nick=flota['nick'];
           // var img = origenImagenes + "/flotas/nada.jpg";
            Columna1cabeza="";
            Columna1contenido="";
            AnchoColumnasMedio=3;

            fila++;
            if(flota['estado']=="envuelo"){

                if (flota['trestante']!=null && flota['trestante']!=undefined && flota['tvuelo']!=null && flota['tvuelo']!=undefined){
                    progreso=Math.round(((flota['tvuelo']-flota['trestante'])/flota['tvuelo'])*100,0);
                } else {
                    progreso=0;
                }

                if (flota['trestante']!=null && flota['trestante']!=undefined){
                    trestante=formatHMS(1*flota['trestante']);
                } else {
                    trestante="?";
                }
                barraytiempo=`<th colspan="3" class="text-success text-center borderless align-middle">
                <div class="progress-bar bg-success" role="progressbar" style="width: `+progreso+`%;"
                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">`+progreso+`%</div>
                </th>
                <th id="trestantepropia`+fila+`" colspan="1" class="text-light">`+trestante+`</th>`;
                cabeza1="Tiempo restante: ";
                cabeza2="tiempo regreso: ";
                tregreso=formatHMS(1*flota['tregreso']);

            }  else if(flota['estado']=="enorbita") {
                barraytiempo=`<th colspan="3" class="text-success text-center borderless align-middle">`+nick+` </th>
                <th id="trestantepropia`+fila+`" colspan="1" class="text-light"></th>`;
                cabeza1="";
                cabeza2="Carga Actual"
                trestante="";
                tregreso=formatNumber(1*flota['cargaT']);
            }else {
                barraytiempo=`<th colspan="3" class="text-success text-center borderless align-middle">`+nick+` </th>
                <th id="trestantepropia`+fila+`" colspan="1" class="text-light"></th>`;
                cabeza1="Recolección actual";
                cabeza2="Carga Actual"
                trestante=formatNumber(1*flota['recoleccion'])+" ud/h";
                tregreso=formatNumber(1*flota['cargaT']);
                AnchoColumnasMedio=2;
                Columna1cabeza='<td colspan="'+AnchoColumnasMedio+'" class="text-warning">Máximo extracción</td>';
                maximoPosible=formatNumber(1*flota['maximoPosible'])+" ud/h";
                Columna1contenido='<td colspan="'+AnchoColumnasMedio+'" class="text-light">'+maximoPosible+'</td>';
            }

            ataque=formatNumber(1*flota['ataque']);
            defensa=formatNumber(1*flota['defensa']);

            //recursosCarga=flota['recursos']

            if (flota['tipo']=="propia"){
                deshabilitarRegreso="";
                colorbotonRegreso="danger";

                if(flota['misionregreso']==null && flota['estado']=="envuelo"){
                    tregreso="Ya regresando";
                    deshabilitarRegreso="disabled";
                    colorbotonRegreso="light";
                } else if(flota['estado']!="envuelo"){
                    deshabilitarRegreso="disabled";
                    colorbotonRegreso="light";
                }

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
                            `+barraytiempo+`
                            <th colspan="2" class="text-success text-center borderless align-middle">
                                <big>`+flota['mision']+`<big>
                            </th>
                            <th colspan="2" class="text-success text-center borderless align-middle">
                                <big>`+flota['destino']+`<big>
                            </th>
                        </div>
                    </tr>
                    <tr id="info`+fila+`" class="accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        `+Columna1cabeza+`
                        <td colspan="`+AnchoColumnasMedio+`" class="text-warning">`+cabeza1+`</td>
                        <td colspan="`+AnchoColumnasMedio+`" class="text-warning">`+cabeza2+`</td>
                        <td colspan="`+AnchoColumnasMedio+`" class="text-warning">Ataque:</td>
                        <td colspan="`+AnchoColumnasMedio+`" class="text-warning">Defensa</td>
                    </tr>
                    <tr id="info`+fila+`" class=" accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        `+Columna1contenido+`
                        <td id="trestantepropia`+fila+`" colspan="`+AnchoColumnasMedio+`" class="text-light">`+trestante+`</td>
                        <td id="tregresopropia`+fila+`" colspan="`+AnchoColumnasMedio+`" class="text-light">`+tregreso+`</td>
                        <td colspan="`+AnchoColumnasMedio+`" class="text-light">`+ataque+`</td>
                        <td colspan="`+AnchoColumnasMedio+`" class="text-light">`+defensa+`</td>
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
                            <a type="button" class="`+deshabilitarRegreso+` btn btn-outline-`+colorbotonRegreso+` col-12 text-`+colorbotonRegreso+`" id="botonregreso`+flota['numeroflota']+`"
                            onclick="regresarFlota('`+flota['numeroflota']+`')">
                                <i class="fa fa-times "></i> Regresar
                            </a>
                        </td>
                        <td colspan="4">
                            <a class="btn btn-outline-primary col-12 text-primary" type="button"
                            href="`+linkFlota+`/-1/-1/`+flota['numeroflota']+"/"+flota['estado']+`">
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
                $("#"+prefix+"Propias").append(tablaFlotasPropias);
            }
            else if (flota['tipo']=="aliada"){

                var tablaFlotasAliadas = `
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
                            `+barraytiempo+`
                            <th colspan="2" class="text-success text-center borderless align-middle">
                                <big>`+flota['mision']+`<big>
                            </th>
                            <th colspan="3" class="text-success text-center borderless align-middle">
                                <big>`+flota['destino']+`<big>
                            </th>
                        </div>
                    </tr>
                    <tr id="info`+fila+`" class="accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                    <td colspan="3" class="text-warning">`+cabeza1+`</td>
                    <td colspan="3" class="text-warning">`+cabeza2+`</td>
                        <td colspan="3" class="text-warning">ataque:</td>
                        <td colspan="3" class="text-warning">defensa</td>
                    </tr>
                    <tr id="info`+fila+`" class=" accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                    <td id="trestantealiada`+fila+`" colspan="3" class="text-light">`+trestante+`</td>
                    <td id="tregresoaliada`+fila+`" colspan="3" class="text-light">`+tregreso+`</td>
                        <td colspan="3" class="text-light">`+ataque+`</td>
                        <td colspan="3" class="text-light">`+defensa+`</td>
                    </tr>

                    <tr id="info`+fila+`" class="accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        <td colspan="4">

                        </td>
                        <td colspan="5">

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
                $("#"+prefix+"Aliadas").append(tablaFlotasAliadas);
            }
            else if (flota['tipo']=="ajena"){
                trestante="";
                cabeza1="";

                var tablaFlotasExtrangeras = `
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
                            `+barraytiempo+`
                            <th colspan="2" class="text-success text-center borderless align-middle">
                                <big>`+flota['mision']+`<big>
                            </th>
                            <th colspan="3" class="text-success text-center borderless align-middle">
                                <big>`+flota['destino']+`<big>
                            </th>
                        </div>
                    </tr>
                    <tr id="info`+fila+`" class="accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                    <td colspan="3" class="text-warning">`+cabeza1+`</td>
                    <td colspan="3" class="text-warning">`+cabeza2+`</td>
                        <td colspan="3" class="text-warning">ataque:</td>
                        <td colspan="3" class="text-warning">defensa</td>
                    </tr>
                    <tr id="info`+fila+`" class=" accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        <td id="trestanteajena`+fila+`" colspan="3" class="text-light">`+trestante+`</td>
                        <td id="tregresoajena`+fila+`" colspan="3" class="text-light">`+tregreso+`</td>
                        <td colspan="3" class="text-light">`+ataque+`</td>
                        <td colspan="3" class="text-light">`+defensa+`</td>
                    </tr>

                    <tr id="info`+fila+`" class="accordion-collapse collapse" aria-labelledby="info`+fila+`" data-bs-parent="#cuadro`+fila+`">
                        <td colspan="4">

                        </td>
                        <td colspan="5">
                            <a type="button" class="disabled btn btn-outline-danger col-12 text-danger"
                            href="`+linkFlota+`/-1/-1/`+flota['numeroflota']+`">
                            Atacar
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
                $("#"+prefix+"Extrangeras").append(tablaFlotasExtrangeras);
            }

        }

    });
}

function regresarFlota(numeroflota) {
    primeraActualizacionEnVuelo = true;
    $.ajax({
        type: "GET",
        //dataType: "json",
        url: "/juego/flotas/regresarFlota/" + numeroflota,
        beforeSend: function() {
            $("#botonregreso" + numeroflota).prop("disabled", true);
            var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando....';
            $("#botonregreso" + numeroflota).html(spinner);
        },
        success: function(response) {
            $("#botonregreso" + numeroflota).text("Regresando...");
            if (response.errores == "") {
                alert("Flota regresando");
                verFlotasEnVuelo();
            } else {
                $("#botonregreso" + numeroflota).prop("disabled", false);
                $("#botonregreso" + numeroflota).text("Regresar");
                alert(response.errores);
            }
        },
    });
}
