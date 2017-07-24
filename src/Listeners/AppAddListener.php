<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\AppAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListener;

class AppAddListener extends SourceDestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not add out of app path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(AppAddEvent $event)
    {
        $this->handleEvent($this->app->getAppPath(), $event);
    }
}
