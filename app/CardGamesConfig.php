<?php

namespace Atsmacode\CardGames;

class CardGamesConfig
{
    public function __invoke()
    {
        $dbTest = require($GLOBALS['THE_ROOT'] . 'config/db_card_games_test.php');
        $db     = require($GLOBALS['THE_ROOT'] . 'config/db_card_games.php');

        $dbConfig = [
            'db' => [
                'test' => $dbTest,
                'live' => $db,
            ],
        ];

        return $dbConfig;
    }
}
