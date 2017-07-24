<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\DestinationEvent;
use PHPUnit\Framework\TestCase;

class StorageRemoveEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new StorageRemoveEvent(__DIR__);

        $this->assertInstanceOf(DestinationEvent::class, $event);
    }
}
