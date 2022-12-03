<?php

require './vendor/autoload.php';

$GLOBALS['THE_ROOT'] = '';

use Atsmacode\CardGames\CardGamesConfigProvider;
use Atsmacode\CardGames\Console\Commands\BuildCardGames;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new BuildCardGames(null, new CardGamesConfigProvider()));
$application->run();