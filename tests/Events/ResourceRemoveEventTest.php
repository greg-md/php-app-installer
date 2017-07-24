<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\DestinationEvent;
use PHPUnit\Framework\TestCase;

class ResourceRemoveEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new ResourceRemoveEvent(__DIR__);

        $this->assertInstanceOf(DestinationEvent::class, $event);
    }
}
