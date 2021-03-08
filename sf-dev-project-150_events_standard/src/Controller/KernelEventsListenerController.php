<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class KernelEventsListenerController extends AbstractController
{
    /*
        Events are processed in Listeners of subscribers
            List all listners :
            php bin/console debug:event-dispatcher

            Find a specific event listener :
            php bin/console debug:event-dispatcher kernel.request


    */
    /**
     * @Route("/kel", name="kernel_events_listener")
     */
    public function index()
    {
        dump('In KernelEventsListenerController');
        return $this->render('kernel_events_listener/index.html.twig', [
            'controller_name' => 'KernelEventsListenerController',
        ]);
    }
}
