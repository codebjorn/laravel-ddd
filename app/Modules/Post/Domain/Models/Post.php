<?php
declare(strict_types=1);

namespace App\Modules\Post\Domain\Models;

use App\Modules\User\Domain\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasTimestamps;

    protected $fillable = [
        'title',
        'content'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
