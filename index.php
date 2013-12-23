<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__));
define("LIB_DIR" , ROOT.DS.'library');
define("APP_DIR" , ROOT.DS.'app');
error_reporting(E_ALL - E_NOTICE);

$url = $_GET['url'];
include LIB_DIR.DS.'Load.php';
spl_autoload_register(array('Load', 'autoload'));

Router::route($url);