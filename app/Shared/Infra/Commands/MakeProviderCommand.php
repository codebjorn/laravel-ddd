<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Foundation\Console\ProviderMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeProviderCommand extends ProviderMakeCommand
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
            return "{$rootNamespace}\Modules\\{$module}\\App\Providers";
        }

        return "{$rootNamespace}\Shared\App\Providers";
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['module', null, InputOption::VALUE_REQUIRED, 'Module location for providers'],
        ];
    }
}
