<?php

declare(strict_types = 1);

namespace Src\Cart\Infrastructure\Cart\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\Cart\Application\Cart\Request\UpdateCartRequest;
use Src\Cart\Application\Cart\UseCases\UpdateCart;
use Symfony\Component\HttpFoundation\JsonResponse;
use function response;

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
