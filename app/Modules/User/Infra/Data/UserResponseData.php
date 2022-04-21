<?php
declare(strict_types=1);

namespace App\Modules\User\Infra\Data;

use App\Modules\User\Domain\Models\User;
use Spatie\LaravelData\Data;

final class UserResponseData extends Data
{

    public function __construct(
        public int    $id,
        public string $name,
        public string $email,
        public array  $roles
    )
    {
    }

    public static function fromModel(User $user): self
    {
        return new self(
            id: $user->getId(),
            name: $user->getName(),
            email: $user->getEmail()->get(),
            roles: $user->roles()->get(['id', 'name'])->makeHidden('pivot')->toArray()
        );
    }
}
