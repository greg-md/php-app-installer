<?php

namespace Greg\AppInstaller;

use App\Application;
use App\Console\ConsoleKernel;
use Greg\AppInstaller\Commands\InstallCommand;
use Greg\AppInstaller\Commands\UninstallCommand;
use Greg\AppInstaller\Events\BuildDeploy\RunAddEvent;
use Greg\AppInstaller\Events\BuildDeploy\RunRemoveEvent;
use Greg\AppInstaller\Listeners\BuildDeploy\RunAddListener;
use Greg\AppInstaller\Listeners\BuildDeploy\RunRemoveListener;
use Greg\AppInstaller\Listeners\ConfigAddListener;
use Greg\AppInstaller\Listeners\ConfigRemoveListener;
use Greg\AppInstaller\Listeners\PublicAddListener;
use Greg\AppInstaller\Listeners\PublicRemoveListener;
use Greg\AppInstaller\Listeners\ResourceAddListener;
use Greg\AppInstaller\Listeners\ResourceRemoveListener;
use Greg\Framework\ServiceProvider;

class AppServiceProvider implements ServiceProvider
{
    public function name()
    {
        return 'app';
    }

    public function boot(Application $app)
    {
        $app->listen('app.config.add', ConfigAddListener::class);
        $app->listen('app.config.remove', ConfigRemoveListener::class);

        $app->listen('app.public.add', PublicAddListener::class);
        $app->listen('app.public.remove', PublicRemoveListener::class);

        $app->listen('app.resource.add', ResourceAddListener::class);
        $app->listen('app.resource.remove', ResourceRemoveListener::class);

        $app->listen('app.root.add', ResourceAddListener::class);
        $app->listen('app.root.remove', ResourceRemoveListener::class);

        $app->listen(RunAddEvent::class, RunAddListener::class);
        $app->listen(RunRemoveEvent::class, RunRemoveListener::class);
    }

    public function bootConsoleKernel(ConsoleKernel $kernel)
    {
        $kernel->addCommand(InstallCommand::class);

        $kernel->addCommand(UninstallCommand::class);
    }
}
