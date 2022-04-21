<?php

namespace Database\Seeders\Abstracts;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder as BaseSeeder;

abstract class Seeder extends BaseSeeder
{
    protected string|Factory $factory;

    protected function create(int $count)
    {
        $this->factory::guessFactoryNamesUsing(fn(string $model_name) => "Database\\Factories\\{$model_name}\\Factory");
        $this->factory::new()->count($count)->create();
    }
}
