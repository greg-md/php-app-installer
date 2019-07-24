<?php

namespace Greg\AppInstaller\Commands;

use Greg\AppInstaller\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UninstallCommand extends Command
{
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('uninstall')
            ->addArgument('name', InputArgument::REQUIRED, 'The name of the service provider.')
            ->setDescription('Uninstall Service Provider.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');

        if (!$serviceProvider = $this->app->getServiceProvider($name)) {
            throw new \Exception('Service provider `' . $name . '` does not exists.');
        }

        if (method_exists($serviceProvider, 'uninstall')) {
            $this->app->callServiceProvider($serviceProvider, 'uninstall', $input, $output);

            $message = 'Service provider <fg=yellow;options=bold>' . $name . '</> has been uninstalled.';
        } else {
            $message = 'Nothing to uninstall for <fg=yellow;options=bold>' . $name . '</> service provider.';
        }

        $output->writeln('<info>' . $message . '</info>');
    }
}
