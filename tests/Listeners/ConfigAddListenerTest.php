<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\ConfigAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListenerTestCase;

class ConfigAddListenerTest extends SourceDestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $app = $this->mockApp();

        $listener = new ConfigAddListener($app);

        $this->assertInstanceOf(ConfigAddListener::class, $listener);
    }

    public function testCanHandleFileConfig()
    {
        $app = $this->mockApp();

        $app->method('getConfigPath')->willReturn($this->destinationPath);

        $app->expects($this->once())->method('addConfig')->with('foo', ['foo' => 'bar']);

        file_put_contents($file = $this->sourcePath . DIRECTORY_SEPARATOR . 'foo.php', '<?php return ["foo" => "bar"];');

        $listener = new ConfigAddListener($app);

        $listener->handle(new ConfigAddEvent($file));

        $this->assertFileExists($this->destinationPath . DIRECTORY_SEPARATOR . 'foo.php');
    }

    public function testCanHandleDirectoryConfig()
    {
        $app = $this->mockApp();

        $app->method('getConfigPath')->willReturn($this->destinationPath);

        $listener = new ConfigAddListener($app);

        $listener->handle(new ConfigAddEvent($this->sourcePath));

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
