<?php

declare(strict_types = 1);

namespace Src\Cart\Infrastructure\Cart\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Src\Cart\Application\Cart\Request\CreateCartRequest;
use Src\Cart\Application\Cart\UseCases\CreateCart;
use Symfony\Component\HttpFoundation\JsonResponse;
use function response;

final class CartPostController
{
    public function __construct(private CreateCart $create)
    {}

    /**
     * @throws \Exception
     */
    public function create(Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->create)($request);
        return response()->json('Cart created');
    }

    private function mapper(Request $request): CreateCartRequest
    {
        return new CreateCartRequest(
			Str::uuid()->toString(),
            Auth::user()->uuid,
            $request->get('status')
        );
    }
}
