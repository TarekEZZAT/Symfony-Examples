<?php

/*
 namespace is App\Controller, as defined in the composer.json file
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
*/ 
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController {

    public function index () {
        return new Response("<p>Hello !</p>");
    }

}

