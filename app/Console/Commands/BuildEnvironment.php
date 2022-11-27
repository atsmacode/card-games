<?php

namespace Atsmacode\CardGames\Console\Commands;

use Atsmacode\CardGames\Database\Migrations\CreateCards;
use Atsmacode\Orm\Database\Migrations\CreateDatabase;
use Atsmacode\CardGames\Database\Seeders\SeedCards;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

#[AsCommand(
    name: 'app:build-env',
    description: 'Populate the DB with all resources',
    hidden: false,
    aliases: ['app:build-env']
)]

class BuildEnvironment extends Command
{

    private $buildClasses = [
        CreateDatabase::class,
        CreateCards::class,
        SeedCards::class,
    ];
    protected static $defaultName = 'app:build-env';

    public function __construct(string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->addArgument('-v', InputArgument::OPTIONAL, 'Display feedback message in console.');
        $this->addOption('-d', '-d', InputArgument::OPTIONAL, 'Run in dev mode for running unit tests.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $GLOBALS['THE_ROOT'] = '';
        
        unset($GLOBALS['dev']);
        $dev    = $input->getOption('-d') === 'true' ?: false;
        $GLOBALS['dev'] = $dev ? $dev : null; 

        foreach($this->buildClasses as $class){
            foreach($class::$methods as $method){
                (new $class())->{$method}();
            }
        }

        return Command::SUCCESS;
    }
}
