# Nova Environment Editor Card

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marianvlad/nova-env-card.svg?style=flat-square)](https://packagist.org/packages/marianvlad/nova-env-card)
[![Total Downloads](https://img.shields.io/packagist/dt/marianvlad/nova-env-card.svg?style=flat-square)](https://packagist.org/packages/marianvlad/nova-env-card)

Edit Environment file inside a modal.

![nova-env-card](https://i.imgur.com/qBu3CaE.png)
![nova-env-card](https://i.imgur.com/bqD2qK1.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require marianvlad/nova-env-card
```

Next up, you must register the card Nova. This is typically done in the `cards` method of the `NovaServiceProvider`.

```php
// in app/Providers/NovaServiceProvider.php

// ...

public function cards()
{
    return [
        // ...
        new \Marianvlad\NovaEnvCard\NovaEnvCard,
    ];
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.