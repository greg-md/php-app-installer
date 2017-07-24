<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceDestinationEvent;
use PHPUnit\Framework\TestCase;

class AppAddEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new AppAddEvent(__DIR__);

        $this->assertInstanceOf(SourceDestinationEvent::class, $event);
    }
}
