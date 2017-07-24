<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\BuildDeployRunAddEvent;
use Greg\Support\Dir;

class BuildDeployRunAddListener
{
    private $app;

    public function __construct(Application $application)
    {
        $this->app = $application;
    }

    public function handle(BuildDeployRunAddEvent $event)
    {
        $runDir = $this->app->getBuildDeployPath() . DIRECTORY_SEPARATOR . 'run';

        Dir::make($runDir);

        $destination = $runDir . DIRECTORY_SEPARATOR . $event->name();

        Dir::copy($event->source(), $destination);
    }
}
