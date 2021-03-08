<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\MessageGenerator;


class MessageServerController extends AbstractController
{
    /*
    private $message;
    public function __construct(MessageGenerator $messageGenerator)
    {
        // thanks to the type-hint, the container will instantiate a
        // new MessageGenerator and pass it to you!

        $message = $messageGenerator->getHappyMessage();
        $this->addFlash('success',$message);
        // ...
    }
    */

    /**
    * @Route("/message", name="message_server")
    */
    public function index(MessageGenerator $messageGenerator)
    {
       // return new Response("<p>Hello !</p> ");
        $message = $messageGenerator->getHappyMessage();
        //$message = $this->message;

        return $this->render('message_server/index.html.twig', [
            'controller_name' => 'MessageServerController',
            'city_name' => 'Paris',
            'message'=> $message
        ]);


    }


}


