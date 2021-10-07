<?php class terminos_controller extends appcontroller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index($page="1"){
		$this->title_for_layout("Términos y Condiciones - Javer");
		$this->render();
	}
	
	
} ?>