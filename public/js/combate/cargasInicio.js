const log = console.log;
let app = new PIXI.Application();

const camera = new PIXI.Container(); // cosas a las que aplicar zoom, naves
const fondoImg = new PIXI.Container();  // stage de imagen de fondo
const paralax1 = new PIXI.Container();
const paralax2 = new PIXI.Container();
const paralax3 = new PIXI.Container();
const paralax4 = new PIXI.Container();

const container = new PIXI.Container();  //contenedor de batalla
const preloadsImages = new PIXI.Loader(); //imagenes a precargar
const grupos = new PIXI.Container(); //container de grupos
const naves = new PIXI.Container(); //naves

const interface = new PIXI.Container();
const menuGruposNaves = new PIXI.Container();

var texture;

gnave = new Array(); //grupo de naves
gcirculo = new Array(); // circulo del grupo en container
valoresJugador = new Array(); //propiedades de cada contendiente
//navengrupo[ngrupo] = new Array(); //creo el listado de naves

const nave = new Array(); // cada nave en stage
//const navengrupo = new Array();  // lista de naves del grupo
const participantes = new Array();
const stars = [];
const vidaNaves=new Array(); //la vida a cada segundo

//tamagrupo = 200; // tamaño del grupo viene por constante

var escala = 1; //escala, zoom
var tiempo = 0; //tiempo incial
var tiempoanime = 0;
factorTiempoMovimiento=100; // 100 es una vez por segundo el calculo de movimiento
var pause = 0;
const factorCalculo = 100; //cada cuanto recalcula acciones de las naves, 10 es 100 es cada segundo


var movGrupos= new Array(); // puntos movimientos de todos los grupos
var movGrupo=new Array();
var movUltimoGrupo=new Array(); //ultimo movimiento conocido del grupo
const disparar=new Array();  //array de disparos para cada tiempo
const respawGrupos=new Array(); //cuando aparece un grupo  para cada tiempo
var respawNave=new Array(); //naves que hacen respaw
const segundosEntreTurno=10;
var pdestino=new Array();pdestino[0]=0;pdestino[1]=0;pdestino[2]=0;pdestino[3]=0;

/////valores de la batalla
var tiempoTurnos=new Array();
var turnoinicial=0;  //de esta ronda
tiempoTurnos[turnoinicial]=0;
let valoresJugadores=new Array();


//valores constantes de combate:
tamagrupo= $.grep(constantesC, function(valor) {
    return valor.codigo == 'tamagruponaves';
    })[0].valor * 1;

anchoDespliegue= $.grep(constantesC, function(valor) {
    return valor.codigo == 'anchodespliegue';
    })[0].valor * tamagrupo;

altoDespliegue= $.grep(constantesC, function(valor) {
    return valor.codigo == 'altodespliegue';
    })[0].valor * tamagrupo;

factorvelocidadcombate= $.grep(constantesC, function(valor) {
    return valor.codigo == 'factorvelocidadcombate';
    })[0].valor * 1;




function carga_universo() {

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //universo = JSON.parse(this.responseText);
      //createViewport()
    }

  };

}


function resize() {
  //cambios ++
  // log (cambios + " " + window.innerWidth/2)
  //  renderer.renderer.resize(window.innerWidth, window.innerHeight)
  //  viewport.resize(window.innerWidth, window.innerHeight, mapa.width, mapa.height)
  // Resize the renderer
  var nueva_pos = window.innerWidth / 2
  app.renderer.resize(window.innerWidth, window.innerHeight);
  //botones.x = nueva_pos;
  //openFullscreen()
  // You can use the 'screen' property as the renderer visible
  // area, this is more useful than view.width/height because
  // it handles resolution
  //viewport.set(renderer.screen.width, renderer.screen.height);
}

/// los colores van por bandos (jugadores misma alianza van mismo color)

const coloresEquipos = new Array();
const rojo = new Array();
rojo.circuloVida = 1;
rojo.color = "0x0066CC";
rojo.bando = -1;
coloresEquipos.push(rojo);

const azul = new Array();
azul.circuloVida = 2; //imagen circulito
azul.color = "0xDE3249";  //color grupo en pixi
azul.bando = -1;  //bando para asignar
coloresEquipos.push(azul);

const amarillo = new Array();
amarillo.circuloVida = 3;
amarillo.color = "0xFEEB77";
amarillo.bando = -1;
coloresEquipos.push(amarillo);

const verde = new Array();
verde.circuloVida = 4;
verde.color = "0x467F3C";
verde.bando = -1;
coloresEquipos.push(verde);

const gris = new Array();
gris.circuloVida = 5;
gris.color = "0x999999";
gris.bando = -1;
coloresEquipos.push(gris);

const naranja = new Array();
naranja.circuloVida = 6;
naranja.color = "0xF0B501";
naranja.bando = -1;
coloresEquipos.push(naranja);


function Creagrupo(grupoacrear) { // crea el grupo con su circulo
  ngrupo=grupoacrear[0].ngrupo;
  posix=grupoacrear[0].x;
  posiy=grupoacrear[0].y;
  jugador=grupoacrear[0].jugador;
  bando=grupoacrear[0].bando;

  var crearParticipante=false;

  if (typeof gnave[ngrupo] == 'undefined') {

    if (typeof participantes[bando] == 'undefined') {
      crearParticipante=true;

      for (c in coloresEquipos) {
        if (coloresEquipos[c].bando < 1) {
          valoresJugador=new Array();
          valoresJugador.bando = bando;
          valoresJugador.color = coloresEquipos[c];
          coloresEquipos[c] = bando;
          participantes[bando] = valoresJugador;
          if(interfaceCombate){
            crearBarrasJugadore(valoresJugadores[jugador]);
          }
          break;
        }
      }
    }

    gnave[ngrupo] = new PIXI.Container();
    gnave[ngrupo].ngrupo = ngrupo;
    gnave[ngrupo].tamagrupo = tamagrupo;
    gnave[ngrupo].x = posix;
    gnave[ngrupo].y = posiy;
    gnave[ngrupo].jugador = jugador;
    gnave[ngrupo].bando = bando;
    gnave[ngrupo].colorBase = participantes[bando].color.color;

    gnave[ngrupo].nombregrupo=grupoacrear[0].nombregrupo;
    gnave[ngrupo].actitud=grupoacrear[0].actitud;
    gnave[ngrupo].objetivo=grupoacrear[0].objetivo;
    gnave[ngrupo].relacion=grupoacrear[0].relacion;
    //para gruposnaves
    gnave[ngrupo].moverse=false;//si debe moverse hasata unas x,y
    gnave[ngrupo].destinox=posix;
    gnave[ngrupo].destinoy=posiy;
    gnave[ngrupo].velmax=0;

    grupos.addChild(gnave[ngrupo]);

    Creacirculo(ngrupo, participantes[bando].color.color, participantes[bando].color.color);


  } // ya existe
  else {
    gcirculo[ngrupo].visible=true;
  }

  for (n in grupoacrear[1]){ //creando/mostrando naves del grupo
    Creanave(grupoacrear[1][n],ngrupo);
  }

if(!PantallaGruposNaves){
    animateShockwave(ngrupo);
}


};

function Creacirculo(ngrupo, colorfill, colorborde) {

  gcirculo[ngrupo] = new PIXI.Graphics();
  //gcirculo[ngrupo].clear();
  gcirculo[ngrupo].lineStyle(1, colorborde, 1); // filete borde, color borde, gamma
  if (colorfill != null) {
    gcirculo[ngrupo].beginFill(colorfill, .1)
  }
  gcirculo[ngrupo].buttonMode = true;
  gcirculo[ngrupo].alpha = 1;

  gcirculo[ngrupo].drawCircle(0, 0, gnave[ngrupo].tamagrupo); // desplazamiento del centro y radio

  gcirculo[ngrupo].ngrupo = ngrupo;
  gcirculo[ngrupo].interactive = true;
  gcirculo[ngrupo].on('click', SeleccionGrupo);

  gnave[ngrupo].addChild(gcirculo[ngrupo]);

  CrearEscudoJugador(ngrupo);
  CrearNombreGrupo(ngrupo);
  //gcirculo[ngrupo].on('pointerdown',seleccion(ngrupo));
};

function CrearEscudoJugador(ngrupo){

  escudo = new PIXI.Sprite.from(valoresJugadores[gnave[ngrupo].jugador].escudo);
  escudo.anchor.set(0.5); //center of image
  escudo.x = 0;
  escudo.y = 0;
  //escudo.scale.set(2, 2.5);
  escudo.width = gnave[ngrupo].tamagrupo*1.5;
  escudo.height = gnave[ngrupo].tamagrupo;
  escudo.alpha = .3;
  gcirculo[ngrupo].addChild(escudo);

}

tamatextogrupo=tamagrupo/10;
if (tamagrupo<10){tamatextogrupo=10;}

const textStyleNombreGrupoBlanco = new PIXI.TextStyle({
  align: "center",
  fill: "#d7d7d7",
  fontSize: tamatextogrupo*1.5,
  fontWeight: "bold"
});

function CrearNombreGrupo(ngrupo){
  basicText = new PIXI.Text(gnave[ngrupo].nombregrupo, textStyleNombreGrupoBlanco);
  basicText.x = -gnave[ngrupo].nombregrupo.length*6;
  basicText.y = tamagrupo*.5;
  gcirculo[ngrupo].addChild(basicText);

}


function CreaCirculoDestino(x, y, colorselect) {
  circuloDestino = new PIXI.Graphics();
  circuloDestino.lineStyle(3, colorselect, 1); // filete borde, color borde, gamma
  circuloDestino.alpha = 1;
  circuloDestino.drawCircle(x, y, tamagrupo); // desplazamiento del centro y radio
  circuloDestino.interactive = true;
  circuloDestino.visible = false;
  //circuloDestino.on('click',SeleccionGrupo);
  grupos.addChild(circuloDestino);
};

const lineaDestino = new PIXI.Graphics();
function CreaLineaDestino() {
  let p = [pdestino[0], pdestino[1], pdestino[2], pdestino[3]];
  let polygon = new PIXI.Polygon(p);
  lineaDestino.lineStyle(4.0, 0x467F3C);
  lineaDestino.drawShape(polygon);
  grupos.addChild(lineaDestino);
}


function Creanave(naveaCrear,ngrupo) {
  nnave=naveaCrear.nnave;
  velmax=naveaCrear.velmax;
  diseno=naveaCrear.diseno;
  imagen=directorioImgNaves+"/skin"+valoresDisenos[diseno].skin+"/naveLTH"+valoresDisenos[diseno].nimagen+".png";
  cantidad=naveaCrear.cantidad;

  if (typeof nave[nnave] == 'undefined') {
    // create a texture from an image path
    var texture = PIXI.Texture.from(imagen);

    // create a new Sprite using the texture
    nave[nnave] = new PIXI.Sprite(texture);

    nave[nnave].rand = Math.random() * 100;
    nave[nnave].scale.x = nave[nnave].scale.y = (tamagrupo * 0.002) + (cantidad / 500);//escalado
    //nave[nnave].anguloi = angulo; ///angulo de inicio
    nave[nnave].velmax = velmax;
    nave[nnave].diseno = diseno;
    // center the sprites anchor point
    nave[nnave].anchor.x = 0.5;
    nave[nnave].anchor.y = 0.5;
    nave[nnave].bando=gnave[ngrupo].bando;

    nave[nnave].vx = 0;
    nave[nnave].vy = 0;

    nave[nnave].grupo = ngrupo;
    nave[nnave].nnave = nnave;

    nave[nnave].interactive = true;
    nave[nnave].on('click', SeleccionNave);

    ActualizarVidaNave(nnave,true);

    naves.addChild(nave[nnave]);
    CreaCirculoVida(nnave);

  }// existe
  else {

    ActualizarVidaNave(nnave,false);
    ActualizarCirculoVida(nnave);
  }
  nave[nnave].x = gnave[nave[nnave].grupo].x; //es relativo a su grupo
  nave[nnave].y = gnave[nave[nnave].grupo].y;
  nave[nnave].visible=true;

};

function ActualizarVidaNave(nnave,primeraCarga){
  var ngrupo=nave[nnave].grupo;

  turnoactual=Math.round(((tiempoanime / factorTiempoMovimiento) ),0);

  vida=vidaNaves[nnave][turnoactual];
  nave[nnave].vida=vida;
  nave[nnave].cantidad=cantidad;
  nave[nnave].defensa=vida/100*cantidad*valoresDisenos[diseno].defensa;

  if (primeraCarga){
  valoresJugadores[gnave[ngrupo].jugador].DefensaInicial+=nave[nnave].defensa;
  }
  valoresJugadores[gnave[ngrupo].jugador].DefensaActual+=nave[nnave].defensa;
}


function CreaCirculoVida(nnave) {

  migrupo = gnave[nave[nnave].grupo];
  imagenFlecha = directorioImgCombate+'/flecha' + participantes[migrupo.bando].color.circuloVida + '100.png';
  var textura=new PIXI.Sprite.from(imagenFlecha);

  nave[nnave].circulovida = textura;
  nave[nnave].circulovida.scale.x = nave[nnave].circulovida.scale.y = 3;//escalado
  nave[nnave].circulovida.anchor.set(0.5);
  nave[nnave].addChild(nave[nnave].circulovida);

  nave[nnave].buttonMode = true;
  //nave[nnave].on('pointerdown',seleccionx);
}


function CrearFondo(){
  fondo = new PIXI.Sprite.from(imagenFondo);
  fondo.anchor.set(0.5); //center of image
  fondo.x = app.screen.width / 2;
  fondo.y = app.screen.height / 2;
  fondo.scale.set(fondo.texture.width / app.screen.width, fondo.texture.height / app.screen.height);
  fondo.width = window.innerWidth;
  fondo.height = window.innerHeight;
  fondo.alpha = .5;
  fondoImg.addChild(fondo);


  planetasFondo.fondoParalax1.forEach(element => {
    decora1 = new PIXI.Sprite.from(element.imagen);
    decora1.x = element.x;
    decora1.y = element.y;
    decora1.scale.x = element.scale; decora1.scale.y = element.scale;
    decora1.anchor.set(0.5);
    paralax1.addChild(decora1);
  });


  planetasFondo.fondoParalax2.forEach(element => {
    decora1 = new PIXI.Sprite.from(element.imagen);
    decora1.x = element.x;
    decora1.y = element.y;
    decora1.scale.x = element.scale; decora1.scale.y = element.scale;
    decora1.anchor.set(0.5);
    paralax2.addChild(decora1);
  });


  // Create the stars
  starAmount=50;
  for (let i = 0; i < starAmount; i++) {
    const star = new PIXI.Sprite.from('starTexture');
    star.anchor.set(0.5);
    star.scale.x = 0.5; star.scale.y = 0.5;
    star.x=Math.random() *  window.innerWidth;
    star.y= Math.random() * window.innerHeight;
    paralax3.addChild(star);
  }

  for (let i = 0; i < starAmount; i++) {
    const star = new PIXI.Sprite.from('starTexture');
    star.anchor.set(0.5);
    star.scale.x = 0.5; star.scale.y = 0.5;
    star.x=Math.random() *  window.innerWidth;
    star.y= Math.random() * window.innerHeight;
    paralax4.addChild(star);
  }

}

/*
function AsignarNavesAGrupos() {
  for (nnave in nave) {
    nave[nnave].x = gnave[nave[nnave].grupo].x; //es relativo a su grupo
    nave[nnave].y = gnave[nave[nnave].grupo].y;

    gnave[nave[nnave].grupo].velmax = Math.min(gnave[nave[nnave].grupo].velmax, nave[nnave].velmax)
  }
}
*/
