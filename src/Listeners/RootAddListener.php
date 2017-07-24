<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\RootAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListener;

class RootAddListener extends SourceDestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not add out of root path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(RootAddEvent $event)
    {
        $this->handleEvent($this->app->getRootPath(), $event);
    }
}
