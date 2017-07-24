<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\PublicAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListener;

class PublicAddListener extends SourceDestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not add out of public path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(PublicAddEvent $event)
    {
        $this->handleEvent($this->app->getPublicPath(), $event);
    }
}
