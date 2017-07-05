<?php

namespace Greg\AppInstaller\Listeners;

use Greg\Support\Dir;

class RootRemoveListener
{
    public function handle(string $rootDestination)
    {
        $path = getcwd() . DIRECTORY_SEPARATOR . $rootDestination;

        Dir::unlink($path);
    }
}
