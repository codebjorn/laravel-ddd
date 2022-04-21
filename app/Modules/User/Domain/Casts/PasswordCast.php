<?php
declare(strict_types=1);

namespace App\Modules\User\Domain\Casts;

use App\Shared\Domain\ValueObjects\Password;
use App\Shared\Infra\Exceptions\InvalidValueException;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class PasswordCast
{
    /**
     * @throws InvalidValueException
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): null|Password
    {
        if (is_null($value)) {
            return null;
        }

        return new Password($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): Password
    {
        if (!$value instanceof Password) {
            throw new InvalidArgumentException(
                "The given value is not an InvoiceStatus instance",
            );
        }

        return $value;
    }
}
