<?php

namespace Kakposoe\LaravelViewGenerator\Tests;

use Kakposoe\LaravelViewGenerator\Facades\LaravelViewGenerator;
use Kakposoe\LaravelViewGenerator\LaravelViewGeneratorServiceProvider as ServiceProvider;
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

    /** @test */
    public function can_create_view_file()
    {
        $this->refreshViewsDirectory();

        $this->artisan('make:view index')->assertExitCode(0);

        $this->assertTrue(file_exists(getcwd() . '/resources/views/index.blade.php'));
    }

    /** @test */
    public function can_create_view_file_in_folder()
    {
        $this->refreshViewsDirectory();

        $this->artisan('make:view admin.index')->assertExitCode(0);

        $this->assertTrue(file_exists(getcwd() . '/resources/views/admin/index.blade.php'));
    }

    /** @test */
    public function can_create_view_file_with_layout_extension()
    {
        $this->refreshViewsDirectory();

        $this->artisan('make:view admin.index --layout=admin')
            ->expectsQuestion('Layouts folder does not exist, create?', 'yes')
            ->expectsQuestion('Layout file does not exist, create?', 'yes')
            ->assertExitCode(0);

        $this->assertTrue(file_exists(getcwd() . '/resources/views/layouts/admin.blade.php'));

        $this->assertTrue(file_exists(getcwd() . '/resources/views/admin/index.blade.php'));

        $this->assertContains("@extends('layouts.admin')", file_get_contents(getcwd() . '/resources/views/admin/index.blade.php'));
    }

    /** @test */
    public function can_create_view_can_have_sections()
    {
        $this->refreshViewsDirectory();

        $this->artisan('make:view index --section=content --section=styles')
            ->assertExitCode(0);

        $this->assertTrue(file_exists(getcwd() . '/resources/views/index.blade.php'));

        foreach (['content', 'styles'] as $section) {
            $this->assertContains("@section({$section})", file_get_contents(getcwd() . '/resources/views/index.blade.php'));
        }
    }

    protected function refreshViewsDirectory()
    {
        $viewsDir = getcwd() . '/resources/views';
    
        $this->rmdirRecursive($viewsDir);

        mkdir($viewsDir);
    }



    protected function rmdirRecursive($dir)
    {
        foreach(scandir($dir) as $file) {
            if ('.' === $file || '..' === $file) continue;
            if (is_dir("$dir/$file")) $this->rmdirRecursive("$dir/$file");
            else unlink("$dir/$file");
        }
        rmdir($dir);
    }
}
