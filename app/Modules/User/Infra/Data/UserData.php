<?php
declare(strict_types=1);

namespace App\Modules\User\Infra\Data;

use App\Shared\Domain\ValueObjects\Email;
use App\Shared\Domain\ValueObjects\Password;
use App\Shared\Infra\Exceptions\InvalidValueException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\LaravelData\Data;

final class UserData extends Data
{

    public function __construct(
        public string     $name,
        public Email      $email,
        public Password   $password,
        public Collection $roles,
    )
    {
    }

    /**
     * @throws InvalidValueException
     */
    public static function fromRequest(Request $request): self
    {
        return new self(
            name: $request->get('name'),
            email: new Email($request->get('email')),
            password: new Password($request->get('password')),
            roles: $request->get('roles') ? Collection::make($request->get('roles')) : Collection::make([1])
        );
    }
}
