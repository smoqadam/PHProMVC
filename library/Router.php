<?php

class Router {
    static function route($url){

        $urlparts = @explode('/',$url); 
        
        $controller = ($urlparts[0] == '' ) ? 'index' : $urlparts[0];
        array_shift($urlparts);
        $action = ($urlparts[0] == '' ) ? 'index' : $urlparts[0];
        array_shift($urlparts);
        $param = $urlparts;
        

        
        if(file_exists($cFile = ROOT.'/app/controller/'.$controller.'.php')){
           include  $cFile;
        }else{
            die ('Controller ' . $controller .' Not found');
        }
        $controller = ucwords($controller).'Controller';
        $contollerObj = new $controller();
        
        if(method_exists($contollerObj, $action)){
            call_user_func_array(array($contollerObj,$action), $param);
        }else{
            die("Action $action not found in $controller Class");
        }
        
    }
}
