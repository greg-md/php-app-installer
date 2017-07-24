<?php

namespace Greg\AppInstaller\Event;

abstract class NameEvent
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = pathinfo($name, PATHINFO_BASENAME);
    }

    public function name(): string
    {
        return $this->name;
    }
}
