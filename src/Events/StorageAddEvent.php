<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceDestinationEvent;

class StorageAddEvent extends SourceDestinationEvent
{
    protected $realPathExceptionMessage = 'Storage source path is not a real path.';

    public function __construct(string $source, string $destination = null)
    {
        parent::__construct($source, $destination);
    }
}
