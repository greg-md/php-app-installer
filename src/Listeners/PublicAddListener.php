<?php

namespace Greg\AppInstaller\Listeners;

use Greg\Support\Dir;

class PublicAddListener
{
    public function handle(string $source, string $publicDestination = null)
    {
        $publicDestination = $publicDestination ? ltrim($publicDestination, '\/') : pathinfo($source, PATHINFO_FILENAME);

        $destination = getcwd() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $publicDestination;

        Dir::copy($source, $destination);
    }
}
