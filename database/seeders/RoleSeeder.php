<?php

namespace Database\Seeders;

use Database\Factories\RoleFactory;
use Database\Seeders\Abstracts\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleSeeder extends Seeder
{
    protected string|Factory $factory = RoleFactory::class;

    public function run(): void
    {
        $this->create(6);
    }
}
