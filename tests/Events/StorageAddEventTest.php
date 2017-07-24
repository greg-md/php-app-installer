<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceDestinationEvent;
use PHPUnit\Framework\TestCase;

class StorageAddEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new StorageAddEvent(__DIR__);

        $this->assertInstanceOf(SourceDestinationEvent::class, $event);
    }
}
