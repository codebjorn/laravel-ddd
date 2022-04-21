<?php
declare(strict_types=1);

namespace App\Shared\Infra\Interfaces;

interface  ModelInterface
{
    public static function all(array $columns = ['*']);

    public function fill(array $attributes);

    public function save(array $options = []);

}
