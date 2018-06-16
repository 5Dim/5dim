<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="author" content="Quinta Dimensión" /> 
        <meta name="revisit-after" content="7 days" /> 
        <meta name="ROBOTS" content="INDEX, ALL, FOLLOW" /> 
        <meta http-equiv="contents" content="Quinta Dimensión, 5 dimensión, 5dim, juego gratis, juego online, juego espacial" /> 
        <meta name="description" content="Quinta Dimensión, juego espacial gratis online" /> 
        <meta http-equiv="Keywords" content="Quinta Dimensión, 5 dimensión, 5dim, juego gratis, juego online, juego espacial" /> 
        <meta content="Quinta Dimensión, juego espacial gratis online" /> 
    
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>5Dim - Quinta Dimension</title>

	<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
	<link href="{{ asset('css/style.css') }}" media="all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('js/prettyPhoto/css/prettyPhoto.css') }}" media="all" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/twitterFetcher_v10_min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/jquery.cycle.all.js') }}"></script>

			<!-- Cufon -->
			<script type="text/javascript" src="{{ asset('js/cufon-yui.js') }}"></script>
			<script type="text/javascript" src="{{ asset('js/fonts/bebas-neue_400.font.js') }}"></script>

			<!-- Cufon -->

		<!-- superfish -->
				<link href="{{ asset('cs/superfish-custom.css') }}" media="all" rel="stylesheet" type="text/css" />
				<script type="text/javascript" src="{{ asset('js/superfish-1.4.8/js/superfish.js') }}"></script>				
		<!-- ENDS superfish -->

			<!-- feeds -->
			<script type="text/javascript" src="{{ asset('js/feeds/jquery.zrssfeed.min.js') }}"></script>	
			<script type="text/javascript" src="{{ asset('js/feeds/jquery.vticker.min.js') }}"></script>			     
			<!-- feeds -->
	

	<link rel="fav icon" href="images/favico.ico"> 	



	

<!-- HEADER -->
<div id=\"home-header\">
		<div class=\"degree\">
			<!-- wrapper -->
			<div class=\"wrapper\">
				
                
				<!-- idiomas -->
                <div id=\"idiomas-holder\">
					<a href=\"indexV.php?elidioma=0\" ><img src=\"img/ES-flag.png\"/> </a>
                    <a href=\"indexV.php?elidioma=1\"><img src=\"img/GB-flag.png\"/> </a>
                    <a href=\"indexV.php?elidioma=2\" ><img src=\"img/DE-flag.png\"/> </a>
 
                 </div>
                 <div class=\"registro\">
                  <ul>
                  <li><a href=\"registro2.php?elidioma=elidioma\">  @lang('webIndex.web31') </a></li> 
				 
				 
				 
				 
                  </ul>
                 </div>
               <!-- FIN idiomas -->         
                        
                        
                       
				<!-- login -->
				<div class=\"top-login\">
					<form   action=\"eljuego/web2/log2.php?elidioma=elidioma\" method=\"post\" name=\"loginform\"  id=\"loginform\" target=\"_self\">
						<div>

                                <input type=\"text\" value=\"User\" name=\"user\" id=\"user\" onfocus=\"login_defaultInput(this)\" onblur=\"user_clearInput(this)\" maxlength=\"10\"/>
                                <input type=\"password\" value=\"Pass\" name=\"pass\" id=\"pass\" onfocus=\"login_defaultInput(this)\" onblur=\"pass_clearInput(this)\" maxlength=\"8\"/>
                                <input type=\"submit\" id=\"loginsubmit\" value=\" \" />

                            </div>
                        </form>
                    </div>
                    <!-- ENDS login -->
                    
                    <!-- navigation -->
                    <div id=\"nav-holder\">
                        <ul id=\"nav\" class=\"sf-menu\">
                            <li @lang('webIndex.soy1')><a href=\"http://5dim.es/\">  @lang('webIndex.web1') </a></li>
                            <li @lang('webIndex.soy2')><a> @lang('webIndex.ntex14') </a>
                                <ul>
                                    <li ><a href=\"astrometria.php?elidioma=elidioma\"> @lang('webIndex.cara6') </a></li>
                                    <li ><a href=\"economia.php?elidioma=elidioma\"> @lang('webIndex.cara5') </a></li>
                                    <li ><a href=\"flota.php?elidioma=elidioma\"> @lang('webIndex.cara2') </a></li>
                                    <li ><a href=\"investigacion.php?elidioma=elidioma\"> @lang('webIndex.cara4')  </a></li>
                                    <li ><a href=\"politica.php?elidioma=elidioma\">  @lang('webIndex.cara3')  </a></li>
                                </ul>
                            </li>
                            <li @lang('webIndex.soy3')><a href=\"gallery.php?elidioma=elidioma\">  @lang('webIndex.ntex15') </a></li>
                            <li @lang('webIndex.soy4')><a href=\"http://quintadim.foroactivo.com/\" target=\"_blank\" > @lang('webIndex.web6') </a></li>
                            <li @lang('webIndex.soy5')><a href=\"contact.php?elidioma=elidioma\"> @lang('webIndex.web7') </a></li>
                            
                            
                        </ul>
                    </div>
                    <!-- ENDS navigation -->
                
                </div>
                <!-- ENDS HEADER-wrapper -->
            </div>
            </div>
			<!-- ENDS HEADER -->
			





   <!-- MAIN -->
		<div id="main">
			<!-- wrapper -->
			<div class="wrapper">
				<!-- home-content -->
				<div class="home-content">

					<div class="shadow-divider"></div>
					<!-- headline -->
					<div class="headline">@lang('webIndex.web12')
                        <h5>Ronda 2015-2016 cerrada </h5>
					</div>
                    <!-- ENDS headline -->
                    

                    
					
					             <!-- slideshow -->
					<div id="slideshow">				
						<!--<a href="#" id="prev"></a>
	          			<a href="#" id="next"></a>-->
						<a href="" id="slideshow-link" ><span></span></a>
						<!-- slides -->
						<ul id="slides">
			                <li><img src="images/webIndex/1.png"  alt="Imagen" /></li>
			                <li><img src="images/webIndex/2.png"  alt="Imagen" /></li>
			                <li><img src="images/webIndex/3.png"  alt="Imagen" /></li>
                            <li><img src="images/webIndex/4.png"  alt="Imagen" /></li>
			          	</ul>
			          	<!-- ENDS slides -->
					</div>
					<!-- ENDS slideshow -->
					<!-- front-left-col -->
					<div class="front-left-col">
						<div class="bullet-title">
							<div class="big">@lang('webIndex.ntex1')</div>
							<div class="small">@lang('webIndex.ntex2')</div>
						</div>

    <div id="example1"></div>
    
    <script>twitterFetcher.fetch('361564690305929216', 'example1', 3, true, false, true);</script>


						<p><a href="https://twitter.com/5_Dim" class="link-button right" target="_blank"><span>@lang('webIndex.ntex3')</span></a></p>

                        
					</div>
					<!-- ENDS front-left-col -->
					
                    
					<!-- front-right-col-->
					<div class="front-right-col">
						<div class="bullet-title">
							<div class="big">@lang('webIndex.ntex4')</div>
							<div class="small">@lang('webIndex.ntex5')</div>
						</div>
						<ul class="blocks-holder">
							<li class="block">
								<div class="block-ribbon">
									<div class="left">
										<div class="block-title"><a href="#">@lang('webIndex.ntex6')</a></div>
										<div class="block-date">@lang('webIndex.ntex7')</div>
									</div>
									<div class="right"></div>
								</div>
								<a href="eljuego/web2/instrucciones/arbol.php?nodjuego=1" target="_blank"><img src="img/dummies/home-block-1.jpg" alt="Thumb" class="thumb" title="Thumbnail" /> </a>
							</li>
							<li class="block">
								<div class="block-ribbon">
									<div class="left">
										<div class="block-title"><a href="#">@lang('webIndex.ntex8')</a></div>
										<div class="block-date">@lang('webIndex.ntex9')</div>
									</div>
									<div class="right"></div>
								</div>
								<a href="eljuego/web2/instrucciones/arbolcons.php?nodjuego=1" target="_blank" ><img src="img/dummies/home-block-2.jpg" alt="Thumb" class="thumb" title="Thumbnail" /> </a>
							</li>
							<li class="block">
									<div class="block-ribbon">
									<div class="left">
										<div class="block-title"><a href="#">@lang('webIndex.ntex10')</a></div>
										<div class="block-date">@lang('webIndex.ntex11')</div>
									</div>
									<div class="right"></div>
								</div>
								<a href="eljuego/web2/instrucciones/arbolinvest.php?nodjuego=1" target="_blank" ><img src="img/dummies/home-block-3.jpg" alt="Thumb" class="thumb" title="Thumbnail" /> </a>
								
							</li>
							<li class="block">
								<div class="block-ribbon">
									<div class="left">
										<div class="block-title"><a href="#"> @lang('webIndex.ntex12')</a></div>
										<div class="block-date">@lang('webIndex.ntex13')</div>
									</div>
									<div class="right"></div>
								</div>
								<a href="eljuego/web2/mapa10.php?nodjuego=1" ><img src="img/dummies/home-block-4.jpg" alt="Thumb" class="thumb" title="Thumbnail" /> </a>
							</li>
						</ul>
                                               
					</div>
					<!-- ENDS front-left-col -->
				 
	
<!-- POSTS -->
<div id="posts"> 
	<!-- post -->
	<div class="post"> 
		<!-- post-header -->
		<div class="bullet-title">
			<div class="big">@lang('webIndex.web13')</div>
			<div class="small">@lang('webIndex.web14') </div>
		</div>
		<!-- ENDS post-header --> 
		<div class="excerpt">

		</div>
	 
	</div>
	<!-- ENDS post --> 
					
</div>
<!-- ENDS POSTS --> 

<!-- sidebar -->
<ul id="sidebar">
	
	<!-- recent posts -->
	<li class="recent-posts">
		<h2 class="custom"><span> @lang('webIndex.cabezo1')</span></h2>
		<ul>
			<li> 
				<div class="recent-excerpt ">
					<div><a>@lang('webIndex.cara10')</a></div>
					<div> @lang('webIndex.cara11')</div>
				</div>
			</li>
			<li> 
				<div class="recent-excerpt">
					<div><a> @lang('webIndex.cabezo2')</a></div>
					<div> @lang('webIndex.cara20')</div>
				</div>
			</li>
			<li> 
				<div class="recent-excerpt">
					<div><a> @lang('webIndex.cara21') </a></div>
				</div>
			</li>
			<li> 
				<div class="recent-excerpt">
					<div><a>@lang('webIndex.cabezo3') </a></div>
					<div> @lang('webIndex.cara30')</div>
				</div>
			</li>
			<li> 
				<div class="recent-excerpt">
					<div><a>@lang('webIndex.cabezo4')</a></div>
					<div> @lang('webIndex.cara40')</div>
				</div>
			</li>  
			<li> 
				<div class="recent-excerpt">
					<div><a> @lang('webIndex.cabezo5')</a></div>
				</div>
			</li>                      
		</ul>
	</li>
	<!-- ENDS recent posts -->
</ul>
<!-- ENDS sidebar --> 
							
	</div>
		 
					<div id="foro">    
							<div class="bullet-title">
							<div class="big">Actividad del foro</div>
							<div class="small">El mejor sitio para estar informado</div>
					</div>
	 <div id="mensajes"></div>
				 </div>
	<!-- ENDS home-content -->
	<div class="clear"></div>
	
	

	
</div>
<!-- ENDS main-wrapper -->


</div>		
<!-- ENDS MAIN -->	

<!-- FOOTER -->
<div id="footer">

</div>
<!-- ENDS FOOTER -->


<!-- BOTTOM -->
<div id="bottom">
</div>
<!-- ENDS BOTTOM -->

<!-- start cufon -->
<script type="text/javascript"> 

Cufon.now(); 
	
autolog=0;

<!-- ENDS start cufon -->

</body>
</html>