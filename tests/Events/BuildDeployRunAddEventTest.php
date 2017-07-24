<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceNameEvent;
use PHPUnit\Framework\TestCase;

class BuildDeployRunAddEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new BuildDeployRunAddEvent(__DIR__);

        $this->assertInstanceOf(SourceNameEvent::class, $event);
    }
}
