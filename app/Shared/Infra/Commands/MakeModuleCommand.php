<?php

namespace App\Shared\Infra\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class MakeModuleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}
                                        {--a|all=true : Generate with all layers}
                                        {--with : Generate with one of: controller, model, provider}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new module';

    public function handle(): int
    {
        $moduleName = $this->argument('name');
        $option = $this->option('all') ? 'all' : $this->option('with');

        $this->generate($option, $moduleName);
        $this->info("Module with {$moduleName} name was created.");
        return 0;
    }

    private function generate(string $option, string $moduleName): void
    {
        $callbacks = new Collection([
            'all' => [$this, 'generateModule'],
            'controller' => [$this, 'generateController'],
            'model' => [$this, 'generateModel'],
            'provider' => [$this, 'generateProvider']
        ]);

        if (!$callbacks->has($option)) {
            $this->error('Unable to find provided option, please use option from command');
            return;
        }

        $callback = $callbacks->get($option);
        $callback($moduleName);
    }

    private function generateModule(string $moduleName)
    {
        $this->generateController($moduleName);
        $this->generateModel($moduleName);
        $this->generateProvider($moduleName);
    }

    private function generateController(string $moduleName)
    {
        $this->call('make:controller', ['name' => "{$moduleName}Controller", '--module' => $moduleName, '--api' => true]);
    }

    private function generateModel(string $moduleName)
    {
        $this->call('make:model', ['name' => "{$moduleName}", '--module' => $moduleName]);
    }

    private function generateProvider(string $moduleName)
    {
        $this->call('make:provider', ['name' => "{$moduleName}ServiceProvider", '--module' => $moduleName]);
    }
}
