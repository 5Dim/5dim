<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="{{ asset('css/recursosFrame.css') }}" media="all" rel="stylesheet" type="text/css" />

</head>
<body id="recursosFrame">

<div id="menuC" class="container-fluid ">
    <div id="menuCuenta" class="row " > 
       <div class="col-5 text-center"> <div class="row"> 
            <div  id="" class="col-6"></div>             
            <div  id="flotasx" class="col-1">ataque</div>   
            <div id="" class="col-1"><a href="mensajes.php" target="_self"><img  src="{{ asset('img/elJuego/skin0/icons/ico-barra-men.png') }}" title="Mensajes"/></a></div>
            <div id="" class="col-1"><a href="misiones.php?tipo=1" target="_self"><img  src="{{ asset('img/elJuego/skin0/icons/ico-barra-mis.png') }}" title="Misiones"/></a></div>
            <div id="" class="col-1"><a href="estadisticas.php" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-est.png') }}"  title="Estadisticas"/></a></div>
            <div id="" class="col-1"><a  href="http://es.5dim.wikia.com/wiki/Wiki_5dim" target="_blank"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-wik.png') }}"  title="Wikia"/></a></div>
            <div id="" class="col-1"><a href="http://quintadim.foroactivo.com/f21-ayudas-y-preguntas" target="_blank"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-sop.png') }}"  title="Soporte"/></a></div>
            
    </div></div> 
    <div class="col-2 text-center"> <div class="row">    
            <div id="" class="col"><form action="recursosV.php" method="post" name="myform" target="_self" id="premium" align="center">
                   <select id="miraotro" name="miraotro" onChange="cargamerec()">
                   <option value="0"  class="" style="font-size:10px">NINGUNA</option><option value="3042" selected="selected" class="resaltado" style="font-size:10px">71881x1 SOLARI26</option> 
                   </select>	
                   </form>
            </div>
    </div></div> 
    <div class="col-5 text-center"> <div class="row">   
            <div id="" class="col-1 text-center"><a href="cuenta.php" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-opc.png') }}"  title="Opciones"/></a></div>
            <div id="" class="col-1"><a href="http://quintadim.foroactivo.com" target="_blank"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-foro.png') }}"  title="Foro"/></a></div>
            <div id="" class="col-1"><a href="compra1.php" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-shop.png') }}"  title="Tienda"/></a></div>
            <div id="" class="col-1"><a href="mensajeC.php?adm=1" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-rep.png') }}"  title="Reportar Admin"/></a></div>
            <div id="" class="col-1"><a href="logout.php" target="_self"><img src="{{ asset('img/elJuego/skin0/icons/ico-barra-salir2.png') }}"  title="Salir"/></a></div>
            <div  id="" class="col-7"></div>  
        </div></div>        
    </div>

    <div id="menuRecursos" class="row text-center">  
        <div  class="col">
                <div class="text-warning">Personal</div>
                <div class="text-danger">&nbsp;</div>
                <div> 200.00</div>
                <div> -12.2 ud/h</div>        
        </div>

        <div  class="col">
                <div class="text-warning">Mineral</div>
                <div class="text-danger">2255</div>
                <div> 200.0</div>
                <div> -12. ud/h</div>        
        </div>

        <div  class="col">
                <div class="text-warning">Cristal</div>
                <div class="text-danger">555</div>
                <div> 200.00</div>
                <div> -122 ud/h</div>        
        </div>

        <div  class="col">
                <div class="text-warning">Gas</div>
                <div class="text-danger">2555</div>
                <div> 200.00</div>
                <div> -122 ud/h</div>        
        </div>

        <div  class="col">
                <div class="text-warning">Plástico</div>
                <div class="text-danger">5555</div>
                <div> 200.00</div>
                <div> 12.522 ud/h</div>        
        </div>

        <div  class="col">
                <div class="text-warning">Ceramica</div>
                <div class="text-danger">Ilimitado</div>
                <div> 200000</div>
                <div> 22 ud/h</div>        
        </div>

        <div  class="col">
                <div class="text-warning">Recargar</div>
                <div class="text-danger">Almacenes</div>
                <div class="text-secondary">Producido</div>
                <div class="text-primary">Produción</div>        
        </div>

        <div  class="col">
                <div class="text-warning">Liquido</div>
                <div class="text-danger">Ilimitado</div>
                <div> 200.000.000</div>
                <div> -12.522 ud/h</div>        
        </div>
        <div  class="col">
                <div class="text-warning">Micros</div>
                <div class="text-danger">Ilimitado</div>
                <div> 200.000.000</div>
                <div> -12.522 ud/h</div>        
        </div>
        <div  class="col">
                <div class="text-warning">Fuel</div>
                <div class="text-danger">Ilimitado</div>
                <div> 200.000.000</div>
                <div> -12.522 ud/h</div>        
        </div>
        <div  class="col">
                <div class="text-warning">M-A</div>
                <div class="text-danger">Ilimitado</div>
                <div> 200.000.000</div>
                <div> -12.522 ud/h</div>        
        </div>
        <div  class="col">
                <div class="text-warning">Munición</div>
                <div class="text-danger">Ilimitado</div>
                <div> 200.000.000</div>
                <div> -12.522 ud/h</div>        
        </div>
        <div  class="col">
                <div class="text-warning">Moneda</div>
                <div class="text-danger">Ilimitado</div>
                <div> 200.000.000</div>
                <div> -12.522 ud/h</div>        
        </div>
</div>


<div id="menuIconos" class="row text-center">       
                <div  class="col">&nbsp;</div>
                <div  class="col">&nbsp;</div>
                
        <div id="" class="col align-self-center"><a id="constr" href="construccion.php" title="Construye tu imperio" target="_self">
                <img title="Construcción"
                src="{{ asset('img/elJuego/skin0/icons/ico-cons0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-cons1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-cons0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="hangar.php" target="_self">
                <img title="Producción"
                src="{{ asset('img/elJuego/skin0/icons/ico-prod0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-prod1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-prod0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="planeta3.php"  target="_self"> 
                <img title="Planeta"
                src="{{ asset('img/elJuego/skin0/icons/ico-pla0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-pla1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-pla0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="investigacion.php"  target="_self"> 
                <img title="Investigación"
                src="{{ asset('img/elJuego/skin0/icons/ico-inv0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-inv1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-inv0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="defensas.php" target="_self"> 
                <img title="Defensa"
                src="{{ asset('img/elJuego/skin0/icons/ico-def0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-def1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-def0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="diseno.php"  target="_self"> 
                <img title="Diseños"
                src="{{ asset('img/elJuego/skin0/icons/ico-dis0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-dis1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-dis0.png') }}" /></a></div>

        <div id="" class="col align-self-center"><div id="m1" class="text-secondary" align="center"><form action="menu0.php" method="post" name="sellectpla" target="_self" id="sellectpla">
                <input type=hidden name="otrojugador" VALUE="1">
                <select id="planetas-footer" name="selecionado"  class="menu" onChange="this.form.submit()" align="center">
                  <option value="0"  class="" style="font-size:10px">NINGUNA</option><option value="3042" selected="selected" class="resaltado" style="font-size:10px">71881x1 SOLARI26</option>		    </select>
        </form>
        </div> </div>

        <div id="" class="col align-self-center"><a id="constr" href="mapa10.php"  target="_blank"> 
                <img title="Astrometría"
                src="{{ asset('img/elJuego/skin0/icons/ico-ast0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-ast1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-ast0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="flota.php?nmenu=2"  target="_self"> 
                <img title="Flotas"
                src="{{ asset('img/elJuego/skin0/icons/ico-flo0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-flo1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-flo0.png') }}" /></div>
        <div id="" class="col align-self-center"><a id="constr" href="banco1.php"  target="_self"> 
                <img title="Banco"
                src="{{ asset('img/elJuego/skin0/icons/ico-ban0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-ban1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-ban0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="comercio13.php"  target="_self"> 
                <img title="Comercio"
                src="{{ asset('img/elJuego/skin0/icons/ico-com0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-com1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-com0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="alianza0.php"  target="_self"> 
                <img title="Alianza"
                src="{{ asset('img/elJuego/skin0/icons/ico-ali0.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-ali1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-ali0.png') }}" /></a></div>
        <div id="" class="col align-self-center"><a id="constr" href="ppal.php"  target="_self"> 
                <img title="General"
                src="{{ asset('img/elJuego/skin0/icons/ico-gen1.png') }}"    
                onmouseover=this.src="{{ asset('img/elJuego/skin0/icons/ico-gen1.png') }}" 
                onmouseout=this.src="{{ asset('img/elJuego/skin0/icons/ico-gen0.png') }}" /></a></div>
         
                <div  class="col">&nbsp;</div>
                <div  class="col">&nbsp;</div>
</div>


  
</div> 


 

    <!-- jQuery -->
    <script src="{{ asset('js/jquery/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery/jquery.easing.min.js') }}" type="text/javascript"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />

</body>
</html>