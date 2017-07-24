<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\AppRemoveEvent;
use Greg\AppInstaller\Listener\DestinationListener;

class AppRemoveListener extends DestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not remove out of app path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(AppRemoveEvent $event)
    {
        $this->handleEvent($this->app->getAppPath(), $event);
    }
}
