<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\RootRemoveEvent;
use Greg\AppInstaller\Listener\DestinationListener;
use Greg\AppInstaller\Listener\DestinationListenerTestCase;

class RootRemoveListenerTest extends DestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $app = $this->mockApp();

        $listener = new RootRemoveListener($app);

        $this->assertInstanceOf(DestinationListener::class, $listener);
    }

    public function testCanHandle()
    {
        $app = $this->mockApp();

        $app->method('getRootPath')->willReturn($this->destinationPath);

        file_put_contents($file = $this->destinationPath . DIRECTORY_SEPARATOR . ($name = 'foo.txt'), 'Foo');

        $this->assertFileExists($file);

        $listener = new RootRemoveListener($app);

        $listener->handle(new RootRemoveEvent($name));

        $this->assertFileNotExists($file);
    }

    /**
     * @return Application|\PHPUnit_Framework_MockObject_MockObject
     */
    private function mockApp()
    {
        return $this->getMockBuilder(Application::class)->getMock();
    }
}
