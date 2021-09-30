<footer>
	<div class="contenido-borde">
		<div class="container">
			<div class="row py-2">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 py-2 font-10 info-footer"> <span class="c-white font-sweet-sans- text-uppercase">Copyright © casas javer 2021. Todos los derechos reservados</span></div>
				<div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12 py-3 font-10 info-footer">
					<?php /*
					<div class="list-group">
						<a class="c-white" href="tel:800 1234 567" title="Correo Contacto Javer">
							<span class="c-white font-sweet-sans-pro"><img class="mr-2" src="/mundo-javer-2021/images/footer/email_footer.png"> info@javer.com.mx</span>
						</a>						
					</div>
					*/ ?>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-3 col-sm-12 col-xs-12 py-2 font-10 info-footer">
					<?php /*	
					<div class="list-group">
						<a class="c-white" href="mailto:info@javer.com.mx" title="Teléfono Javer">
							<span class="c-white font-sweet-sans-pro"><img class="mr-2" src="/mundo-javer-2021/images/footer/phone.png"> 800 1234 567</span>
						</a>						
					</div>
					*/ ?>
				</div>
				<?php
				if(($controllerName=='preregistro' and $function=='index') or ($controllerName=='preregistro' and $function=='gracias') or ($controllerName=='index' and $function=='contador') or ($controllerName=='index' and $function=='preheat') or ($controllerName=='index' and $function=='index')){
				?>
				<div class="col-xl-4 col-lg-4 col-md-2 col-sm-12 col-xs-12 py-2 font-10 info-footer logo-footer">
					<span class="c-white"><img class="mr-2" src="/mundo-javer-2021/images/footer/logo_footer.png"></span>
				</div>
				<?
				}else{
				?>
				<div class="col-xl-3 col-lg-3 col-md-2 col-sm-12 col-xs-12 py-2 font-10 info-footer logo-footer">
					<span class="c-white"><img class="mr-2" src="/mundo-javer-2021/images/footer/logo_footer.png"></span>
				</div>
				<div class="col-xl-1 col-lg-1 col-md-2 col-sm-12 col-xs-12 py-2 font-10 info-footer regalo-footer">
						<a target="_blank" class="d-inline-block" href="#"><img src="https://www.javer.maus.mx/mundo-javer-2021/images/footer/regalo.png"></a>
				</div>
				<?}?>
			</div>
		</div>
	</div>
</footer>
<?php if(isset($estado)) echo "<script> var estado_activo='{$estado}'; </script>";?>