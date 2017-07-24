<?php

namespace Greg\AppInstaller\Event;

use PHPUnit\Framework\TestCase;

class SourceNameEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        /** @var SourceNameEvent $event */
        $event = new class(__DIR__) extends SourceNameEvent
        {
        };

        $this->assertInstanceOf(SourceNameEvent::class, $event);
    }

    public function testCanThrowExceptionIfNotRealSource()
    {
        $this->expectException(\Exception::class);

        new class(__DIR__ . '/undefined') extends SourceNameEvent
        {
        };
    }

    public function testCanGetSource()
    {
        /** @var SourceNameEvent $event */
        $event = new class(__DIR__) extends SourceNameEvent
        {
        };

        $this->assertEquals(__DIR__, $event->source());
    }

    public function testCanGetRealSource()
    {
        /** @var SourceNameEvent $event */
        $event = new class(__DIR__ . '/..') extends SourceNameEvent
        {
        };

        $this->assertEquals(realpath(__DIR__ . '/..'), $event->source());
    }

    public function testCanGetName()
    {
        /** @var SourceNameEvent $event */
        $event = new class(__DIR__, 'foo') extends SourceNameEvent
        {
        };

        $this->assertEquals('foo', $event->name());
    }

    public function testCanGetNameFromSource()
    {
        /** @var SourceNameEvent $event */
        $event = new class(__DIR__) extends SourceNameEvent
        {
        };

        $this->assertEquals(pathinfo(__DIR__, PATHINFO_BASENAME), $event->name());
    }

    public function testCanGetNameFromAPath()
    {
        /** @var SourceNameEvent $event */
        $event = new class(__DIR__, '/foo/bar') extends SourceNameEvent
        {
        };

        $this->assertEquals('bar', $event->name());
    }
}
