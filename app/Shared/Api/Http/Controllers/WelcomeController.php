<?php
declare(strict_types=1);

namespace App\Shared\Api\Http\Controllers;

use App\Shared\Api\Abstracts\RestController;
use JetBrains\PhpStorm\ArrayShape;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix('api')]
class WelcomeController extends RestController
{
    #[ArrayShape(['data' => "string"])]
    #[Get('/')]
    public function get(): array
    {
        return ['data' => 'This is welcome endpoint, cool'];
    }
}
