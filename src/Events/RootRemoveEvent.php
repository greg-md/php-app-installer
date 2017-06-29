<?php

namespace Greg\AppInstaller\Events;

use Greg\Support\Dir;

class RootRemoveEvent
{
    public function handle(string $rootDestination)
    {
        $path = getcwd() . DIRECTORY_SEPARATOR . $rootDestination;

        Dir::unlink($path);
    }
}
