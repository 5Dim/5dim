
//datos de incio de prueba de la batalla  ///////////////////

tiempoTurnos[1]=100;//fin del turno 1 en sec/10

//valores jugadores


var alianzas=new Array();

var alianza=new Array();
alianza.nombre="ninguna";
alianzas[0]=alianza;

var alianza=new Array();
alianza.nombre="Alianza1";
alianzas[11]=alianza;




var valoresjugador=new Array();

var ordenjugador=0;
njugador=111;
valoresjugador.escudo='Combate/images/avatar.jpg';
valoresjugador.DefensaInicial=0; //se calcula dinamicamente
valoresjugador.nombre="Manolete";
valoresjugador.njugador=njugador;
valoresjugador.ordenjugador=ordenjugador;
valoresjugador.bando=1;
valoresjugador.alianza=0;
ordenjugador++;
valoresJugadores[njugador]=valoresjugador;


var valoresjugador=new Array();
njugador=222;
valoresjugador.escudo='Combate/images/avatar2.jpg';
valoresjugador.DefensaInicial=0; //se calcula dinamicamente
valoresjugador.nombre="Astarte";
valoresjugador.njugador=njugador;
valoresjugador.ordenjugador=ordenjugador;
valoresjugador.bando=2;
valoresjugador.alianza=0;
ordenjugador++;
valoresJugadores[njugador]=valoresjugador;



//////////////////////////////
// datos de diseños naves

var valoresDisenos=new Array();

var diseno=new Array();
ndiseno=1002;
diseno.nimagen=2;
diseno.skin=0;
diseno.ataque=1002000;
diseno.defensa=102000;
diseno.denominacion="caza Yg";
diseno.nombre="diseño 1002";

valoresDisenos[ndiseno]=diseno;

ndiseno=1003;
var diseno=new Array();
diseno.nimagen=3;
diseno.skin=0;
diseno.ataque=1003000;
diseno.defensa=103000;
diseno.denominacion="caza XG";
diseno.nombre="diseño 1003";

valoresDisenos[ndiseno]=diseno;

ndiseno=1008;
var diseno=new Array();
diseno.nimagen=8;
diseno.skin=0;
diseno.ataque=1008000;
diseno.defensa=108000;
diseno.denominacion="Nomada";
diseno.nombre="diseño 1003";

valoresDisenos[ndiseno]=diseno;


// crear grupos y naves
 ///naves de un jugador 
 respawnave=new Array();
 respawgrupo=new Array();

for (let i = 0; i < 5; i++) {
  velmax = 1;
  diseno = 1002;
  cantidad = 100;

  if (i > 2) {
    velmax = 1;
    cantidad = 5;
    diseno = 1008;
  }
  respawdatosnave=new Array();
  respawdatosnave.nnave=i;
  respawdatosnave.velmax=velmax;
  respawdatosnave.diseno=diseno;
  respawdatosnave.cantidad=cantidad;
  vidaNaves[i]=new Array();
  vidaNaves[i][turnoinicial]=100; ///vida al iniciar el turno

  respawnave.push(respawdatosnave);  
  
}
respawgrupodatos=new Array();
respawgrupodatos.ngrupo=0;
respawgrupodatos.x=200;
respawgrupodatos.y=250;
respawgrupodatos.jugador=111;
respawgrupodatos.nombregrupo="grupo1";
respawgrupodatos.actitud="agresiva";
respawgrupodatos.tipogrupo="vanguardia";
respawgrupodatos.bando=valoresJugadores[respawgrupodatos.jugador].bando;


respawgrupo.push([respawgrupodatos,respawnave]); //añado naves 


respawnave=new Array();
    for (let i = 5; i < 5 + 5; i++) {
      velmax = 1;
      diseno = 1002;
      cantidad = 100;
  
      if (i > 5 + 2) {
        diseno = 1003;
        velmax = 1;
        cantidad = 5;
      }
      respawdatosnave=new Array();
      respawdatosnave.nnave=i;
      respawdatosnave.velmax=velmax;
      respawdatosnave.diseno=diseno;
      respawdatosnave.cantidad=cantidad;
      vidaNaves[i]=new Array();
      vidaNaves[i][turnoinicial]=100;
    
      respawnave.push(respawdatosnave);            
    }

respawgrupodatos=new Array();
respawgrupodatos.ngrupo=1;
respawgrupodatos.x=1000;
respawgrupodatos.y=1000;
respawgrupodatos.jugador=222;
respawgrupodatos.bando=valoresJugadores[respawgrupodatos.jugador].bando;
respawgrupodatos.nombregrupo="grupo2";
respawgrupodatos.actitud="normal";
respawgrupodatos.tipogrupo="apoyo";
respawgrupo.push([respawgrupodatos,respawnave]); //añado naves 

respawGrupos[0]=respawgrupo; //creo el respaw para el segundo 0





  // movimiento  t es el tiempo (segundos), necesario uno por momento
  a=4;
  b=a;
  
  movGrupo[0]=[0,0];  //coords de incio
  movGrupo[1]=[-50*a,50*b];
  movGrupo[2]=[-100*a,100*b];
  movGrupo[3]=[-150*a,150*b];
  movGrupo[4]=[-150*a,200*b];
  movGrupo[5]=[-200*a,200*b];
  movGrupo[6]=[-300*a,100*b];
  movGrupo[7]=[-400*a,100*b];
  movGrupos[0]=movGrupo;
  
  movGrupo=new Array();
  movGrupo[0]=[1000,1000];
  movGrupo[1]=[1000,1000];
  movGrupos[1]=movGrupo;

  
  // disparos
  var disparosEsteTurno=new Array(); //array de disparos cada turno en segundos (origen,destino)
  disparosEsteTurno.push([0,8,80]);
  disparar[2]=disparosEsteTurno; //[t] es el momento en segundos
  
  disparosEsteTurno=new Array(); 
  disparosEsteTurno.push([8,0,0]);
  disparar[4]=disparosEsteTurno;
  
  disparosEsteTurno=new Array(); 
  disparosEsteTurno.push([7,1,100]);
  disparosEsteTurno.push([6,1,80]);
  disparosEsteTurno.push([3,8,60]);
  disparar[8]=disparosEsteTurno;
  
  disparosEsteTurno=new Array(); 
  disparosEsteTurno.push([7,1,40]);
  disparosEsteTurno.push([6,1,20]);
  disparosEsteTurno.push([3,8,40]);
  disparar[9]=disparosEsteTurno;
  

  
  //////////////////////////////
//  Fondos y decoracion

const imagenFondo='Combate/images/fondo0.jpg';
var planetasFondo=new Array();
var fondoParalax1=new Array();
var fondoParalax2=new Array();

var imagenPlanetaFondo=new Array();
imagenPlanetaFondo.imagen='./Astrometria2020/img/sistema/planetaG71.png';
imagenPlanetaFondo.x=1500;
imagenPlanetaFondo.y=1200;
imagenPlanetaFondo.scale=2.5;
fondoParalax1.push(imagenPlanetaFondo);

var imagenPlanetaFondo=new Array();
imagenPlanetaFondo.imagen='./Astrometria2020/img/sistema/planetaG73.png';
imagenPlanetaFondo.x=100;
imagenPlanetaFondo.y=100;
imagenPlanetaFondo.scale=2;
fondoParalax1.push(imagenPlanetaFondo);


var imagenPlanetaFondo=new Array();
imagenPlanetaFondo.imagen='./Astrometria2020/img/sistema/satelite2.png';
imagenPlanetaFondo.x=800;
imagenPlanetaFondo.y=800;
imagenPlanetaFondo.scale=2;
fondoParalax2.push(imagenPlanetaFondo);

planetasFondo.fondoParalax1=fondoParalax1;
planetasFondo.fondoParalax2=fondoParalax2;





