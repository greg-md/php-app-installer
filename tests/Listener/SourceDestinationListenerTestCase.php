<?php

namespace Greg\AppInstaller\Listener;

use Greg\Support\Dir;
use PHPUnit\Framework\TestCase;

class SourceDestinationListenerTestCase extends TestCase
{
    protected $sourcePath = __DIR__ . '/source';

    protected $destinationPath = __DIR__ . '/destination';

    protected function setUp(): void
    {
        Dir::make($this->sourcePath);

        Dir::make($this->destinationPath);
    }

    protected function tearDown(): void
    {
        Dir::unlink($this->sourcePath);

        Dir::unlink($this->destinationPath);
    }
}
