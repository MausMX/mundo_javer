<?php class mysqli_db extends singleton implements data {

	protected $connectionId;
	protected $query_result;
	protected $transaction = false;
	
	protected function __construct() {
		$this->dbServer = DB_Server . ((DB_Port) ? ':' . DB_Port : '');

		$this->connectionId = @mysqli_connect($this->dbServer, DB_User, DB_Password);
		if (!mysqli_set_charset($this->connectionId, "utf8")) {
		    printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($this->connectionId));
		    exit();
		}

		if ($this->connectionId && DB_name != '') {
			if (!@mysqli_select_db($this->connectionId, DB_name)) {
				throw new Exception($this->errorInfo());
			}
		} else {
			throw new Exception($this->errorInfo());
		}
	}
	
	public static function getInstance($class = null) {
		return parent::getInstance(get_class());
	}
			
	public function query($sql) { 
		if ($sql != '') {
			$this->query_result = @mysqli_query($this->connectionId, $sql);
			if ($this->query_result  === false) {
				throw new Exception($this->errorInfo($sql));
			}			
		} else {
			return false;
		}
		return ($this->query_result) ? $this->query_result : false;
	}
	
	public function buildArray($query, $assoc_ary = false) {
		if (!is_object($assoc_ary)) {
			throw new Exception('Is not a valid array');
		}

		$fields = array();
		$values = array();
		if ($query == 'INSERT') {
			foreach ($assoc_ary as $key => $var) {
				$fields[] = "`{$key}`";

				if (is_null($var)) {
					$values[] = 'NULL';
				} elseif (is_string($var)) {
					$values[] = "'" . $this->sql_escape($var) . "'";
				} else {
					$values[] = (is_bool($var)) ? intval($var) : $var;
				}
			}

			$query = ' (' . implode(', ', $fields) . ') VALUES (' . implode(', ', $values) . ')';
		} else if ($query == 'UPDATE' || $query == 'SELECT') {
			$values = array();
			foreach ($assoc_ary as $key => $var) {
				if (is_null($var)) {					
					array_push($values, "`{$key}` = NULL");
				} elseif (is_string($var) and !is_numeric($var)) {
					array_push($values, "`{$key}` = '".$this->sql_escape($var)."'");
				} else {
					if(is_bool($var)){
						array_push($values, "`{$key}` = ".intval($var));
					}else{
						if(substr($var,0,1)==0){
							array_push($values, "`".$key."` = '$var'");
						}else{
							array_push($values, "`".$key."` = $var");
						}
					}
					//array_push($values, (is_bool($var)) ? "`{$key}` = ".intval($var) : "`".$key."` = $var");
				}
			}
			$query = implode(($query == 'UPDATE') ? ', ' : ' AND ', $values);
		}

		return $query;
	}
	
	public function fetchRow() {		
		return mysqli_fetch_assoc($this->query_result);
		/* TODO: Add Exception handler */		
	}
    
    public function fetchObject() {        
        return mysqli_fetch_object($this->query_result);
        /* TODO: Add Exception handler */       
    }
	
	public function rowSeek($rowNum) {
		$re = @mysqli_data_seek($this->query_result, $rowNum);
		if (!$re) {
			throw new Exception($this->errorInfo());
		}
		return $re;
	}

	public function lastId() {
		$re = ($this->connectionId) ? @mysqli_insert_id($this->connectionId) : false;
		if (!$re) {
			throw new Exception($this->errorInfo());
		}
		return $re;
	}
	
	function nextId($table, $primary) {		
		$this->query("select max(".$primary.") as nextId from ".$table);
		$row = @mysql_fetch_row($this->query_result);
		return $row["nextId"] + 1;
	} 
	
	public function numRows() {
		$re = @mysqli_num_rows($this->query_result);
		if ($re === false) {
			throw new Exception($this->errorInfo());
		}
		return $re;
	}
	
	function affectedRows() {
		$re = ($this->connectionId) ? @mysqli_affected_rows($this->connectionId) : false;
		if ($re === false) {
			throw new Exception($this->errorInfo());
		}
		return $re;
	}
	
	public function sql_escape($msg) {
		/*if(get_magic_quotes_gpc()) {
	          $msg = stripslashes($msg);
	    }*/
		return mysqli_real_escape_string($this->connectionId, $msg);
	}
	
	public function errorInfo($sql = '') { 
		return '<u>SQL ERROR</u> <br /><br />' . @mysqli_error($this->connectionId) . '<br /><br /><u>SQL ERROR NUMBER</u> <br /><br />' . @mysqli_errno($this->connectionId) . (($sql != '') ? '<br /><br /><u>SQL</u><br /><br />' . $sql : '') . '<br />';
	}
	
	public function close() {
		if (!$this->connectionId) {
			return false;
		}

		@mysqli_close($this->connectionId);
	}
	
	public function __destruct() {
		$this->close();
	}

} ?>