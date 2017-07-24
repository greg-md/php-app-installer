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

        $this->assertArraySubset([RootAddEvent::class => [RootAddListener::class]], $app->events());
        $this->assertArraySubset([RootRemoveEvent::class => [RootRemoveListener::class]], $app->events());

        $this->assertArraySubset([AppAddEvent::class => [AppAddListener::class]], $app->events());
        $this->assertArraySubset([AppRemoveEvent::class => [AppRemoveListener::class]], $app->events());

        $this->assertArraySubset([BuildDeployRunAddEvent::class => [BuildDeployRunAddListener::class]], $app->events());
        $this->assertArraySubset([BuildDeployRunRemoveEvent::class => [BuildDeployRunRemoveListener::class]], $app->events());

        $this->assertArraySubset([ConfigAddEvent::class => [ConfigAddListener::class]], $app->events());
        $this->assertArraySubset([ConfigRemoveEvent::class => [ConfigRemoveListener::class]], $app->events());

        $this->assertArraySubset([PublicAddEvent::class => [PublicAddListener::class]], $app->events());
        $this->assertArraySubset([PublicRemoveEvent::class => [PublicRemoveListener::class]], $app->events());

        $this->assertArraySubset([ResourceAddEvent::class => [ResourceAddListener::class]], $app->events());
        $this->assertArraySubset([ResourceRemoveEvent::class => [ResourceRemoveListener::class]], $app->events());

        $this->assertArraySubset([StorageAddEvent::class => [StorageAddListener::class]], $app->events());
        $this->assertArraySubset([StorageRemoveEvent::class => [StorageRemoveListener::class]], $app->events());
    }

    public function testCanBootConsoleKernel()
    {
        $app = new Application();

        $kernel = new ConsoleKernel($app);

        $this->assertTrue($kernel->console()->has('install'));

        $this->assertTrue($kernel->console()->has('uninstall'));
    }
}