CrearFondoGruposNaves();
margenIzqDespliegue=((window.innerWidth-anchoDespliegue)/2);
zoom(-10, 0,0);zoom(-10, 0,0);zoom(-10, 0,0);zoom(-10, 0,0);
camera.x=($('#combate').width() /4)+$('#combate').offset().left;
camera.y=50;


interfaceCombate=false;
cantidadRondas=0;
tiempoTurnos[1]=100;//fin del turno 1 en sec/10
var grupoPorDefecto=null; //numero de grupo por defecto


        //  Fondos y decoracion

        const imagenFondo=imgNada;
        var planetasFondo=new Array();
        var fondoParalax1=new Array();
        var fondoParalax2=new Array();

        var imagenPlanetaFondo=new Array();
        imagenPlanetaFondo.imagen=imgfondoparalax1;
        imagenPlanetaFondo.x=100;
        imagenPlanetaFondo.y=100;
        imagenPlanetaFondo.scale=2;
        fondoParalax1.push(imagenPlanetaFondo);


        var imagenPlanetaFondo=new Array();
        imagenPlanetaFondo.imagen=imgfondoparalax2;
        imagenPlanetaFondo.x=1000;
        imagenPlanetaFondo.y=300;
        imagenPlanetaFondo.scale=2;
        fondoParalax2.push(imagenPlanetaFondo);

        planetasFondo.fondoParalax1=fondoParalax1;
        planetasFondo.fondoParalax2=fondoParalax2;




        //////////////////////////////
        // datos de jugador

        var alianzas=new Array();
        var alianza=new Array();
        alianza.nombre="ninguna";
        alianzas[0]=alianza;

        var valoresjugador=new Array();

        valoresjugador.escudo=imgNada; //log de la alianza
        valoresjugador.DefensaInicial=0; //se calcula dinamicamente
        valoresjugador.nombre=jugadorActual.nombre;
        valoresjugador.njugador=jugadorActual.id;
        valoresjugador.ordenjugador=0;
        valoresjugador.bando=1;
        valoresjugador.alianza=0;
        valoresJugadores[jugadorActual.id]=valoresjugador;

        //////////////////////////////
        // datos de diseños naves

        var valoresDisenos=new Array();
        disenios.forEach(disenio => {
            var diseno=new Array();
            ndiseno=disenio['id'];
            diseno.nimagen=disenio['fuselajes_id'];
            diseno.skin=disenio['skin'];
            diseno.ataque=disenio['datos']['ataque'];
            diseno.defensa=disenio['datos']['defensa'];
            diseno.denominacion=disenio['codigo'];
            diseno.nombre=disenio['nombre'];

            valoresDisenos[ndiseno]=diseno;
        });


    ///naves del un jugador segun diseños
    respawnave=new Array();


    disenios.forEach(disenio => {
        respawdatosnave=CrearNaveGrupoNaves(disenio);
        respawnave.push(respawdatosnave);
    });

        // crear grupos y naves
        respawgrupo=new Array();

        listaGruposNaves.forEach(grupo => {
            grupo.visible=true;
            if (grupo["pordefecto"]!=1){
                var respawgrupodatos=CrearGrupoNaves(grupo);

                //cogiendo diseños de este grupo
                navesEsteGrupo= $.grep(respawnave, function(nave) {
                    return nave.grupo == grupo['id'];
                    });

                ///estos diseños no estan en por defecto
                navesEsteGrupo.forEach(disenio => {
                    disenio.grupoPorDefecto=0;
                });

                respawgrupo.push([respawgrupodatos,navesEsteGrupo]); //añado naves
            } else {
                grupoPorDefectoInicio=grupo;
            }
        });

        //naves quedaron sin grupo van al por defecto
        navesSinGrupo= $.grep(respawnave, function(nave) {
            return nave.grupoPorDefecto == 1;
            });

            grupo=grupoPorDefectoInicio;
            respawgrupodatos=new Array();
            respawgrupodatos.id=grupo['id'];
            respawgrupodatos.ngrupo=respawgrupo.length;
            respawgrupodatos.x=margenIzqDespliegue+1*grupo['coordx']; //margenIzqDespliegue
            respawgrupodatos.y=1*grupo['coordy'];
            respawgrupodatos.jugador=jugadorActual.id;
            respawgrupodatos.nombregrupo=grupo['nombre'];
            respawgrupodatos.actitud=grupo['actitud'];
            respawgrupodatos.objetivo=grupo['objetivo'];
            respawgrupodatos.relacion=grupo['relacion'];
            respawgrupodatos.bando=valoresJugadores[respawgrupodatos.jugador].bando;
            respawgrupo.push([respawgrupodatos,navesSinGrupo]); //añado naves

            grupoPorDefecto=grupo['id'];;

            //asigno las naves sin grupo al por defecto
            navesSinGrupo.forEach(nave => {
                nave.grupo=grupo['id'];
            });



    respawGrupos[0]=respawgrupo; //creo el respaw para el segundo 0
    //posicion incio grupos

    movGrupo[0]=[respawgrupodatos.x,respawgrupodatos.y];  //coords de incio
    movGrupos[0]=movGrupo;


////funciones propias de pantalla grupos de naves  ////////////////////////////

function CrearGrupoNaves(grupo,ngrupo=respawgrupo.length){
    respawgrupodatos=new Array();
    respawgrupodatos.id=grupo['id'];
    respawgrupodatos.ngrupo=ngrupo;
    respawgrupodatos.x=margenIzqDespliegue+1*grupo['coordx']; //margenIzqDespliegue
    respawgrupodatos.y=1*grupo['coordy'];
    respawgrupodatos.jugador=jugadorActual.id;
    respawgrupodatos.nombregrupo=grupo['nombre'];
    respawgrupodatos.actitud=grupo['actitud'];
    respawgrupodatos.tipogrupo=grupo['objetivo'];
    respawgrupodatos.bando=valoresJugadores[respawgrupodatos.jugador].bando;

    return respawgrupodatos;
}

function CrearNaveGrupoNaves(disenio,cantidad=0,turno=turnoinicial,i=respawnave.length){
    respawdatosnave=new Array();
    respawdatosnave.nnave=i;
    respawdatosnave.velmax=disenio['datos']['maniobra'];
    respawdatosnave.diseno=disenio['id'];
    respawdatosnave.cantidad=cantidad;
    respawdatosnave.grupo=disenio['posicion'];
    respawdatosnave.grupoPorDefecto=1;
    vidaNaves[i]=new Array();
    vidaNaves[i][turno]=100; ///vida al iniciar el turno
    return respawdatosnave;
}

function CrearGrupoYa(nombre="",actitud="huida",objetivo="dhago"){
    respawgrupo=new Array();
    grupo=new Array();

    grupo['id']=1+gnave[gnave.length-1].id;//1*gnave.length;
    grupo['coordx']=50+10*gnave.length;
    grupo['coordy']=50+10*gnave.length;
    if (nombre.length<1){nombre="grupo"+gnave.length;}
    grupo['nombre']=nombre;
    grupo['actitud']=actitud;
    grupo['objetivo']=objetivo;
    yamismo=Math.round(tiempo+1);

    var respawgrupodatos=CrearGrupoNaves(grupo,gnave.length);
    respawgrupo.push([respawgrupodatos,null]);
   // respawGrupos[Math.round(tiempo+1)]=respawgrupo;
    Creagrupo(respawgrupo[0]);

    var grupon = {
        'id' : grupo['id'],
        'coordx' : grupo['coordx'],
        'coordy' : grupo['coordy'],
        'nombre' : grupo['nombre'],
        'actitud' : grupo['actitud'],
        'objetivo' : grupo['objetivo'],
        'relacion' : 'Ninguna',
        'pordefecto' : '0',
        'visible': true,
        'nuevo': true,
    }
    listaGruposNaves.push(grupon);

    //'disenios_id' => NULL,
    //'grupos_naves_id' => NULL,

    cargarGruposNavesExistentes();
}

function BorrarGrupo(ngrupo){

    var grupoBorrar= $.grep(gnave, function(grupo) {
        return grupo.id == ngrupo;
        })[0];

    ngrupon=grupoBorrar.ngrupo;

    if (ngrupo!=grupoPorDefecto){
        gnave[ngrupon].visible=false;
        gnave[ngrupon].destroy=true;
        nave.forEach(element => {
            if (element.grupo==ngrupon){
                element.grupo=grupoPorDefecto;
            }
        });

        var grupoDLista= $.grep(listaGruposNaves, function(grupo) {
            return grupo.id == ngrupo;
            })[0];

        grupoDLista.visible=false
        cargarGruposNavesExistentes();
    }
}

function CambiarNaveGrupo(nnave,ngrupo){
    if (nave[nnave].velmax<40){
        nave[nnave].x=gnave[ngrupo].x;
        nave[nnave].y=gnave[ngrupo].y;
    }
    nave[nnave].grupo=ngrupo;
}

function DivideNavesGrupoNave(nnave,ngrupo,cantidad){

    var ndiseno=nave[nnave].diseno;
    var disenio= $.grep(disenios, function(nave) {
        return nave.id == ndiseno;
        })[0];

    turnoactual=Math.round(((tiempoanime / factorTiempoMovimiento) ),0);
    naveaCrear=CrearNaveGrupoNaves(disenio,cantidad,turnoactual,nave.length);
    Creanave(naveaCrear,ngrupo);
    nave[nnave].cantidad-=cantidad;
}


function ModificarGrupos(){

    gnave.forEach(ggnaves => {
        idGrupo=ggnaves.id;

        var grupoDLista= $.grep(listaGruposNaves, function(grupo) {
            return grupo.id == idGrupo;
            })[0];

            grupoDLista.nombre=$("#nombreGrupo"+idGrupo).val();
            grupoDLista.actitud=$("#actitud"+idGrupo).val();
            grupoDLista.objetivo=$("#objetivo"+idGrupo).val();
            grupoDLista.relacion=$("#relacion"+idGrupo).val();
            grupoDLista.grupos_naves_id=$("#objrelacion"+idGrupo).val();
            grupoDLista.coordx=ggnaves.destinox;
            grupoDLista.coordy=ggnaves.destinoy;
    });
}

let GuardarGruposTxt="Guardar Todo";

function guardarGrupos(){
    var modal = new bootstrap.Modal(document.getElementById('datosModal'));

    $.ajax({
        type: "post",
        dataType: "json",
        url: "/juego/gruposNaves/guardar/gruposnaves",
        //contentType: 'application/json; charset=utf-8',
        data: {listaGruposNaves: listaGruposNaves},
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function() {
            $("#guardarGrupos").prop("disabled", true);
            var spinner = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Enviando....';
            $("#guardarGrupos").html(spinner);
        },
        success: function(response) {
            modal.show();
            $("#guardarGrupos").text(GuardarGruposTxt);
            $("#guardarGrupos").prop("disabled", false);
            if (response.errores == "") {
                $("#ModalTitulo").html("Grupos guardados");
                $("#datosContenido").html("Todos los cambios se han guardado correctamente");
            } else {
                //alert(response.errores);
                $("#ModalTitulo").html("Cambios no guardados");
                $("#datosContenido").html(response.errores);
            }
        },
        error: function(xhr, textStatus, thrownError) {
            modal.show();
            $("#guardarGrupos").text(GuardarGruposTxt);
            $("#guardarGrupos").prop("disabled", false);
            console.log("status", xhr.status);
            console.log("error", thrownError);
            $("#ModalTitulo").html("Cambios no guardados");
        $("#datosContenido").html(new Date() + " " + thrownError);
            //alert(data.errores);
        },
    });


}


