<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceDestinationEvent;
use PHPUnit\Framework\TestCase;

class PublicAddEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new PublicAddEvent(__DIR__);

        $this->assertInstanceOf(SourceDestinationEvent::class, $event);
    }
}
