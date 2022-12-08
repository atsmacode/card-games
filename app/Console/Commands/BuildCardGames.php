<?php

namespace Atsmacode\CardGames\Console\Commands;

use Atsmacode\CardGames\Database\Migrations\CreateCards;
use Atsmacode\CardGames\Database\Seeders\SeedCards;
use Atsmacode\Framework\Console\Commands\Migrator;

#[AsCommand(
    name: 'app:build-card-games',
    description: 'Populate the DB with all resources',
    hidden: false,
    aliases: ['app:build-card-games']
)]

class BuildCardGames extends Migrator
{
    protected array $buildClasses = [
        CreateCards::class,
        SeedCards::class
    ];
    protected static $defaultName = 'app:build-card-games';
}
