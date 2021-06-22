CrearFondoGruposNaves();
interfaceCombate=false;
cantidadRondas=0;
tiempoTurnos[1]=100;//fin del turno 1 en sec/10

/*
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
        */



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
        respawdatosnave.velmax=1;
        respawdatosnave.diseno=disenio['id'];
        respawdatosnave.cantidad=1;
        vidaNaves[i]=new Array();
        vidaNaves[i][turnoinicial]=100; ///vida al iniciar el turno

        respawnave.push(respawdatosnave);
    });



// crear grupos y naves
    respawgrupo=new Array();
    respawgrupodatos=new Array();
    respawgrupodatos.ngrupo=0;
    respawgrupodatos.x=200;
    respawgrupodatos.y=250;
    respawgrupodatos.jugador=jugadorActual.id;
    respawgrupodatos.nombregrupo="grupo1";
    respawgrupodatos.actitud="agresiva";
    respawgrupodatos.tipogrupo="vanguardia";
    respawgrupodatos.bando=valoresJugadores[respawgrupodatos.jugador].bando;

    respawgrupo.push([respawgrupodatos,respawnave]); //añado naves

    respawGrupos[0]=respawgrupo; //creo el respaw para el segundo 0
    //posicion incio grupos

    movGrupo[0]=[0,0];  //coords de incio
    movGrupos[0]=movGrupo;

