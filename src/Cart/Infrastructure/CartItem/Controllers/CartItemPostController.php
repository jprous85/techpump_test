<?php

declare(strict_types=1);


namespace Src\Cart\Infrastructure\CartItem\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Src\Cart\Application\Cart\Request\CreateCartRequest;
use Src\Cart\Application\Cart\Request\UserUuidCartRequest;
use Src\Cart\Application\Cart\UseCases\CartDeleteStrategy;
use Src\Cart\Application\CartItem\Request\CreateCartItemRequest;
use Src\Cart\Application\CartItem\Request\ProductUuidRequest;
use Src\Cart\Application\CartItem\UseCases\CartItemDeleteStrategy;
use Src\Cart\Application\CartItem\UseCases\CartItemIncludeStrategy;
use Src\Cart\Domain\Cart\CartConstants;

final class CartItemPostController
{
    public function __construct(
        private CartItemIncludeStrategy $cartItemIncludeStrategy,
        private CartItemDeleteStrategy $cartItemDeleteStrategy,
        private CartDeleteStrategy $cartDeleteStrategy
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

        ($this->cartItemIncludeStrategy)($cartRequest, $createCartItemRequest);
        return response()->json('Product included');
    }

    /**
     * @throws \Exception
     */
    public function deleteProduct(Request $request): JsonResponse
    {
        $userUuidCartRequest = new UserUuidCartRequest(Auth::user()->uuid);
        $productUuidRequest = new ProductUuidRequest($request->get('product_uuid'));

        ($this->cartItemDeleteStrategy)($userUuidCartRequest, $productUuidRequest);
        ($this->cartDeleteStrategy)($userUuidCartRequest);

        return response()->json('Product deleted');
    }
}
