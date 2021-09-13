<?php class Tools{
    
    public function  __construct() {
	}

	static public function dia_semana($dia='1',$formato='0'){
		if($formato==0){
			switch($dia){
				case '1':
					return 'Lunes';
					break;
				case '2':
					return 'Martes';
					break;
				case '3':
					return 'Miercoles';
					break;
				case '4':
					return 'Jueves';
					break;
				case '5':
					return 'Viernes';
					break;
				case '6':
					return 'Sabado';
					break;
				case '7':
					return 'Domingo';
					break;
			}
		}elseif($formato==1){
			switch($dia){
				case '1':
					return 'Lun';
					break;
				case '2':
					return 'Mar';
					break;
				case '3':
					return 'Mie';
					break;
				case '4':
					return 'Jue';
					break;
				case '5':
					return 'Vie';
					break;
				case '6':
					return 'Sab';
					break;
				case '7':
					return 'Dom';
					break;
			}
		}
    }

    static public function mes($mes=01,$formato=0){
        if($formato){
            switch($mes){
                case '01':
                    return 'Enero';
                    break;
                case '02':
                    return 'Febrero';
                    break;
                case '03':
                    return 'Marzo';
                    break;
                case '04':
                    return 'Abril';
                    break;
                case '05':
                    return 'Mayo';
                    break;
                case '06':
                    return 'Junio';
                    break;
                case '07':
                    return 'Julio';
                    break;
                case '08':
                    return 'Agosto';
                    break;
                case '09':
                    return 'Septiembre';
                    break;
                case '10':
                    return 'Octubre';
                    break;
                case '11':
                    return 'Noviembre';
                    break;
                case '12':
                    return 'Diciembre';
                    break;
            }
        }else{
            switch($mes){
                case '01':
                    return 'Ene';
                    break;
                case '02':
                    return 'Feb';
                    break;
                case '03':
                    return 'Mar';
                    break;
                case '04':
                    return 'Abr';
                    break;
                case '05':
                    return 'May';
                    break;
                case '06':
                    return 'Jun';
                    break;
                case '07':
                    return 'Jul';
                    break;
                case '08':
                    return 'Ago';
                    break;
                case '09':
                    return 'Sep';
                    break;
                case '10':
                    return 'Oct';
                    break;
                case '11':
                    return 'Nov';
                    break;
                case '12':
                    return 'Dic';
                    break;
            }
        }
    }
    
    static public function change_mes_numerico_us($mes = ''){
        switch ($mes) {
            case 'Jan':
                $return = "01";
                break;
            case 'Feb':
                $return = "02";
                break;
            case 'Mar':
                $return = "03";
                break;
            case 'Apr':
                $return = "04";
                break;
            case 'May':
                $return = "05";
                break;
            case 'Jun':
                $return = "06";
                break;
            case 'Jul':
                $return = "07";
                break;
            case 'Aug':
                $return = "08";
                break;
            case 'Sep':
                $return = "09";
                break;
            case 'Oct':
                $return = "10";
                break;
            case 'Nov':
                $return = "11";
                break;
            case 'Dec':
                $return = "12";
                break;
            default:
                $return = 0;
                break;
        }
        return $return;
    }
    
    static public function fecha_formato($fecha = ''){
        if($fecha!="0000-00-00" and $fecha!=NULL)
            return date("d-m-Y", strtotime($fecha));
        else
            return "00-00-0000";
    }
    static public function fecha_hora_formato($fecha = ''){
        if($fecha!="0000-00-00 00:00:00" and $fecha!=NULL)
            return date("d-m-Y H:i", strtotime($fecha));
        else
            return "00-00-0000 00:00";
    }
    static public function moneda_formato($monto = '0.00',$moneda=''){
        if($monto<0){
            return "<span class='text-danger'>- $".number_format(($monto*-1),2)." {$moneda}</span>";
        }else{
            return "<span>$".number_format($monto,2)." {$moneda}</span>";
        }
    }
    
	static public function orden_by($seccion='usuarios',$campo='correo',$nombre='Nombre'){
		if($_SESSION[$seccion]['orden']['tipo']=='ASC' and $_SESSION[$seccion]['orden']['campo']==$campo){
			echo '<a class="text-white" href="'.Path.'/'.$seccion.'?campo='.$campo.'&tipo=DESC">'.$nombre.' <i class="mdi mdi-arrow-up-drop-circle-outline"></i></a>';
		}elseif($_SESSION[$seccion]['orden']['tipo']=='DESC' and $_SESSION[$seccion]['orden']['campo']==$campo){
			echo '<a class="text-white" href="'.Path.'/'.$seccion.'?campo='.$campo.'&tipo=ASC">'.$nombre.' <i class="mdi mdi-arrow-down-drop-circle-outline"></i></a>';
		}else{
			echo '<a class="text-white" href="'.Path.'/'.$seccion.'?campo='.$campo.'&tipo=ASC">'.$nombre.'</a>';
		}
    }
	
	static public function genera_password($longitud=10,$tipo="alfanumerico"){if($tipo=="alfanumerico"){$exp_reg="[^A-Z0-9]";}elseif($tipo=="numerico"){$exp_reg="[^0-9]";}return substr(preg_replace($exp_reg, "", md5(rand())) . preg_replace($exp_reg, "", md5(rand())) . preg_replace($exp_reg, "", md5(rand())), 0, $longitud);}

	static public function eliminar_simbolos($string){
		$string = trim($string);
		$string = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),$string);
		$string = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),$string);
		$string = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),$string);
		$string = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),$string);
		$string = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),$string);
		$string = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'),array('n', 'N', 'c', 'C',),$string);
		$string = str_replace(array("\\", "¨", "º", "-", "~","#", "@", "|", "!", "\"","·", "$", "%", "&", "/","(", ")", "?", "'", "¡","¿", "[", "^", "<code>", "]","+", "}", "{", "¨", "´",">", "< ", ";", ",", ":",".", " "),'',$string);
		return $string;
	}

	static public function cortar_string ($string, $largo=100){$marca = "<!--corte-->";if(strlen($string)>$largo){$string=wordwrap($string,$largo,$marca);$string=explode($marca, $string);$string=$string[0];}return $string;}

	static public function absolute_url($url=null){if($url){if(in_array(parse_url($url, PHP_URL_SCHEME),array('http','https'))){return "URL Absoluta";}else{return "URL Relativa";}}else{return false;}}

	// Funcion para preparar una busqueda por exprecion regular
	static public function busqueda_por_palabra($valor){$busqueda=trim($valor);$busqueda=preg_replace('/\s\s+/', ' ', $busqueda);$busqueda=str_replace(" ", "|", $busqueda);return $busqueda;}
}?>