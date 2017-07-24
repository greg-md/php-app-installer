<?php

namespace Greg\AppInstaller\Event;

abstract class DestinationEvent
{
    private $destination;

    public function __construct(string $destination)
    {
        $this->destination = ltrim($destination, '\/');
    }

    public function destination(): ?string
    {
        return $this->destination;
    }
}
