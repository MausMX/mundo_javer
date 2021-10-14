<?php
	if(($controllerName=='preregistro' and $function=='index') or ($controllerName=='preregistro' and $function=='gracias') or ($controllerName=='terminos' and $function=='index') or ($controllerName=='index' and $function=='contador') or ($controllerName=='index' and $function=='preheat') or ($controllerName=='index' and $function=='index')){
	}else{
?>
<div class="container reg-mid d-block d-lg-none d-xl-none">
	<div class="row py-2">
		<div class="col-xl-1 col-lg-1 col-4 py-2 font-10 info-footer regalo-footer-m d-block d-lg-none d-xl-none">
			<a id="footer-btn-regalo-movil" target="_blank" class="d-inline-block" href="<?= Path?>/registro/pasos_regalo"><img src="<?=Path?>/images/preregistro/regalo_preheat.png"></a>
		</div>
		<div class="col-xl-1 col-lg-1 col-7 pl-0 py-2 font-10 info-footer vineta d-flex  d-lg-none d-xl-none">
			<p class="globo font-sweet-sans-pro bold">REGÍSTRATE, ESCRITURA Y ¡GANA!</p>
		</div>
	</div>
</div>
<?php
	}
?>
<footer>
	<div class="contenido-borde">
		<div class="container">
			<div class="row py-2">
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 py-2 font-10 info-footer"> <span class="c-white font-sweet-sans- text-uppercase">Copyright © casas javer 2021. Todos los derechos reservados</span></div>
				<div class="col-xl-2 col-lg-1 col-md-2 col-sm-12 col-xs-12 py-3 font-10 info-footer">
					<a id="footer-btn-aviso" class="text-secondary" href="https://www.javer.com.mx/avisos-de-privacidad#clientes" target="_blank"><span class="c-white font-sweet-sans- text-uppercase">Aviso de privacidad</span></a>
				</div> 
				<div class="col-xl-2 col-lg-2 col-md-3 col-12 py-3 font-10 info-footer">
					<a id="footer-btn-terminos" class="text-secondary" href="<?=Path?>/terminos"><span class="c-white font-sweet-sans- text-uppercase">Términos y Condiciones</span></a>
				</div>
				<?php
				if(($controllerName=='preregistro' and $function=='index') or ($controllerName=='preregistro' and $function=='gracias') or ($controllerName=='terminos' and $function=='index') or ($controllerName=='index' and $function=='contador') or ($controllerName=='index' and $function=='preheat') or ($controllerName=='index' and $function=='index')){
				?>
				<div class="col-xl-3 col-lg-4 col-md-2 col-sm-12 col-xs-12 py-2 font-10 info-footer logo-footer">
					<span class="c-white"><img class="mr-2" src="<?=Path?>/images/footer/logo_footer.png"></span>
				</div>
				<?
				}else{ 
				?>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 py-2 font-10 info-footer logo-footer">
					<span class="c-white"><img class="mr-2" src="<?=Path?>/images/footer/logo_footer.png"></span>
				</div>
				<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12 py-2 font-10 info-footer regalo-footer d-none d-lg-block d-xl-block">
						<a id="footer-btn-regalo" target="_blank" class="d-inline-block" href="<?= Path?>/registro/pasos_regalo"><img src="<?=Path?>/images/preregistro/regalo_preheat.png"></a>
				</div>
				<?}?>
			</div>
		</div>
	</div>
</footer>
<?php if(isset($estado)) echo "<script> var estado_activo='{$estado}'; </script>";?>
<?php if($controllerName=='desarrollos' and $function=='index'){
			echo "<script> var wp_active=0; </script>";
		}else{
			echo "<script> var wp_active=1; </script>";
		}
?>



