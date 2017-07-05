<?php

namespace Greg\AppInstaller\Listeners;

use Greg\Support\Dir;

class PublicRemoveListener
{
    public function handle(string $publicDestination)
    {
        $path = getcwd() . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $publicDestination;

        Dir::unlink($path);
    }
}
