<?php
declare(strict_types=1);

namespace App\Shared\Infra\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface AppServiceInterface
{
    public function getAll(): LengthAwarePaginator|Collection;

    public function get(string $id): Model;

    public function delete(string $id): void;
}
