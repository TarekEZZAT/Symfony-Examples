<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\Entity\Video;
use App\Events\VideoCreatedEvent;

class VideoCreatedSubscriber implements EventSubscriberInterface
{
    public function onVideoCreatedEvent($event)
    {
        // ...add logic here
        dump ('in VideoCreatedSubscriber');
        dump($event->video->getTitle());;
    }

    public static function getSubscribedEvents()
    {
        return [
           'video.created.event' => 'onVideoCreatedEvent',
        ];
    }
}
