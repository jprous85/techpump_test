<?php

declare(strict_types=1);


namespace Src\Cart\Infrastructure\CartItem\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Src\Cart\Application\Cart\Request\CreateCartRequest;
use Src\Cart\Application\CartItem\Request\CreateCartItemRequest;
use Src\Cart\Application\CartItem\UseCases\CartItemStrategy;
use Src\Cart\Domain\Cart\CartConstants;

final class CartItemPostController
{
    public function __construct(
        private CartItemStrategy $cartItemStrategy
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function includeProduct(Request $request): JsonResponse
    {
        $cartRequest = new CreateCartRequest(
            Str::uuid()->toString(),
            Auth::user()->uuid,
            CartConstants::DRAFT
        );

        $createCartItemRequest = new CreateCartItemRequest(
            Str::uuid()->toString(),
            $cartRequest->getUuid(),
            $request->get('product_uuid'),
            1
        );

        ($this->cartItemStrategy)($cartRequest, $createCartItemRequest);

        return response()->json('Product included');
    }
}
