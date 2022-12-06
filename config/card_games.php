<?php

return [
    'card_games' => [
        'db' => [
            'live' => [
                'servername' => 'localhost',
                'username'   => 'root',
                'password'   => 'PASSWORD',
                'database'   => 'card_games',
                'driver'     => 'pdo_mysql',
            ],
            'test' => [
                'servername' => 'localhost',
                'username'   => 'root',
                'password'   => 'PASSWORD',
                'database'   => 'card_games_test',
                'driver'     => 'pdo_mysql',
            ],
        ],
    ],
];
