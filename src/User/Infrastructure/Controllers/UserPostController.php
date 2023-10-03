<?php

declare(strict_types = 1);

namespace Src\User\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Src\User\Application\Request\CreateUserRequest;
use Src\User\Application\UseCases\CreateUser;
use Symfony\Component\HttpFoundation\JsonResponse;

final class UserPostController
{
    public function __construct(private CreateUser $create)
    {}

    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->create)($request);
        return response()->json('User created');
    }

    private function mapper(Request $request): CreateUserRequest
    {
        return new CreateUserRequest(
			$request->get('uuid'),
			$request->get('name'),
			$request->get('email'),
			$request->get('email_verified_at'),
			$request->get('password'),
			$request->get('remember_token'),
			$request->get('created_at'),
			$request->get('updated_at'),
        );
    }
}
