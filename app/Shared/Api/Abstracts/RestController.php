<?php
declare(strict_types=1);

namespace App\Shared\Api\Abstracts;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class RestController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
