<?php

namespace Greg\AppInstaller\Listener;

use Greg\AppInstaller\Event\SourceDestinationEvent;
use Greg\Support\Dir;
use Greg\Support\Str;

abstract class SourceDestinationListener
{
    protected $outOfPathExceptionMessage = 'You can not add out of sources path.';

    public function handleEvent(string $sourcesPath, SourceDestinationEvent $event)
    {
        $sourcesPath .= DIRECTORY_SEPARATOR;

        $destination = Dir::absolute($sourcesPath . $event->destination());

        if (!Str::startsWith($destination, $sourcesPath)) {
            throw new \Exception($this->outOfPathExceptionMessage);
        }

        Dir::copy($event->source(), $destination);
    }
}
