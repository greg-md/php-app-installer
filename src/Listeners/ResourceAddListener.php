<?php

namespace Greg\AppInstaller\Listeners;

use Greg\Support\Dir;

class ResourceAddListener
{
    public function handle(string $source, string $resourceDestination = null)
    {
        $resourceDestination = $resourceDestination ? ltrim($resourceDestination, '\/') : pathinfo($source, PATHINFO_FILENAME);

        $destination = getcwd() . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR . $resourceDestination;

        Dir::copy($source, $destination);
    }
}