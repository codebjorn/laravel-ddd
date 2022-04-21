<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Foundation\Console\ObserverMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeObserverCommand extends ObserverMakeCommand
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
            return "{$rootNamespace}\Modules\\{$module}\\Infra\Observers";
        }

        return "{$rootNamespace}\Shared\Infra\Observers";
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['module', null, InputOption::VALUE_REQUIRED, 'Module location for observer'],
            ['model', 'm', InputOption::VALUE_OPTIONAL, 'The model that the observer applies to.'],
        ];
    }
}
