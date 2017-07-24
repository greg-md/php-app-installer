<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\BuildDeployRunRemoveEvent;
use Greg\AppInstaller\Listener\SourceDestinationListenerTestCase;
use Greg\Support\Dir;

class BuildDeployRunRemoveListenerTest extends SourceDestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $app = $this->mockApp();

        $listener = new BuildDeployRunRemoveListener($app);

        $this->assertInstanceOf(BuildDeployRunRemoveListener::class, $listener);
    }

    public function testCanHandle()
    {
        $app = $this->mockApp();

        $app->method('getBuildDeployPath')->willReturn($this->destinationPath);

        $runPath = $this->destinationPath . DIRECTORY_SEPARATOR . 'run';

        Dir::make($runPath);

        file_put_contents($file = $runPath . DIRECTORY_SEPARATOR . ($name = 'file.name'), 'foo');

        $listener = new BuildDeployRunRemoveListener($app);

        $listener->handle(new BuildDeployRunRemoveEvent($name));

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
