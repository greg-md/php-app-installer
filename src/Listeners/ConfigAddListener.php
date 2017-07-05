<?php

namespace Greg\AppInstaller\Listeners;

use App\Application;
use Greg\Support\Config;
use Greg\Support\Dir;

class ConfigAddListener
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(string $source, string $name)
    {
        $name = pathinfo($name, PATHINFO_FILENAME);

        $isFile = is_file($source);

        $destinationName = $isFile ? $name . '.php' : $name;

        $configPath = getcwd() . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . $destinationName;

        Dir::copy($source, $configPath);

        if ($isFile) {
            $config = require $configPath;
        } else {
            $config = Config::dir($configPath);
        }

        $this->app->addConfig($name, $config);
    }
}
