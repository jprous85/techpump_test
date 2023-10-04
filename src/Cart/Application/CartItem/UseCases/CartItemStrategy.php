<?php

declare(strict_types=1);


namespace Src\Cart\Application\CartItem\UseCases;


use Src\Cart\Application\Cart\Request\CreateCartRequest;
use Src\Cart\Application\Cart\UseCases\CreateCart;
use Src\Cart\Application\CartItem\Request\CreateCartItemRequest;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;

final class CartItemStrategy
{
    public function __construct(
        private CreateCart $createCart,
        private IncludeProduct $includeProduct,
        private CartRepository $cartRepository
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function __invoke(CreateCartRequest $createCartRequest, CreateCartItemRequest $createCartItemRequest)
    {
        $cart = $this->cartRepository->getCartByUser(
            new CartUserUuidVO($createCartRequest->getUserUuid())
        );

        if (!$cart) {
            ($this->createCart)($createCartRequest);
        } else {
            $createCartItemRequest = new CreateCartItemRequest(
                $createCartItemRequest->getUuid(),
                $cart->getUuid()->value(),
                $createCartItemRequest->getProductUuid(),
                $createCartItemRequest->getAmount()
            );
        }
        ($this->includeProduct)($createCartItemRequest);
    }
}
