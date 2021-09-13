<?php

abstract class controller {
		
	protected $registry;
	protected $session;
	protected $cookie;
	protected $pagination;
	protected $l10n;
	protected $html;	
	protected $ajax;
	protected $themes;
	protected $view;
	protected $path;
	protected $tfl= "";
	protected $meta_description= "";
	protected $meta_keywords= "";
	protected $meta_title= "";
	public $action;
	public $params;
	public $data;
	public $isAjax;

	public function __construct() {
		$this->controller=$this->controllerName();
		$this->registry = registry::getInstance();
		$this->session = $this->registry["session"];
		$this->cookie = $this->registry["cookie"];		
		$this->view = $this->registry["views"];
		$this->themes = $this->registry["themes"];
		$this->path = $this->registry["path"];
		$this->debug = $this->registry["debug"];
		$this->l10n = l10n::getInstance();
		$this->html = html::getInstance();		
		$this->ajax = new ajax();
		$this->pagination = pagination::getInstance();
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$this->data = $_POST;
		} else {
			$this->data = NULL;
		}
		$this->isAjax = $this->isAjax();
	}

	abstract public function index($id=NULL);
		
	public function beforeRender() {}
	public function afterRender() {}
		
	public function redirect($url, $intern = true) { 
		$_SESSION["flavor_php_session"]["validateErrors"] = $this->registry->validateErrors;
		
		if ($intern) {
			$url = (!$this->endsWith($url, "/")) ? $url."/" : $url ;
			$url = $this->path.$url;
		} else {
			$url = $url;
		}
		header("Location: ".$url);
		exit();
	}
	
	public function render($view=NULL) {
		if($this->html->type == "views"){
			if (is_null($view)) {
				$view = $this->action;
			}
			$this->beforeRender();
			$this->view->content_for_layout = $this->view->fetch($this->controllerName().".".$view);
			$this->view->title_for_layout = $this->tfl;
			$this->view->meta_description = $this->meta_description;
			$this->view->meta_keywords = $this->meta_keywords;
			$this->view->meta_title = $this->meta_title;
			$this->view->controllerName=$this->controllerName();
			echo $this->showDebug().$this->view->fetch("", "layout");
			$this->afterRender();
			$this->debug->clearLogs();
			exit();
		}else{
			$this->renderTheme($this->html->type);
		}
	}
	
	public function renderTheme($theme,$file='index.htm'){
		$this->beforeRender();
		$path = Absolute_Path.APPDIR.DIRSEP.$theme.DIRSEP."$file";
		echo $this->themes->fetch($path);
		$this->afterRender();
		exit;
	}

	public function fetchTheme($theme,$file='index.htm'){
		$path = Absolute_Path.APPDIR.DIRSEP."themes".DIRSEP.$theme.DIRSEP."$file";
		return $this->themes->fetch($path);
	}
	
	protected function title_for_layout($str){
		$this->tfl = $str;
	}
	
	protected function meta_description($str=""){
		$this->meta_description = $str;
	}
	
	protected function meta_keywords($str=""){
		$this->meta_keywords = $str;
	}
	
	protected function meta_title($str=""){
		$this->meta_title = $str;
	}
	
	protected function controllerName(){
		$source = get_class($this);
		if(preg_match("/([a-z])([A-Z])/", $source, $reg)){
			$source = str_replace($reg[0], $reg[1]."_".strtolower($reg[2]), $source);
		}
		
		$controller = explode("_", $source);
		
		return strtolower($controller[0]);
	}
	
	protected function endsWith($str, $sub) {
		return (substr($str, strlen($str) - strlen($sub)) == $sub);
	}
	
	protected function showDebug(){
		if ($this->debug->isEnabled()) {
			return $this->debug->show();
		}else return '';
	}
	
	public function isAjax() {
		//var_dump($_SERVER);
		//die();
		return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']=="XMLHttpRequest");
	} 
	
}
?>
