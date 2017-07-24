<?php

namespace Greg\AppInstaller\Event;

use PHPUnit\Framework\TestCase;

class SourceDestinationEventTest extends TestCase
{
    public function testCanInstantiate()
    {
        /** @var SourceDestinationEvent $event */
        $event = new class(__DIR__) extends SourceDestinationEvent
        {
        };

        $this->assertInstanceOf(SourceDestinationEvent::class, $event);
    }

    public function testCanThrowExceptionIfNotRealSource()
    {
        $this->expectException(\Exception::class);

        new class(__DIR__ . '/undefined') extends SourceDestinationEvent
        {
        };
    }

    public function testCanGetSource()
    {
        /** @var SourceDestinationEvent $event */
        $event = new class(__DIR__) extends SourceDestinationEvent
        {
        };

        $this->assertEquals(__DIR__, $event->source());
    }

    public function testCanGetRealSource()
    {
        /** @var SourceDestinationEvent $event */
        $event = new class(__DIR__ . '/..') extends SourceDestinationEvent
        {
        };

        $this->assertEquals(realpath(__DIR__ . '/..'), $event->source());
    }

    public function testCanGetDestination()
    {
        /** @var SourceDestinationEvent $event */
        $event = new class(__DIR__ . '/..', 'foo') extends SourceDestinationEvent
        {
        };

        $this->assertEquals('foo', $event->destination());
    }

    public function testCanGetDestinationFromSource()
    {
        /** @var SourceDestinationEvent $event */
        $event = new class(__DIR__) extends SourceDestinationEvent
        {
        };

        $this->assertEquals(pathinfo(__DIR__, PATHINFO_BASENAME), $event->destination());
    }

    public function testCanGetDestinationWithoutSeparatorFirst()
    {
        /** @var SourceDestinationEvent $event */
        $event = new class(__DIR__, '/foo/bar') extends SourceDestinationEvent
        {
        };

        $this->assertEquals('foo/bar', $event->destination());
    }
}
