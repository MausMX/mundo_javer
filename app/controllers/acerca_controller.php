<?php class acerca_controller extends appcontroller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index($page="1"){
		$this->title_for_layout("Acerca de - Javer");
		$this->render();
	}
	
} ?>