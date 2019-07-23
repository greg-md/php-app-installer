<?php

namespace Greg\AppInstaller\Listener;

use Greg\Support\Dir;
use PHPUnit\Framework\TestCase;

class DestinationListenerTestCase extends TestCase
{
    protected $destinationPath = __DIR__ . '/destination';

    protected function setUp(): void
    {
        Dir::make($this->destinationPath);
    }

    protected function tearDown(): void
    {
        Dir::unlink($this->destinationPath);
    }
}
