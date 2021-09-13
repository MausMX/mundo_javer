<?php class index_controller extends appcontroller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index($page="1"){
		$this->title_for_layout("Empresa");
		$this->render();
	}
	
} ?>