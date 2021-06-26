// CONTROLES

let isDragging = false;
let prevX, prevY;/// mouse Pan
var viewWidth = window.innerWidth - 10;
var viewHeight = window.innerHeight - 10;
var valorY = 0; var valorX = 0; //valores del puntero
var imagengrande= new PIXI.Sprite(texture);

//stage.click = function(){alert (666);};


this.addEventListener('mousewheel', onMouseWheel, false);
this.addEventListener('DOMMouseScroll', onMouseWheel, false); // firefox
this.addEventListener('touchmove', touchmove, false);
this.addEventListener('dblclick', onDoublickClick, false);
this.addEventListener('keydown', onKeyDown, false);
//this.addEventListener('click', click, false);
this.addEventListener('mousedown', mousedown, false);
this.addEventListener('mouseup', mouseup, false);
this.addEventListener('mousemove', mousemove, false);
//$('.rendererView').click(function(){ seleccion();});


function onKeyDown(event) {
	switch (event.keyCode) {
		case 38: //up
			pan(0, 2); break;
		case 40: //down
			pan(0, -2); break;
		case 39: //der
			pan(-2, 0); break;
		case 37: //izq
			pan(2, 0); break;
	};
};


function pan(x, y) {
	camera.x += x * 3;
	camera.y += y * 3;
};

var browser = (function (agent) {
	switch (true) {
		case agent.indexOf("edge") > -1: return "MS Edge (EdgeHtml)";
		case agent.indexOf("edg") > -1: return "MS Edge Chromium";
		case agent.indexOf("opr") > -1 && !!window.opr: return "opera";
		case agent.indexOf("chrome") > -1 && !!window.chrome: return "chrome";
		case agent.indexOf("trident") > -1: return "Internet Explorer";
		case agent.indexOf("firefox") > -1: return "firefox";
		case agent.indexOf("safari") > -1: return "safari";
		default: return "other";
	}
})(window.navigator.userAgent.toLowerCase());

function onMouseWheel(event) {
    if (!PantallaGruposNaves){
        var delta = 0;
        if (event.wheelDelta !== undefined) { // WebKit / Opera / Explorer 9
            delta = event.wheelDelta;
        } else if (event.detail !== undefined) { // Firefox
            delta = - event.detail;
        }
        zoom(delta, event.offsetX, event.offsetY)
        //if ( delta > 0 ) {dollyOut(delta);} else {dollyIn(delta);}
    }
};

function onDoublickClick(event) {
	//event.preventDefault();
	//mouseX = (event.pageX / viewWidth) * 2 - 1;
	//mouseY = - (event.pageY / viewHeight) * 2 + 1;

};

function SeleccionNave(event) {
	diseno = event.currentTarget.diseno;
	nnave=event.currentTarget.nnave;
	//imagen="Combate/fotos naves/skin"+valoresDisenos[diseno].skin+"/naveMT"+valoresDisenos[diseno].nimagen+".jpg";
	imagen="Combate/fotos naves/skin"+valoresDisenos[diseno].skin+"/naveLTH"+valoresDisenos[diseno].nimagen+".png";
	//$('#imagenNave').attr('src', imagen);
	ataque=valoresDisenos[diseno].ataque;
	defensa=valoresDisenos[diseno].defensa

	if (ataque>1000){
		ataque=Math.round(ataque/1000,0);
		ataqueF=ataque.toLocaleString('de-DE')+"K";
	} else {
		ataqueF=ataque.toLocaleString('de-DE');
	}

	if (defensa>1000){
		defensa=Math.round(defensa/1000,0);
		defensaF=defensa.toLocaleString('de-DE')+"K";
	} else {
		defensaF=defensa.toLocaleString('de-DE');
	}

	atadef=ataqueF+" / "+defensaF;

	basicTextTipo.text = "Tipo: "+valoresDisenos[diseno].denominacion;
	basicTextDiseño.text  = "Diseño: "+valoresDisenos[diseno].nombre;
	basicTextAtaDef.text  = "Ata/Def:: "+atadef;
	basicTextCantidad.text  = "Cantidad: "+event.currentTarget.cantidad;
	basicTextEstado.text  = "Estado: "+event.currentTarget.vida;


	imagengrande.texture=nave[nnave].texture;
	imagengrande.scale.x = imagengrande.scale.y = 2;//escalado
    imagengrande.anchor.x = 0.5;
	imagengrande.anchor.y = 0.5;
	imagengrande.x=100;
	imagengrande.y=20;
	menunaveseleccionada.addChild(imagengrande);

	//menunaveseleccionada.visible=true;
	menunaveseleccionadaObjetivo=0; //muestra menu naves

}


gruposSeleccionados = new Array();
grupoSelecionado = new Array();


function SeleccionGrupo(event) {
	//console.log("grupo");
	DeselectGrupo();
	ngrupo = event.currentTarget.ngrupo;
	event.currentTarget.alpha = 2;
	grupoSelecionado.ngrupo = ngrupo;
	grupoSelecionado.x = gnave[grupoSelecionado.ngrupo].x;
	grupoSelecionado.y = gnave[grupoSelecionado.ngrupo].y;
	gruposSeleccionados.push(grupoSelecionado);
	CreaCirculoDestino(gnave[ngrupo].x, gnave[ngrupo].y, gnave[ngrupo].colorBase);

	basicTextGrupoNombre.text="Grupo: "+gnave[grupoSelecionado.ngrupo].nombregrupo;
	basicTextGrupoActitud.text="Actitud: "+gnave[grupoSelecionado.ngrupo].actitud;
	basicTextGrupoTipogrupo.text = "Tipo: "+gnave[grupoSelecionado.ngrupo].tipogrupo;
	menuGruposeleccionadaObjetivo=0;
}

function SeleccionNada(event) {
	//console.log("nada");
	DeselectGrupo();
}


function DeselectGrupo() {
	if (gruposSeleccionados.length > 0) {
		gcirculo[gruposSeleccionados[0].ngrupo].alpha = 1;
		gruposSeleccionados = new Array();
		grupoSeleccionado = new Array();
		circuloDestino.visible=false;
		circuloDestino.clear();
		lineaDestino.clear();
	}
}


var dtouch = 0; //distancia incial

function touchmove(event) {
	switch (event.touches.length) {

		case 1: // one-fingered touch:
			seleccion();
			break;

		case 2: // two-fingered touch: zoom

			var dx = event.touches[0].pageX - event.touches[1].pageX;
			var dy = event.touches[0].pageY - event.touches[1].pageY;
			var delta = Math.sqrt(dx * dx + dy * dy);

			var f = -1;
			if (dtouch < delta) { f = 1; };

			if (dtouch != delta) {
				dolly(delta * .003 * f);
				dtouch = delta;
			}
			break;

		case 3: // three-fingered touch:
			//alert (3333);
			break;
	};
};


worldPos = 1;
newScale = 1;

function zoom(s, x, y) {

	s = s > 0 ? 1.2 : 0.7;
	worldPos = { x: (x - camera.x) / camera.scale.x, y: (y - camera.y) / camera.scale.y };
	newScale = { x: camera.scale.x * s, y: camera.scale.y * s };


	if (newScale.x>2){
		newScale = { x: 2, y: 2 };
	} else if (newScale.x<.1){
		newScale = { x: .1, y: .1 };
	}

	var newScreenPos = { x: (worldPos.x) * newScale.x + camera.x, y: (worldPos.y) * newScale.y + camera.y };

	camera.x -= (newScreenPos.x - x);
	camera.y -= (newScreenPos.y - y);
	camera.scale.x = newScale.x;
	camera.scale.y = newScale.y;
	/*
		for (var i = 0; i < shockwaves.length; i++) {
			shockwaves[i].center.x -= newScreenPos.x - x;
			shockwaves[i].center.y -= newScreenPos.y - y;
		  }
		  */

	//document.getElementById("fondodiv").innerHTML ="newScale:"+newScale.x+" s "+s;

};



/*
$("canvas").mousemove(function(e) {
	prevX = e.pageX;
	prevY = e.pageY;
})
*/


function click(event) {
	//console.log('Picked up');
	DeselectGrupo();
};


function mousedown(event) {
	//console.log('mousedown');
	prevX = event.offsetX+$('#combate').offset().left;
	prevY = event.offsetY+$('#combate').offset().top;
	isDragging = true;
	DeselectGrupo();
};



jQuery(document).ready(function () {
	$(document).mousemove(function (e) {
		valorY = e.pageY;
		valorX = e.pageX;
	});
});


function PanBordes() { //cosa mas molesta para programar
	/*
    if (!PantallaGruposNaves){
        if  (valorY>viewHeight-50) {pan(0,-1);}
        else if (valorY<50) {pan(0,+1);}
        else if (valorX>viewWidth-50) {pan(-1,0);}
        else if (valorX<50) {pan(+1,0);};
    }
	*/
}

function mousemove(event) {

	//valorX=event.offsetX;
	//valorY=event.offsety;

	// pan por el border


	if (!isDragging) {
		//circulo destino
        if(PantallaGruposNaves){
            if (gruposSeleccionados.length > 0) {
                circuloDestino.visible = true;

                circuloDestino.x = ((valorX - prevX) / newScale.x);
                circuloDestino.y = ((valorY - prevY) / newScale.y);

                lineaDestino.clear();
                CreaLineaDestino();

                pdestino[0] = (gnave[gruposSeleccionados[0].ngrupo].x);
                pdestino[1] = (gnave[gruposSeleccionados[0].ngrupo].y);
                pdestino[2] = circuloDestino.x + grupoSelecionado.x;
                pdestino[3] = circuloDestino.y + grupoSelecionado.y;
            }
        }


		return;
	}
	DeselectGrupo();
	var dx = valorX - prevX;
	var dy = valorY - prevY;

	camera.x += dx;
	camera.y += dy;
	prevX = valorX;
	prevY = valorY;

	paralax1.x += dx / 6;
	paralax1.y += dy / 6;

	paralax2.x += dx / 10;
	paralax2.y += dy / 10;

	paralax3.x += dx / 30;
	paralax3.y += dy / 30;

	paralax4.x += dx / 60;
	paralax4.y += dy / 60;
	/*
		for (var i = 0; i < shockwaves.length; i++) {
			shockwaves[i].center.x += dx;
			shockwaves[i].center.y += dy;
		  }
	*/
};

function mouseup() {
	isDragging = false;
};


function SeleccionTiempo(event) {
	turnoMarcado=event.currentTarget.turno;
	circuloTiempo.x=turnoMarcado*distanciaPuntosTurno;

	//naves a esa posición
	tiempoanime=turnoMarcado*segundosEntreTurno*factorTiempoMovimiento;
	for (ngrupo in gnave) {
		if (typeof movGrupos[ngrupo] != 'undefined' && typeof movGrupos[ngrupo][turnoMarcado] != 'undefined') {
		  gnave[ngrupo].x = movGrupos[ngrupo][turnoMarcado*segundosEntreTurno][0] ;
		  gnave[ngrupo].y = movGrupos[ngrupo][turnoMarcado*segundosEntreTurno][1] ;
		}
	}


	for (nnave in nave){
		nave[nnave].x = gnave[nave[nnave].grupo].x; //es relativo a su grupo
		nave[nnave].y = gnave[nave[nnave].grupo].y;
		if (typeof vidaNaves[nnave][turnoMarcado*segundosEntreTurno] == 'undefined') { //la nave no existia
			nave[nnave].visible=false;
			nave[nnave].vida=0;
		} else {
			nave[nnave].vida=vidaNaves[nnave][turnoMarcado*segundosEntreTurno];
			nave[nnave].visible=true;
		}

		ActualizarCirculoVida(nnave)
		ActualizaInterface();
	}

}


function Pausar(){
    BotonPausa();
	pausar.clear();
	CrearSimboloPausar();
}

function BotonPausa(){
    if (pause>0){
		pause=0;
    } else {
		pause=1;
	}
}


/*
//funcion para ajustar el zoom y que no pase del 100%
function ajusta_zoom(nivel){
	var dif = 0;
	if (nivel > 100){
		dif =Math.floor(nivel - 100)
	   viewport.zoomPercent(- (dif/100),true)
	}
}
*/

