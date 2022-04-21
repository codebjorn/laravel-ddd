<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Foundation\Console\CastMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeCastCommand extends CastMakeCommand
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
            return "{$rootNamespace}\Modules\\{$module}\\Domain\Casts";
        }

        return "{$rootNamespace}\Shared\Domain\Casts";
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['module', null, InputOption::VALUE_REQUIRED, 'Module location for cast'],
            ['inbound', null, InputOption::VALUE_OPTIONAL, 'Generate an inbound cast class'],
        ];
    }
}
