<?php

namespace Greg\AppInstaller;

use App\Application;
use App\Console\ConsoleKernel;
use Greg\AppInstaller\Commands\InstallCommand;
use Greg\AppInstaller\Commands\UninstallCommand;
use Greg\AppInstaller\Events\ConfigAddEvent;
use Greg\AppInstaller\Events\ConfigRemoveEvent;
use Greg\AppInstaller\Events\PublicAddEvent;
use Greg\AppInstaller\Events\PublicRemoveEvent;
use Greg\AppInstaller\Events\ResourceAddEvent;
use Greg\AppInstaller\Events\ResourceRemoveEvent;
use Greg\Framework\ServiceProvider;

class AppServiceProvider implements ServiceProvider
{
    public function name()
    {
        return 'app';
    }

    public function boot(Application $app)
    {
        $app->listen('app.config.add', ConfigAddEvent::class);
        $app->listen('app.config.remove', ConfigRemoveEvent::class);

        $app->listen('app.public.add', PublicAddEvent::class);
        $app->listen('app.public.remove', PublicRemoveEvent::class);

        $app->listen('app.resource.add', ResourceAddEvent::class);
        $app->listen('app.resource.remove', ResourceRemoveEvent::class);

        $app->listen('app.root.add', ResourceAddEvent::class);
        $app->listen('app.root.remove', ResourceRemoveEvent::class);
    }

    public function bootConsoleKernel(ConsoleKernel $kernel)
    {
        $kernel->addCommand(InstallCommand::class);

        $kernel->addCommand(UninstallCommand::class);
    }
}
