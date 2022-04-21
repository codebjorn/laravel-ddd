<?php

namespace Database\Factories;

use App\Modules\Post\Domain\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class PostFactory extends Factory
{
    protected $model = Post::class;

    #[ArrayShape(['title' => "string", 'content' => "string", 'author' => "int"])]
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(80),
            'content' => $this->faker->realText(420),
            'author' => rand(1, 5)
        ];
    }
}
