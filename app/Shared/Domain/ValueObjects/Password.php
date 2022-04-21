<?php
declare(strict_types=1);

namespace App\Shared\Domain\ValueObjects;

use App\Shared\Infra\Exceptions\InvalidValueException;
use App\Shared\Infra\Interfaces\ValueObjectInterface;

class Password implements ValueObjectInterface
{

    private string $value;

    /**
     * @throws InvalidValueException
     */
    public function __construct($value)
    {
        try {
            $this->validate($value);
        } catch (InvalidValueException $e) {
            throw new InvalidValueException("Value cannot be used as a password", 999, $e);
        }
        $this->value = $this->hash($value);
    }

    /**
     * @throws InvalidValueException
     */
    public function validate(mixed $value): bool
    {
        if (false === is_string($value)) {
            throw new InvalidValueException;
        }
        return true;
    }

    public function verify(Password $pass, $string, $opts = []): bool
    {
        return password_verify($string, $pass);
    }

    public function hash($string): string
    {
        return password_hash($string, PASSWORD_DEFAULT);
    }

    public function get(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
