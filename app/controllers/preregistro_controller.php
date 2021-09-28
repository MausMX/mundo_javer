<?php class preregistro_controller extends appcontroller{
	
	public function __construct(){
		parent::__construct();
		$this->view->setLayout('preregistro');
	}
	
	public function index($page="1"){
		$this->title_for_layout("Pre-Registro - Javer");
		$this->render();
	}

	public function gracias($page="1"){
		$this->title_for_layout("Gracias - Javer");
		$this->render();
	}
	
} ?>