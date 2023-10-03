<?php

declare(strict_types = 1);

namespace Src\User\Infrastructure\Controllers;

use Src\User\Application\Request\DeleteUserRequest;
use Src\User\Application\UseCases\DeleteUser;

use Symfony\Component\HttpFoundation\JsonResponse;

final class UserDeleteController
{
    public function __construct(private DeleteUser $delete)
    {}

    public function delete(string $id): JsonResponse
    {
        $request = new DeleteUserRequest($id);
        ($this->delete)($request);
        return response()->json('', $id);
    }
}
