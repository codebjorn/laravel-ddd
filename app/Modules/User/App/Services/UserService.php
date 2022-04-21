<?php
declare(strict_types=1);

namespace App\Modules\User\App\Services;

use App\Modules\User\Infra\Data\UserData;
use App\Modules\User\Infra\Interfaces\UserRepositoryInterface;
use App\Modules\User\Infra\Interfaces\UserServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $repository)
    {
    }

    public function getAll(): LengthAwarePaginator|Collection
    {
        return $this->repository->paginate();
    }

    public function get(string $id): Model
    {
        return $this->repository->get($id);
    }

    public function save(UserData $userData): void
    {
        $this->repository->save($userData->toArray());
    }

    public function update(string $id, UserData $userData): void
    {
        $this->repository->update($id, $userData->toArray());
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

}
