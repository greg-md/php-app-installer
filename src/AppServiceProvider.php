<?php

namespace Greg\AppInstaller;

use Greg\AppInstaller\Commands\InstallCommand;
use Greg\AppInstaller\Commands\UninstallCommand;
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
use Greg\Framework\ServiceProvider;

class AppServiceProvider implements ServiceProvider
{
    public function name()
    {
        return 'app';
    }

    public function boot(Application $app)
    {
        $app->listen(RootAddEvent::class, RootAddListener::class);
        $app->listen(RootRemoveEvent::class, RootRemoveListener::class);

        $app->listen(AppAddEvent::class, AppAddListener::class);
        $app->listen(AppRemoveEvent::class, AppRemoveListener::class);

        $app->listen(BuildDeployRunAddEvent::class, BuildDeployRunAddListener::class);
        $app->listen(BuildDeployRunRemoveEvent::class, BuildDeployRunRemoveListener::class);

        $app->listen(ConfigAddEvent::class, ConfigAddListener::class);
        $app->listen(ConfigRemoveEvent::class, ConfigRemoveListener::class);

        $app->listen(PublicAddEvent::class, PublicAddListener::class);
        $app->listen(PublicRemoveEvent::class, PublicRemoveListener::class);

        $app->listen(ResourceAddEvent::class, ResourceAddListener::class);
        $app->listen(ResourceRemoveEvent::class, ResourceRemoveListener::class);

        $app->listen(StorageAddEvent::class, StorageAddListener::class);
        $app->listen(StorageRemoveEvent::class, StorageRemoveListener::class);
    }

    public function bootConsoleKernel(ConsoleKernel $kernel)
    {
        $kernel->addCommand(InstallCommand::class);

        $kernel->addCommand(UninstallCommand::class);
    }
}
