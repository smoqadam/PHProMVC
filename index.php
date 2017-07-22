<?php
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('ROOT') or define('ROOT', dirname(__FILE__));
defined('LIB_DIR') or define("LIB_DIR", ROOT . DS . 'library');
defined('APP_DIR') or define("APP_DIR", ROOT . DS . 'app');

function __autoload($classname)
{
    if (file_exists($filename = LIB_DIR . DS . $classname . '.php')) {
        include $filename;
    }
}
error_reporting(E_ALL);

$url = $_GET['url'];

Router::route($url);
