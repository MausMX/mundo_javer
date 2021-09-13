<?php
set_time_limit(0);
ini_set('display_errors',1);
error_reporting(E_ALL);

date_default_timezone_set("America/Mexico_City");
define('requiresBD', true);
define('DB_Engine', 'mysqli');
define('DB_Server', 'localhost');
define('DB_Port', false);

define('DB_name', 'flavor');
define('DB_User', 'flavor');
define('DB_Password', 'VbAwNU29dVw3OAeM!');
define('Path', 'https://'.$_SERVER['HTTP_HOST'].'/flavor');
define('Path_api', 'https://'.$_SERVER['HTTP_HOST'].'/flavor/api');
define('Path_admin', 'https://'.$_SERVER['HTTP_HOST'].'/flavor/admin');
?>