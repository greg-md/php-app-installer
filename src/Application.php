<?php

namespace Greg\AppInstaller;

class Application extends \Greg\Framework\Application
{
    private $rootPath;

    private $appPath;

    private $configPath;

    private $publicPath;

    private $resourcesPath;

    private $storagePath;

    protected function boot()
    {
        $this->bootApp();
    }

    protected function bootApp()
    {
    }

    public function setRootPath(string $path)
    {
        $this->rootPath = realpath($path);

        $this->appPath = $this->rootPath . DIRECTORY_SEPARATOR . 'app';

        $this->configPath = $this->rootPath . DIRECTORY_SEPARATOR . 'config';

        $this->publicPath = $this->rootPath . DIRECTORY_SEPARATOR . 'public';

        $this->resourcesPath = $this->rootPath . DIRECTORY_SEPARATOR . 'resources';

        $this->storagePath = $this->rootPath . DIRECTORY_SEPARATOR . 'storage';

        return $this;
    }

    public function getRootPath()
    {
        return $this->rootPath;
    }

    public function setConfigPath(string $path)
    {
        $this->configPath = realpath($path);

        return $this;
    }

    public function getConfigPath()
    {
        return $this->configPath;
    }

    public function setPublicPath(string $path)
    {
        $this->publicPath = realpath($path);

        return $this;
    }

    public function getPublicPath()
    {
        return $this->publicPath;
    }

    public function setResourcesPath(string $path)
    {
        $this->resourcesPath = realpath($path);

        return $this;
    }

    public function getResourcesPath()
    {
        return $this->resourcesPath;
    }

    public function setStoragePath(string $path)
    {
        $this->storagePath = realpath($path);

        return $this;
    }

    public function getStoragePath()
    {
        return $this->storagePath;
    }
}