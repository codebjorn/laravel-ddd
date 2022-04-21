<?php
declare(strict_types=1);

namespace App\Modules\User\Domain\Casts;

use App\Shared\Domain\ValueObjects\Email;
use App\Shared\Infra\Exceptions\InvalidValueException;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

class EmailCast
{
    /**
     * @throws InvalidValueException
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): null|Email
    {
        if (is_null($value)) {
            return null;
        }

        return new Email($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): Email
    {
        if (!$value instanceof Email) {
            throw new InvalidArgumentException(
                "The given value is not an InvoiceStatus instance",
            );
        }

        return $value;
    }
}
