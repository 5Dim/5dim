CrearFondoGruposNaves();
margenIzqDespliegue=((window.innerWidth-anchoDespliegue)/2);
zoom(-10, 0,0);zoom(-10, 0,0);zoom(-10, 0,0);zoom(-10, 0,0);
camera.x=($('#combate').width() /4)+$('#combate').offset().left;
camera.y=50;


interfaceCombate=false;
cantidadRondas=0;
tiempoTurnos[1]=100;//fin del turno 1 en sec/10


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

    var i=0;
    disenios.forEach(disenio => {
        respawdatosnave=new Array();
        respawdatosnave.nnave=i;
        respawdatosnave.velmax=disenio['datos']['maniobra'];
        respawdatosnave.diseno=disenio['id'];
        respawdatosnave.cantidad=0;
        respawdatosnave.grupo=disenio['posicion'];
        respawdatosnave.grupoPorDefecto=1;
        vidaNaves[i]=new Array();
        vidaNaves[i][turnoinicial]=100; ///vida al iniciar el turno

        respawnave.push(respawdatosnave);
        i++;
    });

        // crear grupos y naves
        respawgrupo=new Array();
        var ngr=0;
        listaGruposNaves.forEach(grupo => {
            if (grupo["pordefecto"]!=1){
                respawgrupodatos=new Array();
                respawgrupodatos.id=grupo['id'];
                respawgrupodatos.ngrupo=ngr;
                respawgrupodatos.x=margenIzqDespliegue+1*grupo['coordx']; //margenIzqDespliegue
                respawgrupodatos.y=1*grupo['coordy'];
                respawgrupodatos.jugador=jugadorActual.id;
                respawgrupodatos.nombregrupo=grupo['nombre'];
                respawgrupodatos.actitud=grupo['actitud'];
                respawgrupodatos.tipogrupo=grupo['objetivo'];
                respawgrupodatos.bando=valoresJugadores[respawgrupodatos.jugador].bando;

                //cogiendo diseños de este grupo
                navesEsteGrupo= $.grep(respawnave, function(nave) {
                    return nave.grupo == grupo['id'];
                    });

                ///estos diseños no estan en por defecto
                navesEsteGrupo.forEach(disenio => {
                    disenio.grupoPorDefecto=0;
                });

                respawgrupo.push([respawgrupodatos,navesEsteGrupo]); //añado naves

                ngr++;
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
            respawgrupodatos.ngrupo=ngr;
            respawgrupodatos.x=margenIzqDespliegue+1*grupo['coordx']; //margenIzqDespliegue
            respawgrupodatos.y=1*grupo['coordy'];
            respawgrupodatos.jugador=jugadorActual.id;
            respawgrupodatos.nombregrupo=grupo['nombre'];
            respawgrupodatos.actitud=grupo['actitud'];
            respawgrupodatos.tipogrupo=grupo['objetivo'];
            respawgrupodatos.bando=valoresJugadores[respawgrupodatos.jugador].bando;
            respawgrupo.push([respawgrupodatos,navesSinGrupo]); //añado naves






    respawGrupos[0]=respawgrupo; //creo el respaw para el segundo 0
    //posicion incio grupos

    movGrupo[0]=[respawgrupodatos.x,respawgrupodatos.y];  //coords de incio
    movGrupos[0]=movGrupo;



