<?php

namespace Atsmacode\CardGames\Tests;

use Atsmacode\CardGames\CardGamesConfigProvider;
use Doctrine\DBAL\DriverManager;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    protected function setUp(): void
    {
        $GLOBALS['THE_ROOT'] = '';
        $GLOBALS['dev']      = true;
        $config              = (new CardGamesConfigProvider)->get();
        $env                 = 'test';

        $GLOBALS['connection'] = DriverManager::getConnection([
            'dbname'   => $config['db'][$env]['database'],
            'user'     => $config['db'][$env]['username'],
            'password' => $config['db'][$env]['password'],
            'host'     => $config['db'][$env]['servername'],
            'driver'   => $config['db'][$env]['driver'],
        ]);
    }
}
