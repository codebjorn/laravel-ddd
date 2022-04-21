<?php

namespace Database\Factories;

use App\Modules\Role\Domain\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\ArrayShape;

class RoleFactory extends Factory
{
    protected $model = Role::class;

    #[ArrayShape(['name' => "string", 'description' => "string"])]
    public function definition(): array
    {
        return [
            'name' => Arr::random(['Admin', 'Author', 'User']),
            'description' => 'Generic description for role',
        ];
    }
}
