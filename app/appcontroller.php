<?php abstract class appcontroller extends controller {

	public function __construct(){
		parent::__construct();
	}

	public function beforeRender(){
		$this->view->function = $this->action;
		$this->view->params = $this->params;
		$this->view->controller = $this->controller;
		$this->meta_description("En la Expo Vivienda Virtual 2021 de JAVER encontrarás casas en venta en los mejores fraccionamientos del país. ¡Puedes comprar con tu crédito INFONAVIT!");
		/*$this->meta_keywords("");*/
		$this->meta_title("Mundo JAVER ¡Las mejores casas en venta! | JAVER");
	}
	
} ?>