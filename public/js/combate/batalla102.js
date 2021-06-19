

tiempoTurnos[3]=300;//fin del turno 1 en sec/10

var alianza=new Array();
alianza.nombre="Alianza2";
alianzas[22]=alianza;

var valoresjugador=new Array();
njugador=333;
valoresjugador.escudo='Combate/images/avatar3.jpg';
valoresjugador.DefensaInicial=0; //se calcula dinamicamente
valoresjugador.nombre="La cosa verde";
valoresjugador.njugador=njugador;
valoresjugador.ordenjugador=ordenjugador;
valoresjugador.bando=2;
valoresjugador.alianza=0;
ordenjugador++;
valoresJugadores[njugador]=valoresjugador;





respawgrupo=new Array();
respawnave=new Array();
    i=10;
      velmax = 1;
      diseno = 1002;
      cantidad = 100;
  
      respawdatosnave=new Array();
      respawdatosnave.nnave=i;
      respawdatosnave.velmax=velmax;
      respawdatosnave.diseno=diseno;
      respawdatosnave.cantidad=cantidad;
      vidaNaves[i]=new Array();
      vidaNaves[i][10]=100;
    
      respawnave.push(respawdatosnave);  
          
respawgrupodatos=new Array();
respawgrupodatos.ngrupo=2;
respawgrupodatos.x=700;
respawgrupodatos.y=750;
respawgrupodatos.jugador=333;
respawgrupodatos.bando=valoresJugadores[respawgrupodatos.jugador].bando;
respawgrupodatos.nombregrupo="grupo3";
respawgrupodatos.actitud="huida";
respawgrupodatos.tipogrupo="cargueros";
respawgrupo.push([respawgrupodatos,respawnave]); //añado naves 

respawGrupos[10]=respawgrupo; //creo el respaw para el segundo 5


movGrupos[0][10]=[-400*a,100*b];
movGrupos[1][10]=[1000,1000];

movGrupo=new Array();
  movGrupo[10]=[respawgrupodatos.x,respawgrupodatos.y];
  movGrupo[11]=[700,500];
  movGrupo[12]=[400,200];
  movGrupos[2]=movGrupo;


disparosEsteTurno=new Array(); 
disparosEsteTurno.push([7,1,20]);
disparosEsteTurno.push([6,1,0]);
disparosEsteTurno.push([3,7,0]);
disparar[10]=disparosEsteTurno;


disparosEsteTurno=new Array(); 
disparosEsteTurno.push([3,10,50]);
disparar[11]=disparosEsteTurno;

disparosEsteTurno=new Array(); 
disparosEsteTurno.push([3,10,0]);
disparar[13]=disparosEsteTurno;  

vidaNaves[0][10]=100;
vidaNaves[1][10]=20;
vidaNaves[2][10]=100;
vidaNaves[3][10]=100;
vidaNaves[4][10]=100;
vidaNaves[5][10]=100;
vidaNaves[6][10]=100;
vidaNaves[7][10]=100;
vidaNaves[8][10]=40;
vidaNaves[9][10]=100;
vidaNaves[10][10]=100;