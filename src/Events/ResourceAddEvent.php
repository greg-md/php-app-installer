<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceDestinationEvent;

class ResourceAddEvent extends SourceDestinationEvent
{
    protected $realPathExceptionMessage = 'Resource source path is not a real path.';

    public function __construct(string $source, string $destination = null)
    {
        parent::__construct($source, $destination);
    }
}
