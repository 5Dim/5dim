cantidadRondas=0;
tiempoTurnos[1]=100;//fin del turno 1 en sec/10





  //////////////////////////////
//  Fondos y decoracion

const imagenFondo="/astrometria/img/fondo.png"
var planetasFondo=new Array();
var fondoParalax1=new Array();
var fondoParalax2=new Array();

var imagenPlanetaFondo=new Array();
imagenPlanetaFondo.imagen='http://161.97.143.51/astrometria/img/sistema/planeta51.png';
imagenPlanetaFondo.x=100;
imagenPlanetaFondo.y=100;
imagenPlanetaFondo.scale=2;
fondoParalax1.push(imagenPlanetaFondo);


var imagenPlanetaFondo=new Array();
imagenPlanetaFondo.imagen='http://161.97.143.51/astrometria/img/sistema/planeta63.png';
imagenPlanetaFondo.x=800;
imagenPlanetaFondo.y=800;
imagenPlanetaFondo.scale=2;
fondoParalax2.push(imagenPlanetaFondo);

planetasFondo.fondoParalax1=fondoParalax1;
planetasFondo.fondoParalax2=fondoParalax2;
