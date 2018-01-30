<?php

namespace  App\system;

class router {

    function __construct( $routes = \App\config\router\path )
    {
        $this->routes = $routes;
    }

    function run()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $request_uri  = $_SERVER['REQUEST_URI'];
        $parsed_path  = parse_url($request_uri);
        $this->path         = explode('/', $parsed_path['path']);
        foreach (['', 'index.php'] as $r)if ($this->path[0] == $r) array_shift($this->path); // clean path

        $this->path = '/'.implode('/',$this->path);


        // find mapping from router
        $res = end(array_filter ($this->routes, function($k){
                if ( in_array($this->method, explode('|',$k[0]))&&
                     $this->compare_path($this->path, $k[1])
                ) return true;
             return false;
        }));

        list($class_name, $func_name) = explode("::", $res[2]);

        $active = new $class_name;// \App\controllers\hello;
        $active->$func_name();
    }


    function compare_path($path, $route)
    {
        if ($path==$route) return true;
    }

}




