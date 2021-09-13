<?php class Paginas extends models{

	// CREATE TABLE IF NOT EXISTS `paginas` (
	  // `idPagina` int(11) NOT NULL AUTO_INCREMENT,
	  // `nombre` varchar(255) DEFAULT NULL,
	  // `url` varchar(255) DEFAULT NULL,
	  // `contenido` text,
	  // `activo` tinyint(4) DEFAULT NULL,
	  // `created` datetime DEFAULT NULL,
	  // `modified` datetime DEFAULT NULL,
	  // PRIMARY KEY (`idPagina`),
	  // KEY `titulo` (`nombre`,`url`)
	// ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

	public function __construct(){
		parent::__construct();
	}
	
} ?>