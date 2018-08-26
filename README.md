# Nova Environment Editor Card

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marianvlad/nova-env-card.svg?style=flat-square)](https://packagist.org/packages/marianvlad/nova-env-card)
[![Total Downloads](https://img.shields.io/packagist/dt/marianvlad/nova-env-card.svg?style=flat-square)](https://packagist.org/packages/marianvlad/nova-env-card)

Edit Environment file inside a modal.

<p float="left">
  <img src="https://i.imgur.com/qBu3CaE.png" width="40%" />
  <img src="https://i.imgur.com/sP9YTxF.png" width="40%" /> 
</p>

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
        (new \Marianvlad\NovaEnvCard\NovaEnvCard)->canSee(function ($request) {
        	return $request->user()->role == 'admin';
        })
    ];
}
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.