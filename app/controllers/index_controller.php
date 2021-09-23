<?php class index_controller extends appcontroller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index($page="1"){
		$this->title_for_layout("Empresa");
		$this->render();
	}
	public function contador($page="1"){
		$this->view->setLayout("clean");
		$this->title_for_layout("Contador");
		$this->render();
	}

	public function whatsapp($estado,$dia){
		$lp_files=file_get_contents('./files/lp.json');
		$lps=json_decode($lp_files,true);
		$lps_by_day=array();
		$ahora=date("Y-m-d H:i:s");
		$hora=date("H:i:s");
		$hora="22:59:59";
		$last_id=0;
		$current_id=0;
		if(!is_file('./files/'.$estado.'.txt')){
			$myfile = fopen('./files/'.$estado.".txt", "a+");
			fwrite($myfile, "\n");
			fclose($myfile);
		}
		$fewLines = explode("\n", file_get_contents('./files/'.$estado.'.txt'));
		$lastLine = $fewLines[count($fewLines) - 1];
		$last_user['info']=explode('--',$lastLine);
		if(isset($last_user['info'][1])){
			$last_user['datos']=json_decode($last_user['info'][1],true);
			$last_id=$last_user['datos']['idLP'];
		}
		foreach ($lps[$estado] as $key => $lps_by_state) {
			foreach ($lps_by_state['horario'] as $key2 => $lps_dias) {
				if($hora>=$lps_dias['horario_inicio'] and $hora<=$lps_dias['horario_fin']){
					$lps_by_day[$lps_dias['dia']][$lps_by_state['idLP']]['idLP']=$lps_by_state['idLP'];
					$lps_by_day[$lps_dias['dia']][$lps_by_state['idLP']]['nombre']=$lps_by_state['nombre'];
					$lps_by_day[$lps_dias['dia']][$lps_by_state['idLP']]['telefono']=$lps_by_state['telefono'];
					$lps_by_day[$lps_dias['dia']][$lps_by_state['idLP']]['correo']=$lps_by_state['correo'];
					$lps_by_day[$lps_dias['dia']][$lps_by_state['idLP']]['dia']=$lps_dias['dia'];
					$lps_by_day[$lps_dias['dia']][$lps_by_state['idLP']]['horario_inicio']=$lps_dias['horario_inicio'];
					$lps_by_day[$lps_dias['dia']][$lps_by_state['idLP']]['horario_fin']=$lps_dias['horario_fin'];
				}
			}
		}
		if(isset($lps_by_day[$dia])){
			if(count($lps_by_day[$dia])>1){
				if(isset($lps_by_day[$dia][$last_id])){
					for ($i=0; $i < 150; $i++) { 
						$current=current($lps_by_day[$dia]);
						if($current['idLP']==$last_id){
							$next=next($lps_by_day[$dia]);
							if(isset($next['idLP'])){
								$current_id=$next['idLP'];
							}else{
								$next=reset($lps_by_day[$dia]);
								if(isset($next['idLP'])){
									$current_id=$next['idLP'];
								}
							}
						}else{
							$next=next($lps_by_day[$dia]);
							if(!isset($next['idLP'])){
								reset($lps_by_day[$dia]);
							}
						}
					}
				}else{
					$current=current($lps_by_day[$dia]);
					$current_id=$current['idLP'];
				}
			}elseif(count($lps_by_day[$dia])==1){
				$current=current($lps_by_day[$dia]);
				$current_id=$current['idLP'];
			}
			/*
			echo "<pre>";
			echo $last_id;
			echo "<br>";
			echo $current_id;
			echo "<br>";
			print_r($lps_by_day[$dia]);
			echo "</pre>";
			*/
			echo $lp_actual=json_encode($lps_by_day[$dia][$current_id]);
	
			$myfile = fopen('./files/'.$estado.".txt", "a+");
			fwrite($myfile, "\n".$ahora.' -- '.$lp_actual);
			fclose($myfile);
		}else{
			http_response_code(401);
		}
	}
	
} ?>