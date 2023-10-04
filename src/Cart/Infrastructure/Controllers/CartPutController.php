<?php

declare(strict_types = 1);

namespace Src\Cart\Infrastructure\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Cart\Application\Request\UpdateCartRequest;
use Src\Cart\Application\UseCases\UpdateCart;

use Symfony\Component\HttpFoundation\JsonResponse;

final class CartPutController
{
    public function __construct(private UpdateCart $update)
    {}

    public function update(string $uuid, Request $request): JsonResponse
    {
        $request = $this->mapper($request);
        ($this->update)($uuid, $request);
        return response()->json('Cart updated');
    }

    private function mapper(Request $request): UpdateCartRequest
    {
        return new UpdateCartRequest(
			Auth::user()->uuid,
			$request->get('status'),
        );
    }
}
