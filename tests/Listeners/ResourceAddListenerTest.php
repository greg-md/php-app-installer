<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\ResourceAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListener;
use Greg\AppInstaller\Listener\SourceDestinationListenerTestCase;

class ResourceAddListenerTest extends SourceDestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $app = $this->mockApp();

        $listener = new ResourceAddListener($app);

        $this->assertInstanceOf(SourceDestinationListener::class, $listener);
    }

    public function testCanHandle()
    {
        $app = $this->mockApp();

        $app->method('getResourcesPath')->willReturn($this->destinationPath);

        $listener = new ResourceAddListener($app);

        $listener->handle(new ResourceAddEvent($this->sourcePath));

        $this->assertDirectoryExists($this->destinationPath . DIRECTORY_SEPARATOR . pathinfo($this->sourcePath, PATHINFO_BASENAME));
    }

    /**
     * @return Application|\PHPUnit_Framework_MockObject_MockObject
     */
    private function mockApp()
    {
        return $this->getMockBuilder(Application::class)->getMock();
    }
}
