
@extends('juego.recursosFrame')

@section('content')

            
<div class="txt-cons"><cufon class="cufon cufon-canvas" alt="Mina " style="width: 35px; height: 14px;"><canvas width="46" height="18" style="width: 46px; height: 18px; top: -1px; left: -1px;"></canvas><cufontext>Mina </cufontext></cufon><cufon class="cufon cufon-canvas" alt="de " style="width: 20px; height: 14px;"><canvas width="31" height="18" style="width: 31px; height: 18px; top: -1px; left: -1px;"></canvas><cufontext>de </cufontext></cufon><cufon class="cufon cufon-canvas" alt="mineral " style="width: 52px; height: 14px;"><canvas width="63" height="18" style="width: 63px; height: 18px; top: -1px; left: -1px;"></canvas><cufontext>mineral </cufontext></cufon><cufon class="cufon cufon-canvas" alt="Nivel " style="width: 36px; height: 14px;"><canvas width="47" height="18" style="width: 47px; height: 18px; top: -1px; left: -1px;"></canvas><cufontext>Nivel </cufontext></cufon><cufon class="cufon cufon-canvas" alt="40 " style="width: 19px; height: 14px;"><canvas width="30" height="18" style="width: 30px; height: 18px; top: -1px; left: -1px;"></canvas><cufontext>40 </cufontext></cufon><cufon class="cufon cufon-canvas" alt="(De " style="width: 26px; height: 14px;"><canvas width="37" height="18" style="width: 37px; height: 18px; top: -1px; left: -1px;"></canvas><cufontext>(De </cufontext></cufon><cufon class="cufon cufon-canvas" alt="90)" style="width: 20px; height: 14px;"><canvas width="30" height="18" style="width: 30px; height: 18px; top: -1px; left: -1px;"></canvas><cufontext>90)</cufontext></cufon></div>
<div class="txt-cons-tiempo-prem"><span class="azul">Termina: </span><span id="hastacuando1">Hoy a las 12:03</span></div>
<div class="txt-cons-tiempo"><span class="azul">Tiempo:  </span><span id="T7C1">0h 0m 0s</span></div>
<div class="tabla-cons"><table><tbody><tr class="tabla-cons-cab"><td class=" "><cufon class="cufon cufon-canvas" alt="Mineral" style="width: 49px; height: 14px;"><canvas width="59" height="18" style="width: 59px; height: 18px; top: -2px; left: -1px;"></canvas><cufontext>Mineral</cufontext></cufon></td><td class=" desactivado"><cufon class="cufon cufon-canvas" alt="Cristal" style="width: 40px; height: 14px;"><canvas width="51" height="18" style="width: 51px; height: 18px; top: -2px; left: -1px;"></canvas><cufontext>Cristal</cufontext></cufon></td><td class=" desactivado"><cufon class="cufon cufon-canvas" alt="Gas" style="width: 24px; height: 14px;"><canvas width="32" height="18" style="width: 32px; height: 18px; top: -2px; left: -1px;"></canvas><cufontext>Gas</cufontext></cufon></td><td class=" desactivado"><cufon class="cufon cufon-canvas" alt="Plástico" style="width: 50px; height: 14px;"><canvas width="56" height="18" style="width: 56px; height: 18px; top: -2px; left: -1px;"></canvas><cufontext>Plástico</cufontext></cufon></td><td class=" desactivado"><cufon class="cufon cufon-canvas" alt="Ceramica" style="width: 60px; height: 14px;"><canvas width="66" height="18" style="width: 66px; height: 18px; top: -2px; left: -1px;"></canvas><cufontext>Ceramica</cufontext></cufon></td><td class=" desactivado"><cufon class="cufon cufon-canvas" alt="Líquido" style="width: 49px; height: 14px;"><canvas width="55" height="18" style="width: 55px; height: 18px; top: -2px; left: -1px;"></canvas><cufontext>Líquido</cufontext></cufon></td><td class=" desactivado"><cufon class="cufon cufon-canvas" alt="Micros" style="width: 43px; height: 14px;"><canvas width="51" height="18" style="width: 51px; height: 18px; top: -2px; left: -1px;"></canvas><cufontext>Micros</cufontext></cufon></td> </tr><tr class="tabla-cons-dat">						<td class=""><cufon class="cufon cufon-canvas" alt="7.655.214" style="width: 54px; height: 12px;"><canvas width="60" height="16" style="width: 60px; height: 16px; top: -1px; left: -1px;"></canvas><cufontext>7.655.214</cufontext></cufon></td>
                          <td class=""></td>
                          <td class=""></td>
                          <td class=""></td>
                          <td class=""></td>
                          <td class=""></td>
                          <td class=""></td>
                          </tr>
                              <tr class="tabla-cons-premium">
                          <td class="EstDiminutoB"><cufon class="cufon cufon-canvas" alt="2.091.763.549" style="width: 58px; height: 9px;"><canvas width="62" height="12" style="width: 62px; height: 12px; top: -1px; left: 0px;"></canvas><cufontext>2.091.763.549</cufontext></cufon></td>
                          <td class="EstDiminutoB"></td>
                          <td class="EstDiminutoB"></td>
                          <td class="EstDiminutoB"></td>
                          <td class="EstDiminutoB"></td>
                          <td class="EstDiminutoB"></td>
                          <td class="EstDiminutoB"></td>          									
                          </tr></tbody></table></div>
<div class="form-cons">
<form action="" target="_self"> 
    <label class="label-txt"><cufon class="cufon cufon-canvas" alt="Personal" style="width: 54px; height: 14px;"><canvas width="65" height="18" style="width: 65px; height: 18px; top: -1px; left: -1px;"></canvas><cufontext>Personal</cufontext></cufon></label>
    <input id="operando1" name="operando1" class="personal-ocupado-cons verde" value="35246505" size="12" maxlength="8" onkeydown="calcula(7655225.6176 ,337.5,1)" onkeyup="calcula(7655225.6176 ,337.5,1)" type="Text">		              
    <input value="Construir" name="cons" class="bt-verde" onclick="hacer(1,1,1)" type="button">
    <input value="Reciclar" name="edireK" class="bt-rojo" onclick="hacer(-1,1,1)" type="button">
    <input value="Datos" name="inter" class="bt-azul-dat" onclick="interroga(1,40)" type="button">
    <input name="edire" class="bt-azul-tec" value="Tecnologías" onclick="vera(1)" type="button">

</form>
</div>
<div class="img-cons"><img src="http://5dim.es/eljuego/web2/skin0/fotos edif/edif1.jpg" width="90" height="90"></div>          


@endsection