<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Database\Seeders\Abstracts\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSeeder extends Seeder
{
    protected string|Factory $factory = UserFactory::class;

    public function run(): void
    {
        $this->create(5);
    }
}
