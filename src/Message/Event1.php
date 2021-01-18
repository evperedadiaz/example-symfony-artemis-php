<?php

namespace App\Message;

use Enqueue\Client\Message;

class Event1 extends Message
{
    private string $eventName;
    private string $customValue;

    public function __construct(string $eventName, string $customValue, array $properties = [], array $headers = [])
    {
        $this->eventName = $eventName;
        $this->customValue = $customValue;
        parent::__construct(json_encode($this->toPrimitives()), $properties, $headers);
    }

    public static function fromPrimitives(array $primitives): Event1
    {
        return new Event1($primitives['eventName'], $primitives['customValue']);
    }

    public function getEventName(): string
    {
        return $this->eventName;
    }

    public function getCustomValue(): string
    {
        return $this->customValue;
    }

    public function toPrimitives(): array
    {
        return [
            'eventName' => $this->eventName,
            'customValue' => $this->customValue,
        ];
    }
}
