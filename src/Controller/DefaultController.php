<?php

namespace App\Controller;

use App\Message\Event1;
use Enqueue\Client\ProducerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

class DefaultController
{
    public function __invoke(MessageBusInterface $bus, ProducerInterface $producer)
    {
        $event1 = new Event1('EVENTO1', "Valor custom xxxx...", [], []);
//        $bus->dispatch($event1);
        $producer->sendEvent('algo', $event1);

        return new Response('Mensaje creado...');
    }
}
