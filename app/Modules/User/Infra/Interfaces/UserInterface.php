<?php

namespace App\Modules\User\Infra\Interfaces;

use App\Shared\Infra\Interfaces\ModelInterface;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface UserInterface extends ModelInterface
{
    public function posts(): HasMany;

    public function roles(): BelongsToMany;
}
