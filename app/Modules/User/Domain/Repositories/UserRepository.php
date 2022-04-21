<?php
declare(strict_types=1);

namespace App\Modules\User\Domain\Repositories;

use App\Modules\User\Domain\Models\User;
use App\Modules\User\Infra\Interfaces\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements UserRepositoryInterface
{
    public function get(string $id): Model
    {
        return User::query()->find($id);
    }

    public function paginate(): LengthAwarePaginator
    {
        return User::query()->paginate();
    }

    public function all(): Collection
    {
        return User::query()->get();
    }

    public function save(array $attributes): void
    {
        $user = new User($attributes);
        $user->save();

        $user->roles()->sync($attributes['roles']);
    }

    public function update(string $id, array $attributes): void
    {
        $user = User::query()->find($id)->fill($attributes);

        if ($attributes['roles']) {
            $user->roles()->sync($attributes['roles']);
        }

        $user->save();
    }

    public function delete(string $id): void
    {
        User::query()
            ->find($id)
            ->delete();
    }

}
