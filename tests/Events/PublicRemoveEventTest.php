<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\DestinationEvent;
use PHPUnit\Framework\TestCase;

class PublicRemoveEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new PublicRemoveEvent(__DIR__);

        $this->assertInstanceOf(DestinationEvent::class, $event);
    }
}
