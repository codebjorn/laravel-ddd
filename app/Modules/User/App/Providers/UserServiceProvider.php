<?php
declare(strict_types=1);

namespace App\Modules\User\App\Providers;

use App\Modules\User\App\Services\UserService;
use App\Modules\User\Domain\Models\User;
use App\Modules\User\Domain\Repositories\UserRepository;
use App\Modules\User\Infra\Data\UserData;
use App\Modules\User\Infra\Interfaces\UserInterface;
use App\Modules\User\Infra\Interfaces\UserRepositoryInterface;
use App\Modules\User\Infra\Interfaces\UserServiceInterface;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserInterface::class, User::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);

        $this->app->bind(UserData::class, function (Application $app) {
            return UserData::fromRequest($app->make(Request::class));
        });

    }

    public function boot(): void
    {
        //
    }
}
