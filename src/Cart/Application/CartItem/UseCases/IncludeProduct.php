<?php

declare(strict_types=1);


namespace Src\Cart\Application\CartItem\UseCases;


use Exception;
use Src\Cart\Application\CartItem\Request\CreateCartItemRequest;
use Src\Cart\Domain\CartItem\CartItem;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemAmountVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemProductUuidVO;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemUuidVO;

final class IncludeProduct
{
    public function __construct(
        private CartItemRepository $cartItemRepository
    )
    {
    }

    /**
     * @throws Exception
     */
    public function __invoke(CreateCartItemRequest $createCartItemRequest): void
    {
        $cartItem = CartItem::create(
            new CartItemUuidVO($createCartItemRequest->getUuid()),
            new CartItemCartUuidVO($createCartItemRequest->getCartUuid()),
            new CartItemProductUuidVO($createCartItemRequest->getProductUuid()),
            new CartItemAmountVO($createCartItemRequest->getAmount())
        );

        $this->cartItemRepository->includeProductOfCartItem($cartItem);
    }
}
