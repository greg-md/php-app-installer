<?php

namespace Greg\AppInstaller\Events;

use Greg\Support\Dir;

class RootAddEvent
{
    public function handle(string $source, string $rootDestination = null)
    {
        $rootDestination = $rootDestination ? ltrim($rootDestination, '\/') : pathinfo($source, PATHINFO_FILENAME);

        $destination = getcwd() . DIRECTORY_SEPARATOR . $rootDestination;

        Dir::copy($source, $destination);
    }
}
