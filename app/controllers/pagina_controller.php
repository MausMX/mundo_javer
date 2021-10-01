<?php class pagina_controller extends appcontroller{
	
	public function index($page=null){
		$this->title_for_layout("Mundo Javer");
		$this->redirect('/');
	}
	
	public function detalle($pagina){
		$paginas=new Paginas();
		if(is_numeric($pagina)){
			$this->view->pagina=$paginas->find($pagina);
		}else{
			$this->view->pagina=$paginas->findBy("url", $pagina);
		}
		$this->title_for_layout("Mundo Javer - ".$paginas->nombre);
        $this->render();
	}
		
} ?>