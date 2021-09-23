<?php class desarrollos_controller extends appcontroller{
	
	public function __construct(){
		$this->title_for_layout("Desarrollo - Javer");
		parent::__construct();
	}
	
	public function index($fraccionamiento=""){
		$json = file_get_contents(Path.'/app/libs/js/info_desarrollos.json');
		// Decode the JSON file
		$json_data = json_decode($json);
		$resultados = array();
		$buscar = $fraccionamiento;
		$x=0;
		foreach($json_data as $i => $ciudad) {
		    if($ciudad->id==$buscar) {
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
		        $this->view->nextfrac = $ciudad->nexturl;
		        $this->view->prevfrac = $ciudad->prevurl;
		        $this->view->estado = $ciudad->estado;
		    }
		}	
		// Display data
		$this->render();
	} 
	public function ciudades($ciudad){
		$json = file_get_contents(Path.'/app/libs/js/info_desarrollos.json');
		$json_data = json_decode($json);
		$resultados = array();
		$buscar = $ciudad;
		$x=0;
		foreach($json_data as $i => $ciudad) {
		    if($ciudad->idciudad==$buscar) {
				$x++;
		        $resultados[] = $ciudad;
				if($x<2){
		        	$this->view->city = $ciudad->ciudad;
			        $this->view->estado = $ciudad->estado;
				}	
		       /* $this->view->ubicacion = $ciudad->ubicacion;
		        $this->view->leyenda1 = $ciudad->leyenda1;
		        $this->view->leyenda2 = $ciudad->leyenda2;
		        $this->view->tour_virtual = $ciudad->tour_virtual;
		        $this->view->slide = $ciudad->slider;
		        $this->view->maps = $ciudad->maps;
		        $this->view->calle = $ciudad->calle;
		        $this->view->nextfrac = $ciudad->prevurl;
		        $this->view->prevfrac = $ciudad->nexturl;*/
		    }
		}	
		$this->view->info = $resultados;
		// Display data
		$this->render();
	}
	
} ?>