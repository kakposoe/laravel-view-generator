# Laravel View Generator

[![Build Status](https://travis-ci.org/kakposoe/laravel-view-generator.svg?branch=master)](https://travis-ci.org/kakposoe/laravel-view-generator)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kakposoe/laravel-view-generator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kakposoe/laravel-view-generator/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/CHANGEME/mini.png)](https://insight.sensiolabs.com/projects/CHANGEME)
[![Coverage Status](https://coveralls.io/repos/github/kakposoe/laravel-view-generator/badge.svg?branch=master)](https://coveralls.io/github/kakposoe/laravel-view-generator?branch=master)

[![Packagist](https://img.shields.io/packagist/v/kakposoe/laravel-view-generator.svg)](https://packagist.org/packages/kakposoe/laravel-view-generator)
[![Packagist](https://poser.pugx.org/kakposoe/laravel-view-generator/d/total.svg)](https://packagist.org/packages/kakposoe/laravel-view-generator)
[![Packagist](https://img.shields.io/packagist/l/kakposoe/laravel-view-generator.svg)](https://packagist.org/packages/kakposoe/laravel-view-generator)

Package description: CHANGE ME

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
Kakposoe\LaravelViewGenerator\ServiceProvider::class,
```

### Register Facade

Register package facade in `config/app.php` in `aliases` section
```php
Kakposoe\LaravelViewGenerator\Facades\LaravelViewGenerator::class,
```

### Publish Configuration File

```bash
php artisan vendor:publish --provider="Kakposoe\LaravelViewGenerator\ServiceProvider" --tag="config"
```

## Usage

CHANGE ME

## Security

If you discover any security related issues, please email 
instead of using the issue tracker.

## Credits

- [](https://github.com/kakposoe/laravel-view-generator)
- [All contributors](https://github.com/kakposoe/laravel-view-generator/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
