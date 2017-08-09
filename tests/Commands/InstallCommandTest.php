<?php

namespace Greg\AppInstaller\Commands;

use Greg\AppInstaller\Application;
use Greg\Framework\ServiceProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;

class InstallCommandTest extends TestCase
{
    public function testCanInstantiate()
    {
        $app = new Application();

        $command = new InstallCommand($app);

        $this->assertInstanceOf(InstallCommand::class, $command);
    }

    public function testCanRunAndNothingToInstall()
    {
        $app = new Application();

        /** @var ServiceProvider|\PHPUnit_Framework_MockObject_MockObject $serviceProvider */
        $serviceProvider = $this->getMockBuilder(ServiceProvider::class)
            ->getMock();

        $serviceProvider->method('name')->willReturn('test');

        $app->addServiceProvider($serviceProvider);

        $command = new InstallCommand($app);

        $command->run(new ArrayInput(['name' => 'test']), $output = new BufferedOutput());

        $this->assertEquals('Nothing to install for test service provider.' . PHP_EOL, $output->fetch());
    }

    public function testCanRunAndInstall()
    {
        $app = new Application();

        /** @var ServiceProvider|\PHPUnit_Framework_MockObject_MockObject $serviceProvider */
        $serviceProvider = $this->getMockBuilder(ServiceProvider::class)
            ->setMethods(['name', 'install'])
            ->getMock();

        $serviceProvider->method('name')->willReturn('test');

        $serviceProvider->expects($this->once())->method('install');

        $app->addServiceProvider($serviceProvider);

        $command = new InstallCommand($app);

        $command->run(new ArrayInput(['name' => 'test']), $output = new BufferedOutput());

        $this->assertEquals('Service provider test has been installed.' . PHP_EOL, $output->fetch());
    }

    public function testCanThrowExceptionIfServiceProviderDoesNotExists()
    {
        $app = new Application();

        $command = new InstallCommand($app);

        $this->expectException(\Exception::class);

        $command->run(new ArrayInput(['name' => 'test']), $output = new BufferedOutput());
    }
}
