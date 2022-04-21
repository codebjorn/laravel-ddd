<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Foundation\Console\JobMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeJobCommand extends JobMakeCommand
{
    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $module = $this->option('module');

        if ($module) {
            return "{$rootNamespace}\Modules\\{$module}\\Infra\Jobs";
        }

        return "{$rootNamespace}\Shared\Infra\Jobs";
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['module', null, InputOption::VALUE_REQUIRED, 'Module location for jobs'],
            ['sync', null, InputOption::VALUE_NONE, 'Indicates that job should be synchronous'],
        ];
    }
}
