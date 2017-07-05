<?php

namespace Greg\AppInstaller\Listeners;

use Greg\Support\Dir;

class RootAddListener
{
    public function handle(string $source, string $rootDestination = null)
    {
        $rootDestination = $rootDestination ? ltrim($rootDestination, '\/') : pathinfo($source, PATHINFO_FILENAME);

        $destination = getcwd() . DIRECTORY_SEPARATOR . $rootDestination;

        Dir::copy($source, $destination);
    }
}
