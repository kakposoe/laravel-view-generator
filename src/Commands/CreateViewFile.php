<?php

namespace Kakposoe\LaravelViewGenerator\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class CreateViewFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {path} {--layout=} {--section=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view file';

    /** @var string */
    protected $viewsDir;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        [$baseDir, $fileName] = $this->getPaths();

        $this->createDirectory($baseDir);

        if (! $this->createFile($baseDir.$fileName)) {
            return;
        }

        $this->line('View file completed');
    }

    protected function getPaths()
    {
        $this->viewsDir = getcwd().'/resources/views';

        $paths = explode('.', $this->argument('path'));

        $fileName = $paths[count($paths) - 1];

        if (strpos($fileName, '.blade.php') == false) {
            $fileName .= '.blade.php';
        }

        unset($paths[count($paths) - 1]);

        $basePath = $this->viewsDir.'/'.implode('/', $paths);

        return [Str::finish($basePath, '/'), $fileName];
    }

    protected function createDirectory($baseDir)
    {
        if (! file_exists($baseDir)) {
            mkdir($baseDir, 0777, true);
        }
    }

    protected function createFile($filePath)
    {
        if ($this->option('layout')) {
            $this->layouts();
        }

        if (file_exists($filePath)) {
            $this->warn('File already exists.');

            return false;
        }

        file_put_contents($filePath, $this->getContent());

        $this->info('File created: '.$filePath);
    }

    protected function layouts()
    {
        $layoutsPath = $this->viewsDir.'/layouts/';

        if (! file_exists($layoutsPath)) {
            if ($this->confirm('Layouts folder does not exist, create?')) {
                mkdir($layoutsPath, 0777);
            }
        }

        $path = $layoutsPath.str_replace('.', '/', $this->option('layout')).'.blade.php';

        if (! file_exists($path)) {
            if ($this->confirm('Layout file does not exist, create?')) {
                file_put_contents($path, '');
            }
        }
    }

    protected function getContent()
    {
        $content = '';

        if ($this->option('layout')) {
            $template = file_get_contents(__DIR__.'/../Templates/layout.php');
            $content .= preg_replace('/\{\{([\s]?\$layout)[\s]?\}\}/', $this->option('layout'), $template);
        }

        if (! empty($this->option('section'))) {
            $template = file_get_contents(__DIR__.'/../Templates/section.php');

            collect($this->option('section'))->each(function ($value, $key) use ($template, &$content) {
                $content .= preg_replace('/\{\{([\s]?\$section)[\s]?\}\}/', $value, $template);
            });
        }

        return $content;
    }
}
