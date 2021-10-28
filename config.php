<?php
header("Access-Control-Allow-Origin: *");

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
define('Path', 'https://www.mundojaver.com.mx');
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobile()){
    define('Movil','movil');
}else{
	define('Movil','');
}
?>