<?php

namespace Greg\AppInstaller\Listener;

use Greg\AppInstaller\Event\DestinationEvent;
use Greg\Support\Dir;
use PHPUnit\Framework\TestCase;

class DestinationListenerTest extends TestCase
{
    private $destinationPath = __DIR__ . '/destination';

    protected function setUp()
    {
        Dir::make($this->destinationPath);
    }

    protected function tearDown()
    {
        Dir::unlink($this->destinationPath);
    }

    public function testCanInstantiate()
    {
        $listener = new class() extends DestinationListener {
        };

        $this->assertInstanceOf(DestinationListener::class, $listener);
    }

    public function testCanThrowExceptionIfDoesNotStartsWithSourcePath()
    {
        $this->expectException(\Exception::class);

        /** @var DestinationListener $listener */
        $listener = new class() extends DestinationListener {
        };

        $listener->handleEvent($this->destinationPath, new class('foo/../..') extends DestinationEvent {
        });
    }

    public function testCanHandleEvent()
    {
        $file = $this->destinationPath . DIRECTORY_SEPARATOR . ($name = 'foo.txt');

        file_put_contents($file, 'Foo');

        $this->assertFileExists($file);

        /** @var DestinationListener $listener */
        $listener = new class() extends DestinationListener {
        };

        $listener->handleEvent($this->destinationPath, new class($name) extends DestinationEvent {
        });

        $this->assertFileNotExists($file);
    }
}
