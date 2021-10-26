<!DOCTYPE html>
<html lang="es-MX">
	<head>
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-P3LPRCH');</script>
		<!-- End Google Tag Manager -->
        <?=$this->html->charsetTag("UTF-8"); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?=$title_for_layout; ?></title>
		<meta name="description" content="<?=$meta_description;?>" />
		<meta name="keywords" content="<?=$meta_keywords;?>" />
		<meta name="title" content="<?=$meta_title;?>" />
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="<?=Path?>/favicon.ico" />
		<meta name="author" content="Maus Casa Creativa SC" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.typekit.net/avv6anh.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
		<link rel="stylesheet" href="<?=Path?>/app/views/css/style.css?202110261423" type="text/css">
		<link rel="stylesheet" href="<?=Path?>/app/views/css/style2.css?202110261423" type="text/css">
		<script>var Path="<?=Path?>";</script>
		<?php if(($controllerName=='registro' and $function=='index') or ($controllerName=='preregistro' and $function=='index')){ ?>
			<script src="https://www.google.com/recaptcha/api.js"></script>
			<script>
			function timestamp() { var response = document.getElementById("g-recaptcha-response"); if (response == null || response.value.trim() == "") {var elems = JSON.parse(document.getElementsByName("captcha_settings")[0].value);elems["ts"] = JSON.stringify(new Date().getTime());document.getElementsByName("captcha_settings")[0].value = JSON.stringify(elems); } } setInterval(timestamp, 500); 
			</script>
		<?php } ?>
	</head>
	<body id="<?=$controllerName; ?>" class="<?=$function;?> <?=Movil?>">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3LPRCH"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?=$this->renderElement("header")?>
		<div class="wrapper contenido-global"><?=$content_for_layout ?></div>
		<?=$this->renderElement("footer");?>
		<div class="modal fade" id="detalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"></div></div></div>
		<div class="modal fade" id="youtube" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<img src="<?=Path?>/images/conferencias/btn_back.png">
					</button>
					<iframe width="100%" height="449" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<?php if(isset($show_registro)){ ?>
			<script src="https://www.google.com/recaptcha/api.js"></script>
		    <script>function timestamp() { var response = document.getElementById("g-recaptcha-response"); if (response == null || response.value.trim() == "") {var elems = JSON.parse(document.getElementsByName("captcha_settings")[0].value);elems["ts"] = JSON.stringify(new Date().getTime());document.getElementsByName("captcha_settings")[0].value = JSON.stringify(elems); } } setInterval(timestamp, 500); </script>
			<div class="modal fade" id="registro-popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg modal-dialog-centered" style="max-width:1100px;">
					<div class="modal-content" style="background:transparent;border:none;">
						<div class="modal-body p-0">
		  					<?php $ahora=date("YmdHis")?>
							<div class="font-poppins reg-complete">
								<div class="px-3">
									<div class="row" style="position: relative;">
										<div class="col-lg-4 col-md-4 bg-black rounded-left p-0 text-md-center text-lg-left bg-radial">
										<div id="btn-back" class="close d-block d-lg-none d-md-none d-xl-none" style="z-index:161;" data-dismiss="modal" aria-label="Close"><img src="<?=Path?>/images/conferencias/btn_back.png"></div>
											<div class="pt-5 pb-0 px-3 container-title-registro">
												<div class="pl-0 pr-0">
													<h1 class="text-white text-center font-32 line-height-32 font-poppins mb-3"><strong>1. REGÍSTRATE</strong></h1>
													<h2 class="text-white text-center font-28 line-height-32 font-poppins"><strong>2. Escritura <label>3. ¡Gana!</label></strong></h2>
												</div>
											</div>
											<div class="img-registro-main px-3">
												<img src="<?=Path?>/images/registro/regalo_registro.png">
											</div>
										</div>
										<div class="col-lg-8 col-md-8 bg-white rounded-right registro-form" style="position: relative;">
										<div id="btn-back" class="close d-none d-lg-block d-md-block d-xl-block" style="z-index:161;" data-dismiss="modal" aria-label="Close"><img src="<?=Path?>/images/conferencias/btn_back.png"></div>
											<div class="py-5 padding-registro">
												<h3 class="font-poppins font-18 text-center mb-3"><strong>¡Llena el formulario, Escritura y Gana!</strong></h3>
												<div class="px-5 pt-3 padding-registro">
													<form method="post" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" onsubmit="return validar(this)">
														<input type="hidden" name='captcha_settings' value='{"keyname":"CAPTCHAJAVER","fallback":"true","orgId":"00Do0000000b6Io","ts":""}'>
														<input type="hidden" name="oid" value="00Do0000000b6Io">
														<input type="hidden" name="retURL" value="<?=Path?>/registro/gracias?id=<?=$ahora?>">
														<input type="hidden" name="00N3l00000Q7A57" id="00N3l00000Q7A57" placeholder="Fuente" required value="Mundo Javer">
														<input type="hidden" name="00N3l00000Q7A5X" id="00N3l00000Q7A5X" class="form-control" placeholder="Zona de interés">
														<input type="hidden" name="programas" id="programas" class="form-control" placeholder="Zona de interés" value="<?=$ahora?>">
														<!--  ----------------------------------------------------------------------  -->
														<!--  NOTA: Estos campos son elementos de depuración opcionales. Elimine      -->
														<!--  los comentarios de estas líneas si desea realizar una prueba en el      -->
														<!--  modo de depuración.                                                     -->
														<!--  <input type="hidden" name="debug" value=1>                              -->
														<!--  <input type="hidden" name="debugEmail"                                  -->
														<!--  value="adminsalesforce@javer.com.mx">                                   -->
														<!--  ----------------------------------------------------------------------  -->
														<div class="row align-items-center">
															<div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="text" name="first_name" id="first_name" placeholder="Nombre" required maxlength="40"></div>
															<div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="text" name="last_name" id="last_name" placeholder="Apellidos" required maxlength="80"></div>
															<div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="text" name="phone" id="phone" placeholder="Teléfono" required minlength="10" maxlength="10"></div>
															<div class="col-lg-6 col-md-6"><input class="form-control mb-4" type="email" name="email" id="email" placeholder="Correo" required maxlength="80"></div>
															<div class="col-lg-6 col-md-6 align-self-start">
																<select class="form-control mb-4 font-10 estado" name="00N3l00000Q7A4v" id="00N3l00000Q7A4v" required>
																	<option>Estado</option>
																	<option value="Aguascalientes">Aguascalientes</option>
																	<option value="Ciudad de México">Ciudad de México</option>
																	<option value="Estado de México">Estado de México</option>
																	<option value="Guanajuato">Guanajuato</option>
																	<option value="Jalisco">Jalisco</option>
																	<option value="Nuevo León">Nuevo León</option>
																	<option value="Querétaro">Querétaro</option>
																	<option value="Quintana Roo">Quintana Roo</option>
																	<option value="Tamaulipas">Tamaulipas</option>
																</select>
															</div>
															<div class="col-lg-6 col-md-6">
																<div class="containter-captcha" style="position:absolute;top:-30px;">
																	<div class="g-recaptcha" data-sitekey="6Lcg2vQZAAAAAHpqmf6Pj_-t-doxKr1iwLWfQuWQ"></div>
																</div>
															</div>
															<div class="col-lg-6 col-md-6 button-registro">
																<button id="btn-registro-registro" name="submit" class="btn btn-success w-100 text-uppercase py-2 px-5 font-14 letter-spacing-1 font-weight-bold" type="submit">Regístrate</button>
																<a class="font-poppins font-10 text-secondary d-block mt-2" href="https://www.javer.com.mx/avisos-de-privacidad#clientes">Ver Aviso de Privacidad</a>
																<a class="font-poppins font-14 text-success d-block mt-2 font-weight-bold" href="<?=Path?>/registro/pasos_regalo">Ver pasos para ganar</a>
															</div>
															<div class="col-lg-12 mt-4">
																<p class="text-secondary font-10" style="line-height:12px;">
																	<span class="text-danger">*</span> Los beneficios de Mundo Javer aplican para nuevos registros a partir del 1ro de octubre 2021. Si ya cuentas con un registro previo a esta fecha o estás en contacto con un asesor para tu vivienda, regístrate en Mundo Javer y recibirás un regalo especial de ahorro energético para tu vivienda.
																</p>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<style>
								.g-recaptcha   {
									transform: scale(0.70);
									-webkit-transform:scale(0.70);
									transform-origin: 0 0;
									-webkit-transform-origin: 0 0;
									zoom: 1.3;
								}
								.modal-backdrop.show{width:100%;height:100%;}
							</style>
							<script>
								function validar(a) {
									var response = grecaptcha.getResponse();
									if(response.length == 0){
										alert("Captcha no verificado");
										return false;
										event.preventDefault();
									} else {
										//alert("Captcha verificado");
										return true;
									}
								}
							</script>
        			    </div>
					</div>
				</div>
			</div>
		<?php } ?>
		<?php if(isset($_SESSION["msj"])){ ?>
			<script>alert('<?=$_SESSION["msj"]?>');</script>
		<?php unset($_SESSION["msj"]); } ?>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/8f4d94c6ec.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="<?=Path?>/app/libs/js/script.js?202110261423"></script>
		<script type="text/javascript" src="<?=Path?>/app/libs/js/script2.js?202110261423"></script>
		<script type="text/javascript" src="<?=Path?>/espera.js?202110261423"></script>
		<script async src=https://www.googletagmanager.com/gtag/js?id=G-GSMHZV3KJJ></script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
  			gtag('config', 'G-GSMHZV3KJJ');
		</script>
		<?php if(isset($show_registro)){ ?>
			<script>$('#registro-popup').modal('show');</script>
		<?php } ?>
	</body>
</html>