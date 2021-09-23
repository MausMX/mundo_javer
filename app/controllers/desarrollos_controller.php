<?php class desarrollos_controller extends appcontroller{
	
	public function __construct(){
		$this->title_for_layout("Desarrollo - Javer");
		parent::__construct();
	}
	
	public function index($page="1"){
		$json = file_get_contents(Path.'/app/libs/js/info_desarrollos.json');
		// Decode the JSON file
		$json_data = json_decode($json);
		$resultados = array();
		$buscar = "Pirámides";
		$x=0;
		foreach($json_data as $i => $ciudad) {
		    if($ciudad->nombre==$buscar) {
				$x++;
		        $this->view->nombre = $ciudad->nombre;
		        $this->view->descripcion = $ciudad->descripcion;
		        $this->view->logo = $ciudad->logo;
		        $this->view->ubicacion = $ciudad->ubicacion;
		        $this->view->leyenda1 = $ciudad->leyenda1;
		        $this->view->leyenda2 = $ciudad->leyenda2;
		        $this->view->tour_virtual = $ciudad->tour_virtual;
		        $this->view->slide = $ciudad->slider;
		        $this->view->maps = $ciudad->maps;
		        $this->view->calle = $ciudad->calle;
		        $this->view->nextfrac = $ciudad->prevurl;
		        $this->view->prevfrac = $ciudad->nexturl;
		    }
		}	
		// Display data
		$this->render();
	} 
	
} ?>