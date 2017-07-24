<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\ConfigRemoveEvent;
use Greg\Support\Dir;

class ConfigRemoveListener
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(ConfigRemoveEvent $event)
    {
        $this->app->removeConfig($event->name());

        $source = $this->app->getConfigPath() . DIRECTORY_SEPARATOR . $event->name();

        if (!is_dir($source)) {
            $source .= '.php';

            if (!is_file($source)) {
                return;
            }
        }

        Dir::unlink($source);
    }
}
