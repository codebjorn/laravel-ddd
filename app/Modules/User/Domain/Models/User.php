<?php
declare(strict_types=1);

namespace App\Modules\User\Domain\Models;

use App\Modules\Post\Domain\Models\Post;
use App\Modules\Role\Domain\Models\Role;
use App\Modules\User\Domain\Casts\EmailCast;
use App\Modules\User\Domain\Casts\PasswordCast;
use App\Modules\User\Infra\Interfaces\UserInterface;
use App\Shared\Domain\ValueObjects\Email;
use App\Shared\Domain\ValueObjects\Password;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticate implements UserInterface
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email' => EmailCast::class,
        'password' => PasswordCast::class,
        'email_verified_at' => 'datetime',
    ];

    public function getId(): int
    {
        return $this->getAttribute('id');
    }

    public function getName(): string
    {
        return $this->getAttribute('name');
    }

    public function setName(string $name): void
    {
        $this->setAttribute('name', $name);
    }

    public function getEmail(): Email
    {
        return $this->getAttribute('email');
    }

    public function setEmail(Email $email): void
    {
        $this->setAttribute('email', $email);
    }

    public function getPassword(): Password
    {
        return $this->getAttribute('password');
    }

    public function setPassword(Password $password): void
    {
        $this->setAttribute('password', $password);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
