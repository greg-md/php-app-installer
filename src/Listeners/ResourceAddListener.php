<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\ResourceAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListener;

class ResourceAddListener extends SourceDestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not add out of resources path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(ResourceAddEvent $event)
    {
        $this->handleEvent($this->app->getResourcesPath(), $event);
    }
}
