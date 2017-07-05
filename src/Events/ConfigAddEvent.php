<?php

namespace Greg\AppInstaller\Events;

class ConfigAddEvent
{
    private $source;

    private $name;

    public function __construct(string $source, string $name = null)
    {
        $this->source = $source;

        $this->name = $name;
    }

    public function source(): string
    {
        return $this->source;
    }

    public function name(): ?string
    {
        return $this->name;
    }
}
