<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\NameEvent;
use PHPUnit\Framework\TestCase;

class ConfigRemoveEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new ConfigRemoveEvent(__DIR__);

        $this->assertInstanceOf(NameEvent::class, $event);
    }
}
