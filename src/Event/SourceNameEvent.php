<?php

namespace Greg\AppInstaller\Event;

abstract class SourceNameEvent
{
    private $source;

    private $name;

    protected $realPathExceptionMessage = 'Source path is not a real path';

    public function __construct(string $source, string $name = null)
    {
        if (($source = realpath($source)) === false) {
            throw new \Exception($this->realPathExceptionMessage);
        }

        $this->source = $source;

        $this->name = pathinfo($name ?: $source, PATHINFO_BASENAME);
    }

    public function source(): string
    {
        return $this->source;
    }

    public function name(): string
    {
        return $this->name;
    }
}
