<?php

namespace Greg\AppInstaller\Listener;

use Greg\AppInstaller\Event\SourceDestinationEvent;

class SourceDestinationListenerTest extends SourceDestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $listener = new class extends SourceDestinationListener
        {
        };

        $this->assertInstanceOf(SourceDestinationListener::class, $listener);
    }

    public function testCanThrowExceptionIfStartsWithSourcePath()
    {
        $this->expectException(\Exception::class);

        /** @var SourceDestinationListener $listener */
        $listener = new class extends SourceDestinationListener
        {
        };

        $listener->handleEvent($this->sourcePath, new class(__DIR__, 'foo/../..') extends SourceDestinationEvent {});
    }

    public function testCanHandleEvent()
    {
        /** @var SourceDestinationListener $listener */
        $listener = new class extends SourceDestinationListener
        {
        };

        $source = $this->sourcePath;

        $listener->handleEvent($this->destinationPath, new class($source) extends SourceDestinationEvent {});

        $this->assertDirectoryExists($this->destinationPath . DIRECTORY_SEPARATOR . pathinfo($this->sourcePath, PATHINFO_BASENAME));
    }
}
