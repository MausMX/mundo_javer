<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="<?=Path ?>">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	
		<div class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item <?php if($controllerName == "index" and $function == "index") echo "active"; ?>">
					<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Fraccionamientos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Acerca de Javer</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Conferencias</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Registro para premio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contacto</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="navbar-text">
					<span class="nav-text" >Siguenos</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-fw fa-facebook"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-fw fa-youtube"></i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-fw fa-instagram"></i></a>
				</li>
				<li class="navbar-text px-3">
					|
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Podcast <i class="fa fa-fw fa-spotify"></i></a>
				</li>
			</ul>
		</div>
	</nav>
</header>