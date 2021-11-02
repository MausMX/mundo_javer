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
		<link rel="shortcut icon" href="<?=Path;?>/favicon.ico"/>
		<meta name="author" content="Maus Casa Creativa SC" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.typekit.net/avv6anh.css">
		<link rel="stylesheet" href="<?=Path?>/app/views/css/style.css?202111021006" type="text/css">
		<link rel="stylesheet" href="<?=Path?>/app/views/css/style2.css?202111021006" type="text/css">
		<link rel="stylesheet" href="<?=Path?>/app/views/css/style_contador.css?202111021006" type="text/css">
		<script>var Path="<?=Path?>";</script>
	</head>
	<body id="<?=$controllerName; ?>" class="<?=$function;?> contador">
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3LPRCH"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<?/*=$this->renderElement("header")*/?>
		<div class="wrapper ">
			<?
			$url =$_SERVER['REQUEST_URI'];
			$porciones = explode("/", $url);
			$count=count($porciones);
			//contador_active=1			
			if($contador_active==1){					
			?>
			<div class="top-planta container mb-0"><img class="mr-2" id="img-hijo" src="<?=Path?>/images/general/enredaderas.png"></div>
				<div class="col-12 text-center pt-0 pb-0 contenido-logo-contador ">
					<div class="col-8 col-lg-2 col-xl-2 offset-2 offset-lg-5 offset-xl-5 text-center py-0 mb-5" id="logo-clean">
						<img class="mr-2" id="img-hijo" alt="MUNDO JAVER 2021" title="Conoce todas las casas en venta en Mundo JAVER" src="<?=Path?>/images/contador/contador_logo.svg"> 
					</div>
				</div>
			<?
			}else{
			?>
			<div class="top-planta container mb-0"><img class="mr-2" id="img-hijo" src="<?=Path?>/images/general/enredaderas.png"></div>
			<div class="col-12 text-center pt-0 pb-0 contenido-logo-contador justify-content-center d-flex">
					<div class="col-4 col-lg-2 col-xl-2 text-center py-0 mb-0 img-preheat">
						<img class="mr-2" id="img-hijo" alt="MUNDO JAVER 2021" title="Conoce todas las casas en venta en Mundo JAVER" src="<?=Path?>/images/contador/contador_logo.svg">
					</div>
			</div>
			<?
			}
			?>
			<?=$content_for_layout ?>
		</div>
		<?=$this->renderElement("footer");?>
		<div class="modal fade" id="detalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"></div></div></div>
		<?php if(isset($_SESSION["msj"])){ ?>
			<script>alert('<?=$_SESSION["msj"]?>');</script>
		<?php unset($_SESSION["msj"]); } ?>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/8f4d94c6ec.js" crossorigin="anonymous"></script>
		<script src='https://cdn.rawgit.com/vuejs/vue/v1.0.24/dist/vue.js'></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
		<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js'></script>
		<script type="text/javascript" src="<?=Path?>/app/libs/js/script.js?202111021006"></script>
		<script type="text/javascript" src="<?=Path?>/app/libs/js/script2.js?202111021006"></script>
		<?
			if($contador_active!=0){
				echo $this->html->includeJs("script_contador");
			}
			
		?>
		<script async src=https://www.googletagmanager.com/gtag/js?id=G-GSMHZV3KJJ></script>
		<script>
  			window.dataLayer = window.dataLayer || [];
  			function gtag(){dataLayer.push(arguments);}
  			gtag('js', new Date());
  			gtag('config', 'G-GSMHZV3KJJ');
		</script>
	</body>
</html>