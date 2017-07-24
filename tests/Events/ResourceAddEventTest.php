<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceDestinationEvent;
use PHPUnit\Framework\TestCase;

class ResourceAddEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new ResourceAddEvent(__DIR__);

        $this->assertInstanceOf(SourceDestinationEvent::class, $event);
    }
}
