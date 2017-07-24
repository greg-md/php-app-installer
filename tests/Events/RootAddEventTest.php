<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceDestinationEvent;
use PHPUnit\Framework\TestCase;

class RootAddEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new RootAddEvent(__DIR__);

        $this->assertInstanceOf(SourceDestinationEvent::class, $event);
    }
}
