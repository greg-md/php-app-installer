<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\DestinationEvent;

class PublicRemoveEvent extends DestinationEvent
{
    public function __construct(string $destination)
    {
        parent::__construct($destination);
    }
}
