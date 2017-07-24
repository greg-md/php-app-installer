<?php

namespace Greg\AppInstaller\Listener;

use Greg\AppInstaller\Event\DestinationEvent;
use Greg\Support\Dir;
use Greg\Support\Str;

abstract class DestinationListener
{
    protected $outOfPathExceptionMessage = 'You can not remove out of sources path.';

    public function handleEvent(string $sourcesPath, DestinationEvent $event)
    {
        $sourcesPath .= DIRECTORY_SEPARATOR;

        $destination = Dir::absolute($sourcesPath . $event->destination());

        if (!Str::startsWith($destination, $sourcesPath)) {
            throw new \Exception($this->outOfPathExceptionMessage);
        }

        Dir::unlink($destination);
    }
}
