<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\NameEvent;
use PHPUnit\Framework\TestCase;

class BuildDeployRunRemoveEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        $event = new BuildDeployRunRemoveEvent('foo');

        $this->assertInstanceOf(NameEvent::class, $event);
    }
}
