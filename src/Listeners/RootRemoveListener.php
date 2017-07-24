<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\RootRemoveEvent;
use Greg\AppInstaller\Listener\DestinationListener;

class RootRemoveListener extends DestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not remove out of root path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(RootRemoveEvent $event)
    {
        $this->handleEvent($this->app->getRootPath(), $event);
    }
}
