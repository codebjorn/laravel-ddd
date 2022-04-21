<?php

namespace Database\Seeders;

use Database\Factories\PostFactory;
use Database\Seeders\Abstracts\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostSeeder extends Seeder
{
    protected string|Factory $factory = PostFactory::class;

    public function run(): void
    {
        $this->create(5);
    }
}
