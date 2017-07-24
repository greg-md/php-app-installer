<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\BuildDeployRunRemoveEvent;
use Greg\Support\Dir;

class BuildDeployRunRemoveListener
{
    private $app;

    public function __construct(Application $application)
    {
        $this->app = $application;
    }

    public function handle(BuildDeployRunRemoveEvent $event)
    {
        $source = $this->app->getBuildDeployPath()
            . DIRECTORY_SEPARATOR . 'run'
            . DIRECTORY_SEPARATOR . $event->name();

        Dir::unlink($source);
    }
}
