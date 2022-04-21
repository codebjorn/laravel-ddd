<?php
declare(strict_types=1);

namespace App\Shared\Infra\Data;

use Spatie\LaravelData\Data;

final class ResponseData extends Data
{

    public function __construct(
        public array $data
    )
    {
    }

    public static function toSuccessResponse(): self
    {
        return new self(
            data: ['message' => 'Actions performed successfully'],
        );
    }
}
