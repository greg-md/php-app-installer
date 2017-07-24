<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceDestinationEvent;

class AppAddEvent extends SourceDestinationEvent
{
    protected $realPathExceptionMessage = 'App source path is not a real path.';

    public function __construct(string $source, string $destination = null)
    {
        parent::__construct($source, $destination);
    }
}
