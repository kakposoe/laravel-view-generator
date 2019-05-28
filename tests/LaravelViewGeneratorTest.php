<?php

namespace Kakposoe\LaravelViewGenerator\Tests;

use Kakposoe\LaravelViewGenerator\Facades\LaravelViewGenerator;
use Kakposoe\LaravelViewGenerator\ServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelViewGeneratorTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'laravel-view-generator' => LaravelViewGenerator::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
