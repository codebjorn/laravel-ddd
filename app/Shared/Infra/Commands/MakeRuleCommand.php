<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Foundation\Console\RuleMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeRuleCommand extends RuleMakeCommand
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
            return "{$rootNamespace}\Modules\\{$module}\\Api\Http\Rules";
        }

        return "{$rootNamespace}\Shared\Api\Http\Rules";
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
            ['implicit', 'i', InputOption::VALUE_NONE, 'Generate an implicit rule.'],
        ];
    }
}
