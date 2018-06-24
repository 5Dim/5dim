<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>recursosFrame</title>

    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/recursosFrame.css') }}" media="all" rel="stylesheet" type="text/css" />

</head>
<body id="recursosFrame">

<div id="menuC" class="container-fluid borderless">
    <div id="menuCuenta" class="row d-flex justify-content-center" > 
        <table class="table table-hover table-borderless table-sm text-center centradoDiv60">
            <thead>
                <tr>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        ataque
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="mensajes.php" target="_self">
                            <img  src="{{ asset('img/elJuego/skin0/icons/ico-barra-men.png') }}" title="Mensajes"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="misiones.php?tipo=1" target="_self">
                            <img  src="{{ asset('img/elJuego/skin0/icons/ico-barra-mis.png') }}" title="Misiones"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="estadisticas.php" target="_self">
                            <img src="{{ asset('img/elJuego/skin0/icons/ico-barra-est.png') }}"  title="Estadisticas"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="http://es.5dim.wikia.com/wiki/Wiki_5dim" target="_blank">
                            <img src="{{ asset('img/elJuego/skin0/icons/ico-barra-wik.png') }}"  title="Wikia"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="http://quintadim.foroactivo.com/f21-ayudas-y-preguntas" target="_blank">
                            <img src="{{ asset('img/elJuego/skin0/icons/ico-barra-sop.png') }}"  title="Soporte"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless">
                        <form action="recursosV.php" method="post" name="myform" target="_self" id="premium" align="center">
                            <select id="miraotro" name="miraotro" onChange="cargamerec()">
                                <option value="0"  class="" style="font-size:10px">NINGUNA</option><option value="3042" selected="selected" class="resaltado" style="font-size:10px">71881x1 SOLARI26</option> 
                            </select>	
                        </form>    
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="cuenta.php" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-opc.png') }}"  title="Opciones"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="http://quintadim.foroactivo.com" target="_blank"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-foro.png') }}"  title="Foro"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="compra1.php" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-shop.png') }}"  title="Tienda"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="mensajeC.php?adm=1" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-rep.png') }}"  title="Reportar Admin"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        <a href="logout.php" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-salir2.png') }}"  title="Salir"/>
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
    <div id="menuRecursos" >
        <table class="table table-hover table-borderless table-sm text-center">
            <thead >
                <tr>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Personal
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Mineral
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Cristal
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Gas
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Plástico
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Cerámica
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Recargar
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Liquido
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Micros
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Fuel
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        M
                        -A</th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Munición
                    </th>
                    <th scope="col" class="text-warning borderless centradoCeldas">
                        Moneda
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>                                    
                    <td class="text-danger borderless">
                        &nbsp;
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Almacenes
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        Ilimitado
                    </td>
                    <td  class="text-danger borderless">
                        3200 ud/d
                    </td>
                </tr>
                <tr>
                    <td  class="text-warning borderless">
                        1.200.222
                    </td>
                    <td  class="text-warning borderless">
                        200.222
                    </td>
                    <td  class="text-warning borderless">
                        222
                    </td>
                    <td  class="text-warning borderless">
                        5.555
                    </td>
                    <td  class="text-warning borderless">
                        55.55
                    </td>
                    <td  class="text-warning borderless">
                        552
                    </td>
                    <td  class="text-success borderless">
                        888
                    </td>
                    <td  class="text-success borderless">
                        Producido
                    </td>
                    <td  class="text-success borderless">
                        99
                    </td>
                    <td  class="text-warning borderless">
                        55.222.333
                    </td>
                    <td  class="text-warning borderless">
                        552.333
                    </td>
                    <td  class="text-warning borderless">
                        1.000.000
                    </td>
                    <td  class="text-danger borderless">
                        3200 ud/d
                    </td>
                </tr>
                <tr>
                    <td  class="text-primary borderless">
                        1.200 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        200 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        222 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        5.555 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        55 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        552 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        888 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        Producción
                    </td>
                    <td  class="text-primary borderless">
                        99 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        55.222 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        552.333 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        1.000 ud/h
                    </td>
                    <td  class="text-primary borderless">
                        3200 ud/d
                    </td>
                </tr>
            </tbody>
        </table>  
    </div>
    <div id="menuIconos" class="row d-flex justify-content-center" style="margin-top: -15px;">  
        <table class="table table-hover table-borderless table-sm text-center centradoDiv70">
            <thead >
                <tr>                                           
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="construccion.php" title="Construye tu imperio" target="_self">
                            <img title="Construcción"
                            src="{{ asset('img/elJuego/skin0/icons/ico-cons0.png') }}"    
                            onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-cons1.png') }}" 
                            onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-cons0.png') }}" />
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="hangar.php" target="_self">
                                <img title="Producción"
                                src="{{ asset('img/elJuego/skin0/icons/ico-prod0.png') }}"    
                                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-prod1.png') }}" 
                                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-prod0.png') }}" />
                            </a>
                        </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="planeta3.php"  target="_self"> 
                                <img title="Planeta"
                                src="{{ asset('img/elJuego/skin0/icons/ico-pla0.png') }}"    
                                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-pla1.png') }}" 
                                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-pla0.png') }}" />
                            </a>
                        </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="investigacion.php"  target="_self"> 
                                <img title="Investigación"
                                src="{{ asset('img/elJuego/skin0/icons/ico-inv0.png') }}"    
                                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-inv1.png') }}" 
                                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-inv0.png') }}" />
                            </a>
                        </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="defensas.php" target="_self"> 
                                <img title="Defensa"
                                src="{{ asset('img/elJuego/skin0/icons/ico-def0.png') }}"    
                                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-def1.png') }}" 
                                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-def0.png') }}" />
                            </a>
                        </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="diseno.php"  target="_self"> 
                                <img title="Diseños"
                                src="{{ asset('img/elJuego/skin0/icons/ico-dis0.png') }}"    
                                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-dis1.png') }}" 
                                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-dis0.png') }}" />
                            </a>
                        </th>
                    <th scope="col" class="text-warning borderless">
                        <div id="m1" class="text-secondary" align="center">
                            <form action="menu0.php" method="post" name="sellectpla" target="_self" id="sellectpla">
                                <input type=hidden name="otrojugador" VALUE="1">
                                <select id="planetas-footer" name="selecionado"  class="menu" onChange="this.form.submit()" align="center">
                                    <option value="0"  class="" style="font-size:10px">NINGUNA</option>
                                    <option value="3042" selected="selected" class="resaltado" style="font-size:10px">71881x1 SOLARI26</option>
                                </select>
                            </form>
                        </div>
                    </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="mapa10.php"  target="_blank"> 
                            <img title="Astrometría"
                            src="{{ asset('img/elJuego/skin0/icons/ico-ast0.png') }}"    
                            onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-ast1.png') }}" 
                            onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-ast0.png') }}" />
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="flota.php?nmenu=2"  target="_self"> 
                            <img title="Flotas"
                            src="{{ asset('img/elJuego/skin0/icons/ico-flo0.png') }}"    
                            onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-flo1.png') }}" 
                            onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-flo0.png') }}" />
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="banco1.php"  target="_self"> 
                            <img title="Banco"
                            src="{{ asset('img/elJuego/skin0/icons/ico-ban0.png') }}"    
                            onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-ban1.png') }}" 
                            onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-ban0.png') }}" />
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="comercio13.php"  target="_self"> 
                            <img title="Comercio"
                            src="{{ asset('img/elJuego/skin0/icons/ico-com0.png') }}"    
                            onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-com1.png') }}" 
                            onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-com0.png') }}" />
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="alianza0.php"  target="_self"> 
                            <img title="Alianza"
                            src="{{ asset('img/elJuego/skin0/icons/ico-ali0.png') }}"    
                            onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-ali1.png') }}" 
                            onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-ali0.png') }}" />
                        </a>
                    </th>
                    <th scope="col" class="text-warning borderless">
                        <a id="constr" href="ppal.php"  target="_self"> 
                            <img title="General"
                            src="{{ asset('img/elJuego/skin0/icons/ico-gen1.png') }}"    
                            onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-gen1.png') }}" 
                            onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-gen0.png') }}" />
                        </a>
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<!-- jQuery -->
<script src="{{ asset('js/jquery/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery/jquery.easing.min.js') }}" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

@yield('content')
</body>
</html>