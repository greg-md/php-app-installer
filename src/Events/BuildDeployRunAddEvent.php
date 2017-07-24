<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceNameEvent;

class BuildDeployRunAddEvent extends SourceNameEvent
{
    protected $realPathExceptionMessage = 'Build deploy run source path is not a real path.';

    public function __construct(string $source, string $name = null)
    {
        parent::__construct($source, $name);
    }
}
