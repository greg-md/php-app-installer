<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\SourceNameEvent;

class ConfigAddEvent extends SourceNameEvent
{
    protected $realPathExceptionMessage = 'Config source path is not a real path.';

    public function __construct(string $source, string $name = null)
    {
        if (!$name) {
            $name = pathinfo($source, PATHINFO_FILENAME);
        }

        parent::__construct($source, $name);
    }
}
