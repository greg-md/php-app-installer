<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\StorageAddEvent;
use Greg\AppInstaller\Listener\SourceDestinationListener;

class StorageAddListener extends SourceDestinationListener
{
    private $app;

    protected $outOfPathExceptionMessage = 'You can not add out of storage path.';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(StorageAddEvent $event)
    {
        $this->handleEvent($this->app->getStoragePath(), $event);
    }
}
