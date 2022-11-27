<?php

require './vendor/autoload.php';

use Atsmacode\CardGames\Console\Commands\BuildEnvironment;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new BuildEnvironment());
$application->run();