<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\DestinationEvent;
use PHPUnit\Framework\TestCase;

class RootRemoveEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new RootRemoveEvent(__DIR__);

        $this->assertInstanceOf(DestinationEvent::class, $event);
    }
}
