<?php

namespace App\MessageSubscriber;

use App\Message\Event1;
use Symfony\Component\Messenger\Handler\MessageSubscriberInterface;

class Event1Handler implements MessageSubscriberInterface
{
    public function __invoke(Event1 $event1) {
        echo json_encode($event1->toPrimitives()) , "\n";
    }

    public static function getHandledMessages(): iterable
    {
        yield Event1::class;
    }
}
