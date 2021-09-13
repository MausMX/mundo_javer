<div class="error container">
	<br /><br /><br /><br />
	<div class="main-content">
        <div class="perfil" class="clearfix datos-perfil">
            <div id="panel">
                <h1>Error</h1>
                <div class="pleca"></div>
                <ul>
                	<?php
						if($error_string["code"]==""){
							$code="404";
						}else{
							$code=$error_string["code"];
						}
						
						if($error_string["message"]==""){
							$message="No se ha encontrado la página que buscas o ya no existe";
						}else{
							$message=$error_string["message"];
						}
					?>
                	<li><span class="e_code"><?=$code;?></span></li>
                    <li><span class="e_message"><?=$message;?></span></li>
                    <li>Si crees que esto es un fallo, te agradeceremos si lo reportas a:</li>
                    <li class="e_mail"><a href="mailto:carlos.jug@maus.mx">carlos.jug@maus.mx</a></li>
                </ul>
            </div>
		</div>
	</div><!-- End .main-content-->
	<br /><br /><br /><br />
</div><!-- End .wrapper-->