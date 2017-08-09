<?php

namespace Greg\AppInstaller;

class Application extends \Greg\Framework\Application
{
    private $rootPath;

    private $appPath;

    private $buildDeploy;

    private $configPath;

    private $publicPath;

    private $resourcesPath;

    private $storagePath;

    protected function boot()
    {
        $this->register($this);

        if (get_class($this) !== self::class) {
            $this->inject(self::class, $this);
        }

        $this->addServiceProvider(new AppServiceProvider());

        $this->bootApp();
    }

    protected function bootApp()
    {
    }

    public function configure(string $rootPath)
    {
        $this->setRootPath($rootPath);

        $this->setAppPath($rootPath . DIRECTORY_SEPARATOR . 'app');

        $this->setBuildDeployPath($rootPath . DIRECTORY_SEPARATOR . 'build-deploy');

        $this->setConfigPath($rootPath . DIRECTORY_SEPARATOR . 'config');

        $this->setPublicPath($rootPath . DIRECTORY_SEPARATOR . 'public');

        $this->setResourcesPath($rootPath . DIRECTORY_SEPARATOR . 'resources');

        $this->setStoragePath($rootPath . DIRECTORY_SEPARATOR . 'storage');
    }

    public function setRootPath(string $path)
    {
        $this->rootPath = realpath($path) ?: null;

        return $this;
    }

    public function getRootPath(): ?string
    {
        return $this->rootPath;
    }

    public function setAppPath(string $path)
    {
        $this->appPath = realpath($path) ?: null;

        return $this;
    }

    public function getAppPath(): ?string
    {
        return $this->appPath;
    }

    public function setBuildDeployPath(string $path)
    {
        $this->buildDeploy = realpath($path) ?: null;

        return $this;
    }

    public function getBuildDeployPath(): ?string
    {
        return $this->buildDeploy;
    }

    public function setConfigPath(string $path)
    {
        $this->configPath = realpath($path) ?: null;

        return $this;
    }

    public function getConfigPath(): ?string
    {
        return $this->configPath;
    }

    public function setPublicPath(string $path)
    {
        $this->publicPath = realpath($path) ?: null;

        return $this;
    }

    public function getPublicPath(): ?string
    {
        return $this->publicPath;
    }

    public function setResourcesPath(string $path)
    {
        $this->resourcesPath = realpath($path) ?: null;

        return $this;
    }

    public function getResourcesPath(): ?string
    {
        return $this->resourcesPath;
    }

    public function setStoragePath(string $path)
    {
        $this->storagePath = realpath($path) ?: null;

        return $this;
    }

    public function getStoragePath(): ?string
    {
        return $this->storagePath;
    }
}
