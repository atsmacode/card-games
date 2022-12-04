<?php

namespace Atsmacode\CardGames\Console\Commands;

use Atsmacode\CardGames\CardGamesConfigProvider;
use Atsmacode\CardGames\Database\Migrations\CreateCards;
use Atsmacode\CardGames\Database\Migrations\CreateDatabase;
use Atsmacode\CardGames\Database\Seeders\SeedCards;
use Atsmacode\Framework\ConfigProvider;
use Doctrine\DBAL\DriverManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(
    name: 'app:build-card-games',
    description: 'Populate the DB with all resources',
    hidden: false,
    aliases: ['app:build-card-games']
)]

class BuildCardGames extends Command
{
    private $buildClasses = [
        CreateDatabase::class,
        CreateCards::class,
        SeedCards::class
    ];

    protected static $defaultName = 'app:build-card-games';

    public function __construct(string $name = null, ConfigProvider $configProvider)
    {
        parent::__construct($name);

        $this->configProvider = $configProvider;
    }

    protected function configure(): void
    {
        $this->addArgument('-v', InputArgument::OPTIONAL, 'Display feedback message in console.');
        $this->addOption('-d', '-d', InputArgument::OPTIONAL, 'Run in dev mode for running unit tests.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        unset($GLOBALS['dev']);

        $GLOBALS['THE_ROOT'] = '';
        $dev                 = $input->getOption('-d') === 'true' ?: false;
        $GLOBALS['dev']      = $dev ? $dev : null;
        $config              = (new CardGamesConfigProvider)->get();
        $env                 = 'live';

        if (isset($GLOBALS['dev'])) { $env = 'test'; }

        $GLOBALS['connection'] = DriverManager::getConnection([
            'dbname'   => $config['db'][$env]['database'],
            'user'     => $config['db'][$env]['username'],
            'password' => $config['db'][$env]['password'],
            'host'     => $config['db'][$env]['servername'],
            'driver'   => $config['db'][$env]['driver'],
        ]);

        foreach($this->buildClasses as $class){
            foreach($class::$methods as $method){
                (new $class($this->configProvider))->{$method}();
            }
        }

        return Command::SUCCESS;
    }
}
