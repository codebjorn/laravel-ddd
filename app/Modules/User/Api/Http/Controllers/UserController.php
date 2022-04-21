<?php
declare(strict_types=1);

namespace App\Modules\User\Api\Http\Controllers;

use App\Modules\User\Infra\Data\UserData;
use App\Modules\User\Infra\Data\UserResponseData;
use App\Modules\User\Infra\Interfaces\UserServiceInterface;
use App\Shared\Api\Abstracts\RestController;
use App\Shared\Infra\Data\ResponseData;
use App\Shared\Infra\Exceptions\InvalidValueException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Laravel\Octane\Exceptions\DdException;
use Spatie\RouteAttributes\Attributes\Delete;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Prefix;
use Spatie\RouteAttributes\Attributes\Put;
use Symfony\Component\HttpFoundation\Response;

#[Prefix('api/users')]
class UserController extends RestController
{
    public function __construct(private UserServiceInterface $service, private JsonResponse $response)
    {
    }


    #[Get('')]
    public function index(): JsonResponse
    {
        $allUsers = $this->service->getAll();
        return $this->response
            ->setData(UserResponseData::collection($allUsers))
            ->setStatusCode(Response::HTTP_OK);
    }

    #[Post('')]
    public function store(UserData $userData): JsonResponse
    {
        $this->service->save($userData);

        return $this->response
            ->setData(ResponseData::toSuccessResponse())
            ->setStatusCode(Response::HTTP_CREATED);
    }

    #[Get('/{id}')]
    public function show(string $id): JsonResponse
    {
        $user = $this->service->get($id);

        return $this->response
            ->setData(UserResponseData::fromModel($user))
            ->setStatusCode(Response::HTTP_OK);
    }

    #[Put('/{id}')]
    public function update(UserData $userData, string $id): JsonResponse
    {

        $this->service->update($id, $userData);

        return $this->response
            ->setData(ResponseData::toSuccessResponse())
            ->setStatusCode(Response::HTTP_OK);
    }

    #[Delete('/{id}')]
    public function destroy(string $id): JsonResponse
    {
        $this->service->delete($id);

        return $this->response
            ->setData(ResponseData::toSuccessResponse())
            ->setStatusCode(Response::HTTP_OK);
    }
}
