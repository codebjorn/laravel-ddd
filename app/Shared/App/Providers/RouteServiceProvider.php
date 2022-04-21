<?php

declare(strict_types=1);

namespace App\Shared\App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\RateLimiter;
use Spatie\RouteAttributes\RouteRegistrar;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    public function boot()
    {
        $this->configureRateLimiting();
        $this->registerRoutes();
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }

    protected function registerRoutes(): void
    {
        if (!$this->shouldRegisterRoutes()) {
            return;
        }

        $routeRegistrar = (new RouteRegistrar(app()->router))
            ->useMiddleware(config('routes.middleware') ?? []);

        collect($this->getRouteDirectories())->each(function (string $directory, string|int $namespace) use ($routeRegistrar) {
            is_string($namespace)
                ? $routeRegistrar
                ->useRootNamespace($namespace)
                ->useBasePath($directory)
                ->registerDirectory($directory)
                : $routeRegistrar
                ->useRootNamespace(app()->getNamespace())
                ->useBasePath(app()->path())
                ->registerDirectory($directory);
        });
    }

    private function shouldRegisterRoutes(): bool
    {
        if (!config('routes.enabled')) {
            return false;
        }

        if ($this->app->routesAreCached()) {
            return false;
        }

        return true;
    }

    private function getRouteDirectories(): array
    {
        $testClassDirectory = __DIR__ . '/../tests/TestClasses';

        return app()->runningUnitTests() && file_exists($testClassDirectory) ? (array)$testClassDirectory : $this->getModulesDirectories();
    }

    private function getModulesDirectories(): array
    {
        $modulesControllers = File::glob('app/Modules/**/Api/Http/Controllers');
        return [...$modulesControllers, 'app/Shared/Api/Http/Controllers'];
    }
}
