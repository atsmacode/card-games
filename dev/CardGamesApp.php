<?php

require './vendor/autoload.php';
require './config/container.php';

use Atsmacode\CardGames\Console\Commands\BuildCardGames;
use Atsmacode\CardGames\DbalTestFactory;
use Atsmacode\CardGames\PdoTestFactory;
use Atsmacode\Framework\Console\Commands\BuildEnvironment;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new BuildCardGames(
    null,
    $serviceManager,
    new DbalTestFactory(),
    new PdoTestFactory()
));
$application->add(new BuildEnvironment(
    null,
    $serviceManager,
    new DbalTestFactory(),
    new PdoTestFactory()
));
$application->run();