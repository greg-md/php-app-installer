<?php

namespace Greg\AppInstaller\Listener;

use Greg\Support\Dir;
use PHPUnit\Framework\TestCase;

class DestinationListenerTestCase extends TestCase
{
    protected $destinationPath = __DIR__ . '/destination';

    protected function setUp()
    {
        Dir::make($this->destinationPath);
    }

    protected function tearDown()
    {
        Dir::unlink($this->destinationPath);
    }
}
