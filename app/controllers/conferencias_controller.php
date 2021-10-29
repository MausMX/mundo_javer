<?php class conferencias_controller extends appcontroller{
	
	public function __construct(){
		parent::__construct();
		$hoy=date("Y-m-d H:i:s");
		if($hoy>='2021-11-01 00:00'){
			$this->redirect('/');
		}
	}
	
	public function index($page="1"){
		$this->title_for_layout("Conferencias - Javer");
		$this->render();
	}
	
} ?>