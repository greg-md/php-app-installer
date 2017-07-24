<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\ResourceRemoveEvent;
use Greg\AppInstaller\Listener\DestinationListener;

class ResourceRemoveListener extends DestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not remove out of resources path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(ResourceRemoveEvent $event)
    {
        $this->handleEvent($this->app->getResourcesPath(), $event);
    }
}
