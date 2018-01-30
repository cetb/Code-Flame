<?php

namespace App\controllers;

class Hello {

    function index(){
        echo "<pre>";
        print_r( get_included_files());
        die;
    }
}