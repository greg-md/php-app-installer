<?php

namespace Greg\AppInstaller\Listeners;

use Greg\Support\Dir;

class ResourceRemoveListener
{
    public function handle(string $resourceDestination)
    {
        $path = getcwd() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . $resourceDestination;

        Dir::unlink($path);
    }
}
