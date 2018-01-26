<?php

namespace  App\system;

class router {

    function __construct( $routes = \App\config\router\path )
    {
        $this->routes = $routes;
    }

    function run()
    {
        $request_uri  = $_SERVER['REQUEST_URI'];
        $parsed_path  = parse_url($request_uri);
        $this->path         = explode('/', $parsed_path['path']);
        foreach (['', 'index.php'] as $r)if ($this->path[0] == $r) array_shift($this->path); // clean path

        $this->method = $_SERVER['REQUEST_METHOD'];

        // find mapping from router
        array_filter ($this->routes, function($k){


            //in_array($this->method, explode('|',$k[0])) // Method the same

            echo "<pre>";

            print_r(
                [
                in_array($this->method, explode('|',$k[0])),
                compare_path()
                ]
            );
            echo "\n\n";

            print_r([explode('|',$k[0]), $k, $this->path, $this->method]);
            die;
        });

        function compare_path()
        {

        }



    }

}
