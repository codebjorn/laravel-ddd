<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Foundation\Console\ListenerMakeCommand;
use Symfony\Component\Console\Input\InputOption;

class MakeListenerCommand extends ListenerMakeCommand
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
            return "{$rootNamespace}\Modules\\{$module}\\App\Listeners";
        }

        return "{$rootNamespace}\Shared\App\Listeners";
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        return [
            ['module', null, InputOption::VALUE_REQUIRED, 'Module location for listeners'],
            ['event', 'e', InputOption::VALUE_OPTIONAL, 'The event class being listened for'],
            ['queued', null, InputOption::VALUE_NONE, 'Indicates the event listener should be queued'],
        ];
    }
}
