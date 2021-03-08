<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpFoundation\Response;

class VideoCreatedSubscriber implements EventSubscriberInterface
{
    public function onVideoCreatedEvent($event)
    {
        dump($event->video->title);
    }

    public function onKernelResponse1(FilterResponseEvent $event)
    {
        $response = new Response('response1');
        // $event->setResponse($response);
        dump('onKernelResponse1');
    }

    public function onKernelResponse2(FilterResponseEvent $event)
    {
        $response = new Response('response2');
        // $event->setResponse($response);
        dump('onKernelResponse2');
    }

    public static function getSubscribedEvents()
    {
        return [
        //    'video.created.event' => 'onVideoCreatedEvent',
        //    KernelEvents::RESPONSE => [

        //        ['onKernelResponse1', 2],
        //        ['onKernelResponse2', 1],
        //    ]
        ];
    }
}
