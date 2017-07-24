<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\AppAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListener;
use Greg\AppInstaller\Listener\SourceDestinationListenerTestCase;

class AppAddListenerTest extends SourceDestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $app = $this->mockApp();

        $listener = new AppAddListener($app);

        $this->assertInstanceOf(SourceDestinationListener::class, $listener);
    }

    public function testCanHandle()
    {
        $app = $this->mockApp();

        $app->method('getAppPath')->willReturn($this->destinationPath);

        $listener = new AppAddListener($app);

        $listener->handle(new AppAddEvent($this->sourcePath));

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
