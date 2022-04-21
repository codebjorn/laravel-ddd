<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Foundation\Console\ScopeMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeScopeCommand extends ScopeMakeCommand
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
            return "{$rootNamespace}\Modules\\{$module}\\Domain\Scopes";
        }

        return "{$rootNamespace}\Shared\Domain\Scopes";
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['module', null, InputOption::VALUE_REQUIRED, 'Module location for middleware'],
        ];
    }
}
