# Laravel View Generator

[![Build Status](https://travis-ci.org/kakposoe/laravel-view-generator.svg?branch=master)](https://travis-ci.org/kakposoe/laravel-view-generator)
[![StyleCI](https://styleci.io/repos/189003998/shield?branch=master)](https://styleci.io/repos/189003998)

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
