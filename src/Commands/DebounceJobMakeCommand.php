<?php

namespace Zackaj\LaravelDebounce\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\JobMakeCommand;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:debounce-job')]
class DebounceJobMakeCommand extends JobMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:debounce-job';

    /**
     * Create a new command instance.
     *
     * Laravel 12+ parent commands define a `$signature` which takes precedence over
     * `$name`, so the name must be set explicitly after construction.
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct($files);

        $this->setName('make:debounce-job');
    }

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new debounce job class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->option('sync')
                        ? $this->resolveStubPath('/stubs/debounceJob.stub')
                        : $this->resolveStubPath('/stubs/debounceJob.queued.stub');
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param  string  $stub
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return __DIR__.$stub;
    }
}
