<?php

namespace Greg\AppInstaller\Event;

abstract class SourceDestinationEvent
{
    private $source;

    private $destination;

    protected $realPathExceptionMessage = 'Source path is not a real path.';

    public function __construct(string $source, string $destination = null)
    {
        if (($source = realpath($source)) === false) {
            throw new \Exception($this->realPathExceptionMessage);
        }

        $this->source = $source;

        $this->destination = $destination ? ltrim($destination, '\/') : pathinfo($source, PATHINFO_BASENAME);
    }

    public function source(): string
    {
        return $this->source;
    }

    public function destination(): string
    {
        return $this->destination;
    }
}
