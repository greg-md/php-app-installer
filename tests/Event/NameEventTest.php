<?php

namespace Greg\AppInstaller\Event;

use PHPUnit\Framework\TestCase;

class NameEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        /** @var NameEvent $event */
        $event = new class('foo') extends NameEvent {
        };

        $this->assertInstanceOf(NameEvent::class, $event);
    }

    public function testCanGetName()
    {
        /** @var NameEvent $event */
        $event = new class('foo') extends NameEvent {
        };

        $this->assertEquals('foo', $event->name());
    }

    public function testCanGetNameEvenIfIsAPath()
    {
        /** @var NameEvent $event */
        $event = new class('/foo/bar') extends NameEvent {
        };

        $this->assertEquals('bar', $event->name());
    }
}
