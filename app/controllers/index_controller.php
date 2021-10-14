<?php class index_controller extends appcontroller{
	public $charly='189.181.205.208';
	public $pancho='187.188.64.214';
	public $brisa='187.189.165.75';
	public $oscar_valadez='200.52.88.65';
	public $arthur='189.213.0.38';
	public $bruno='189.203.205.83';
	public $daniel='189.178.230.34';

	public function __construct(){
		parent::__construct();
	}
	
	public function index($page="1"){
		$this->title_for_layout("Mundo Javer");
		$hoy=date("Y-m-d H:i:s");
		if(	$_SERVER['REMOTE_ADDR']==$this->pancho or 
			$_SERVER['REMOTE_ADDR']==$this->daniel or 
			$_SERVER['REMOTE_ADDR']==$this->bruno or 
			$_SERVER['REMOTE_ADDR']==$this->arthur or 
			$_SERVER['REMOTE_ADDR']==$this->oscar_valadez or 
			$_SERVER['REMOTE_ADDR']==$this->brisa or 
			$_SERVER['REMOTE_ADDR']==$this->charly){
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
			//$dia=16;
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
	public function estados_disponibles($dia=''){
		if(!$dia){
			$dia=date("d");
			//$dia=16;
		}
		$lp_files=file_get_contents('./files/lp.json');
		$lps=json_decode($lp_files,true);
		$lps_by_day=array();
		$e_disponibles = array();
		$ahora=date("Y-m-d H:i:s");
		$hora=date("H:i:s");
		//$hora="14:00";
		$last_id=0;
		$current_id=0;
		$array_estados = array("tamaulipas", "quintana_roo", "queretaro", "estado_de_mexico", "aguascalientes", "jalisco", "nuevo_leon");
		for($v=0;$v<count($array_estados);$v++){
			foreach ($lps[$array_estados[$v]] as $key => $lps_by_state) {
				foreach ($lps_by_state['horario'] as $key2 => $lps_dias) {
					if(strtotime($hora)>=strtotime($lps_dias['horario_inicio']) && strtotime($hora)<=strtotime($lps_dias['horario_fin']) && $dia==$lps_dias['dia']){
						//echo strtotime($hora).">=".strtotime($lps_dias['horario_inicio'])."&&".strtotime($hora)."<=".strtotime($lps_dias['horario_fin'])."&&".$dia."==".$lps_dias['dia'];
						//$e_disponibles[]=$array_estados[$v];
						$data = array("nombre"=>$array_estados[$v]);
							if(!in_array($data, $e_disponibles, true)){
								array_push($e_disponibles,$data);
							} 
					}
				}
			}
		}
		/*$e_disponibles2=array();
		$e_disponibles2 = array("nombre" =>"tamaulipas", "nombre" =>"quintana_roo", "nombre" =>"queretaro");*/
		//$e_disponibles2 = array("nombre" =>"tamaulipas", "nombre" =>"quintana_roo", "nombre" =>"queretaro", "nombre" =>"estado_de_mexico", "nombre" =>"aguascalientes", "nombre" =>"jalisco");
		//$e_disponibles2 = array("nombre" =>"tamaulipas", "nombre" =>"quintana_roo", "nombre" =>"queretaro", "nombre" =>"estado_de_mexico", "nombre" =>"aguascalientes", "nombre" =>"jalisco", "nombre" =>"nuevo_leon");
		echo $lp_actual=json_encode($e_disponibles);
	}
	
} ?>