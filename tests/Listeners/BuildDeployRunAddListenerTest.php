<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\BuildDeployRunAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListenerTestCase;

class BuildDeployRunAddListenerTest extends SourceDestinationListenerTestCase
{
    public function testCanInstantiate()
    {
        $app = $this->mockApp();

        $listener = new BuildDeployRunAddListener($app);

        $this->assertInstanceOf(BuildDeployRunAddListener::class, $listener);
    }

    public function testCanHandle()
    {
        $app = $this->mockApp();

        $app->method('getBuildDeployPath')->willReturn($this->destinationPath);

        file_put_contents($sourceFile = $this->sourcePath . DIRECTORY_SEPARATOR . ($fileName = 'file.name'), 'foo');

        $listener = new BuildDeployRunAddListener($app);

        $listener->handle(new BuildDeployRunAddEvent($sourceFile));

        $this->assertFileExists(
            $this->destinationPath . DIRECTORY_SEPARATOR . 'run'
            . DIRECTORY_SEPARATOR . $fileName
        );
    }

    /**
     * @return Application|\PHPUnit_Framework_MockObject_MockObject
     */
    private function mockApp()
    {
        return $this->getMockBuilder(Application::class)->getMock();
    }
}
