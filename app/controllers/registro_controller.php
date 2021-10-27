<?php class registro_controller extends appcontroller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index($page="1"){
		$this->title_for_layout("Registro - Javer");
		//unset($_SESSION['gracias']);
		$this->render();
	}
	
	public function pasos_regalo($page="1"){
		$this->title_for_layout("Pasos - Javer");
		$this->render();
	}

	public function gracias($page="1"){
		$this->title_for_layout("Gracias - Javer");
		$_SESSION['gracias']=true;
		$this->render();
	}
	
} ?>