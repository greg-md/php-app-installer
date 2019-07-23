<?php

namespace Greg\AppInstaller;

use Greg\AppInstaller\Events\AppAddEvent;
use Greg\AppInstaller\Events\AppRemoveEvent;
use Greg\AppInstaller\Events\BuildDeployRunAddEvent;
use Greg\AppInstaller\Events\BuildDeployRunRemoveEvent;
use Greg\AppInstaller\Events\ConfigAddEvent;
use Greg\AppInstaller\Events\ConfigRemoveEvent;
use Greg\AppInstaller\Events\PublicAddEvent;
use Greg\AppInstaller\Events\PublicRemoveEvent;
use Greg\AppInstaller\Events\ResourceAddEvent;
use Greg\AppInstaller\Events\ResourceRemoveEvent;
use Greg\AppInstaller\Events\RootAddEvent;
use Greg\AppInstaller\Events\RootRemoveEvent;
use Greg\AppInstaller\Events\StorageAddEvent;
use Greg\AppInstaller\Events\StorageRemoveEvent;
use Greg\AppInstaller\Listeners\AppAddListener;
use Greg\AppInstaller\Listeners\AppRemoveListener;
use Greg\AppInstaller\Listeners\BuildDeployRunAddListener;
use Greg\AppInstaller\Listeners\BuildDeployRunRemoveListener;
use Greg\AppInstaller\Listeners\ConfigAddListener;
use Greg\AppInstaller\Listeners\ConfigRemoveListener;
use Greg\AppInstaller\Listeners\PublicAddListener;
use Greg\AppInstaller\Listeners\PublicRemoveListener;
use Greg\AppInstaller\Listeners\ResourceAddListener;
use Greg\AppInstaller\Listeners\ResourceRemoveListener;
use Greg\AppInstaller\Listeners\RootAddListener;
use Greg\AppInstaller\Listeners\RootRemoveListener;
use Greg\AppInstaller\Listeners\StorageAddListener;
use Greg\AppInstaller\Listeners\StorageRemoveListener;
use Greg\Framework\Console\ConsoleKernel;
use PHPUnit\Framework\TestCase;

class AppServiceProviderTest extends TestCase
{
    public function testCanInstantiate()
    {
        $serviceProvider = new AppServiceProvider();

        $this->assertInstanceOf(AppServiceProvider::class, $serviceProvider);
    }

    public function testCanBoot()
    {
        $app = new Application();

        $this->assertInstanceOf(AppServiceProvider::class, $app->getServiceProvider('app'));

        $this->assertEquals([
            RootAddEvent::class    => [RootAddListener::class],
            RootRemoveEvent::class => [RootRemoveListener::class],

            AppAddEvent::class    => [AppAddListener::class],
            AppRemoveEvent::class => [AppRemoveListener::class],

            BuildDeployRunAddEvent::class    => [BuildDeployRunAddListener::class],
            BuildDeployRunRemoveEvent::class => [BuildDeployRunRemoveListener::class],

            ConfigAddEvent::class    => [ConfigAddListener::class],
            ConfigRemoveEvent::class => [ConfigRemoveListener::class],

            PublicAddEvent::class    => [PublicAddListener::class],
            PublicRemoveEvent::class => [PublicRemoveListener::class],

            ResourceAddEvent::class    => [ResourceAddListener::class],
            ResourceRemoveEvent::class => [ResourceRemoveListener::class],

            StorageAddEvent::class    => [StorageAddListener::class],
            StorageRemoveEvent::class => [StorageRemoveListener::class],
        ], $app->events());
    }

    public function testCanBootConsoleKernel()
    {
        $app = new Application();

        $kernel = new ConsoleKernel($app);

        $this->assertTrue($kernel->console()->has('install'));

        $this->assertTrue($kernel->console()->has('uninstall'));
    }
}
