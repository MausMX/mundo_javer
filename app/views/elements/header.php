<header>
	<div class="container font-sweet-sans-pro font-10">
		<a id="logo-principal" class="navbar-brand" href="<?=Path ?>"><img src="<?php echo Path;?>/images/header/logo.png"></a>
		<nav class="navbar navbar-expand-xl navbar-dark bg-dark pt-0 pb-0 pl-0">
			<button class="navbar-toggler ml-auto mr-0 py-3 border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div id="menu-1" class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">Fraccionamientos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Acerca de Javer</a>
					</li>
					<li class="nav-item <?=$controllerName=='conferencias'?'active':'';?>">
						<a class="nav-link" href="<?=Path?>/conferencias">Conferencias</a>
					</li>
					<li class="nav-item <?=$controllerName=='registro'?'active':'';?>">
						<a class="nav-link" href="<?=Path?>/registro">Registro para premio</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto pr-3">
					<li class="navbar-text">
						<span class="nav-text text-white">Siguenos</span>
					</li>
					<li class="nav-item">
						<a class="nav-link px-1" target="_blank" href="https://www.facebook.com/Javer"><i class="fa fa-fw fa-facebook"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-1" target="_blank" href="https://www.youtube.com/user/CasasJaver"><i class="fa fa-fw fa-youtube"></i></a>
					</li>
					<li class="nav-item">
						<a class="nav-link px-1" target="_blank" href="https://www.instagram.com/javer_mx/"><i class="fa fa-fw fa-instagram"></i></a>
					</li>
					<li class="navbar-text px-3">
						|
					</li>
					<li class="nav-item">
						<a class="nav-link" style="position: relative;" href="#" nowrap>Podcast <i class="fa fa-fw fa-spotify"></i></a>
					</li>
				</ul>
			</div>
		</nav>
	</div>
</header>