<?php

namespace App\Listeners;

use App\Events\VideoCreatedEvent;


class VideoCreatedListener{
    public function onVideoCreatedEvent($event){
        dump ($event->video->getTitle());
    }

}