<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\AppRemoveEvent;
use Greg\AppInstaller\Listener\DestinationListener;
use Greg\AppInstaller\Listener\DestinationListenerTestCase;

class AppRemoveListenerTest extends DestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $app = $this->mockApp();

        $listener = new AppRemoveListener($app);

        $this->assertInstanceOf(DestinationListener::class, $listener);
    }

    public function testCanHandle()
    {
        $app = $this->mockApp();

        $app->method('getAppPath')->willReturn($this->destinationPath);

        file_put_contents($file = $this->destinationPath . DIRECTORY_SEPARATOR . ($name = 'foo.txt'), 'Foo');

        $this->assertFileExists($file);

        $listener = new AppRemoveListener($app);

        $listener->handle(new AppRemoveEvent($name));

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
