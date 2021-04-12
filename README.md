# signet/ecs

An ECS Signet codestyle package.

## Installation

You can install the package via composer:

```bash
composer require signet/ecs
```

## Usage

Add a `ecs.php` file to the root of your project (if it doesn't exist) with the below contents

`ecs.php`:
```php
<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__ . '/vendor/signet/ecs/signet-ecs.php');

    $services = $containerConfigurator->services();

    // $services->set(...);

    $parameters = $containerConfigurator->parameters();

    $parameters->set(Option::PATHS, [
        __DIR__ . '/src',
        __DIR__ . '/config',
        __DIR__ . '/tests',
        __DIR__ . '/ecs.php',
    ]);
};
```

If you already got an existing ecs.php and you want to use the `signet-ecs` style you can add the following line:

```php
// ...
    $containerConfigurator->import(__DIR__ . '/vendor/signet/ecs/signet-ecs.php');
// ...
```

**NOTE**:  
`signet-ecs` applies the same fixers as the preconfigured ecs `PSR-12` set (see [SetList::PSR_12](https://github.com/symplify/easy-coding-standard/blob/master/src/ValueObject/Set/SetList.php#L19)).

## Links

[Configuration example](https://github.com/symplify/easy-coding-standard#configuration)
