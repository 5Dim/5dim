/// lo que ve el usuario de informacion de combate y naves

const menugeneral = new PIXI.Container();
const menunaveseleccionada = new PIXI.Container();
const menuGruposeleccionada = new PIXI.Container();
const menuTiempo = new PIXI.Container();

const barrasJugador = new Array();
const porcentJugador = new Array();

interface.addChild(menugeneral);
interface.addChild(menunaveseleccionada);
interface.addChild(menuGruposeleccionada);
interface.addChild(menuTiempo);

const extensionBarras = 3; //multiplica el % para su longitud
var lineaJugador = 0; //linea de barra para cada jugador
var cantidadRondas = tiempoTurnos.length - 2;
var distanciaPuntosTurno = 200;



//  https://pixijs.io/pixi-text-style/#%7B%22style%22%3A%7B%22fill%22%3A%22%23f7f7f7%22%2C%22fontWeight%22%3A%22bold%22%7D%2C%22background%22%3A%22%23000000%22%7D

const textStyleNombre = new PIXI.TextStyle({
    fill: "#f7f7f7",
    fontSize: 20,
    fontWeight: "bold"
});

const textStylePorcentBlanco = new PIXI.TextStyle({
    fill: "#f7f7f7",
    fontSize: 13,
    fontWeight: "bold"
});

const textStylePorcentNegro = new PIXI.TextStyle({
    fill: "#000000",
    fontSize: 15,
    fontWeight: "bold"
});

var cuantasbarrasTotal = 0;
valoresJugadores.forEach(element => {
    cuantasbarrasTotal++;
});


/// fondo de las barras vida
fondoMenuGeneral = new PIXI.Graphics();
fondoMenuGeneral.lineStyle(2, 0xffffff, 1);
fondoMenuGeneral.beginFill(0x000000);
fondoMenuGeneral.drawRect(-10, 0, 470, cuantasbarrasTotal * 30);
fondoMenuGeneral.alpha = .5;
fondoMenuGeneral.endFill();
menugeneral.addChild(fondoMenuGeneral);

/// fondo menu tiempo
fondoMenuTiempo = new PIXI.Graphics();
fondoMenuTiempo.lineStyle(2, 0xffffff, 1);
fondoMenuTiempo.beginFill(0x000000);
fondoMenuTiempo.drawRect(470, 0, 200+tiempoTurnos.length*120, 65);
fondoMenuTiempo.alpha = .5;
fondoMenuTiempo.endFill();
menuTiempo.addChild(fondoMenuTiempo);


/// fondo de info del grupo
//menuGruposeleccionada.y=menunaveseleccionada.y+alturamenunaves;
menuGruposeleccionada.y = cuantasbarrasTotal * 60 * 1.8;;

alturamenuGrupos = 110;
anchomenuGrupos = 300;
fondoMenuGrupos = new PIXI.Graphics();
fondoMenuGrupos.lineStyle(2, 0xffffff, 1);
fondoMenuGrupos.beginFill(0x000000);
fondoMenuGrupos.drawRect(-10, -210, anchomenuGrupos, alturamenuGrupos);
fondoMenuGrupos.alpha = .5;
fondoMenuGrupos.endFill();
fondoMenuGrupos.interactive = true;
fondoMenuGrupos.on('click', OcultarMenuGrupos);

menuGruposeleccionada.addChild(fondoMenuGrupos);

var menuGruposeleccionadaObjetivo = -anchomenuGrupos; //ocultar menu
menuGruposeleccionada.x = menuGruposeleccionadaObjetivo; //empieza oculto

function OcultarMenuGrupos() {
    menuGruposeleccionadaObjetivo = -anchomenuGrupos;
}

function MostrarOcultarMenuGrupos() {
    menuGruposeleccionada.x += (menuGruposeleccionadaObjetivo - menuGruposeleccionada.x) / 10;
}



/// fondo nave seleccionada
//menunaveseleccionada.y=cuantasbarrasTotal*60*1.8;
menunaveseleccionada.y = cuantasbarrasTotal * 60 * 1.8 + alturamenuGrupos;

alturamenunaves = 300;
anchomenunaves = 300;
fondoMenuNaves = new PIXI.Graphics();
fondoMenuNaves.lineStyle(2, 0xffffff, 1);
fondoMenuNaves.beginFill(0x000000);
fondoMenuNaves.drawRect(-10, -210, anchomenunaves, alturamenunaves);
fondoMenuNaves.alpha = .5;
fondoMenuNaves.endFill();
fondoMenuNaves.interactive = true;
fondoMenuNaves.on('click', OcultarMenuNaves);

menunaveseleccionada.addChild(fondoMenuNaves);

var menunaveseleccionadaObjetivo = -anchomenunaves; //ocultar menu
menunaveseleccionada.x = menunaveseleccionadaObjetivo; //empieza oculto

function OcultarMenuNaves() {
    menunaveseleccionadaObjetivo = -anchomenunaves;
}

function MostrarOcultarMenuNaves() {
    menunaveseleccionada.x += (menunaveseleccionadaObjetivo - menunaveseleccionada.x) / 10;
}




function crearBarrasJugadore(valoresjugador) {
    var nombrejugador = "";
    if (alianzas[valoresjugador.alianza] == 0) {
        nombrejugador = valoresjugador.nombre;
    } else {
        nombrejugador = alianzas[valoresjugador.alianza].nombre;
    }

    basicText = new PIXI.Text(nombrejugador, textStyleNombre);
    basicText.x = 0;
    basicText.y = lineaJugador;
    menugeneral.addChild(basicText);

    graphics2 = new PIXI.Graphics();//fondo barra
    color = "0xdddddd";
    graphics2.beginFill(color);
    graphics2.drawRect(150, lineaJugador + 3, 100 * extensionBarras, 20);
    graphics2.endFill();
    menugeneral.addChild(graphics2);

    graphics = new PIXI.Graphics();

    color = participantes[valoresjugador.bando].color;
    graphics.beginFill(color.color);
    graphics.drawRect(150, lineaJugador + 3, 100 * extensionBarras, 20);
    graphics.endFill();
    barrasJugador[valoresjugador.njugador] = graphics;
    menugeneral.addChild(graphics);


    porcentTexto = new PIXI.Text("100%", textStylePorcentNegro);
    porcentTexto.x = 160
    porcentTexto.y = lineaJugador + 5;
    porcentJugador[valoresjugador.njugador] = porcentTexto;
    menugeneral.addChild(porcentTexto);

    lineaJugador += 30;
}

CrearTextosNave();
CrearTextosGrupos();

function EncogerBarrasJugador(njugador, porcentaje) {

    graphics = barrasJugador[njugador];
    if (typeof graphics != 'undefined') {
        graphics.clear();

        color = participantes[valoresJugadores[njugador].bando].color;
        graphics.beginFill(color.color);

        lineaJugadorr = valoresJugadores[njugador].ordenjugador * 30;
        graphics.drawRect(150, lineaJugadorr + 3, porcentaje * extensionBarras, 20);
        graphics.endFill();

        porcentJugador[njugador].text = porcentaje + "%"
    }

}

function CrearTextosNave() {

    lineaDatos = -200;
    basicTextTipo = new PIXI.Text("Tipo: ", textStyleNombre);
    basicTextTipo.x = 0;
    basicTextTipo.y = lineaDatos;
    menunaveseleccionada.addChild(basicTextTipo);
    lineaDatos += 30;

    basicTextDiseño = new PIXI.Text("Diseño: ", textStyleNombre);
    basicTextDiseño.x = 0;
    basicTextDiseño.y = lineaDatos;
    menunaveseleccionada.addChild(basicTextDiseño);
    lineaDatos += 30;

    basicTextAtaDef = new PIXI.Text("Ata/Def:: ", textStyleNombre);
    basicTextAtaDef.x = 0;
    basicTextAtaDef.y = lineaDatos;
    menunaveseleccionada.addChild(basicTextAtaDef);
    lineaDatos += 30;

    basicTextCantidad = new PIXI.Text("Cantidad: ", textStyleNombre);
    basicTextCantidad.x = 0;
    basicTextCantidad.y = lineaDatos;
    menunaveseleccionada.addChild(basicTextCantidad);
    lineaDatos += 30;

    basicTextEstado = new PIXI.Text("Estado: ", textStyleNombre);
    basicTextEstado.x = 0;
    basicTextEstado.y = lineaDatos;
    menunaveseleccionada.addChild(basicTextEstado);
    lineaDatos += 30;

}

function CrearTextosGrupos() {

    lineaDatos = -200;
    basicTextGrupoNombre = new PIXI.Text("Grupo: ", textStyleNombre);
    basicTextGrupoNombre.x = 0;
    basicTextGrupoNombre.y = lineaDatos;
    menuGruposeleccionada.addChild(basicTextGrupoNombre);
    lineaDatos += 30;

    basicTextGrupoActitud = new PIXI.Text("Actitud: ", textStyleNombre);
    basicTextGrupoActitud.x = 0;
    basicTextGrupoActitud.y = lineaDatos;
    menuGruposeleccionada.addChild(basicTextGrupoActitud);
    lineaDatos += 30;

    basicTextGrupoTipogrupo = new PIXI.Text("tipogrupo: ", textStyleNombre);
    basicTextGrupoTipogrupo.x = 0;
    basicTextGrupoTipogrupo.y = lineaDatos;
    menuGruposeleccionada.addChild(basicTextGrupoTipogrupo);
    lineaDatos += 30;

}

CrearBarraTiempo();

const circulosTiempo = new Array();

circuloTiempo = new PIXI.Graphics();
circuloTiempo.lineStyle(2, 0xffffff, 1);
circuloTiempo.beginFill(0x3500FA, 1);
circuloTiempo.drawCircle(700, 30, 10);
circuloTiempo.endFill();
menuTiempo.addChild(circuloTiempo);

CrearBotonPausa();


function CrearBarraTiempo() {

    const circulosT = new Array();

    const path = [700, 27, 700 + cantidadRondas * distanciaPuntosTurno, 27, 700 + cantidadRondas * distanciaPuntosTurno, 33, 700, 33];

    lineaT = new PIXI.Graphics();
    lineaT.lineStyle(0);
    lineaT.beginFill(0xffffff, 1);
    lineaT.drawPolygon(path);
    lineaT.endFill();

    menuTiempo.addChild(lineaT);


    for (i = 0; i < cantidadRondas + 1; i++) {
        circuloT = new PIXI.Graphics();
        circuloT.lineStyle(2, 0xffffff, 1);
        circuloT.beginFill(0x000000, 1);
        circuloT.drawCircle(700 + i * distanciaPuntosTurno, 30, 10);
        circuloT.interactive = true;
        circuloT.on('click', SeleccionTiempo);
        circuloT.turno = i;
        circuloT.endFill();

        menuTiempo.addChild(circuloT);
        circulosT[i] = circuloT;
    }
}


function MoverCirculoTiempo() {
    var pasoturno = (distanciaPuntosTurno / tiempoTurnos[1]) / segundosEntreTurno;
    circuloTiempo.x += pasoturno;
}

function CrearBotonPausa() {
    posicionbotonx = 500;
    posicionbotony = 15;

    fondoBotonPausa = new PIXI.Graphics();
    pausar = new PIXI.Graphics();
    CrearSimboloPausar();

    fondoBotonPausa.interactive = true;
    fondoBotonPausa.on('click', Pausar);
    fondoBotonPausa.endFill();
    menuTiempo.addChild(fondoBotonPausa);


    pausar.interactive = true;
    pausar.on('click', Pausar);
    menuTiempo.addChild(pausar);

    basicTextTiempoReal = new PIXI.Text("0:00", textStyleNombre);
    basicTextTiempoReal.x = 590;
    basicTextTiempoReal.y = 20;
    menuTiempo.addChild(basicTextTiempoReal);

}

function CrearSimboloPausar() {

    var color = "0xffffff";
    if (pause > 0) {
        color = "0xFF700B";
    }

    fondoBotonPausa.lineStyle(1, color, 1);
    fondoBotonPausa.beginFill(0x000000);
    fondoBotonPausa.drawRect(posicionbotonx, posicionbotony, 50, posicionbotony + 15);
    fondoBotonPausa.alpha = 1;

    pausar.beginFill(color);
    pausar.lineStyle(1, color, 1);
    pausar.moveTo(posicionbotonx + 15, posicionbotony + 8);
    pausar.lineTo(posicionbotonx + 35, posicionbotony + 15);
    pausar.lineTo(posicionbotonx + 15, posicionbotony + 22);

    pausar.closePath();
    pausar.endFill();

}


