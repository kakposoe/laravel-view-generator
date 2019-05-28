<?php

namespace Kakposoe\LaravelViewGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelViewGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-view-generator';
    }
}
