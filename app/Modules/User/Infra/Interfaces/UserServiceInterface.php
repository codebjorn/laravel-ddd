<?php

namespace App\Modules\User\Infra\Interfaces;

use App\Modules\User\Infra\Data\UserData;
use App\Shared\Infra\Interfaces\AppServiceInterface;

interface UserServiceInterface extends AppServiceInterface
{
    public function save(UserData $userData): void;

    public function update(string $id, UserData $userData): void;
}
