<?php

namespace Greg\AppInstaller\Events;

use Greg\AppInstaller\Event\NameEvent;

class ConfigRemoveEvent extends NameEvent
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }
}
