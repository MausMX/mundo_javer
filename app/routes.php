<?php
	//$this->add('pagina/(.+)','pagina/detalle/$1');
	$paginas=new Paginas();
	foreach ($paginas->findAll() as $key => $value) {
		$this->add($value->url,'pagina/detalle/'.$value->url);
	}
	#$this->add('admin','admin');
	#$this->add('(.+)','admin/$1');
	//$this->add('blog/(.+)','blog/index/$1');
	//$this->add('files/get/(.+)','files/view/$1');
?>