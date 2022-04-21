<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Routing\Console\MiddlewareMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeMiddlewareCommand extends MiddlewareMakeCommand
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
            return "{$rootNamespace}\Modules\\{$module}\\Api\Http\Middleware";
        }

        return "{$rootNamespace}\Shared\Api\Http\Middleware";
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
