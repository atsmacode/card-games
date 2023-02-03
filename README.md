# Environment

## PHP

8.1.3

## MySQL

8.0.13 | 5.7.33

## Vue.Js

^3.2.39

## Node.Js

18.12.1

# Commands

## Linux
Run the unit test suite:

> dev/phpunit

Drop, Create and Seed all tables. '-d true' is required to run this in test DB:

> php dev/CardGamesApp.php app:build-card-games -d true

## Windows
Run the unit test suite:

> .\dev\runtests.bat

Drop, Create and Seed all tables. '-d true' is required to run this in test DB

> php .\dev\CardGamesApp.php app:build-card-games -d true

# Configs

You need to add card_games.php to configure your local DB credentials, like so:

```
<?php

return [
    'card_games' => [
        'db' => [
            'live' => [
                'servername' => 'localhost',
                'username'   => 'DB_USER',
                'password'   => 'DB_PASSWORD',
                'database'   => 'card_games',
                'driver'     => 'pdo_mysql',
            ],
            'test' => [
                'servername' => 'localhost',
                'username'   => 'DB_USER',
                'password'   => 'DB_PASSWORD',
                'database'   => 'card_games_test',
                'driver'     => 'pdo_mysql',
            ],
        ],
    ],
];

```
