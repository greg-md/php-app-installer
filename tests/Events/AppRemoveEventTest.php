<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\DestinationEvent;
use PHPUnit\Framework\TestCase;

class AppRemoveEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new AppRemoveEvent(__DIR__);

        $this->assertInstanceOf(DestinationEvent::class, $event);
    }
}
