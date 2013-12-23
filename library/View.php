<?php

class View {
   
    private $vars = array(); 
    
    function set($var , $data) {
        $this->vars[$var] = $data;
    }
    
    function render($view) {
        extract($this->vars);
        include APP_DIR.DS.'view'.DS.$view.'.php';
    }
    
}
