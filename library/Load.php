<?php

class Load {

    static function autoload($class) {
            include LIB_DIR . DS . $class . '.php';
    }
    
    static function model($modelName) {
        if(file_exists($file = APP_DIR.DS.'model'.DS.$modelName.'.php')){
            include $file;
            return new  $modelName();
        }
    }
}
