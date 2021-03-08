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
use App\Services\MessageGenerator;

class DefaultController
{
    private $message;

    public function __construct(MessageGenerator $messageGenerator)
    {
        // thanks to the type-hint, the container will instantiate a
        // new MessageGenerator and pass it to you!

        $message = $messageGenerator->getHappyMessage();
        //$this->addFlash('success',$message);
        // ...
    }


    public function getMessage(){
        return $this->message;
    }

    public function index()
    {
       // return new Response("<p>Hello !</p> ");
        $message = $this->getMessage();

        return $this->render('default.html.twig', 
            [
            'city_name' => 'Paris',
            'message', $message
            ]);
    }
}
