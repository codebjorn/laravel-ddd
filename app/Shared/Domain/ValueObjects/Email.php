<?php
declare(strict_types=1);

namespace App\Shared\Domain\ValueObjects;

use App\Shared\Infra\Exceptions\InvalidValueException;
use App\Shared\Infra\Interfaces\ValueObjectInterface;

class Email implements ValueObjectInterface
{
    private string $value;

    /**
     * @throws InvalidValueException
     */
    public function __construct(string $value)
    {
        try {
            $this->validate($value);
        } catch (InvalidValueException $e) {
            throw new InvalidValueException("Value is not a valid email address", 999, $e);
        }

        $this->value = $value;
    }

    public function get(): string
    {
        return $this->value;
    }

    /**
     * @throws InvalidValueException
     */
    public function validate(mixed $value): bool
    {
        if (false === filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidValueException;
        }
        return true;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
