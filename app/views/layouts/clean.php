<!DOCTYPE html>
<html lang="es-MX">
	<head>
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
		<?=$this->html->includeCss("style");?>
		<?=$this->html->includeCss("style2");?>
		<?=$this->html->includeCss("style_contador");?>
		<script>var Path="<?=Path?>";</script>
	</head>
	<body id="<?=$controllerName; ?>" class="<?=$function;?> contador">
		<!--<?=$this->renderElement("header")?>-->
		<div class="wrapper ">
			<div class="col-12 text-center py-5 contenido-logo-contador">
				<div class="col-12 text-center py-5 mb-5" id="logo-clean">
					<img class="mr-2" id="img-hijo" src="/mundo-javer-2021/images/contador/contador_logo.png">
				</div>
			</div>
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
		<?=$this->html->includeJs("script");?>
		<?=$this->html->includeJs("script_contador");?>
		<?php /*
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-15939275-27', 'auto');
		  ga('require', 'linkid', 'linkid.js');
		  ga('send', 'pageview');
		</script>
		*/ ?>
	</body>
</html>