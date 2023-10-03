<?php

declare(strict_types=1);

namespace Src\User\Infrastructure\Controllers;

use Src\User\Application\Request\ShowUserRequest;
use Src\User\Application\UseCases\ShowAllUser;
use Src\User\Application\UseCases\ShowUser;

use Symfony\Component\HttpFoundation\JsonResponse;

final class UserGetController
{
    public function __construct(
        private ShowUser $show_user,
        private ShowAllUser $show_all_user
    ) {
    }

    public function show(string $id): JsonResponse
    {
        $request = new ShowUserRequest($id);
        return response()->json(($this->show_user)($request)->toArray());
    }

    public function read(): JsonResponse
    {
        return response()->json(($this->show_all_user)()->toArray());
    }
}
