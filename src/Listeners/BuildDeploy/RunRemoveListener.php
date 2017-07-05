<?php

namespace Greg\AppInstaller\Listeners\BuildDeploy;

use Greg\AppInstaller\Events\BuildDeploy\RunRemoveEvent;
use Greg\Support\Dir;

class RunRemoveListener
{
    public function handle(RunRemoveEvent $event)
    {
        $source = getcwd() . DIRECTORY_SEPARATOR
            . 'build-deploy' . DIRECTORY_SEPARATOR
            . 'run' . DIRECTORY_SEPARATOR . pathinfo($event->name(), PATHINFO_FILENAME);

        Dir::unlink($source);
    }
}
