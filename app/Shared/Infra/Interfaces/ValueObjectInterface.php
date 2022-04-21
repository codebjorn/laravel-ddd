<?php
declare(strict_types=1);

namespace App\Shared\Infra\Interfaces;

use App\Shared\Infra\Exceptions\InvalidValueException;

interface ValueObjectInterface
{

    public function get();

    public function validate(mixed $value): bool;

    public function __toString(): string;
}
