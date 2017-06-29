<?php

namespace Greg\AppInstaller\Events;

use Greg\Support\Dir;

class ResourceRemoveEvent
{
    public function handle(string $resourceDestination)
    {
        $path = getcwd() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . $resourceDestination;

        Dir::unlink($path);
    }
}
