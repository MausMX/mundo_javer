<?php class models extends activeRecord {
	public $count;
	protected $validate;
	protected $filter;
	
	public function __construct($id='') {
		parent::__construct();
		if($id){$this->find($id);}
		$this->validate = NULL;
		$this->filter = NULL;
		
		if (!defined('VALID_NOT_EMPTY')) { 
			define('VALID_NOT_EMPTY', '/.+/'); 
		}
		if (!defined('VALID_NUMBER')) { 
			define('VALID_NUMBER', '/^[0-9]+$/'); 
		}
		if (!defined('VALID_EMAIL')) { 
			define('VALID_EMAIL', '/^[a-zA-Z0-9]{1}([\._a-zA-Z0-9-]+)(\.[_a-zA-Z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+){1,3}$/'); 
		}
		if (!defined('VALID_URL')) { 
			define('VALID_URL', '/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}((:[0-9]{1,5})?\/.*)?$/i'); 
		}		
	}
	
	public function get_all($fields=null, $order=null, $limit=null, $extra=null){
		$fieldAst = is_null($fields) ? "SQL_CALC_FOUND_ROWS *" : "SQL_CALC_FOUND_ROWS ".$fields;
		$sql = "SELECT ".$fieldAst." FROM ". $this->table." ";
		if($extra) $sql.= $extra." ";
		if($order) $sql.= "ORDER BY ".$order.' ';
		if($limit) $sql.= "LIMIT ".$limit;
		$result= $this->findAllBySql($sql);
		$rs = $this->db->query("SELECT FOUND_ROWS() as foundRows");
		$row = $this->db->fetchRow();
		$this->count = $row['foundRows'];
		return $result;
	}
	
	public function doFilter($datos) {
		if(!$this->filter){ return $datos; }
		foreach ($datos as $campo => $valor) {			
			if(array_key_exists($campo, $this->filter)) {				
				if(array_key_exists('filters', $this->filter[$campo])) {
					foreach($this->filter[$campo]['filters'] as $filter) {
						if(is_array($filter)) {
							$function = array_shift($filter);
							if(method_exists($this, $function)) {
								$datos[$campo] = $this->$function($valor, $filter);
								$valor = $datos[$campo];								
							} else {
								die("<strong>Fatal Error:</strong> No existe la funcion {$function} que usa  el campo '{$campo}'");
							}							
						}
					}					
				} else {
					die("<strong>Fatal Error:</strong> No hay 'filters' declarados para el campo '{$campo}'");
				}			
			}			
		}
		return $datos;
	}
	
	public function validates($datos) {
		if(!$this->validate){ return true; }                
		$this->registry->datos = $datos;
		foreach ($datos as $campo => $valor) {
			if(array_key_exists($campo, $this->validate)) {
				if((!isset($this->validate[$campo]['required']) || $this->validate[$campo]['required']==false)/* ??esta validaci??n qu??? ----> && empty($valor)*/){
					//Si el campo requerido no est?? definido o no es requerido, entonces no entra aqu??.
					continue; 
				};
				if(array_key_exists('rules',$this->validate[$campo])) {
					foreach($this->validate[$campo]['rules'] as $rule) {
						if(array_key_exists('rule',$rule)) {
							if(is_array($rule['rule'])) {
								$function = array_shift($rule['rule']);
								if(method_exists($this, $function)) {
									if(!$this->$function($valor,$rule['rule'])) {
										$this->validateErrors[] = array('field' => $campo, 'message' => $rule['message']);
									}
								} else {
									die("Fatal Error: No existe la funcion {$function} que usa  el campo '{$campo}'");
								}
							} else {
								if(!preg_match($rule['rule'], $valor)) {                    
									$this->validateErrors[] = array('field' => $campo, 'message' => $rule['message']);
								}
							}
						} else {
							die("Fatal Error: Se esperaba un 'rule' para el campo '{$campo}'");
						}
					}
				} else {
					die("Fatal Error: No hay 'rules' declaradas para el campo '{$campo}'");
				}
			}
		}
		
		if (empty($this->validateErrors)) {
			return true;
		} else {
			$this->registry->modify("validateErrors", $this->validateErrors);
			return false;
		}
	}	
} ?>