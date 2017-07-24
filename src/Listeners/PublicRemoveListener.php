<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\PublicRemoveEvent;
use Greg\AppInstaller\Listener\DestinationListener;

class PublicRemoveListener extends DestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not remove out of public path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(PublicRemoveEvent $event)
    {
        $this->handleEvent($this->app->getPublicPath(), $event);
    }
}
