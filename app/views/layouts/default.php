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
		<link rel="shortcut icon" href="favicon.ico" />
		<meta name="author" content="Maus Casa Creativa SC" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.typekit.net/avv6anh.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
		<?=$this->html->includeCss("style");?>
		<?=$this->html->includeCss("style2");?>
		<script>var Path="<?=Path?>";</script>
	</head>
	<body id="<?=$controllerName; ?>" class="<?=$function;?>">
		<?=$this->renderElement("header")?>
		<div class="wrapper "><?=$content_for_layout ?></div>
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
		<?php if(isset($_SESSION["msj"])){ ?>
			<script>alert('<?=$_SESSION["msj"]?>');</script>
		<?php unset($_SESSION["msj"]); } ?>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
		  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://kit.fontawesome.com/8f4d94c6ec.js" crossorigin="anonymous"></script>
		<?=$this->html->includeJs("script");?>
	</body>
</html>