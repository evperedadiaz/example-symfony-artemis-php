<?php

namespace App\MessageSubscriber;

use App\Message\Event1;
use Enqueue\Client\TopicSubscriberInterface;
use Interop\Queue\Context;
use Interop\Queue\Message;
use Interop\Queue\Processor;

class Event1Subscriber implements Processor, TopicSubscriberInterface
{
    public function process(Message $message, Context $context)
    {
        dump($message);die('sssss');
        $event1 = Event1::fromPrimitives(json_decode($message->getBody()));
        echo json_encode($event1->toPrimitives()) , "\n";
    }

    public static function getSubscribedTopics()
    {
        return ['cola_evento_1'];
//        return [
//           [
//             'topic' => 'topic_prueba1',
////             'queue' => 'cola_evento_1',
//           ],
//        ];
    }
}
