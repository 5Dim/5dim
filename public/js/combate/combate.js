

function CargarParticipantes(t) {

  if (typeof respawGrupos[t] != 'undefined') {
    for (g in respawGrupos[t]) {
      movUltimoGrupo[respawGrupos[t][g][0].ngrupo] = [respawGrupos[t][g][0].x, respawGrupos[t][g][0].y]; //necesario para un primer movimiento inicial
      Creagrupo(respawGrupos[t][g]);
    }

  }
}


function Disparar(t) {

  if (typeof disparar[t] != 'undefined') {
    for (disparo in disparar[t]) {
      setTimeout(CreateLaser(disparar[t][disparo][0], disparar[t][disparo][1], disparar[t][disparo][2]), Math.random() * factorTiempoMovimiento);
    }
  }

  // hace que los disparos fogoneen y desaparezcan
  for (var i = 0; i < lasers.length; i++) {
    var laser = lasers[i];
    laser.life++;
    if (laser.life > 60 * 0.003) {
      laser.alpha *= 0.9;
      laser.scale.y = laser.alpha;
      if (laser.alpha < 0.01) {
        lasers.splice(i, 1);
        grupos.removeChild(laser);
        i--;
      }
    }
  }


}

const lasers = new Array();
function CreateLaser(origen, destino, vida) {

  return function () {
    var color = participantes[nave[origen].bando].color.circuloVida;
    var laser = new PIXI.Sprite.fromImage("Combate/images/laser" + color + ".png");

    laser.life = 0;

    var origenPoint = new PIXI.Point(nave[origen].x, nave[origen].y);
    var destinoPoint = new PIXI.Point(nave[destino].x, nave[destino].y);


    var distX = origenPoint.x - destinoPoint.x;
    var distY = origenPoint.y - destinoPoint.y;

    //k=Math.random();
    //j=Math.random()*.1;

    k = 1;
    j = 0;

    var dist = Math.sqrt(distX * distX + distY * distY) * k;
    laser.scale.x = dist / 20;
    laser.scale.y = .01;
    laser.anchor.y = 0.5;

    vx = (destinoPoint.x - origenPoint.x);
    vy = (destinoPoint.y - origenPoint.y);

    laser.position.x = origenPoint.x + vx * j;
    laser.position.y = origenPoint.y + vy * j;
    //laser.blendMode = PIXI.blendModes.add;

    laser.rotation = Math.atan2(distY, distX) + Math.PI

    lasers.push(laser);
    //cambiando circulo de vida
    nave[destino].vida = vida;
    ActualizarCirculoVida(destino)


    grupos.addChild(laser);
  }
}

function ActualizarCirculoVida(destino){
  vida=nave[destino].vida;
  if (vida > 0) {
    var imagenCirculo = "100.png";
    switch (true) {
      case vida <= 40:
        imagenCirculo = "40.png";
        break;
      case vida <= 60:
        imagenCirculo = "60.png";
        break;
      case vida <= 80:
        imagenCirculo = "80.png";
        break;
    }

    ngrupo = nave[destino].grupo;
    migrupo = gnave[ngrupo];
    imagenFlecha = 'Combate/images/flecha' + participantes[migrupo.bando].color.circuloVida + imagenCirculo;
    var textura = new PIXI.Sprite.from(imagenFlecha);
    nave[destino].circulovida.texture = textura.texture;

  } else {
    nave[destino].circulovida.texture = null;
  }


}


function GruposSinNaves() {
  gnave.forEach(grupo => {
    //si el grupo queda vacio
    var naveviva = nave.find(x => x.vida > 0 && x.grupo == grupo.ngrupo); //hay una nave viva en este grupo
    if (typeof naveviva == 'undefined') { //no queda ninguna nave viva en el grupo, se oculta
      gcirculo[grupo.ngrupo].visible = false;
    } else {
      gcirculo[grupo.ngrupo].visible = true;
    }
  });


}

//const shockwave = new PIXI.filters.ShockwaveFilter();
var shockwaves = new Array();
function animateShockwave(ngrupo) {
  var shockwave = new PIXI.filters.ShockwaveFilter();
  // shockwave.center = {x: gnave[ngrupo].x+camera.x, y: gnave[ngrupo].y+camera.y};
  shockwave.center = { y: window.innerHeight / 2, x: window.innerWidth / 2 };
  shockwave.radius = 1000;
  shockwave.brightness = 2;
  shockwave.speed = 3000;
  shockwave.wavelength = 300;

  shockwaves.push(shockwave);
  app.stage.filters = [shockwave];

}

function ShockWaveAnimation() {
  for (var i = 0; i < shockwaves.length; i++) {
    shockwaves[i].time = shockwaves[i].time + 0.01;
    if (shockwaves[i].time > 5) {
      shockwaves.splice(i, 1);
      app.stage.removeChild(shockwaves[i]);
    }

  }
}
//shockwave.time =  shockwave.time + 0.01;

function MueveGrupos(t) {
  c = Math.round(Math.random(1, 5));
  c = 2;
  for (ngrupo in gnave) {
    movUltimoGrupo[ngrupo] = [0, 0];
    if (typeof movGrupos[ngrupo] != 'undefined' && typeof movGrupos[ngrupo][t] != 'undefined') {
      gnave[ngrupo].x += (movGrupos[ngrupo][t][0] - gnave[ngrupo].x) / factorTiempoMovimiento;
      gnave[ngrupo].y += (movGrupos[ngrupo][t][1] - gnave[ngrupo].y) / factorTiempoMovimiento;
      movUltimoGrupo[ngrupo] = [(movGrupos[ngrupo][t][0] - gnave[ngrupo].x) / factorTiempoMovimiento, (movGrupos[ngrupo][t][1] - gnave[ngrupo].y) / factorTiempoMovimiento];
    }
  }


}


// localiza el menor valor mas cercano del array
function getClosest(array, value) {
  var closest; array.some(function (a) {
    if (a >= value) { return true; } closest = a;
  });
  return closest;
}


function vwork() {

  tiempo = tiempoanime / factorTiempoMovimiento; //cada segundo
  tiempocalculo = Math.round(tiempoanime / factorCalculo);

  if (pause < 1 && tiempo< cantidadRondas*segundosEntreTurno) {
    tiempoanime += 1;

    if (tiempocalculo * factorCalculo == tiempoanime) {
      ShockWaveAnimation();
      GruposSinNaves();
      ActualizaInterface();

    }

    basicTextTiempoReal.text=tiempo;

    CargarParticipantes(tiempo);

    Disparar(tiempo);
    animate();
    MueveGrupos(tiempocalculo);
    ShockWaveAnimation();

    MoverCirculoTiempo();
  }

  else if (pause < 1 && cantidadRondas==0)
  {
    tiempoanime += 1;
    CargarParticipantes(tiempo);
    animate();
    MueveGrupos(tiempocalculo);
  }


  MostrarOcultarMenuNaves();
  MostrarOcultarMenuGrupos();
};





window.onload = function () {

  app = new PIXI.Application({
    transparent: true,
    width: window.innerWidth,
    height: window.innerHeight,
    resolution: window.devicePixelRatio,
    antialias: true,
    autoResize: true,
    resolution: devicePixelRatio,
    interactive: true
  })
  //document.body.appendChild(app.view)
  document.getElementById("combate").appendChild(app.view);

  app.view.style.width = "100%";
  app.view.style.height = "100";

  app.stage.addChild(fondoImg);
  app.stage.addChild(paralax4);
  app.stage.addChild(paralax3);
  app.stage.addChild(paralax2);
  app.stage.addChild(paralax1);

  app.stage.addChild(camera);

  camera.addChild(container);
  camera.addChild(grupos);
  camera.addChild(naves);

  app.stage.addChild(interface);

  if(interfaceCombate){
    CrearBarraTiempo();
    preloadAssets();
  }

  //camera.interactive=true;
  //camera.on('click',SeleccionNada);



  setInterval(function () {
    vwork();
  }, 10);



};

var context;

function preloadAssets() {
  /*
    preloadsImages.add('fondo', 'Combate/images/fondo0.jpg')
    preloadsImages.add('planetaG71', './Astrometria2020/img/sistema/planetaG71.png')
    preloadsImages.add('satelite2', './Astrometria2020/img/sistema/satelite2.png')
    */
  preloadsImages.add('starTexture',imgStartexture); // {{ asset("img/combate/starTexture.png") }}

  preloadsImages.load((loader, resources) => {
    CrearFondo();
  })

  preloadsImages.load()
}

function animate() {

  var vx = .1;
  var vy = 2 * (Math.random() - .5);

  /// no se solapan
  for (x in nave) {
    tama = 2; // distancia de separacion entre naves
    velmax = 3; // velocidad dentro del grupo
    if (nave[x].vida > 0) {
      migrupo = nave[x].grupo;

      for (r in nave) {  //respecto a otros
        if (r != x && nave[x].ngrupo == nave[r].ngrupo) {//no soy yo ni el otro esta muerto
          var dx = .1 + (nave[r].x) - (nave[x].x);
          var dy = .1 + (nave[r].y) - (nave[x].y);
          var d = (.01 + Math.sqrt(dx * dx + dy * dy));
          if (d < tama * 5) {
            a = 1 / d;
            nave[x].vx += Math.random() * (-a * dx) * .1 * velmax;
            nave[x].vy += Math.random() * (-a * dy) * .1 * velmax;

            //nave[r].vx += Math.random() * (d * dx) * .5;
            //nave[r].vy += Math.random() * (d * dy) * .5;

          }
        }
      }

      // le gusta ir al centro del grupo

      var dx = (nave[x].x) - (gnave[migrupo].x); //mi grupo esta en 0 para mi
      var dy = (nave[x].y) - (gnave[migrupo].y);
      var d = Math.sqrt(dx * dx + dy * dy);
      /*
      if (d > gnave[nave[x].grupo].tamagrupo * 1.2) {
        nave[x].vx += Math.random() * (-d * dx) * .01;
        nave[x].vy += Math.random() * (-d * dy) * .01;
      }
      */
      if (d > tamagrupo) {
        nave[x].vx += Math.random() * (-d * dx) * .00001;
        nave[x].vy += Math.random() * (-d * dy) * .00001;

      }

      //le gusta moverse en la direccion del grupo
      if (typeof movUltimoGrupo[nave[x].grupo] != 'undefined') {
        nave[x].vx += movUltimoGrupo[nave[x].grupo][0] / 100;  //*(Math.random())
        nave[x].vy += movUltimoGrupo[nave[x].grupo][1] / 100;
      }

    }
    // se va frenando
    nave[x].vx = nave[x].vx / 1.01;
    nave[x].vy = nave[x].vy / 1.01;

    // no supera velmax en + o -
    if (nave[x].vx > velmax) { nave[x].vx = velmax; };
    if (nave[x].vy > velmax) { nave[x].vy = velmax; };

    if (nave[x].vx < -velmax) { nave[x].vx = -velmax; };
    if (nave[x].vy < -velmax) { nave[x].vy = -velmax; };


    nave[x].vx = Math.round(nave[x].vx * 100) / 100;
    nave[x].vy = Math.round(nave[x].vy * 100) / 100;

    // o algo o nada
    //if 	(nave[x].vx<.0001){nave[x].vx=0;};
    //if 	(nave[x].vy<.0001){nave[x].vy=0;};

    nave[x].x += nave[x].vx;
    nave[x].y += nave[x].vy;
    //gruporot = gnave[nave[x].grupo].rotation;

    //nave[x].circulovida.angle=Math.atan2(vx, vy)

    nave[x].circulovida.angle = angleDegrees(nave[x].vx, nave[x].vy);
    //nave[x].angle+=1;
  };
  PanBordes();
}


function angleDegrees(x, y) {
  var angle = Math.atan2(y, x);
  var degrees = 180 * angle / Math.PI;
  return (360 + Math.round(degrees)) % 360;
}

//actualiza los valores del interface y barritas avance
function ActualizaInterface() {

  valoresJugadores.forEach(e => { //iniciando valores
    e.DefensaActual = 0;
  })

  nave.forEach(element => {  //recalculando valores
    ngrupo = element.grupo;
    valoresJugadores[gnave[ngrupo].jugador].DefensaActual += element.defensa * element.vida / 100;
  });


  valoresJugadores.forEach(element => {  // redibujando barras
    porcentv = Math.round((element.DefensaActual / element.DefensaInicial) * 100, 0);
    EncogerBarrasJugador(element.njugador, porcentv);
  })


  GruposSinNaves();

}


// Listen for window resize events
window.addEventListener('resize', resize);
