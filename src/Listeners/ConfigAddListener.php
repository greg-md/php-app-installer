<?php

namespace Greg\AppInstaller\Listeners;

use Greg\AppInstaller\Application;
use Greg\AppInstaller\Events\ConfigAddEvent;
use Greg\Support\Config;
use Greg\Support\Dir;

class ConfigAddListener
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(ConfigAddEvent $event)
    {
        $configDestination = $this->app->getConfigPath()
            . DIRECTORY_SEPARATOR . (is_file($event->source()) ? $event->name() . '.php' : $event->name());

        Dir::copy($event->source(), $configDestination);

        if (is_file($event->source())) {
            $config = require $configDestination;
        } else {
            $config = Config::dir($configDestination);
        }

        $this->app->addConfig($event->name(), $config);
    }
}
