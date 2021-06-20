PantallaGruposNaves=true;
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


