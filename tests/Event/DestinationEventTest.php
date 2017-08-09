<?php

namespace Greg\AppInstaller\Event;

use PHPUnit\Framework\TestCase;

class DestinationEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        /** @var DestinationEvent $event */
        $event = new class('foo') extends DestinationEvent {
        };

        $this->assertInstanceOf(DestinationEvent::class, $event);
    }

    public function testCanGetDestination()
    {
        /** @var DestinationEvent $event */
        $event = new class('foo') extends DestinationEvent {
        };

        $this->assertEquals('foo', $event->destination());
    }

    public function testCanGetDestinationWithoutSeparatorFirst()
    {
        /** @var DestinationEvent $event */
        $event = new class('/foo/bar') extends DestinationEvent {
        };

        $this->assertEquals('foo/bar', $event->destination());
    }
}
