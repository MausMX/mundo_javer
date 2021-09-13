<?php

/**
  * Ported from Victor de la Rocha's class: http://mis-algoritmos.com/digg-style-pagination-class/
  */

class pagination extends singleton {
	
	protected $registry;
	protected $path;
	protected $l10n;
	
    private $total_rows;
    private $limit;
    public $page;
	public $targetpage;
	public $limitQuery;
	
	public function __construct() {
		$this->registry = registry::getInstance();
		$this->path = $this->registry["path"];
		$this->l10n = l10n::getInstance();
	}
	
	public static function getInstance($class = null) {
		return parent::getInstance(get_class());
	}
	
	function start($page='',$limit='',$targetpage=''){
		if($page) $this->page=$page;
		if($limit) $this->limit=$limit;
		if($targetpage) $this->targetpage=$targetpage;
		if($page and $limit){
			$offset = (($page-1) * $limit);
			$this->limitQuery = $offset.",".(int)$limit;
		}
	}
	
    function init($tr) {
		$this->total_rows   = (int) $tr;
        return $this->getPagination();          
    }


	private function getPagination($adjacents = 1) {
		$get_var='';
		if(isset($_GET)){
			foreach ($_GET as $key => $value){
				if($key!='url'){
					if($get_var){
						$get_var.="&{$key}={$value}";
					}else{
						$get_var="?{$key}={$value}";
					}
				}
			}
		}
		$prev = $this->page - 1;
		$next = $this->page + 1;
		if($this->total_rows and $this->limit)
			$lastpage = ceil($this->total_rows / $this->limit);
		else
			$lastpage =1;
		$lpm1 = $lastpage - 1;	   
		$pagination = "";		   
		if ($lastpage > 1) {   
			$pagination .= "<ul class=\"pagination\">";
				   
			//previous button
			if ($this->page > 1) {
				$pagination .= "<li class='page-item'><a class='page-link' href=\"". $this->targetpage. $prev .$get_var."\">".$this->l10n->__("Anterior")."</a></li>";
			} else {
				$pagination .= "<li class=\"disabled page-item\"><span class=\"disabled page-link\">".$this->l10n->__("Anterior")."</span></li>";
			}
		   
			//pages   
			if ( $lastpage < 7 + ($adjacents * 2)) {
				for ($counter = 1; $counter <= $lastpage; $counter++) {
					if ($counter == $this->page) {
						$pagination .= '<li class="page-item active"><span class="current page-link">'.$counter.'</span></li>';
					} else {
				    	$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage . $counter .$get_var. '">'.$counter.'</a></li>';
					}
				}
			} elseif ($lastpage >= 7 + ($adjacents * 2)) {
				if ($this->page < 1 + ($adjacents * 3)) {
					for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
						if ($counter == $this->page) {
							$pagination .= '<li class="page-item active"><span class="current page-link">'.$counter.'</span></li>';
						} else {
							$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage . $counter.$get_var.'">'.$counter.'</a></li>';
						}
					}
					$pagination .= '<li class="page-item"><span class="page-link">...</span></li>';
					$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage . $lpm1 .$get_var.'">'.$lpm1.'</a></li>';
					$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage. $lastpage.$get_var.'">'.$lastpage.'</a></li>';       
				} elseif ($lastpage - ($adjacents * 2) > $this->page && $this->page > ($adjacents * 2)) {
					$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage.'1'.$get_var.'">1</a></li>';
					$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage.'2'.$get_var.'">2</a></li>';
					$pagination .= '<li class="page-item"><span class="page-link">...</span></li>';
					for ($counter = $this->page - $adjacents; $counter <= $this->page + $adjacents; $counter++) {
						if ($counter == $this->page) {
							$pagination .= '<li class="active page-item"><span class="current page-link">'.$counter.'</span></li>';
						} else {
							$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage.$counter.$get_var.'">'.$counter.'</a></li>';
						}
					}
					$pagination .= '<li class="page-item"><span class="page-link">...</span></li>';
					$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage.$lpm1.$get_var.'">'.$lpm1.'</a></li>';
					$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage.$lastpage.$get_var.'">'.$lastpage.'</a></li>';
				} else {
					$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage.'1'.$get_var.'">1</a></li>';
					$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage.'2'.$get_var.'">2</a></li>';
					$pagination .= '<li class="page-item"><span class="page-link">...</span></li>';
					for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++) {
						if ($counter == $this->page) {
							$pagination .= '<li class="active page-item"><span class="current page-link">'.$counter.'</span></li>';
						} else {
							$pagination .= '<li class="page-item"><a class="page-link" href="'.$this->targetpage.$counter.$get_var.'">'.$counter.'</a></li>';
						}
					}
				}
			}
		   
			//next button
			if ( $this->page < $counter - 1 ) {
				$pagination .= "<li class='page-item'><a class='page-link' href=\"".$this->targetpage . $next.$get_var."\">".$this->l10n->__("Siguiente")."</a></li>";
			} else {
				$pagination .= "<li class=\"disabled page-item\"><span class=\"disabled page-link\">".$this->l10n->__("Siguiente")."</span></li>";
			}
		   
			$pagination .= '</ul>';
		}
		return $pagination;
	}
		
} ?>