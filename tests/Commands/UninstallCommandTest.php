<?php

namespace Greg\AppInstaller\Commands;

use Greg\AppInstaller\Application;
use Greg\Framework\ServiceProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class UninstallCommandTest extends TestCase
{
    public function testCanInstantiate()
    {
        $app = new Application();

        $command = new UninstallCommand($app);

        $this->assertInstanceOf(UninstallCommand::class, $command);
    }

    public function testCanRunAndNothingToUninstall()
    {
        $app = new Application();

        /** @var ServiceProvider|\PHPUnit_Framework_MockObject_MockObject $serviceProvider */
        $serviceProvider = $this->getMockBuilder(ServiceProvider::class)
            ->getMock();

        $serviceProvider->method('name')->willReturn('test');

        $app->addServiceProvider($serviceProvider);

        $command = new UninstallCommand($app);

        $command->run(new ArrayInput(['name' => 'test']), $output = new BufferedOutput());

        $this->assertEquals('Nothing to uninstall for test service provider.' . PHP_EOL, $output->fetch());
    }

    public function testCanRunAndUninstall()
    {
        $app = new Application();

        /** @var ServiceProvider|\PHPUnit_Framework_MockObject_MockObject $serviceProvider */
        $serviceProvider = $this->getMockBuilder(ServiceProvider::class)
            ->setMethods(['name', 'uninstall'])
            ->getMock();

        $serviceProvider->method('name')->willReturn('test');

        $serviceProvider->expects($this->once())->method('uninstall');

        $app->addServiceProvider($serviceProvider);

        $command = new UninstallCommand($app);

        $command->run(new ArrayInput(['name' => 'test']), $output = new BufferedOutput());

        $this->assertEquals('Service provider test has been uninstalled.' . PHP_EOL, $output->fetch());
    }

    public function testCanThrowExceptionIfServiceProviderDoesNotExists()
    {
        $app = new Application();

        $command = new UninstallCommand($app);

        $this->expectException(\Exception::class);

        $command->run(new ArrayInput(['name' => 'test']), $output = new BufferedOutput());
    }
}
