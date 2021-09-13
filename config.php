<?php
set_time_limit(0);
ini_set('display_errors',1);
error_reporting(E_ALL);

date_default_timezone_set("America/Mexico_City");
define('requiresBD', false);
define('DB_Engine', 'mysqli');
define('DB_Server', 'localhost');
define('DB_Port', false);

define('DB_name', '');
define('DB_User', '');
define('DB_Password', '');
define('Path', 'https://'.$_SERVER['HTTP_HOST'].'/mundo-javer-2021');
?>