<?php

declare(strict_types = 1);

namespace Src\User\Infrastructure\Controllers;

use Src\User\Application\Request\UpdateUserRequest;
use Src\User\Application\UseCases\UpdateUser;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class UserPutController
{
    public function __construct(private UpdateUser $update)
    {}

    public function update(string $id, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($id, $request);
        return response()->json('', $id);
    }

    private function mapper(Request $request): UpdateUserRequest
    {

        return new UpdateUserRequest(
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
