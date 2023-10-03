<?php

declare(strict_types=1);

namespace Src\Auth\Infrastructure\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Auth\Application\Request\LoginRequest;
use Src\User\Infrastructure\Persistence\ORM\UserORMModel;
use Symfony\Component\HttpFoundation\Response;

final class AuthPostController
{
    public function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function login(Request $request): JsonResponse
    {
        $loginRequest = new LoginRequest(
            $request->get('email'),
            $request->get('password')
        );

        $token = auth()->attempt(['email' => $loginRequest->email(), 'password' => $loginRequest->password()]);

        if (!$token) {
            return response()->json('cannot login, email or password are wrong', Response::HTTP_UNAUTHORIZED);
        }
        return response()->json(
            [
                'token'      => $token,
                'user'       => Auth::user(),
                'token_type' => 'bearer'
            ]
        );
    }

    /**
     * @throws Exception
     */
    public function register(Request $request): JsonResponse
    {
        $input             = $request->all();
        $input['password'] = bcrypt('password');

        (new UserORMModel)->create($input);

        return response()->json(['The user has been created']);

    }

    public function logout(): JsonResponse
    {
        Auth::logout();
        return response()->json('logout successfully');
    }
}
