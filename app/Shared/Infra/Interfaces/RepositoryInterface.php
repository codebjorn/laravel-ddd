<?php
declare(strict_types=1);

namespace App\Shared\Infra\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function get(string $id): Model;

    public function paginate(): LengthAwarePaginator;

    public function all(): Collection;

    public function save(array $attributes): void;

    public function update(string $id, array $attributes): void;

    public function delete(string $id): void;
}
