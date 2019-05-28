# Laravel View Generator

[![Build Status](https://travis-ci.org/kakposoe/laravel-view-generator.svg?branch=master)](https://travis-ci.org/kakposoe/laravel-view-generator)
[![StyleCI](https://styleci.io/repos/189003998/shield?branch=master)](https://styleci.io/repos/189003998)

Laravel View Generator is adds the missing `make:view` command to laravel's commands. You can quickly create new views for your application.

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

# How to use
Creating a view is as simple as running:

```bash
php artisan make:view index
```

This command will create `/resources/views/index.blade.php`


## Create a view inside a folder
You can create a view in a folder by using `dot` notation;

```bash
php artisan make:view admin.index
```

This will create any folders which have not been created already.

## Extending a layout
You can create a view which extends a layout using:

```bash
php artisan make:view index --layout=admin
```

**Note:* *You will be prompted to create a `layouts` folders and the `layout` file if they do not exist.

## Create a view with sections
You can create a new view file with sections:

```bash
php artisan make:view index --section=content --section=styles
```
