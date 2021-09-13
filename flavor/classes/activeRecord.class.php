<?php
class activeRecord implements ArrayAccess {
	public $record = array(); // Contiene los campos de la tabla
	private $auxRecord = array(); //contiene propiedades agregadas fuera de los campos de la tabla.
	public $validateErrors;
	public $filterErrors;
	protected $keyField = "";
	protected $table = NULL;
	private $isNew = true;
	private $multipleRecords = false;
	private $isValid = true;
	protected $registry;
	public $db;	
	private $columns;
	
	public function __construct() {
		$this->record= (object)[];
		$this->auxRecord= (object)[];
		$this->registry = registry::getInstance();
		$this->validateErrors = $this->registry->validateErrors;
		$this->filterErrors = $this->registry->filterErrors;
		$this->db = $this->registry["db"];
		if(isset($this->table_name) and $this->table_name){
			//$table_name=str_replace("idEmpresa", $_SESSION["idEmpresa_activa"], $this->table_name); // Se utiliza para cambiar el idEmpresa por el de la sesion para el caso de tablas dinamicas
			$table_name=$this->table_name;
			$this->table = $table_name; 
		}else{
			$this->table = $this->modelName();
		}
		$rs = $this->db->query("SHOW COLUMNS FROM ".$this->table);
		while ($row = $this->db->fetchRow()) {
			$this->columns[$row["Field"]] = $row;
			$this->record->{$row["Field"]} = "";
			if( $row["Key"] === "PRI" ) {
				$this->keyField = $row["Field"];
			}
		}
		if(empty($this->keyField)) {
			throw new Exception( "Primary Column not found for Table: '".$this->table."'");
		}
	}
	
	public function __set($key, $value){
		foreach($this->record as $key2 => $value2){
			if($key==$key2){
				$this->record->{$key}=$value;
			}else{
				$this->auxRecord->{$key} = $value;
			}
		}
	}
	
	public function __get($key){
		if(isset($this->record->{$key})){
			return $this->record->{$key};
		}else{
			foreach($this->auxRecord as $key2 => $value){
				if($key==$key2)
					return $this->auxRecord->{$key};
			}
			/*
			if(array_key_exists($key,$this->auxRecord)){
			return $this->auxRecord->{$key};
			*/
		}
	}
	
	public function __call($method, $args){
		$field = substr($method,6);
		if(substr($method,0,-(strlen($field)))=="findBy"){ 
			return $this->findBy($field, $args[0]);	
		}else{
			throw new Exception("Method (".$method.") not declarated in the Active Record.");
		}
	}
	
	private function modelName(){
		$source = get_class($this);
		if(preg_match("/([a-z])([A-Z])/", $source, $reg)){
			$source = str_replace($reg[0], $reg[1]."_".strtolower($reg[2]), $source);
		}
		return strtolower(inflector::pluralize($source));
	}	
	
	public function prepareFromArray($array){
		foreach ($array as $key => $var) {
			$this[$key] = $var;
		}		
	}
	
	public function create($values){
		$values->{$this->keyField}=0;
		$sql = "INSERT INTO ".$this->table.$this->db->buildArray("INSERT", $values);
		$rs = $this->db->query($sql);
		if (!$rs){
			throw new Exception("SQL Error, Insert Failed");
		}
		return $this->db->lastId();
	}
	
	public function invalidate(){
		$this->isValid = false;
	}
	
	public function save() {
		$this->record =	$this->doFilter($this->record);
		$this->isValid = $this->validates($this->record);
		if ($this->isValid){
			if($this->isNew){
				if(isset($this->columns["created"])){
					$this->record->created = date("Y-m-d H:i:s",strtotime("now"));
				}
				if(isset($this->columns["modified"])){
					$this->record->modified = date("Y-m-d H:i:s",strtotime("now"));
				}
				$id = $this->create($this->record);
				$this->record->{$this->keyField} = $id;
				$this->isNew = false;
				return $id;
			} else {
				return $this->update();
			}
		} else {
			return NULL;
		}
	}	
	
	public function update() {
		if( !isset( $this->record->{$this->keyField} ) || empty( $this->record->{$this->keyField} ) ) {
			throw new Exception( "Primary Key Missing, update failed" );
		}
		$key = $this->record->{$this->keyField};
		if(isset($this->columns["modified"])){
			$this->record->modified = date("Y-m-d H:i:s",strtotime("now"));
		}
		$sql = "UPDATE ".$this->table." SET ".$this->db->buildArray("UPDATE", $this->record)." WHERE ".$this->keyField.'='.intval($key);
		$rs = $this->db->query($sql);
		if (!$rs) {
			throw new Exception("SQL Error, Update Failed");
		}
		return $rs;
	}
	
	public function delete(){
		if($this->isNew) return 0;
		if(is_array($this->record) and count($this->record) == 0) return 0;
		if($this->multipleRecords and count($this->record)>0){
			$keys = "";
			foreach($this->record as $row){
				$keys .= "$this->keyField = ".intval($row["$this->keyField"])." or ";
			}
			$keys = substr($keys,0,-3);
			$sql = "DELETE FROM ".$this->table." WHERE $keys";
			$rs = $this->db->query($sql);
		}else{
			$key = $this->record->{$this->keyField};
			$sql = "DELETE FROM ".$this->table." WHERE ".$this->keyField.'='.intval($key);
			$rs = $this->db->query($sql);
		}
		return true;
		if (!$rs) {
			throw new Exception("SQL Error, Remove Failed");
		}
		return $rs;
	}
	
	public function isNew(){
		return $this->isNew;
	}
	
	public function find($id) { 
		$sql = "SELECT * FROM ".$this->table." WHERE ".$this->keyField."=".intval($id)." LIMIT 1";
		return $this->findBySql($sql);
	}	
	
	public function findBy($field, $value) {
		if(is_array($field)){
			$where = "";
			foreach($field as $k=>$v){
				$where .= $field[$k]."='".$this->db->sql_escape($value[$k])."' AND ";
			}
			$where = "(".substr($where,0,-5).")";
			
			$sql = "SELECT * FROM ".$this->table." WHERE ".$where." LIMIT 1";
		}else{
			$sql = "SELECT * FROM ".$this->table." WHERE ".$field."='".$this->db->sql_escape($value)."' LIMIT 1";
		}
		return $this->findBySql($sql);
	}
	
	public function findBySql($sql) {
		$rs = $this->db->query($sql);
		if($this->db->numRows() != 0){
			$this->record = $this->db->fetchObject();
			$this->isNew = false;
			$this->multipleRecords = false;
		}
		return $this->record;
	}
	
	public function findAll($fields=NULL, $order=NULL ,$limit=NULL, $extra=NULL) {
		$fields = $fields ? $fields : '*';
		$sql = "SELECT ".$fields." FROM ". $this->table." ";
		if($extra) $sql.= $extra." ";
		if($order) $sql.= "ORDER BY ".$order.' ';
		if($limit) $sql.= "LIMIT ".$limit;
		return $this->findAllBySql($sql);
	}
	
	public function findAllBy($field, $value){
		if(is_array($field)){
			$where = "";
			foreach($field as $k=>$v){
				$where .= $field[$k]."='".$this->db->sql_escape($value[$k])."' AND ";
			}
			$where = "(".substr($where,0,-5).")";
			$sql = "SELECT * FROM ".$this->table." WHERE ".$where."";
		}else{
			$sql = "SELECT * FROM ".$this->table." WHERE ".$field."='".$this->db->sql_escape($value)."'";
		}
		if (!is_array($field)) {
			//$sql .= " ORDER BY ".$field." ASC";
			$sql .= " ORDER BY ".$this->keyField." ASC";
		}
		return $this->findAllBySql($sql);
	}
	
	public function findAllBySql($sql) {
		$rs = $this->db->query($sql);
		$rows = array();
		if($this->db->numRows() != 0){
			while($row = $this->db->fetchObject()) $rows[] = $row;
			$this->isNew = false;
			$this->multipleRecords = true;
			$this->record = $rows;
		}
		return $rows;
	}
	
	public function findAllById($fields=null, $limit=null, $extra=null){
		$limitQuery = is_null($limit)?"":" {$limit}";
		$result = array();
		foreach ($this->findAll($fields, null, $limitQuery, $extra) as $key => $value) {
			$result[$value->{$this->keyField}]=$value;
		}
		return $result;
	}
	
	public function getPrimaryKey() {
		return $this->keyField;
	}
	
	public function getRecord(){
		return $this->record;
	}
	
	public function offsetExists( $offset ) {
		return (isset( $this->record->{$offset} ) || isset ($this->auxRecord->{$offset}) );
	}
	
	public function offsetGet( $offset ) {
		foreach($this->record as $key=>$value2){
			if($key==$offset)
				return $this->record->{$offset};
			else{
				if(!isset($this->auxRecord->{$offset})){
					$this->auxRecord->{$offset}='';
				}
				return $this->auxRecord->{$offset};
			}
		}
		/*
		if(isset($offset,$this->record)){
			return $this->record->{$offset};
		}elseif(array_key_exists($offset,$this->auxRecord)){
			return $this->auxRecord->{$offset};
		}
		*/
	}

	public function offsetSet( $offset, $value ) {
		if( $offset == $this->keyField ) {
			throw new Exception("Primary Key can't be set or changed");
		}
		foreach($this->record as $key=>$value2){
			if($key==$offset)
				$this->record->{$offset} = $value;
			else
				$this->auxRecord->{$offset} = $value;
		}
		/*
		if(array_key_exists($offset,$this->record)){
			$this->record->{$offset} = $value;
		}else{
			$this->auxRecord->{$offset} = $value;
		}
		*/
	}

	public function offsetUnset( $offset ) {
		if( isset( $this->record->{$offset} ) ) {
			unset( $this->record->{$offset} );
		}elseif( isset( $this->auxRecord->{$offset}) ){
			unset( $this->auxRecord->{$offset} );
		}
	}
	
	public function sql_escape($msg){
		return $this->db->sql_escape($msg);
	}
	
	public function imagen($nombre_imagen,$carpeta){
        if (($_FILES[$nombre_imagen]["type"] == "image/gif")
          || ($_FILES[$nombre_imagen]["type"] == "image/jpeg")
          || ($_FILES[$nombre_imagen]["type"] == "image/pjpeg")
		  || ($_FILES[$nombre_imagen]["type"] == "image/png")
		  || ($_FILES[$nombre_imagen]["type"] == "image/x-icon")
		  || ($_FILES[$nombre_imagen]["type"] == "image/vnd.microsoft.icon")
		  || ($_FILES[$nombre_imagen]["type"] == "image/svg+xml")
           ){
            $imagen = time()."_".$_FILES[$nombre_imagen]['name'];
            $ruta = "../images/{$carpeta}/{$imagen}";
            copy($_FILES[$nombre_imagen]['tmp_name'], $ruta);
            return $imagen;
        }else{
            return '';
        }
    }
	public function imagen_front($nombre_imagen,$carpeta){
        if (($_FILES[$nombre_imagen]["type"] == "image/gif")
          || ($_FILES[$nombre_imagen]["type"] == "image/jpeg")
          || ($_FILES[$nombre_imagen]["type"] == "image/pjpeg")
		  || ($_FILES[$nombre_imagen]["type"] == "image/png")
		  || ($_FILES[$nombre_imagen]["type"] == "image/x-icon")
		  || ($_FILES[$nombre_imagen]["type"] == "image/vnd.microsoft.icon")
		  || ($_FILES[$nombre_imagen]["type"] == "image/svg+xml")
           ){
            $imagen = time()."_".$_FILES[$nombre_imagen]['name'];
            $ruta = "images/{$carpeta}/{$imagen}";
            copy($_FILES[$nombre_imagen]['tmp_name'], $ruta);
            return $imagen;
        }else{
            return '';
        }
    }
	public function files($nombre_imagen,$carpeta){
    	if (($_FILES[$nombre_imagen]["type"] == "image/gif")
          || ($_FILES[$nombre_imagen]["type"] == "image/jpeg")
          || ($_FILES[$nombre_imagen]["type"] == "image/pjpeg")
          || ($_FILES[$nombre_imagen]["type"] == "image/png")
          || ($_FILES[$nombre_imagen]["type"] == "image/bmp")
		  || ($_FILES[$nombre_imagen]["type"] == "image/tiff")
		  || ($_FILES[$nombre_imagen]["type"] == "image/x-icon")
		  || ($_FILES[$nombre_imagen]["type"] == "image/vnd.microsoft.icon")
		  || ($_FILES[$nombre_imagen]["type"] == "image/svg+xml")
          || ($_FILES[$nombre_imagen]["type"] == "application/zip")
          || ($_FILES[$nombre_imagen]["type"] == "application/x-rar-compressed")
          || ($_FILES[$nombre_imagen]["type"] == "application/pdf")
          || ($_FILES[$nombre_imagen]["type"] == "image/vnd.adobe.photoshop")
          || ($_FILES[$nombre_imagen]["type"] == "application/postscript")
          || ($_FILES[$nombre_imagen]["type"] == "application/vnd.ms-powerpoint")
          || ($_FILES[$nombre_imagen]["type"] == "text/csv")
          || ($_FILES[$nombre_imagen]["type"] == "text/x-comma-separated-values")
          || ($_FILES[$nombre_imagen]["type"] == "text/comma-separated-values")
          || ($_FILES[$nombre_imagen]["type"] == "application/octet-stream")
          || ($_FILES[$nombre_imagen]["type"] == "application/vnd.ms-excel")
          || ($_FILES[$nombre_imagen]["type"] == "application/x-csv")
          || ($_FILES[$nombre_imagen]["type"] == "text/x-csv")
          || ($_FILES[$nombre_imagen]["type"] == "application/csv")
          || ($_FILES[$nombre_imagen]["type"] == "application/excel")
          || ($_FILES[$nombre_imagen]["type"] == "application/vnd.msexcel")
          || ($_FILES[$nombre_imagen]["type"] == "text/anytext")
           ){
            $imagen = time()."_".$_FILES[$nombre_imagen]['name'];
            $ruta = "../files/{$carpeta}/{$imagen}";
            copy($_FILES[$nombre_imagen]['tmp_name'], $ruta);
            return $imagen;
        }else{
            return '';
        }
    }

	public function array_csv_download($array,$filename="export.csv",$delimiter=","){
		ob_start();
		header('Content-Type: text/csv; charset=Windows-1252');
		header('Content-Endcoding: Windows-1252');
		header('Content-Disposition: attachment;filename="'.$filename.'";');
		ob_end_clean();
		$handle=fopen('php://output','w');
		fputcsv($handle,array_keys($array['0']));
		foreach($array as $value){fputcsv($handle,$value,$delimiter);}
		fclose( $handle );
		ob_flush();
		flush();
		exit();
	}

	private function convertToWindowsCharset($string) {
		$encoding = mb_detect_encoding($string);
		return iconv($encoding, "Windows-1252", $string);
	}

	public function orderById(){
		foreach ($this->record as $key => $value) {
			$result[$value->{$this->keyField}]=$value;
		}
		return $result;
	}
}
?>