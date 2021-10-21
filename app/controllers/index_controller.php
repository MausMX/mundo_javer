<?php class index_controller extends appcontroller{
	public $charly='189.181.205.208';
	public $pancho='187.188.64.214';
	public $brisa='187.189.165.75';
	public $oscar_valadez='200.52.88.65';
	public $arthur='189.213.0.38';
	public $bruno='189.203.205.83';
	public $daniel='189.178.230.34';
	public $luis='189.219.66.81';

	public function __construct(){
		parent::__construct();
	}
	
	public function index($page="1"){
		$this->title_for_layout("Mundo Javer");
		$hoy=date("Y-m-d H:i:s");
		if(!isset($_SERVER['HTTP_REFERER']) or strpos($_SERVER["HTTP_REFERER"], Path)=== false){
			$this->redirect('registro');
		}
		if(	$_SERVER['REMOTE_ADDR']==$this->pancho or 
			$_SERVER['REMOTE_ADDR']==$this->daniel or 
			$_SERVER['REMOTE_ADDR']==$this->bruno or 
			$_SERVER['REMOTE_ADDR']==$this->arthur or 
			$_SERVER['REMOTE_ADDR']==$this->oscar_valadez or 
			$_SERVER['REMOTE_ADDR']==$this->brisa or 
			$_SERVER['REMOTE_ADDR']==$this->luis or 
			$_SERVER['REMOTE_ADDR']==$this->charly){
			$this->render();
		}else{
			if($hoy>='2021-10-01 00:00' and $hoy<'2021-10-08 09:00'){
				$this->view->contador_active=0;
				$this->view->setLayout("clean");
				$this->render('preheat');
			}elseif($hoy>='2021-10-08 09:00' and $hoy<'2021-10-15 09:00'){
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
			$useragent=$_SERVER['HTTP_USER_AGENT'];
			if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
				header('Location: https://api.whatsapp.com/send?phone=+52'.$lps_by_day[$dia][$current_id]['telefono'].'&text=Hola!%20Quiero%20hacer%20una%20consulta');
			}else{
				header('Location: https://web.whatsapp.com/send?phone=+52'.$lps_by_day[$dia][$current_id]['telefono'].'&text=Hola!%20Quiero%20hacer%20una%20consulta');
			}
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
	public function gracias_javer($page="1"){
		$this->view->contador_active=0;
		$this->view->setLayout("clean");
		$this->title_for_layout("Gracias - Javer");
		$this->render();
	}
	
} ?>