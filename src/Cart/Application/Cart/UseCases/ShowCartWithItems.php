<?php

declare(strict_types=1);


namespace Src\Cart\Application\Cart\UseCases;


use Src\Cart\Application\Cart\Request\UserUuidCartRequest;
use Src\Cart\Domain\Cart\Repositories\CartRepository;
use Src\Cart\Domain\Cart\ValueObjects\CartUserUuidVO;
use Src\Cart\Domain\CartItem\Repositories\CartItemRepository;
use Src\Cart\Domain\CartItem\ValueObjects\CartItemCartUuidVO;
use function dd;

final class ShowCartWithItems
{
    public function __construct(
        private CartRepository $cartRepository,
        private CartItemRepository $cartItemRepository
    )
    {
    }

    /**
     * @throws \Exception
     */
    public function __invoke(UserUuidCartRequest $request)
    {
        $cartUserUuidVO = new CartUserUuidVO($request->getUserUuid());
        $cart = $this->cartRepository->getCartByUser($cartUserUuidVO);

        if (!$cart) {
            throw new \Exception('Not has cart available');
        }

        $cartItems = $this->cartItemRepository->getCartItemByCartUuid(
            new CartItemCartUuidVO($cart->getUuid()->value())
        );

    }
}
