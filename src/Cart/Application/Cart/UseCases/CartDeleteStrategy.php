<?php

declare(strict_types=1);


namespace Src\Cart\Application\Cart\UseCases;


use Exception;
use Src\Cart\Application\Cart\Request\UserUuidCartRequest;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;

final class CartDeleteStrategy
{
    public function __construct(
        private CartRepository $cartRepository,
        private CartItemRepository $cartItemRepository,
    )
    {

    }

    /**
     * @throws Exception
     */
    public function __invoke(UserUuidCartRequest $userUuidCartRequest)
    {
        $cart = $this->cartRepository->getCartByUser(
            new CartUserUuidVO($userUuidCartRequest->getUserUuid())
        );

        if (!$cart) {
            throw new Exception('Does not exist the specific card for delete a product');
        }

        $cartItems = $this->cartItemRepository->getCartItemByCartUuid(
            new CartItemCartUuidVO($cart->getUuid()->value())
        );

        if (count($cartItems) === 0) {
            $this->cartRepository->delete($cart->getUuid());
        }
    }
}
