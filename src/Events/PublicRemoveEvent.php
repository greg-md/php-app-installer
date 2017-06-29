<?php

namespace Greg\AppInstaller\Events;

use Greg\Support\Dir;

class PublicRemoveEvent
{
    public function handle(string $publicDestination)
    {
        $path = getcwd() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $publicDestination;

        Dir::unlink($path);
    }
}
