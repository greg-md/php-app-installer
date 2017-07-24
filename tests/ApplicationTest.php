<?php

namespace Greg\AppInstaller;

use PHPUnit\Framework\TestCase;

class ApplicationTest extends TestCase
{
    public function testCanInstantiate()
    {
        $app = new Application();

        $this->assertInstanceOf(Application::class, $app);
    }

    public function testCanConfigure()
    {
        $app = new Application();

        $app->configure($rootPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'application');

        $rootPath = realpath($rootPath);

        $this->assertEquals($rootPath, $app->getRootPath());

        $this->assertEquals($rootPath . DIRECTORY_SEPARATOR . 'app', $app->getAppPath());

        $this->assertEquals($rootPath . DIRECTORY_SEPARATOR . 'build-deploy', $app->getBuildDeployPath());

        $this->assertEquals($rootPath . DIRECTORY_SEPARATOR . 'config', $app->getConfigPath());

        $this->assertEquals($rootPath . DIRECTORY_SEPARATOR . 'public', $app->getPublicPath());

        $this->assertEquals($rootPath . DIRECTORY_SEPARATOR . 'resources', $app->getResourcesPath());

        $this->assertEquals($rootPath . DIRECTORY_SEPARATOR . 'storage', $app->getStoragePath());
    }

    public function testCanConfigureRootPath()
    {
        $app = new Application();

        $app->setRootPath(__DIR__);

        $this->assertEquals(__DIR__, $app->getRootPath());
    }

    public function testCanConfigureAppPath()
    {
        $app = new Application();

        $app->setAppPath(__DIR__);

        $this->assertEquals(__DIR__, $app->getAppPath());
    }

    public function testCanConfigureBuildDeployPath()
    {
        $app = new Application();

        $app->setBuildDeployPath(__DIR__);

        $this->assertEquals(__DIR__, $app->getBuildDeployPath());
    }

    public function testCanConfigureConfigPath()
    {
        $app = new Application();

        $app->setConfigPath(__DIR__);

        $this->assertEquals(__DIR__, $app->getConfigPath());
    }

    public function testCanConfigurePublicPath()
    {
        $app = new Application();

        $app->setPublicPath(__DIR__);

        $this->assertEquals(__DIR__, $app->getPublicPath());
    }

    public function testCanConfigureResourcesPath()
    {
        $app = new Application();

        $app->setResourcesPath(__DIR__);

        $this->assertEquals(__DIR__, $app->getResourcesPath());
    }

    public function testCanConfigureStoragePath()
    {
        $app = new Application();

        $app->setStoragePath(__DIR__);

        $this->assertEquals(__DIR__, $app->getStoragePath());
    }
}