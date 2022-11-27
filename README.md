# Environment

## PHP

8.1.3

## MySQL

8.0.13

## Vue.Js

^3.2.39

## Node.Js

18.12.1

# Commands

## Linux
Run the unit test suite:

>dev/phpunit

Drop, Create and Seed all tables. '-d true' is required to run this in test DB:

> php dev/SymfonyApplication.php app:build-env -d true

## Windows
Run the unit test suite:

>.\dev\runtests.bat

Drop, Create and Seed all tables. '-d true' is required to run this in test DB

> php .\dev\SymfonyApplication.php app:build-env -d true

# Configs

You need to add db.php and db-test.php to configure your local DB credentials, like so:

```
<?php

return [
    'servername' => "localhost",
    'username' => "DB_USER",
    'password' => "DB_PASSWORD",
    'database' => "card_game_test"
];
```
