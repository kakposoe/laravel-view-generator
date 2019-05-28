# Laravel View Generator

[![Build Status](https://travis-ci.org/kakposoe/laravel-view-generator.svg?branch=master)](https://travis-ci.org/kakposoe/laravel-view-generator)
[![styleci](https://github.styleci.io/repos/189003998/shield](https://styleci.io/repos/CHANGEME)

## Installation

Install via composer
```bash
composer require kakposoe/laravel-view-generator
```

### Register Service Provider

**Note! This and next step are optional if you use laravel>=5.5 with package
auto discovery feature.**

Add service provider to `config/app.php` in `providers` section
```php
Kakposoe\LaravelViewGenerator\LaravelViewGeneratorServiceProvider::class,
```

### Register Facade

Register package facade in `config/app.php` in `aliases` section
```php
Kakposoe\LaravelViewGenerator\Facades\LaravelViewGenerator::class,
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="Kakposoe\LaravelViewGenerator\LaravelViewGeneratorServiceProvider" --tag="config"
```

## Credits

- [](https://github.com/kakposoe/laravel-view-generator)
- [All contributors](https://github.com/kakposoe/laravel-view-generator/graphs/contributors)
