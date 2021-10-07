<?php class index_controller extends appcontroller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index($page="1"){
		$this->title_for_layout("Mundo Javer");
		$hoy=date("Y-m-d H:i:s");
		if($_SERVER['REMOTE_ADDR']=='189.181.204.198' or $_SERVER['REMOTE_ADDR']=='187.188.64.214'){
			$this->render();
		}else{
			if($hoy>='2021-10-01 00:00' and $hoy<'2021-10-08 09:00'){
				$this->view->contador_active=0;
				$this->view->setLayout("clean");
				$this->render('preheat');
			}elseif($hoy>='2021-10-08 09:00' and $hoy<'2021-10-15 00:00'){
				$this->view->contador_active=1;
				$this->view->setLayout("clean");
				$this->render('contador');
			}elseif($hoy>='2021-11-01 00:00'){
				$this->view->setLayout("preregistro");
				$this->render();
			}else{
				$this->render();
			}
		}
	}
	public function contador($page="1"){
		$this->view->contador_active=1;
		$this->view->setLayout("clean");
		$this->title_for_layout("Contador - Javer");
		$this->render();
	}
	public function preheat($page="1"){
		$this->view->contador_active=0;
		$this->view->setLayout("clean");
		$this->title_for_layout("Preheat - Javer");
		$this->render();
	}
	public function whatsapp($estado,$dia=''){
		switch ($estado) {
			case 'Tamaulipas':
				$estado='tamaulipas';
				break;
			case 'Quintana Roo':
				$estado='quintana_roo';
				break;
			case 'Queretaro':
				$estado='queretaro';
				break;
			case 'Estado de México':
				$estado='estado_de_mexico';
				break;
			case 'Aguascalientes':
				$estado='aguascalientes';
				break;
			case 'Jalisco':
				$estado='jalisco';
				break;
			case 'Nuevo León':
				$estado='nuevo_leon';
				break;
			default:
				break;
		}
		if(!$dia){
			$dia=date("d");
			//$dia=16;
		}
		$lp_files=file_get_contents('./files/lp.json');
		$lps=json_decode($lp_files,true);
		$lps_by_day=array();
		$ahora=date("Y-m-d H:i:s");
		$hora=date("H:i:s");
		//$hora="22:59:59";
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
			$lp_actual=json_encode($lps_by_day[$dia][$current_id]);
	
			$myfile = fopen('./files/'.$estado.".txt", "a+");
			fwrite($myfile, "\n".$ahora.' -- '.$lp_actual);
			fclose($myfile);
			//header('Location: https://api.whatsapp.com/send?phone=+52'.$lps_by_day[$dia][$current_id]['telefono'].'&text=Hola!%20Quiero%20hacer%20una%20consulta');
			header('Location: https://web.whatsapp.com/send?phone=+52'.$lps_by_day[$dia][$current_id]['telefono'].'&text=Hola!%20Quiero%20hacer%20una%20consulta');
			//echo 'Location: https://web.whatsapp.com/send?phone=+52'.$lps_by_day[$dia][$current_id]['telefono'].'&text=Hola!%20Quiero%20hacer%20una%20consulta';
			exit;
		}else{
			http_response_code(401);
		}
	}

	public function whatsapp_disponible($estado,$dia=''){
		switch ($estado) {
			case 'Tamaulipas':
				$estado='tamaulipas';
				break;
			case 'Quintana Roo':
				$estado='quintana_roo';
				break;
			case 'Queretaro':
				$estado='queretaro';
				break;
			case 'Estado de México':
				$estado='estado_de_mexico';
				break;
			case 'Aguascalientes':
				$estado='aguascalientes';
				break;
			case 'Jalisco':
				$estado='jalisco';
				break;
			case 'Nuevo León':
				$estado='nuevo_leon';
				break;
			default:
				break;
		}
		if(!$dia){
			$dia=date("d");
			//$dia=15;
		}
		$lp_files=file_get_contents('./files/lp.json');
		$lps=json_decode($lp_files,true);
		$lps_by_day=array();
		$ahora=date("Y-m-d H:i:s");
		$hora=date("H:i:s");
		//$hora="13:00";
		$last_id=0;
		$current_id=0;
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
			echo $lp_actual=json_encode($lps_by_day[$dia]);
		}else{
			http_response_code(401);
		}
	}
	
} ?>