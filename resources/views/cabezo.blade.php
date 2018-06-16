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