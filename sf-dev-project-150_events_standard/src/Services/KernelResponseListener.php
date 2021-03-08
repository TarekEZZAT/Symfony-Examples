<?php

namespace App\Services;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\Response;

class KernelResponseListener {

    public function onKernelResponse(FilterResponseEvent $event){
            dump('*** In onKernelResponse');
            $response = new Response("<h1>Hello there!</h1>");
            $event->setResponse($response); // This calls onKernelResponse again
            //exit; // avoid calling onKernelResponse again;
    }

}