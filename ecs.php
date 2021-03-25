<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/signet-ecs.php');

    $containerConfigurator
        ->parameters()
        ->set(Option::PATHS, [
            __DIR__ . '/ecs.php',
            __DIR__ . '/signet-ecs.php',
        ]);
};
