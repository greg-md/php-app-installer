<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\ConfigRemoveEvent;
use Greg\AppInstaller\Listener\DestinationListenerTestCase;

class ConfigRemoveListenerTest extends DestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $app = $this->mockApp();

        $listener = new ConfigRemoveListener($app);

        $this->assertInstanceOf(ConfigRemoveListener::class, $listener);
    }

    public function testCanHandle()
    {
        $app = $this->mockApp();

        $app->method('getConfigPath')->willReturn($this->destinationPath);

        $app->expects($this->once())->method('removeConfig')->with($name = 'foo');

        file_put_contents($file = $this->destinationPath . DIRECTORY_SEPARATOR . $name . '.php', '<?php return [];');

        $listener = new ConfigRemoveListener($app);

        $listener->handle(new ConfigRemoveEvent($name));

        $this->assertFileNotExists($file);
    }

    public function testCanHandleEvenIfConfigNotExists()
    {
        $app = $this->mockApp();

        $app->method('getConfigPath')->willReturn($this->destinationPath);

        $app->expects($this->once())->method('removeConfig')->with($name = 'foo');

        $listener = new ConfigRemoveListener($app);

        $listener->handle(new ConfigRemoveEvent('foo'));
    }

    /**
     * @return Application|\PHPUnit_Framework_MockObject_MockObject
     */
    private function mockApp()
    {
        return $this->getMockBuilder(Application::class)->getMock();
    }
}
