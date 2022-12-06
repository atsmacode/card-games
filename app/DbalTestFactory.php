<?php

namespace Atsmacode\CardGames;

use Atsmacode\CardGames\CardGamesConfigProvider;
use Atsmacode\Framework\Database\DbalConnection;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class DbalTestFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, ?array $options = null)
    {
        $configProvider = $container->get(CardGamesConfigProvider::class);
        $config         = $configProvider->get();

        return new DbalConnection($config, 'test');
    }
}
