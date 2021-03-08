<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

    /*
        Events are processed in Listeners of subscribers
            List all listners :
            php bin/console debug:event-dispatcher

            Find a specific event listener :
            php bin/console debug:event-dispatcher kernel.request

            Listener are configured in config\services.yaml
            Listeners are processed in services folder files



    */
    
class KernelResponseListenerController extends AbstractController
{
    /**
     * @Route("/krlistener", name="kernel_response_listener")
     */
    public function kernelResponseListener()
    {
        dump('in KernelResponseListenerController');
        return $this->render('kernel_response_listener/index.html.twig', [
            'controller_name' => 'KernelResponseListenerController',
        ]);
    }
}
