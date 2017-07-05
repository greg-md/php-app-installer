<?php

namespace Greg\AppInstaller\Listeners\BuildDeploy;

use Greg\AppInstaller\Events\BuildDeploy\RunAddEvent;
use Greg\Support\Dir;

class RunAddListener
{
    public function handle(RunAddEvent $event)
    {
        $configPath = getcwd() . DIRECTORY_SEPARATOR
                    . 'build-deploy' . DIRECTORY_SEPARATOR
                    . 'run' . DIRECTORY_SEPARATOR . pathinfo($event->name(), PATHINFO_FILENAME);

        Dir::copy($event->source(), $configPath);
    }
}
