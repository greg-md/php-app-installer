<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\StorageRemoveEvent;
use Greg\AppInstaller\Listener\DestinationListener;

class StorageRemoveListener extends DestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not remove out of storage path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(StorageRemoveEvent $event)
    {
        $this->handleEvent($this->app->getStoragePath(), $event);
    }
}
