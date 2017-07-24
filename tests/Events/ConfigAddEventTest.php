<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceNameEvent;
use PHPUnit\Framework\TestCase;

class ConfigAddEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new ConfigAddEvent(__DIR__);

        $this->assertInstanceOf(SourceNameEvent::class, $event);
    }
}
